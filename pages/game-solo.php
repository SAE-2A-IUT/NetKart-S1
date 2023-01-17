<?php
require './header.php';
startPage("Jeu-solo", ["../assets/style/main", "../assets/style/game-solo"], ["../assets/script/position"]);

require("./database/database.php");
$l_db = new database();
$l_db->connection();

$id_circuit = 2;
$name_circuit = $l_db->get_circuit_information($id_circuit)[0]['nom_circuit'];
$id_circuit_image = $l_db->get_circuit_information($id_circuit)[0]['id_circuitimage'];
$urlImage = $l_db->get_image_circuit($id_circuit_image)[0]['image'];
$questionCircuit = $l_db->get_question_circuit($id_circuit);
$questionNumber = 0;
$questionActual = $questionCircuit[$questionNumber];
$questionConsigne = $questionActual['consigne'];
$questionQuestion = $questionActual['question'];
$questionReponse = $questionActual['reponse'];
$questionId = $questionActual['id_question'];
$questionImage = $l_db->get_image_question($questionId);

print_r($questionReponse);
?>
<?php

?>

<div class="body-page">
    <div id="game">
        <div id="left-game">
            <div id="circuit-info">
                <h1 id="circuit-name"><?php echo $name_circuit?> - question <?php echo $questionNumber+1?></h1>
                <?php
                if (sizeof($questionImage) > 1){
                    foreach ($questionImage as $image){?>
                        <img alt='question-image' class='question-image-origin' src='../assets/image/<?php echo $image['image_question'];?>'>
                        <img alt="question-image" class="question-image" src='../assets/image/<?php echo $image['image_question'];?>'><?php }}
                elseif (sizeof($questionImage) == 1){?>
                    <img alt='question-image' class='question-image-origin' src='../assets/image/<?php echo $questionImage[0]['image_question'];?>'>
                    <img alt="question-image" class="question-image" src='../assets/image/<?php echo $questionImage[0]['image_question'];?>'><?php } ?>
                <p id="question-statement"><?php echo $questionConsigne;?></p>
                <p id="question"><?php echo $questionQuestion;?></p>
            </div>
            <div id="terminal">
                <div id="terminal-output"></div>
                <label for="terminal-input"></label>
                <span id="terminal-input-text">NetKart:~$<input id="terminal-input" autocomplete="off" placeholder="tapez votre commande ici"></span>
            </div>
            <script>
            </script>
        </div>

        <div id="right-game" style="background-image: url('<?php echo K_IMAGE.$urlImage?>')">
            <img src="../assets/image/gentil.webp" alt="player-kart" id="player_kart">
            <img src="../assets/image/mechant.webp" alt="enemy-kart" id="enemy_kart">
            <img src="../assets/image/flag-start.webp" alt="flag" id="flag">
        </div>
    </div>
    <div id="modal" style="display: none;">
        <div id="modal-content">
            <div id="modal-header">
                <span id="modal-close">&times;</span>
            </div>
            <div id="modal-body">null</div>
            <div id="modal-footer">
                <button id="modal-return" type="button">Retour</button>
                <button id="modal-restart" type="button">Recommencer</button>
            </div>
        </div>
    </div>
</div>

<div id="question-verify" style="display: none">
    <?php echo $questionReponse?>
</div>

<?php
require './footer.php';
endPage();
$l_db->close();
?>
