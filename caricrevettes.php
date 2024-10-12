<?php
    include('header.php');
?>

<main>
        <section class="section">
            <div class="recette_detaillee">
                <h1 class="titre_recette">CARI CREVETTES</h1>
                <div class="ingredients_et_img">
                    <div class="para_preparation">
                        <p><i class="fa-solid fa-hourglass-end"></i> Préparation: 20 min </p>
                        <p><i class="fa-solid fa-utensils"></i> Cuisson : 30 min </p>
                        <p><i class="fa-solid fa-person"></i> Pour 6 personnes</p><br>

                        <p>25 à 30 camaron </p>
                        <p>6 oignon </p>
                        <p>6 tomates bien mûre </p>
                        <p>10 gousses d’ail </p>
                        <p>20g de gingembre </p>
                        <p>5 cuillerées à soupe d’huile </p>
                        <p>2 cuillerées à café de curcuma </p>
                        <p>1,5 verre d’eau </p>
                        <p>Sel</p>
                    </div>
                
                    <aside class="plat">
                        <img src="./assets/IMG/plats/caricrevettes.jpg" alt="Plat cari crevettes">
                    </aside>
                </div>

                <div class="para_preparation">
                    <p>Émincez les oignons et coupez les tomates en petits dés. Mixez l’ail, le gingembre et le sel. Incisez les camarons dans le
                        sens de la longueur. <br>
                        Enlevez le boyau.</p><br>

                    <p>Dans une marmite, faites chauffer l’huile et mettez les camarons à revenir environ 5 minutes. Ajoutez alors les oignons, <br>
                        puis l’ail, le gingembre et le sel mixés, le curcuma et les tomates. Remuez. Laissez cuire 5 minutes en mélengeant bien.</p><br>

                    <p>Mouillez avec l’eau. Couvrez la marmite et laissez cuire environ 20 minutes à feu vif, jusqu’à l’obtention d’une sauce onctueuse.</p>
                </div>
                
                <!-- Je récupère l'identifiant de la recette à partir de l'URL : -->
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