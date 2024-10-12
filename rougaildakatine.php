<?php
    include('header.php');
?>

<main>
        <section class="section">
            <div class="recette_detaillee">
                <h1 class="titre_recette">ROUGAIL DAKATINE</h1>
                <div class="ingredients_et_img">
                    <div class="para_preparation">
                        <p><i class="fa-solid fa-hourglass-end"></i> Préparation: 20 min </p>
                        <p><i class="fa-solid fa-utensils"></i> Cuisson : 5 min</p>
                        <p><i class="fa-solid fa-person"></i> Pour 6 personnes</p><br>

                        <p>7 cuillerées à soupe de beurre de cacahuètes </p>
                        <p>3 oignons </p>
                        <p>4 tomates </p>
                        <p>4 piments </p>
                        <p>20g de gingembre </p>
                        <p>Huile </p>
                        <p>Sel</p>
                    </div>          
                    <aside class="plat">
                        <img src="./assets/IMG/plats/rougaildakatine.jpg" alt="Plat rougail dakatine">
                    </aside>
                </div>

                <div class="para_preparation">
                    <p>Ébouillantez les tomates pour pouvoir les peler.</p><br>
                    <p>Coupez les tomates en petits dés.<br>
                        Émincez finement les oignons.<br>
                        Pilez les piments.</p><br>

                    <p>Dans une poêle faites roussire les oignons émincés, dans un peu d’huile. <br>
                        Ajoutez ensuite, les dés de tomates, 2 pincée de sel et les cuillères de beurre de cacahuètes. <br>
                        Mélangez pour obtenir une pâte homogène, les tomates doivent être bien écrasées, rajoutez un peu d’eau si nécessaire</p>
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