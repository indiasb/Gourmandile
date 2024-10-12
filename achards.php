<?php
    include('header.php');
?>

<main>
        <section class="section">
            <div class="recette_detaillee">
                <h1 class="titre_recette">ACHARDS DE LEGUMES</h1>
                <div class="ingredients_et_img">
                    <div class="para_preparation">
                        <p><i class="fa-solid fa-hourglass-end"></i> Préparation: 10 min </p>
                        <p><i class="fa-solid fa-utensils"></i> Cuisson : 10 min </p>
                        <p><i class="fa-solid fa-person"></i> Pour 6 personnes </p><br>

                        <p>2 oignons </p>
                        <p>5 gousses d’ail </p>
                        <p>20g de gingembre </p>
                        <p>2 carottes </p>
                        <p>1 chouchou </p>
                        <p>200g de haricotes verts </p>
                        <p>1/2 chou </p>
                        <p>8 gros piments (facultatif) </p>
                        <p>1 cuillerée à café de curcuma </p>
                        <p>Huile</p>
                    </div>
                
                    <aside class="plat">
                        <img src="./assets/IMG/plats/achards.PNG" alt="Plat achards de légumes">
                    </aside>
                </div>

                <div class="para_preparation">
                    <p>Mixez l’oignon, l’ail et le gingembre. <br>
                        Pelez les carottes et le chouchou, puis détaillez en julienne.</p><br>

                    <p>Coupez les haricots verts en deux, dans le sens de la longueur. Faites blanchir les haricots, puis égouttez-les. Hachez le chou. <br>
                        Coupez éventuellement les gros piments en fines lamelles. Faites-les cuire.</p><br>

                    <p>Dans une poêle, faites revenir le mélange oignon/ail/gingembre avec le piment, le sel et le curcuma. Ajoutez tous les légumes. 
                        Remuez bien pendant 5 minutes, puis éteignez le feu.</p><br>

                    <p>Hors du feu, ajoutez une cuillerée à café d’huile.</p>
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