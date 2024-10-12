<?php
    include('header.php');
?>

<main>
        <section class="section">
            <div class="recette_detaillee">
                <h1 class="titre_recette">ROUGAIL SAUCISSES</h1>
                <div class="ingredients_et_img">
                    <div class="para_preparation">
                        <p><i class="fa-solid fa-hourglass-end"></i> Préparation: 20 min </p>
                        <p><i class="fa-solid fa-utensils"></i> Cuisson : 35 min </p>
                        <p><i class="fa-solid fa-person"></i> Pour 6 personnes </p><br>
                    
                        <p>1 kg de saucisses </p>
                        <p>3 oignons </p>
                        <p>6 tomates bien mûres </p>
                        <p>3 gousses d’ail </p>
                        <p>3 cuillerées à soupe d’huile </p>
                        <p>1 cuillerée à café de curcuma </p>
                    </div>
                    <aside class="plat">
                        <img src="./assets/IMG/plats/rougail_saucisses.PNG" alt="Plat rougail saucisses">
                    </aside>
                </div>

                <div class="para_preparation">
                    <p>Dans une marmite, faites bouillir les saucisses et, dès l’ébullition, jetez l’eau. <br>
                        Recommencez l’opération une fois.</p><br>

                    <p>Pendant ce temps, hachez les oignons et les tomates. Pilez l’ail et le sel. <br>
                        Egouttez les saucisses et coupez-les en morceaux.</p><br>
                        
                    <p>Dans une marmite, faites chauffer l’huile et mettez les morceaux de saucisses à frire. Ajoutez les oignons émincés et faites-les revenir. <br>
                        Ajoutez l’ail, le sel et le curcuma, puis les tomates et mélangez. Baissez le feu et laissez cuire environ 20 minutes.</p>
                </div>
                
                <?php 
                $id_recette = isset($_GET['id_recette']) ? $_GET['id_recette'] : null;
                require_once('commentaires.php');
                ?>
            </div>
        </section>
        </main>

<?php
    include('footer.php');
?>