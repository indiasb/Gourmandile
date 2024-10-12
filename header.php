<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./assets/CSS/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet">
        <title>Gourmand'Île</title>
    </head>

<body>
        <header class="header" id="arrow">
            <div class="logo_header"><a href="index.php"><img src="./assets/IMG/logo-gourmandile.png" alt="Logo Gourmand'Île"></a></div>
            <nav>
                <div class="ouvrirMenu"><i class="fa-solid fa-bars"></i></div>
                    <ul class="menu">
                        <li class="li_header"><a href="index.php"> Home</a></li>
                        <li class="li_header"><a href="recettes.php"> Recettes</a></li>
                        <li class="li_header"><a href="contactez-nous.php"> Contactez-nous</a></li>
                        <li class="li_header"><a href="a-propos.php"> À propos</a></li>

                        <?php if (!isset($_SESSION['logged_in'])) : ?>
                            <li><button class="btn_connexion"><a href="connexion.php"><i class="fa-regular fa-user"></i>Connexion</a></button></li>
                        <?php else: ?>
                            <li class="li_deco"><a href="traitement-deco.php"><i class="fas fa-sign-out-alt"></i></a>Deconnexion</li>
                        <?php endif; ?>
                        
                        <div class="fermerMenu"><i class="fa-solid fa-xmark"></i></div>
                        <span class="icons">
                            <i class="fa-brands fa-facebook"></i>
                            <i class="fa-brands fa-instagram"></i>
                            <i class="fa-brands fa-square-x-twitter"></i>
                        </span>
                    </ul>
            </nav>
        </header>