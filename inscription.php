<?php
    include('header.php');
?>

<main>
        <section class="bodyy">
            <div class="container_ctcc">
                <form class="contactt" action="traitement-ins.php" method="post">
                    <h1>S'ENREGISTRER</h1>
                    <input class="input_fieldd" type="text" name="pseudo" placeholder="Pseudo" pattern="[/^[A-Za-z0-9\x{00c0}-\x{00ff}]{5,20}$/u]"><br>
                    <input class="input_fieldd" type="email" id="mail" name="mail" placeholder="Email" pattern="/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/"><br>
                    <input class="input_fieldd" type="password" id="password" name="password" placeholder="Mot de passe" pattern="[A-Za-z0-9_$]{8,}"><br>
                    <input class="input_submitt" type="submit" value="S'INSCRIRE"><br> 
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