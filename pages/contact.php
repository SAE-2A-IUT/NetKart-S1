<?php
include '../pages/header.php';
startPage("Contact",["../assets/style/main","../assets/style/contact"],[]);
?>
<div class="body-page">
    <div class="content">
        <h1>Nous contacter</h1>
        <p>Des questions, une suggestion, une erreur?</p>
        <img class="thumb_img" src="../assets/image/contact_page_image.jpg" alt="zoli madame avec une enveloppe">

        <form method="post" name="myemailform" action="#">
            <div class="div_form">
                <div class="input_zone">
                    <div class="input1"><label for="Name">Nom:</label>
                    <input type="text" id="Name" name="Name" placeholder="Entrez votre nom"></div>
                    <div class="input1"><label for="Email">Email:</label>
                    <input type="text" id="Email" name="Email" placeholder="Entrez votre email"></div>
                </div><br>
                <div class="send_form_zone">
                <label for="choice">Sujet du message:</label><br>
                <select id="choice" name="Choice">
                    <option value="FAQ">FAQ</option>
                    <option value="Erreur">Erreur</option>
                    <option value="Suggestion">Suggestion</option>
                    <option value="Autre">Autre</option>
                </select><br>
                <label for="Message">Contenu</label><br>
                <textarea id="Message" name="Message" rows="10" placeholder='Message' cols="30"></textarea><br>
                <input type="submit" value="Envoyer" class="send_from">
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include '../pages/footer.php';
endPage();
?>
