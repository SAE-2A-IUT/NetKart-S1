<?php
/** @file /pages/game-solo.php
 *
 * @details PHP page that allows the user to learn the network by playing. The player can answer questions about the network in a terminal, this makes the player character move around the circuit. The user has an instructions and potentially up to three images to zoom in on.
 *
 * @author SAE S3 NetKart
 */
require ('header.php');
session_start();
require("./database/database.php");
startPage("Jeu-multi", ["../assets/style/main", "../assets/style/game-multi"], ["../assets/script/position", K_SCRIPT."check_connection", K_SCRIPT."leaderboard"]);
if (!isset($_SESSION['id_user_session'])) {
    ?>
    <script>
        check_connection(false);
    </script>
    <?php
}


$l_db = new database();
$l_db->connection();

if(isset($_SESSION['session_code'])){
    $l_session_code = $_SESSION['session_code'];
    $l_session = $l_db->getSessionByCode($_SESSION['session_code'])[0];
    if (isset($l_session['id_groupejoueur'])){
        $l_players = [];
        foreach ($l_db->getSessionByCode($_SESSION['session_code']) as $l_player){
            $l_players[]=[
                'score'     => $l_player['score'],
                'nickname'  => $l_player['pseudo_groupe'],
            ];
        }
    }
    $l_all_circuit = $l_db->getCircuitsByTheme($l_session['id_theme']) ;
    if (isset($_SESSION['session_circuit'])){
        $id_circuit = $l_all_circuit[$_SESSION['session_circuit']]['id_circuit'];
    }


}
else {
    header('Location: error.html');
}


$id_user = 1;
$questionNumber = 0;
$name_circuit = $l_db->get_circuit_information($id_circuit)[$questionNumber]['nom_circuit'];
$score_circuit =  $l_db->get_circuit_information($id_circuit)[$questionNumber]['points'];
$id_circuit_image = $l_db->get_circuit_information($id_circuit)[$questionNumber]['id_circuitimage'];
$urlImage = $l_db->get_image_circuit($id_circuit_image)[$questionNumber]['image'];
$questionCircuit = $l_db->get_question_circuit($id_circuit);
$questionActual = $questionCircuit[$questionNumber];
$questionConsigne = $questionActual['consigne'];
$questionQuestion = $questionActual['question'];
$questionReponse = $questionActual['reponse'];
$questionId = $questionActual['id_question'];
$questionImage = $l_db->get_image_question($questionId);
$questionUrl = $l_db->get_url_question($questionId);
$l_db->close();
?>

<div class="body-page">
    <div class="leaderboard button" onclick="refreshLeaderboard('<?=$_SESSION['session_code']?>','<?=$_SESSION['session_pseudo']?>');displayLeaderboard();">
        <div class="leaderboard_image">
            <img src="<?php echo K_IMAGE ;?>leaderboard.png" alt="leaderboard">
        </div>
        <span class="disclaimer">&lsaquo; cliquez n'importe où sur l'écran pour fermer le classement &rsaquo;</span>
        <div class="classement">

        </div>
    </div>
    <div id="game">
        <div id="left-game">
            <div id="circuit-info">
                <h1 id='circuit-name'><?php echo $name_circuit ?> - question <?php echo $questionNumber + 1 ?></h1>
                <div id='circuit-image'>
                    <?php if (sizeof($questionImage) > 1) {
                        foreach ($questionImage as $image) {?>
                            <img alt='question-image' class='question-image-origin' src='../assets/image/upload/<?php echo $image['image_question']; ?>'>
                            <img alt='question-image' class='question-image' src='../assets/image/upload/<?php echo $image['image_question']; ?>'><?php }
                    } elseif (sizeof($questionImage) == 1) {?>
                        <img alt='question-image' class='question-image-origin' src='../assets/image/upload/<?php echo $questionImage[0]['image_question']; ?>'>
                        <img alt='question-image' class='question-image' src='../assets/image/upload/<?php echo $questionImage[0]['image_question']; ?>'><?php } ?>
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
            <div id="modal-url">
                <?php if (sizeof($questionUrl) > 1) {?>
                <div id="url">
                <img alt="url-icon" src="../assets/image/clue.webp" id="icon"><div><?php $nbLink = 1;
                    foreach ($questionUrl as $url) {?>
                            <a href="<?php echo $url['lien']?>" target="_blank"><li>Indice <?php echo $nbLink; $nbLink++?></li></a>
                        <?php }?>
                    </div></div><?php
                } elseif (sizeof($questionUrl) == 1) {?>
                    <div id="url">
                <img alt="url-icon" src="../assets/image/clue.webp" id="icon"><div>
                    <a href="<?php echo $questionUrl[0]['lien']?>" target="_blank"><li>Indice 1</li></a>
            </div></div>
                   <?php } ?>
            </div>
            <div id="circuit">
                <img src="../assets/image/gentil.webp" alt="player-kart" id="player_kart">
                <img src="../assets/image/mechant.webp" alt="enemy-kart" id="enemy_kart">
                <img src="../assets/image/flag-start.webp" alt="flag" id="flag">
            </div>
        </div>

    </div>
    <div id="modal" style="display: none;">
        <div id="modal-content">
            <div id="save-response" style="display: none; visibility: hidden;"><?php echo $questionReponse?></div>
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
    let circuit_1_coordinates = [[58, 10], [28, 13], [57, 41], [17, 70], [38.8, 94], [65, 57], [58, 10]];
    let circuit_2_coordinates = [[62, 21], [25, 30], [20, 49], [28, 80], [50, 81], [55, 52], [62, 21]];
    let circuit_3_coordinates = [[6, 54], [29, 56], [51, 85], [70, 83], [45, 72], [32, 44], [6, 54]];
    let circuit_4_coordinates = [[63, 2], [30, 52], [8, 101], [36, 107], [59, 80], [78, 45], [63, 2]];

    let coordinate = circuit_<?php echo $urlImage[7]?>_coordinates;

    let game = false;
    let player_coordinates_ = populateArray(coordinate);
    let enemy_coordinates = populateArray(coordinate)

    let terminal = document.getElementById("terminal-input");
    terminal.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            sendCommand(document.getElementById("save-response").innerHTML.toString());
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
                    $questionUrl = $l_db->get_url_question($questionId);
                    $questionImage = $l_db->get_image_question($questionId);
                    $l_db->close();?>
                    document.getElementById("circuit-name").innerHTML = "<?php echo $name_circuit ?> - question <?php echo $questionNumber + 1 ?>";
                    document.getElementById("circuit-image").innerHTML = "<?php if (sizeof($questionImage) > 1) {foreach ($questionImage as $image) {?><img alt='question-image' class='question-image-origin' src='../assets/image/upload/<?php echo $image['image_question']; ?>'><img alt='question-image' class='question-image'src='../assets/image/upload/<?php echo $image['image_question']; ?>'><?php }} elseif (sizeof($questionImage) == 1) {?><img alt='question-image' class='question-image-origin' src='../assets/image/upload/<?php echo $questionImage[0]['image_question']; ?>'><img alt='question-image' class='question-image'src='../assets/image/upload/<?php echo $questionImage[0]['image_question']; ?>'><?php } ?>";
                    document.getElementById("question-statement").innerHTML = "<?php echo $questionConsigne; ?>";
                    document.getElementById("modal-url").innerHTML = "<?php if (sizeof($questionUrl) > 1) {?><div id='url'><img src='../assets/image/clue.webp' id='icon'><div><?php $nbLink=1; foreach ($questionUrl as $url) {?><a href='<?php echo $url['lien']?>' target='_blank'><li>Indice <?php echo $nbLink; $nbLink++?></li></a><?php }?></div></div><?php } elseif (sizeof($questionUrl) == 1) {?><div id='url'><img src='../assets/image/clue.webp' id='icon'></img><div><a href='<?php echo $questionUrl[0]['lien']?>' target='_blank'><li>Indice 1</li></a></div></div><?php } ?>";
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
                    $questionUrl = $l_db->get_url_question($questionId);
                    $questionImage = $l_db->get_image_question($questionId);
                    ?>
                    <?php
                    $l_db->close();?>
                    document.getElementById("circuit-name").innerHTML = "<?php echo $name_circuit ?> - question <?php echo $questionNumber + 1 ?>";
                    document.getElementById("circuit-image").innerHTML = "<?php if (sizeof($questionImage) > 1) {foreach ($questionImage as $image) {?><img alt='question-image' class='question-image-origin' src='../assets/image/upload/<?php echo $image['image_question']; ?>'><img alt='question-image' class='question-image'src='../assets/image/upload/<?php echo $image['image_question']; ?>'><?php }} elseif (sizeof($questionImage) == 1) {?><img alt='question-image' class='question-image-origin' src='../assets/image/upload/<?php echo $questionImage[0]['image_question']; ?>'><img alt='question-image' class='question-image'src='../assets/image/upload/<?php echo $questionImage[0]['image_question']; ?>'><?php } ?>";
                    document.getElementById("question-statement").innerHTML = "<?php echo $questionConsigne; ?>";
                    document.getElementById("modal-url").innerHTML = "<?php if (sizeof($questionUrl) > 1) {?><div id='url'><img src='../assets/image/clue.webp' id='icon'><div><?php $nbLink=1; foreach ($questionUrl as $url) {?><a href='<?php echo $url['lien']?>' target='_blank'><li>Indice <?php echo $nbLink; $nbLink++?></li></a><?php }?></div></div><?php } elseif (sizeof($questionUrl) == 1) {?><div id='url'><img src='../assets/image/clue.webp' id='icon'></img><div><a href='<?php echo $questionUrl[0]['lien']?>' target='_blank'><li>Indice 1</li></a></div></div><?php } ?>";
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

    function setVictoryDB(id_user, id_circuit, element) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "./victory.php", true);
        const formData = new FormData();
        formData.append("id_user", id_user);
        formData.append("id_circuit", id_circuit);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    if (xhr.responseText === 'add') {
                        document.getElementById(element).innerHTML += "<br><span id='score'>vous avez gagné : " + <?php echo $score_circuit?> + "points</span>";
                        displayModal();
                    }else if (xhr.responseText === 'already') {
                        document.getElementById(element).innerHTML += "<br><span id='score'>vos points ont déjà été enregistrés </span>";
                        displayModal();
                    }
                } else {
                    console.error(xhr.status + " " + xhr.statusText);
                }
            }
        }
        xhr.send(formData);
    }


    function setVictory(element, status) {
        let modal = document.getElementById(element);
        game = true;
        modal.innerHTML = status === "enemy" ? "Défaite ... <img src=\'../assets/image/lose.webp\' alt=\'lose\' id=\'lose\'>" : "Victoire ! <img src=\'../assets/image/victory.webp\' alt=\'victory\' id=\'victory\'>";
        if (status === "ally"){
            setVictoryDB(<?php echo $id_user?>, <?php echo $id_circuit?>, element);
        }
    }
</script>

<?php
require './footer.php';
endPage();
?>


