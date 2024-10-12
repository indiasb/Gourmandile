<?php
session_start();

// Nettoyage des données passées en post
$email = (isset($_POST["mail"]) && !empty($_POST["mail"])) ? htmlspecialchars($_POST["mail"]) : null;
$password = (isset($_POST["password"]) && !empty($_POST["password"])) ? htmlspecialchars ($_POST["password"]) : null;

// Est-ce que le mot de passe ou email sont exploitables
if ($email && $password) {
    try {
        include_once("inc/constant.php");
        $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
        
        $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $qry = $cnn->prepare("SELECT * FROM utilisateurs WHERE mail=? AND active=?");
        $qry->execute(array($email,1));
        $user = $qry->fetch();

        // Si une ligne est trouvée
        if ($qry->rowCount() === 1) {

            // Vérification du mot de passe
            if (password_verify($password, $user['password'])) {

                // Variable de session pour indiquer que l'utilisateur est connecté
                $_SESSION['logged_in'] = true;

                echo "<script>window.location.href='index.php'</script>";

            } else {
                echo "<h2> Mot de passe incorrect" . "<br>";
                echo "<a href='connexion.php'>Revenir à la page connexion</a>";
            }
        } else {
            echo "<h2> Utilisateur inconnu" . "<br>";
            echo "<a href='connexion.php'>Revenir à la page connexion</a>";
        }
    } catch (PDOException $err) {
        echo $err->getMessage();
    }
} else {
    echo "Mail ou mot de passe invalide" . "<br>";
    echo "<a href='connexion.php'>Revenir à la page connexion</a>";
}    
?>