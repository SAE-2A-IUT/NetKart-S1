<?php
/** @file /pages/connection.php
 *
 *  @details PHP page that allows the user to either register or login by filling in the required fields
 *
 * @author SAE S3 NetKart
 */

require './header.php';
startPage("Connexion",["../assets/style/main", "../assets/style/connection"],["../assets/script/connection"]);
if (isset($_SESSION['id_user'])) {
    session_destroy();
    print_r($_SESSION['id_user']);
    header('Location: connection.php?success=3');
}
?>
<div class="body-page">
    <div class="connection-select">
        <div id="button-box">
            <button id="button-connection" class="connection-button" onclick="openConnection('connection')"><b>Connexion</b></button>
            <button id="button-register" class="connection-button" onclick="openConnection('register')"><b>Inscription</b></button>
        </div>
        <br>
        <?php if (isset($_GET['error'])){
            $l_code_err = $_GET['error'];?>
        <div class="error">
            <?php
                if ($l_code_err == 1){
            ?>Le compte n'existe pas ou le mot de passe est erroné.
            <?php }
            if ($l_code_err == 2){
                ?>Le mot de passe et la confirmation de mot de passe sont différents.
            <?php }
            if ($l_code_err == 3){
                ?>Cette adresse mail est déjà associé à un compte.
            <?php }
            if ($l_code_err == 4){
                ?>Ce pseudo est déjà associé à un compte.
            <?php }
            if ($l_code_err == 5){
                ?>L'enregistrement du compte a rencontré une erreur, veuillez réessayer.
            <?php }
            if ($l_code_err == 6){
                ?>Merci de verifier votre email avant de vous connecter.
            <?php }
            if ($l_code_err == 7){
                ?>Ce lien de confirmation n'est plus valide.
            <?php }
            if ($l_code_err == 8){
                ?>veuillez vous connecter pour accéder a cette page.
            <?php }?>

        </div>
        <?php }?>
        <?php if (isset($_GET['success'])){
            $l_code_success = $_GET['success'];?>
            <div class="success">
                <?php
                if ($l_code_success == 1){
                ?>Le compte est bel et bien créé, veillez verifier votre boite mail.
                <?php }
                if ($l_code_success == 2){
                    ?>email verifier, vous pouvez désormais vous connecter.
                <?php }
                if ($l_code_success == 3){
                    ?>Déconnexion réussie
                <?php }?>

            </div>
        <?php }?>
        <form id="connection" class="connection-form" action="connection-post.php" method="post">
            <label for="username-connection">Pseudo</label>
            <input type="text" placeholder="Nom d'utilisateur" maxlength="50" id="username-connection" name="username-connection" class="form-input" required><br>

            <label for="password-connection">Mot de passe</label>
            <input type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[?!*µ$£¤=+°@_~#]).{8,72}$" placeholder="Mot de passe" id="password-connection" name="password-connection" class="form-input" required><br>

            <input type="submit" value="CONNEXION" class="submit-connection black-button">
        </form>

        <form id="register" class="connection-form" style="display:none" action="connection-post.php" method="post">
            <div id="firstname-lastname">
                <div>
                    <label for="firstname">Prénom</label>
                    <input type="text" placeholder="Prénom" id="firstname" name="firstname" class="form-input" required>
                </div>
                <div>
                    <label for="lastname">Nom</label>
                    <input type="text" placeholder="Nom" id="lastname" name="lastname" class="form-input" required>
                </div>
            </div><br>

            <label for="mail-register">Adresse E-Mail</label>
            <input type="email" placeholder="E-Mail" id="mail-register" maxlength="150" name="mail-register" class="form-input" required><br>

            <label for="username-register">Pseudo</label>
            <input type="text" placeholder="Pseudo" id="username-register" maxlength="50" name="username-register" class="form-input" required><br>

            <label for="password-register">Mot de passe</label>
            <input type="password" placeholder="Mot de passe" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[?!*µ$£¤=+°@_~#]).{8,72}$"  id="password-register" name="password-register" class="form-input" required><br>

            <label for="password-verify">Confirmation du Mot de passe</label>
            <input type="password" placeholder="Confirmation du  Mot de passe" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[?!*µ$£¤=+°@_~#]).{8,72}$"  id="password-verify" name="password-verify" class="form-input" required><br>

            <div>
                <input type="checkbox" id="term-of-use" name="term-of-use" required>
                <label for="term-of-use">J'accepte les <a href="terms-of-use.php">conditions d'utilisation</a></label>
            </div><br>

            <input type="submit" value="INSCRIPTION" class="submit-register black-button form-label-input">
        </form>
    </div>
</div>

<?php
require './footer.php';
endPage();
?>
