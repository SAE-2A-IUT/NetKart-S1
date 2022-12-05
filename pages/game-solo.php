<?php
/** @file /pages/game-solo.php
 *
 * PHP page that allows the user to learn the network by playing. The player can answer questions about the network in a terminal, this makes the player character move around the circuit. The user has an instructions and potentially up to three images to zoom in on.
 *
 * @author SAE S3 NetKart
 */

require './header.php';
startPage("Jeu-solo",["../assets/style/main", "../assets/style/game-solo"],[]);
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
                <!-- image si il y en a une quoi -->
                <p id="question-statement">Consigne de la question c'est pas la carte igne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questioigne de la questio</p>

            </div>
            <div>
                <p id="terminal">Ici il y aura le terminal mais bon pour l'instant on en a pas donc voila quoien a pas donc voila quoi...en a pas donc voila quoi...en a pas donc voila quoi...en a pas donc voila quoi..as donc voila quoi...en a pas donc voila quoi...en a pas donc voila quoi...eas donc voila quoi...en a pas donc voila quoi...en a pas donc voila quoi...eas donc voila quoi...en a pas donc voila quoi...en a pas donc voila quoi...eas donc voila quoi...en a pas donc voila quoi...en a pas donc voila quoi...eas donc voila quoi...en a pas donc voila quoi...en a pas donc voila quoi...e.en a pas donc voila quoi...en a pas donc voila quoi.......</p>
            </div>
        </div>

        <div id="right-game">
            <img id="map" alt="circuit" src="../assets/image/circuit1.jpg">
        </div>
    </div>
</div>




<?php
require './footer.php';
endPage();
?>
