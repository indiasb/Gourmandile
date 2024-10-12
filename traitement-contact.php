<?php
session_start();

include("inc/constant.php");

// Vérification des jetons avant envoi / rajouté
$email = isset($_POST['mail']) ? $_POST['mail'] :""; 
$objet = isset($_POST['objet']) ? $_POST['objet'] :""; 
$message = isset($_POST['message']) ? $_POST['message'] :"";


// Mise en place des protections XSS / rajouté
$email = htmlspecialchars($email);
$objet = htmlspecialchars($objet);
$message = htmlspecialchars($message);

try {

    // Connexion à ma base de données
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);

    // Afficher les erreurs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // Récupération des données du formulaire et les nettoyer
    // $email = htmlspecialchars($_POST['mail']);
    // $objet = htmlspecialchars($_POST['objet']);
    // $message = htmlspecialchars($_POST['message']);

    // Préparation de la requête SQL
    $sql = "INSERT INTO messages (mail, objet, message) VALUES (:mail, :objet, :message)";
    $stmt = $pdo->prepare($sql);
    
    // Protection injection SQL
    $stmt->bindParam(':mail', $email);
    $stmt->bindParam(':objet', $objet);
    $stmt->bindParam(':message', $message);
    $stmt->execute();

    echo "<script>alert('Message envoyé avec succès !')</script>";
    echo "<script>window.location.href='contactez-nous.php'</script>";


} catch(PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}
?>