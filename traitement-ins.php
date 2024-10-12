<?php
session_start();

include("inc/constant.php");

// Vérification des jetons avant envoi

$pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] :""; 
$email = isset($_POST['mail']) ? $_POST['mail'] :""; 
$password = isset($_POST['password']) ? $_POST['password'] :"";
$errors = [];

// Validation du pseudo
if(preg_match("/^[A-Za-z0-9\x{00c0}-\x{00ff}]{5,20}$/u", $pseudo) === 0) {
    $errors["pseudo"] = "Le pseudo n'est pas valide";
}

// Validation du mail
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    // Ajout d'un message d'erreur
    $errors["mail"] = "L'email n'est pas valide";
}

// Validation du mot de passe
if(preg_match("/^[A-Za-z0-9_$]{8,}/", $password) === 0) {
    $errors["password"] = "Le mot de passe n'est pas valide";
}

// Mise en place des protections XSS
$pseudo = htmlspecialchars($pseudo);
$email = htmlspecialchars($email);
$password = htmlspecialchars($password);

// Mise en place d'une condition de validation du formulaire
if(count($errors) > 0) {
    $_SESSION["compte-données"]["pseudo"] = $pseudo;
    $_SESSION["compte-données"]["mail"] = $email; 
    $_SESSION["compte-données"]["password"] = $password;
    $_SESSION["compte-errors"] = $errors;
    foreach ($errors as $error) {
        echo"<h2>$error</h2>";
    };
    
    exit();
}

// Parcourir le tableau Pseudo, mail, mot de passe
foreach($_POST as $key => $val) {
    $params[":" . $key] = (isset($_POST[$key]) && !empty($_POST[$key])) ? htmlspecialchars($_POST[$key]) : null;
}

// Hashage du mot de passe
$params[":password"] = password_hash($params[":password"], PASSWORD_DEFAULT);

try {

    // Connexion à ma base de données
    $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    
    // Les options
    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //  Test si l'email n'existe déjà pas
    $sql = 'SELECT COUNT(*) as nb FROM utilisateurs WHERE mail=?';
    $qry = $cnn->prepare($sql);
    $qry->execute(array($params[':mail']));
    $row = $qry->fetch();
    

    if($row['nb'] ==1){
        echo"<h2> Cet email existe deja !!!";
        echo "<a href='index.php'>Retour à la page d'accueil</a>";

    }else{
        $sql='INSERT INTO utilisateurs(pseudo, mail, password, active)VALUES(:pseudo, :mail, :password, 1)';
        $qry=$cnn->prepare($sql);
        $qry->execute($params);
        unset($cnn);

        echo "<script>window.location.href='connexion.php'</script>";
    }

}catch(PDOException $err){

    // Gestion des erreurs
    $err->getMessage();
    $_SESSION["compte-errors-sql"] = $err->getMessage();
    $_SESSION["compte-données"]["pseudo"] = $pseudo;
    $_SESSION["compte-données"]["mail"] = $email; 
    $_SESSION["compte-données"]["password"] = $password;
    
exit;
}
?>