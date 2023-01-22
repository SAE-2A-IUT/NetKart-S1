<?php
require ('./header.php');
require ("./database/database.php");

startPage("Themes",["../assets/style/main", "../assets/style/themes"],["../assets/script/theme"]);

$l_db = new database();

$l_db->connection();

$l_circuits = $l_db->get_all_circuit();

//print_r($l_circuits);

$l_circuits = [
    [   'id' => 1,
        'name' => 'Adressage: adresse IP, adresse 1',
        'theme' => 'adressag test e',
        'progress' => '50',
        'circuit-image' => '2',
        'id_theme' => 1],
    [   'id' => 2,
        'name' => 'Adressage: adresse IP, adresse 2',
        'theme' => 'reseau',
        'progress' => '25',
        'circuit-image' => '3',
        'id_theme' => 2],
    [   'id' => 3,
        'name' => 'Adressage: adresse IP, adresse 3',
        'theme' => 'adressage',
        'progress' => '15',
        'circuit-image' => '1',
        'id_theme' => 2],
    [   'id' => 4,
        'name' => 'Adressage: adresse IP, adresse 4',
        'theme' => 'reseau',
        'progress' => '75',
        'circuit-image' => '1',
        'id_theme' => 3],
];
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
            <button type="submit" class="circuit" name="circuit_id_<?php echo $l_circuit['id_theme']; ?>" value="<?php echo $l_circuit['id']; ?>">
                <div class="circuit-image">
                    <span class="play">Jouer</span>
                    <img class="tour" src="../assets/image/circuit<?php echo $l_circuit['circuit-image']; ?>.jpg" alt="circuit">
                </div>
                <div type="submit" class="progress_bar">
                    <div class="progress" style="width:<?php echo $l_circuit['progress']; ?>%" ><?php echo $l_circuit['progress']; ?>%</div>
                </div>
                <p><?php echo $l_circuit['name']; ?></p>
            </button>
        <?php } ?>
    </form>
</div>

<?php

$l_db->close();

include './footer.php';
endPage();
?>
