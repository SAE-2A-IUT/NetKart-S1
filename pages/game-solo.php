<?php
require './header.php';
startPage("Jeu-solo",["../assets/style/main", "../assets/style/game-solo"],["../assets/script/position"]);
?>
<div class="body-page">
    <div id="game">
        <div id="left-game">
            <div id="circuit-info">
                <h1 id="circuit-name">Nom du circuit</h1>
                <h5 id="question-number">Numéro de la question :</h5>
                <img alt="image1-origin" class="question-image-origin" src="https://i.ytimg.com/vi/PQX-TQDWrlw/maxresdefault.jpg">
                <img alt="image1" class="question-image" src="https://i.ytimg.com/vi/PQX-TQDWrlw/maxresdefault.jpg">
                <img alt="image2-origin" class="question-image-origin" src="https://i.ytimg.com/vi/NBMuB-iVQ2U/maxresdefault.jpg">
                <img alt="image2" class="question-image" src="https://i.ytimg.com/vi/NBMuB-iVQ2U/maxresdefault.jpg">
                <img alt="image3-origin" class="question-image-origin" src="https://i.ytimg.com/vi/G8yMRnM2Ymw/maxresdefault.jpg">
                <img alt="image3" class="question-image" src="https://i.ytimg.com/vi/G8yMRnM2Ymw/maxresdefault.jpg">
                <p id="question-statement">Consigne de la question c'est pas la carte igne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questio</p>

            </div>
            <div id="terminal">
                <div id="terminal-output"></div>
                <label for="terminal-input"></label>
                <span id="terminal-input-text">NetKart:~$<input id="terminal-input" placeholder="tapez votre commande ici"></span>
            </div>
            <script>
            </script>
        </div>

        <div id="right-game" style="background-image: url('../assets/image/circuit2.jpg');">
            <img src="../assets/image/gentil.webp" alt="player-kart" id="enemy_kart">
            <img src="../assets/image/mechant.webp" alt="enemy-kart" id="player_kart">
        </div>
    </div>
</div>

<script>
    let circuit_1_coordinates = [[58, 10], [28, 13], [57, 41], [17, 70], [38.8, 94], [65, 57], [58, 10]];
    let circuit_2_coordinates = [[62, 21], [25, 30], [20,49], [28, 80], [50, 81], [55,52], [62, 21]];
    let circuit_3_coordinates = [[6, 54], [29, 56], [51, 85], [70, 83], [45, 72], [32, 44], [6, 54]];
    let circuit_4_coordinates = [[63, 2], [30, 52], [8, 101], [36, 107],[59, 80], [78, 45], [63, 2]];


    let player_coordinates_ = populateArray(circuit_2_coordinates);
    let enemy_coordinates = populateArray(circuit_4_coordinates)

</script>


<?php
require './footer.php';
endPage();
?>
