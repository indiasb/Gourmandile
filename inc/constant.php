<?php
$db_host = "localhost";
$db_name = "gourmandile";
$db_user = "root";
$db_pass = "";

$pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);

// Afficher les erreurs PDO
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    // Arrêter l'exécution du script ou prendre d'autres mesures nécessaires en cas d'échec de la connexion
}
?>