<?php
    include('header.php');
?>


<?php
    require_once('inc/constant.php');

    if(isset($_POST['submit'])) {
       
        if(!isset($_SESSION['logged_in'])) {
            
          echo '<div class="message_erreur">Veuillez vous connecter pour pouvoir poster un commentaire.</div>';   
        } else {

            if(!empty($_POST['pseudo']) || !empty($_POST['mail']) || !empty($_POST['commentaire'])) {

                $req=$pdo->prepare('INSERT INTO reponses (parent, pseudo, mail, reponse, datepost) VALUES (?, ?, ?, ?, NOW())');
                $req->execute(array($_GET['id_commentaire'], $_POST['pseudo'], $_POST['mail'], $_POST['commentaire']));
            }
        }  
    }
?>

<section class="section_reponses">
<!-- Récupération du commentaire sur lequel je veux poster une réponse -->
<?php
    require_once('inc/constant.php');
    $req=$pdo->prepare('SELECT * FROM commentaires WHERE id_commentaire =?');
    $req->execute(array($_GET['id_commentaire']));
    while ($reponse = $req->fetch(PDO::FETCH_OBJ)) {
 
?>
                
        <div class="form_commentaires">
        <p>
        <!-- J'affiche le pseudo, la date de publication et le commentaire auquel je souhaite répondre-->
        <span class="post"> Posté par : <?php echo htmlspecialchars($reponse->pseudo); ?>
                            le <?php echo htmlspecialchars($reponse->datepost); ?>
        </span> <br>
        <?php echo htmlspecialchars($reponse->commentaire); ?> <br>
        </p>
        </div>
<?php
    }
?>


<!-- Formulaire de réponses, qui va récupérer le nom du visiteur, son e-mail et sa réponse -->   
        <div class="form_commentaires">
        <h2>Répondre</h2>
        <form action="" method="POST">
                <input type="text" name="pseudo" placeholder="Pseudo" required class="input_commentaires"> <br>
                <input type="email" name="mail" placeholder="E-mail" required class="input_commentaires"> <br>
                <textarea name="commentaire" placeholder="Message" required class="input_commentaires input_field2"></textarea> <br>
                <input type="submit" name="submit" value="Poster" class="input_submit">
        </form>

        <!-- Pour afficher les réponses postées -->
        <h2>Réponses</h2> <br>
    
    <?php
        $req=$pdo->prepare('SELECT * FROM reponses WHERE parent=?');
        $req->execute(array($_GET['id_commentaire']));

        while ($reponse = $req->fetch(PDO::FETCH_OBJ)) {
 
        ?>
                
        <p>
            <!-- J'affiche le pseudo et la date de publication, puis la réponse-->
            <span class="post"> Posté par : <?php echo $reponse->pseudo; ?> le <?php echo $reponse->datepost; ?></span> <br>
            <?php echo $reponse->reponse; ?> <br>
        </p>
        <?php
        }
    ?>
    </div>
</section>
<?php
    include('footer.php');
?>