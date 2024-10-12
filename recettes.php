<?php
    include('header.php');
?>

<main>
        <section class="section_recettes">
            <div class="icone_plus_titre">
                <i class="fa-solid fa-book-open"></i> 
                <h1>RECETTES</h1>
            </div>
            <section class="div_parents_photos_recettes">
                <article class="recette">
                    <a href="rougailsaucisses.php?id_recette=1"><img src="./assets/IMG/plats/rougail_saucisses.PNG" alt="Rougail saucisses"></a>
                    <h2>Rougail saucisses</h2>
                    <div><p><i class="fa-solid fa-hourglass-end"></i> 65 minutes<i class="fa-solid fa-utensils"></i> Volaille</p></div>
                </article>
                <article class="recette">
                        <a href="caricrevettes.php?id_recette=2"><img src="./assets/IMG/plats/caricrevettes.jpg" alt="Cari crevettes"></a>
                        <h2>Cari crevettes</h2>
                        <div><p><i class="fa-solid fa-hourglass-end"></i> 50 minutes <i class="fa-solid fa-utensils"></i> Poisson</p></div>
                </article>
                <article class="recette">
                        <a href="rougaildakatine.php?id_recette=3"><img src="./assets/IMG/plats/rougaildakatine.jpg" alt="Rougail dakatine"></a>
                        <h2>Rougail dakatine</h2>
                        <div><p><i class="fa-solid fa-hourglass-end"></i> 25 minutes <i class="fa-solid fa-utensils"></i> Végétarien</p></div>
                </article>
                <article class="recette">
                        <a href="achards.php?id_recette=4"><img src="./assets/IMG/plats/achards.PNG" alt="Achards de légumes"></a>
                        <h2>Achards de légumes</h2>
                        <div><p><i class="fa-solid fa-hourglass-end"></i> 20 minutes <i class="fa-solid fa-utensils"></i> Végétarien</p></div>
                </article>
            </section>
                <div class="arrow">
                    <a href="#arrow"><i class="fa-solid fa-arrow-up"></i></a>
                </div>
        </section>
</main>

<?php
    include('footer.php');
?>