<?php
/** @file /pages/homepage.php
 *
 * @details File displaying existing circuits to play to the game
 *
 * @author SAE S3 NetKart
 */

require ('header.php');
session_start();
require ("./database/database.php");

startPage("Themes",["../assets/style/main", "../assets/style/themes", "../assets/style/edit_theme"],["../assets/script/theme"]);

$l_db = new database();

$l_db->connection();
// Get all circuits from database
$l_circuits = $l_db->get_all_circuit();
// Get all themes from database
$l_themes = $l_db->get_all_themes();
?>

<div class="body-page">
    <div id="theme_choice" class="item_choice">
        <?php $circuit_position = 0;
        foreach ($l_themes as $l_theme) {
            ?>
            <button type="button" id="circuit_<?php echo $l_theme["id_theme"]; ?>" class="button_theme <?php
            switch($circuit_position % 7){
                case 0:
                    echo "button_theme_red";
                    break;
                case 1:
                    echo "button_theme_orange";
                    break;
                case 2:
                    echo "button_theme_yellow";
                    break;
                case 3:
                    echo "button_theme_green";
                    break;
                case 4:
                    echo "button_theme_blue";
                    break;

                case 5:
                    echo "button_theme_pink";
                    break;

                case 6:
                    echo "button_theme_purple";
                    break;
            }
            ?>" onclick="show_theme(this)"><b> <?php echo $l_theme["nom_theme"]; ?></b></button>
            <?php $circuit_position++; } ?>

    </div>
    <div class="all_theme">
        <h1 id="waiting">Merci de sélectionner au minimum un thème</h1>


        <?php foreach ($l_circuits as $l_circuit){?>
        <div class="joue_div" id="circuit_id_<?php echo $l_circuit['id_theme']; ?>">
            <div class="theme">
                <img class="theme_image" alt="circuit" src="../assets/image/<?php echo $l_circuit['image']; ?>">
                <?php
                $l_title = $l_circuit['nom_circuit'];
                if (strlen($l_title) > 30) {
                    $l_title = substr("$l_title", 0, 30)."...";
                }
                if (strlen($l_title) > 15)
                {
                    $l_title = substr("$l_title", 0, 15).PHP_EOL.substr("$l_title", 15, 30);

                }

                ?>
                <h3><?php echo $l_title?></h3>
                <p class="points">Points: <?php echo $l_circuit['points']; ?></p>
                <div class="form_div2">
                    <form class="joue" method="post" action="game-solo.php">
                        <input type="hidden" value="<?php echo $l_circuit['id_circuit']; ?>" name="id_circuit_to_play">
                        <input type="submit" value="Jouer">
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
</div>
</div>

<?php

$l_db->close();

require './footer.php';
endPage();
?>
