<?php
    include('header.php');
?>

<?php 

$errors = array();
require "mail.php";
include_once ("inc/constant.php");
try {
    // Connexion à la BDD
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("la connexion n'est pas etablie: " . $e->getMessage());
}

$mode = "enter_email";
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
}

if (count($_POST) > 0) {
    switch ($mode) {
        case 'enter_email':
            
            $email = $_POST['email'];
            // Vérification de la validité de l'adresse e-mail
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = " Veuillez insérer un email valide";
            // Vérification si l'adresse e-mail existe dans la BDD
            } elseif (!valid_email($pdo, $email)) {
                $errors[] = "Veuillez insérer un email valide";

            // Envoi d'un courriel de réinitialisation
            } else {
                $_SESSION['forgot']['email'] = $email;
                send_email($pdo, $email);
                header("Location: forgot.php?mode=enter_code");
                die;
            }
            break;

        case 'enter_code':
           
            $code = $_POST['code'];
            $result = is_code_correct($pdo, $code); //.

            if ($result === "Le code est correcte") {
                $_SESSION['forgot']['code'] = $code;
                
                header("Location: forgot.php?mode=enter_password");
                die;
            } else {
                // Ajout d'une erreur si le code saisi n'est pas correcte
                $errors[] = $result;
            }
            break;

        case 'enter_password':
  
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            // Vérification si les mots de passe saisis sont identiques
            if ($password !== $password2) {
                $errors[] = "Les mots de passe ne sont pas identiques";
            } elseif (!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])) {
                header("Location: forgot.php");
                die;
            } else {
                // Sauvegarde du nouveau mot de passe dans la base de données
                save_password($pdo, $password);
                // Suppression des informations de récupération de mot de passe de la session
                if (isset($_SESSION['forgot'])) {

                    unset($_SESSION['forgot']);
                }
                echo "<script>alert('Réinitialisation réussie')</script>";
                echo "<script>window.location.href='connexion.php'</script>";
                die;
            }
            break;

        default:
            // code...
            break;
    }
}

// Fonction d'envoi de courriel pour la réinitialisation de mot de passe
function send_email($pdo, $email) { //.
    $expire = time() + (60 * 2);
    $code = rand(10000, 99999);
    $email = addslashes($email);

    $query = "INSERT INTO codes (email, code, expire) VALUES (:email, :code, :expire)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':expire', $expire);
    $stmt->execute();
    // Envoi du courriel contenant le code
    send_mail($email, 'Reinitialisation du mot mot de passe', 'Votre code est : '. $code);
}


// Fonction de sauvegarde du nouveau mot de passe dans la BDD
function save_password($pdo, $password) {
    $email = addslashes($_SESSION['forgot']['email']); //.
    // Hashage du mdp
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE utilisateurs SET password = :password WHERE mail = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
}


// Fonction de vérification de l'existence de l'adresse e-mail dans la BDD
// Table mail dans utilisateurs et table email dans codes
function valid_email($pdo, $email) {
    $query = "SELECT * FROM utilisateurs WHERE mail = :email LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        return true;
    }

    return false;
}

// Fonction de vérification de la validité du code saisi
// Table mail dans utilisateurs et table email dans codes
function is_code_correct($pdo, $code) {
    $expire = time();
    $email = addslashes($_SESSION['forgot']['email']);

    $query = "SELECT * FROM codes WHERE code = :code AND email = :email ORDER BY id_code DESC LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row['expire'] > $expire) {
            return "Le code est correcte";
        } else {
            return "Le code à expiré";
        }
    } else {
        return "Le code n'est pas correcte";
    }
}
?>
    <section class="body_forgot">
    <?php
    switch ($mode) {
        case 'enter_email':
            // code...
            ?>
            <!-- PREMIER FORM -->

                <div> 
                    <form class="form_forgot" action="forgot.php?mode=enter_email" method="post">
                    <h1>Mot de passe oublié</h1>

                <span style="font-size: 12px; color:red;">
                <?php 
                foreach ($errors as $err) {
                    echo $err . "<br>";
                }
                ?>
                </span>

                <input class="input_forgot" type="email" name="email" placeholder="Entrez votre adresse email"><br>
                <br style="clear: both;">
                <input class="input_submit" type="submit" value="Suivant"><br>
                <br><br>
                <div>
                    <a class="signup" href="connexion.php">Se connecter</a>
                </div>
            </form>
            <?php
            break;


            

        case 'enter_code':
            // code...
            ?>
            <!-- DEUXIEME FORM -->
            <form class="form_forgot" action="forgot.php?mode=enter_code" method="post">
                <h1>Mot de passe oublié</h1>
                <h3>Entrez le code envoyé à votre adresse e-mail ci-dessous</h3>

                <span style="font-size: 12px; color:red;">
                 <?php 
                 foreach ($errors as $err) {
                    echo $err . "<br>";
                }
                 ?>
                 </span>

                <input class="input_forgot" type="text" name="code" placeholder="12345"><br>
                <br style="clear: both;">
                <input class="input_submit2" type="submit" value="Suivant" style="float: right;">
                <a href="forgot.php">
                <input class="input_submit2" type="button" value="Renvoyer un code">
                </a>
                <br><br>
                <div>
                    <a class="signup" href="connexion.php">Se connecter</a>
                </div>
            </form>
            <?php
            break;




            
        case 'enter_password':
            // code...
            ?>
            <!-- TROISIEME FORM -->
            <form class="form_forgot" action="forgot.php?mode=enter_password" method="post">
                <h1>Mot de passe oublié</h1>
                <h3>Entrez le nouveau mot de passe ci-dessous</h3>

                <span style="font-size: 12px; color:red;">
                 <?php 
                 foreach ($errors as $err) {
                     echo $err . "<br>";
                 }
                 ?>
                 </span>

                <input class="input_forgot" type="password" name="password" placeholder="Nouveau mot de passe"><br>
                <input class="input_forgot" type="password" name="password2" placeholder="Réécrire à nouveau"><br>
                <br style="clear: both;">
                <input class="input_submit2" type="submit" value="Suivant" style="float: right;">
                <a class="signup" href="forgot.php">
                <input class="input_submit2" type="button" value="Renvoyer un code">
                </a>
                <br><br>
            </form>
            <?php
            break;

        default:
            // code...
            break;
    }
    ?>
    </section>
<?php
include ('footer.php');
?>