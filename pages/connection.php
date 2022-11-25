<?php
include './header.php';
startPage("Connexion",["../assets/style/main", "../assets/style/connection"],["../assets/script/connection"]);
?>
<div class="body-page">
    <div class="connection-select">
        <div id="button-box">
            <button id="button-connection" class="connection-button" onclick="openConnection('connection')"><b>Connexion</b></button>
            <button id="button-register" class="connection-button" onclick="openConnection('register')"><b>Inscription</b></button>
        </div>
        <br>

        <form id="connection" class="connection-form">
            <label for="username-connection">Pseudo</label>
            <input type="text" placeholder="Nom d'utilisateur" maxlength="50" id="username-connection" name="username-connection" class="form-input" required><br>

            <label for="password-connection">Mot de passe</label>
            <input type="password" placeholder="Mot de passe" id="password-connection" name="password-connection" class="form-input" required><br>

            <input type="submit" value="CONNEXION" class="submit-connection black-button">
        </form>

        <form id="register" class="connection-form" style="display:none">
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
            <input type="text" placeholder="E-Mail" id="mail-register" maxlength="150" name="mail-register" class="form-input" required><br>

            <label for="username-register">Pseudo</label>
            <input type="text" placeholder="Pseudo" id="username-register" maxlength="50" name="username-register" class="form-input" required><br>

            <label for="password-register">Mot de passe</label>
            <input type="password" placeholder="Mot de passe" id="password-register" name="password-register" class="form-input" required><br>

            <label for="password-verify">Confirmation du Mot de passe</label>
            <input type="password" placeholder="Confirmation du  Mot de passe" id="password-verify" name="password-verify" class="form-input" required><br>

            <div>
                <input type="checkbox" id="term-of-use" name="term-of-use" required>
                <label for="term-of-use">J'accepte les <a href="terms-of-use.php">conditions d'utilisation</a></label>
            </div><br>

            <input type="submit" value="INSCRIPTION" class="submit-register black-button form-label-input">
        </form>
    </div>
</div>

<?php
include './footer.php';
endPage();
?>
