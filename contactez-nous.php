<?php
    include('header.php');
?>

<main>
        <section class="body">
            <div class="container_ctc">
                <form class="contact" action="traitement-contact.php" method="POST">
                    <h1>NOUS CONTACTER</h1>
                    <label for="email">Adresse e-mail</label>
                    <input class="input_field" type="email" id="mail" name="mail" placeholder="Entrez votre e-mail" required pattern="/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/"> <br>
                    <label for="objet">Objet de la demande</label>
                    <input class="input_field" type="text" id="objet" name="objet" placeholder="Entrez l'objet" required> <br>
                    <label for="message">Mon message</label>
                    <textarea class="input_field input_field2" type="text" name="message" id="message" placeholder="Écrire ..." required></textarea> <br>
                    <div class="div_input_submit">
                        <input class="input_submit" type="submit" value="SOUMETTRE">
                    </div>
                </form>
                <div class="shadow shadow1"></div>
                <div class="shadow shadow2"></div>
                <div class="shadow shadow3"></div>
                <div class="shadow shadow4"></div>
            </div>
        </section>
        </main>

<?php
    include('footer.php');
?>