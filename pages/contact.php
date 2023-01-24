<?php
/** @file /pages/contact.php
 *
 *  @details PHP page that allows the user to send an email to report an error, a suggestion or other
 *
 * @author SAE S3 NetKart
 */

require '../pages/header.php';
startPage("Contact",["../assets/style/main","../assets/style/contact"],[]);
?>
<div class="body-page">
    <div class="content">
        <h1>Nous contacter</h1>
        <p>Des questions, une suggestion, une erreur?</p>
        <img class="thumb_img" src="../assets/image/contact_page_image.jpg" alt="zoli madame avec une enveloppe">
        <?php
        if(isset($_POST['submit'])){
            $receiver = "contact.netkart@gmail.com";
            $sender = $_POST['Email'];
            $name = $_POST['Name'];
            $subject = $_POST['Choice'];
            $subject_sender = "Copie de votre contact NetKart";
            $message = $name . " a écrit:" . "\n\n" . $_POST['Message'];
            $message_sender = "Voici une copie de ton mesage " . $name . "\n\n" . $_POST['Message'];

            $headers = "From:" . $sender;
            $headers_sender = "From:" . $receiver;
            mail($receiver,$subject,$message,$headers);
            mail($sender,$subject_sender,$message_sender,$headers_sender); // sends a copy of the message to the sender
            echo "Mail envoyé. Merci " . $name . ", on vous recontactera dès que possible.";
        }
        ?>
        <form method="post" name="myemailform" action="">
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
                <input type="submit" value="submit" class="send_from" name="submit">
                </div>
            </div>
        </form>
    </div>
</div>
<?php
require '../pages/footer.php';
endPage();
?>
