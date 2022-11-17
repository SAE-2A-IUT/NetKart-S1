<?php
include './header.php';
startPage("Création une session",["../assets/style/main", "../assets/style/create-session"],[]);
?>

<div id="page-description">
    <h1>Créer une session</h1>
    <h4>Créer une session permet à des joueurs de s'affronter sur un thème choisi. Pour cela, pas besoin qu'ils se créent un compte ! Il leur suffit de copier le code généré après ce formulaire pour rejoindre la session</h4>
</div>

<form id="create-session" class="form-session">
    <label for="session-name">Nom de la session</label>
    <input type="text" placeholder="Nom" id="session-name" name="session-name" class="form-input" required><br>

    <label for="session-time">Durée de la session</label>
    <select name="session-time" id="session-time" class="form-input" required>
        <option value="">Choisir la durée</option>
        <option value="15">15 minutes</option>
        <option value="30">30 minutes</option>
        <option value="45">45 minutes</option>
        <option value="60">1 heure</option>
    </select><br>

    <label for="session-theme">Thème de la session</label>
    <select name="session-theme" id="session-theme" class="form-input" required>
        <option value="">Choisir le thème</option>
        <option value="1">Thème 1</option>
        <option value="2">Thème 2</option>
        <option value="3">Thème 3</option>
        <option value="4">Thème 4</option>
    </select><br>

    <input type="submit" value="Créer la session" id="submit" class="form-label-input">
</form>

<?php
include './footer.php';
endPage();
?>
