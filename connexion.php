<?php
    include('header.php');
?>

<main>
        <section class="bodyy">
            <div class="container_ctcc">
                <form class="contactt" action="traitement-co.php" method="POST">
                    <h1>CONNEXION</h1>
                    <input class="input_fieldd" type="email" id="mail" name="mail" placeholder="Email"><br>
                    <input class="input_fieldd" type="password" id="password" name="password" placeholder="Mot de passe"><br>                    
                        <input class="input_submitt" type="submit" value="SE CONNECTER"><br>
                        <a class="signup" href="forgot.php">Mot de passe oublié ?</a><br>
                        <p> Pas encore de compte ? <span class="signup"> <a href="inscription.php">S'inscrire </a></span></p>
                </form>
                <div class="shadoww shadoww1"></div>
                <div class="shadoww shadoww2"></div>
                <div class="shadoww shadoww3"></div>
                <div class="shadoww shadoww4"></div>
            </div>
        </section>
        </main>

<?php
    include('footer.php');
?>