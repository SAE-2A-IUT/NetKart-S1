<?php
require ('./header.php');
require ("./database/database.php");

startPage("Themes",["../assets/style/main", "../assets/style/themes"],["../assets/script/theme"]);

$l_db = new database();

$l_db->connection();
// Get all circuits from database
$l_circuits = $l_db->get_all_circuit();
// Get all themes from database
$l_themes = $l_db->get_all_themes();
?>
<div class="body-page">
    <div id="theme_choice" class="item_choice">
        <?php
        foreach ($l_themes as $l_theme) {
            ?>
        <button type="button" id="circuit_<?php echo $l_theme["id_theme"]; ?>" class="button_theme" onclick="show_theme(this)"><b> <?php echo $l_theme["nom_theme"]; ?></b></button>
        <?php } ?>
    </div>
    <form id="circuit_form" class="all_theme" action="game-solo.php" method="post">
        <h1 id="waiting">Merci de sélectionner au minimum un thème</h1>
        <?php foreach ($l_circuits as $l_circuit){?>
            <button type="submit" class="circuit" name="circuit_id_<?php echo $l_circuit['id_theme']; ?>" value="<?php echo $l_circuit['id_circuit']; ?>">
                <div class="circuit-image">
                    <span class="play">Jouer</span>
                    <img class="tour" src="../assets/image/<?php echo $l_circuit['image']; ?>" alt="circuit">
                </div>
                <p><?php echo $l_circuit['nom_circuit']; ?> : <?php echo $l_circuit['points']; ?> points</p>
            </button>
        <?php } ?>
    </form>
</div>

<?php

$l_db->close();

include './footer.php';
endPage();
?>
