<?php
include './header.php';
startPage("Themes",["../assets/style/main", "../assets/style/themes"],["../assets/script/theme"]);
?>

<div id="theme_choice" class="item_choice">
    <button id="reseau" class="button_theme" onclick="show_theme('reseau')"><b>Reseau</b></button>
    <button id="adressage" class="button_theme" onclick="show_theme('adressage')"><b>Adressage</b></button>
</div>
<div class="all_theme">
    <h1 id="waiting">Merci de sélectionné au minimum un theme</h1>
    <div class="adressage">
        <img class="tour" src="../assets/image/circuit1.jpg" alt="zircui">
        <div class="progress_bar">
            <div class="progress" style="width:25%" >25%</div>
        </div>
        <p>Adressage: adresse IP, adresse</p>
        <img class="difficulty" src="../assets/image/compteur_easy.png" alt="difficulte">
    </div>
    <div class="adressage">
        <img class="tour" src="../assets/image/circuit1.jpg" alt="zircui">
        <div class="progress_bar">
            <div class="progress" style="width:50%">50%</div>
        </div>
        <p>Adressage: adresse IP, adresse</p>
        <img class="difficulty" src="../assets/image/compteur_easy.png" alt="difficulte">
    </div>
    <div class="reseau">
        <img class="tour" src="../assets/image/circuit1.jpg" alt="zircui">
        <div class="progress_bar">
            <div class="progress" style="width:75%">75%</div>
        </div>
        <p>Adressage: adresse IP, adresse</p>
        <img class="difficulty" src="../assets/image/compteur_easy.png" alt="difficulte">
    </div>
    <div class="reseau">
        <img class="tour" src="../assets/image/circuit1.jpg" alt="zircui">
        <div class="progress_bar">
            <div class="progress" style="width:100%">100% </div>
        </div>
        <p>Adressage: adresse IP, adresse</p>
        <img class="difficulty" src="../assets/image/compteur_easy.png" alt="difficulte">
    </div>
</div>


<?php
include './footer.php';
endPage();
?>
