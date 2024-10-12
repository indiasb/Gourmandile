<?php
    include('header.php');
?>

<main>
        <section>
            <div>
                <div class="div_home_parent">
                    <div class="div_home_texte">
                        <h1> Explorez. Cuisinez. Savourez. Réyoné.*</h1><br>

                        <h2>Des recettes réunionnaises simples, <br> pour des délices quotidiens.
                        Préparez-vous <br> à éveiller vos papilles, un plat à la fois. <br>
                        </h2>

                        <a href="#decouvrir"><button a href="#decouvrir" class="btn_div_home">Découvrir l'île </button></a>
                    </div>

                    <div class="div_home_img">
                        <img src="./assets/IMG/logo home.png" alt="Logo Gourmand'Île">
                    </div>
                </div>

                <br><br><br><br><br><br><br><br><br><br><br><br><br><br>



                <div class="div_parents_encadre">
                    <div class="div_enfant_encadre">
                        <div id="decouvrir" class="para_slider">
                            <p>L'Île de La Réunion, située dans l'océan Indien, est un département d'outre-mer français. Cette île volcanique, caractérisée
                                par un relief impressionnant comprenant le Piton des Neiges, offre un climat tropical avec une diversité de microclimats. Sa biodiversité
                                exceptionnelle, comprenant de nombreuses espèces endémiques, attire les amateurs de nature. <br><br>
                                La population réunionnaise est diverse, reflétant un mélange harmonieux d'influences européennes, africaines, indiennes et chinoises.
                                Le français est la langue officielle, mais le créole réunionnais est largement parlé. La culture de l'île est riche et colorée, exprimée
                                à travers sa cuisine, sa musique, sa danse et ses croyances religieuses. <br><br>
                                L'économie de La Réunion repose notamment sur l'agriculture, avec la culture de la canne à sucre, et sur le tourisme qui attire 
                                les visiteurs avec ses paysages spectaculaires, ses plages et ses activités de plein air.</p>
                        </div>
                        <div id="paysages">
                            <img src="./assets/IMG/paysages/L2_1.jpeg" id="img_paysages" alt="Carousel de paysages">
                            <div id="gauche" onclick="movePaysages(-1)"><i class="fa-solid fa-arrow-left"></i></div>
                            <div id="droite" onclick="movePaysages(1)"><i class="fa-solid fa-arrow-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="arrow">
                    <a href="#arrow"><i class="fa-solid fa-arrow-up"></i></a>
                </div>
            </div>
        </section>
</main>

<?php
    include('footer.php');
?>