<?php
/** @file /pages/game-solo.php
 *
 * PHP page that allows the user to learn the network by playing. The player can answer questions about the network in a terminal, this makes the player character move around the circuit. The user has an instructions and potentially up to three images to zoom in on.
 *
 * @author SAE S3 NetKart
 */

session_start();
require './header.php';
startPage("Jeu-solo", ["../assets/style/main", "../assets/style/game-solo"], ["../assets/script/position", K_SCRIPT."check_connection"]);
?>
<script>
check_connection(<?php isset($_SESSION['id_user'])?>);
</script>
<?php
require("./database/database.php");
$l_db = new database();
$l_db->connection();

$id_circuit = 2;
$questionNumber = 0;
$name_circuit = $l_db->get_circuit_information($id_circuit)[$questionNumber]['nom_circuit'];
$id_circuit_image = $l_db->get_circuit_information($id_circuit)[$questionNumber]['id_circuitimage'];
$urlImage = $l_db->get_image_circuit($id_circuit_image)[$questionNumber]['image'];
$questionCircuit = $l_db->get_question_circuit($id_circuit);
$questionActual = $questionCircuit[$questionNumber];
$questionConsigne = $questionActual['consigne'];
$questionQuestion = $questionActual['question'];
$questionReponse = $questionActual['reponse'];
$questionId = $questionActual['id_question'];
$questionImage = $l_db->get_image_question($questionId);
$l_db->close();
?>
<div id="save-response" style="display: none; visibility: hidden;"><?php echo $questionReponse?></div>

<div class="body-page">
    <div id="game">
        <div id="left-game">
            <div id="circuit-info">
                <h1 id='circuit-name'><?php echo $name_circuit ?> - question <?php echo $questionNumber + 1 ?></h1>
                <div id='circuit-image'>
                    <?php if (sizeof($questionImage) > 1) {
                        foreach ($questionImage as $image) {?>
                            <img alt='question-image' class='question-image-origin' src='../assets/image/upload/<?php echo $image['image_question']; ?>'>
                            <img alt='question-image' class='question-image'src='../assets/image/upload/<?php echo $image['image_question']; ?>'><?php }
                    } elseif (sizeof($questionImage) == 1) {?>
                        <img alt='question-image' class='question-image-origin' src='../assets/image/upload/<?php echo $questionImage[0]['image_question']; ?>'>
                        <img alt='question-image' class='question-image'src='../assets/image/upload/<?php echo $questionImage[0]['image_question']; ?>'><?php } ?>
                </div>
                <p id="question-statement"><?php echo $questionConsigne; ?></p>
                <p id="question"><?php echo $questionQuestion; ?></p>
            </div>
            <div id="terminal">
                <div id="terminal-output"></div>
                <label for="terminal-input"></label>
                <span id="terminal-input-text">NetKart:~$<input id="terminal-input" autocomplete="off"
                                                                placeholder="tapez votre commande ici"></span>
            </div>
        </div>

        <div id="right-game" style="background-image: url('<?php echo K_IMAGE . $urlImage ?>')">
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

<script>
    let terminal = document.getElementById("terminal-input");
    terminal.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            let saveResponse = document.getElementById("save-response").innerHTML;
            document.getElementById("save-response").innerHTML = "";
            sendCommand(saveResponse);
        }
    });

    let callProcess = 0;
    function processCommand(input, response) {
        response = response.toString();
        switch (input) {
            case "help":
                return ["Liste des commandes disponibles : clear", "yellow"];


            case response:
                correctAnswer('player_kart', player_coordinates_, 'ally');

                if (callProcess === 0){
                    <?php $questionNumber += 1;
                    $questionActual = $questionCircuit[$questionNumber];
                    $questionConsigne = $questionActual['consigne'];
                    $questionQuestion = $questionActual['question'];
                    $questionReponse = $questionActual['reponse'];
                    $questionId = $questionActual['id_question'];
                    $l_db = new database();
                    $l_db->connection();
                    $questionImage = $l_db->get_image_question($questionId);
                    $l_db->close();?>
                    document.getElementById("circuit-name").innerHTML = "<?php echo $name_circuit ?> - question <?php echo $questionNumber + 1 ?>";
                    document.getElementById("circuit-image").innerHTML = "<?php if (sizeof($questionImage) > 1) {foreach ($questionImage as $image) {?><img alt='question-image' class='question-image-origin' src='../assets/image/upload/<?php echo $image['image_question']; ?>'><img alt='question-image' class='question-image'src='../assets/image/upload/<?php echo $image['image_question']; ?>'><?php }} elseif (sizeof($questionImage) == 1) {?><img alt='question-image' class='question-image-origin' src='../assets/image/upload/<?php echo $questionImage[0]['image_question']; ?>'><img alt='question-image' class='question-image'src='../assets/image/upload/<?php echo $questionImage[0]['image_question']; ?>'><?php } ?>";
                    document.getElementById("question-statement").innerHTML = "<?php echo $questionConsigne; ?>";
                    document.getElementById("question").innerHTML = "<?php echo $questionQuestion; ?>";
                    document.getElementById("save-response").innerHTML = "<?php echo $questionReponse?>";
                    callProcess += 1;
                    return ["Bonne réponse :)", "limegreen"];
                }else{
                    <?php $questionNumber += 1;
                    $questionActual = $questionCircuit[$questionNumber];
                    $questionConsigne = $questionActual['consigne'];
                    $questionQuestion = $questionActual['question'];
                    $questionReponse = $questionActual['reponse'];
                    $questionId = $questionActual['id_question'];
                    $l_db = new database();
                    $l_db->connection();
                    $questionImage = $l_db->get_image_question($questionId);
                    $l_db->close();?>
                    document.getElementById("circuit-name").innerHTML = "<?php echo $name_circuit ?> - question <?php echo $questionNumber + 1 ?>";
                    document.getElementById("circuit-image").innerHTML = "<?php if (sizeof($questionImage) > 1) {foreach ($questionImage as $image) {?><img alt='question-image' class='question-image-origin' src='../assets/image/upload/<?php echo $image['image_question']; ?>'><img alt='question-image' class='question-image'src='../assets/image/upload/<?php echo $image['image_question']; ?>'><?php }} elseif (sizeof($questionImage) == 1) {?><img alt='question-image' class='question-image-origin' src='../assets/image/upload/<?php echo $questionImage[0]['image_question']; ?>'><img alt='question-image' class='question-image'src='../assets/image/upload/<?php echo $questionImage[0]['image_question']; ?>'><?php } ?>";
                    document.getElementById("question-statement").innerHTML = "<?php echo $questionConsigne; ?>";
                    document.getElementById("question").innerHTML = "<?php echo $questionQuestion; ?>";
                    document.getElementById("save-response").innerHTML = "<?php echo $questionReponse?>";
                    callProcess += 1;
                    return ["Bonne réponse :)", "limegreen"];
                }

            case "clear" :
                return ["clear", "null"];

            default:
                return ["Commande non reconnue", "red"];
        }
    }
</script>

<?php
require './footer.php';
endPage();
?>


