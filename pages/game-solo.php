<?php
session_start();
require './header.php';
startPage("Jeu-solo", ["../assets/style/main", "../assets/style/game-solo"], ["../assets/script/position"]);

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
print_r($questionCircuit);
$questionConsigne = $questionActual['consigne'];
$questionQuestion = $questionActual['question'];
$questionReponse = $questionActual['reponse'];
$questionId = $questionActual['id_question'];
$questionImage = $l_db->get_image_question($questionId);
$l_db->close();
?>
<div id="save-response" style="display: none"><?php echo $questionReponse?></div>
<div id="save-circuit" style="display: none"><?php echo $questionCircuit?></div>
<div class="body-page">
    <div id="game">
        <div id="left-game">
            <div id="circuit-info">
                <h1 id='circuit-name'><?php echo $name_circuit ?> - question <?php echo $questionNumber + 1 ?></h1>
                <div id='circuit-image'>
                    <?php if (sizeof($questionImage) > 1) {
                        foreach ($questionImage as $image) {?>
                            <img alt='question-image' class='question-image-origin' src='../assets/image/<?php echo $image['image_question']; ?>'>
                            <img alt='question-image' class='question-image'src='../assets/image/<?php echo $image['image_question']; ?>'><?php }
                    } elseif (sizeof($questionImage) == 1) {?>
                        <img alt='question-image' class='question-image-origin' src='../assets/image/<?php echo $questionImage[0]['image_question']; ?>'>
                        <img alt='question-image' class='question-image'src='../assets/image/<?php echo $questionImage[0]['image_question']; ?>'><?php } ?>
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
            sendCommand(document.getElementById("save").innerText);
        }
    });

    function processCommand(input, response) {
        response = response.toString();
        let circuit = document.getElementById("save-circuit").innerHTML;

        switch (input) {
            case "hello":
                return ["Bonjour!", "limegreen"];

            case "help":
                return ["Liste des commandes disponibles : hello, a, clear", "yellow"];

            case "a" :
                correctAnswer('player_kart', player_coordinates_, 'ally')
                return ["Le joueur avance :)", "limegreen"];

            case "v" :
                setVictory('modal-body', "ally")
                return ["Le joueur gagne :)", "limegreen"];

            case "d" :
                setVictory('modal-body', "enemy")
                return ["Le joueur perd :(", "limegreen"];

            case 'test' :
                return ["Le joueur perd :(", "limegreen"];

            case response:
                correctAnswer('player_kart', player_coordinates_, 'ally');



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
                document.getElementById("circuit-image").innerHTML = "<?php if (sizeof($questionImage) > 1) {
                    foreach ($questionImage as $image) {?>
                    <img alt='question-image' class='question-image-origin' src='../assets/image/<?php echo $image['image_question']; ?>'>
                <img alt='question-image' class='question-image'src='../assets/image/<?php echo $image['image_question']; ?>'><?php }
                } elseif (sizeof($questionImage) == 1) {?>
                <img alt='question-image' class='question-image-origin' src='../assets/image/<?php echo $questionImage[$questionNumber]['image_question']; ?>'>
                <img alt='question-image' class='question-image'src='../assets/image/<?php echo $questionImage[$questionNumber]['image_question']; ?>'><?php } ?>";
                document.getElementById("question-statement").innerHTML = "<?php echo $questionConsigne; ?>";
                document.getElementById("question").innerHTML = "<?php echo $questionQuestion; ?>";
                document.getElementById("save").innerHTML = "<?php echo $questionReponse?>";
                return ["Le joueur perd :(", "limegreen"];

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


