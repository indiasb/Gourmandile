<?php
if(isset($_POST['submit'])) {

    if (!isset($_SESSION['logged_in'])) {

        echo '<div class="message_erreur">Veuillez vous connecter pour pouvoir poster un commentaire.</div>';

    } else {

        if(empty($_POST['pseudo']) || empty($_POST['mail']) || empty($_POST['commentaire'])) {
            
            echo '<div class="message_erreur">Veuillez remplir tous les champs.</div>';
        } else {
            
            // Connexion à la base de données
            require_once('inc/constant.php');

            // Récupération des données du formulaire et les nettoyer
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mail = htmlspecialchars($_POST['mail']);
            $commentaire = htmlspecialchars($_POST['commentaire']);

            // Insertion du commentaire dans la base de données
            $req=$pdo->prepare('INSERT INTO commentaires (id_recette, pseudo, mail, commentaire, datepost) VALUES (?, ?, ?, ?, NOW())');
            $req->execute(array($id_recette, $pseudo, $mail, $commentaire));
        }

    }   
}
?>

        <!-- Pour afficher le formulaire de commentaires -->
        <div class="form_commentaires">
            <h2>Commentaires</h2> <br>

            <!-- Création du formulaire -->
            <form action="" method="POST">
                    <input class="input_commentaires" type="text" name="pseudo" placeholder="Pseudo"> <br>
                    <input class="input_commentaires" type="email" name="mail" placeholder="E-mail"> <br>
                    <textarea class="input_commentaires input_field2" name="commentaire" placeholder="Message"></textarea> <br>
            
                    <div class="div_input_submit div_input_submit2">  
                    <input class="input_submit" type="submit" name="submit" value="Poster">
                    </div>
            </form>
        </div>


        <!-- Pour afficher les commentaires postés -->
        <div class="form_commentaires">
            <h2>Commentaires postés</h2>

            <?php
                $id_recette = isset($_GET['id_recette']) ? $_GET['id_recette'] : null;
                require_once('inc/constant.php');

                $req=$pdo->prepare('SELECT * FROM commentaires WHERE id_recette = ?');
                $req->execute(array($id_recette));

                while ($reponse = $req->fetch(PDO::FETCH_OBJ)) {
 
                ?>
                
        <p>
            <!-- J'affiche le pseudo et la date de publication, puis le commentaire-->
            <span class="post"> Posté par : <?php echo $reponse->pseudo; ?> le <?php echo $reponse->datepost; ?></span> <br>
            <?php echo $reponse->commentaire; ?> <br><br> <button class="btn_repondre"><a href="reponses-commentaires.php?id_commentaire=<?php 
                    echo $reponse->id_commentaire; ?>">Répondre</a></button> <br>
                
                    <!-- J'indique le nombre de réponses -->
                    <a href="reponses-commentaires.php?id_commentaire=<?php echo $reponse->id_commentaire; ?>">
                    <span class="post"> Nombre de réponses : </span>
                        
                    <?php
                    $nbReponses = $pdo->prepare('SELECT * FROM reponses WHERE parent = ?');
                    $nbReponses->execute(array($reponse->id_commentaire));

                    $nbReponses = $nbReponses->fetchAll();
                    echo count($nbReponses);
                    ?>     
                </a> <br><br>
        </p>
        <?php
        }
    ?>
</div>