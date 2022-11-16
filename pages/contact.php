<?php
include '../pages/header.php';
startPage("Contact",["../assets/style/main"],[]);
?>
<!DOCTYPE html>
<body lang="fr-FR">
<header>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/style/contact.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
</header>
    <div class="content">
        <h1>Nous contacter</h1>
        <p>Des questions, une suggestion, une erreur?</p>
        <!--<img src="../assets/image/contact_page_image.jpg">-->

        <form method="post" name="myemailform" action="form-to-email.php">
            <div class="div_form">
                <div class="input_zone">
                    <label for="Name">Nom:</label>
                    <input type="text" id="Name" name="Name" value="Entrez votre nom">
                </div>
                <div class="input_zone">
                    <label for="Email">Email:</label>
                    <input type="text" id="Email" name="Email" value="Entrez votre email"><br><br>
                </div>
                <label for="choice">Sujet du message:</label><br>
                <select id="choice" name="Choice">
                    <option value="FAQ">FAQ</option>
                    <option value="Erreur">Erreur</option>
                    <option value="Suggestion">Suggestion</option>
                    <option value="Autre">Autre</option>
                </select><br>
                <label for="Message">Contenu</label><br>
                <textarea id="Message" name="Message" rows="10" cols="30">Message</textarea><br>
                <input type="submit" value="Envoyer">
            </div>
        </form>
    </div>
</body>

<?php
include '../pages/footer.php';
endPage();
?>
