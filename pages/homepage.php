<?php
/** @file /pages/homepage.php
 *
 * @details PHP page that is displayed when the website is opened. It is used to present the serious game and to redirect to the other available pages
 *
 * @author SAE S3 NetKart
 */
require ('header.php');
session_start();
startPage("Accueil",["../assets/style/main"],[], false);
?>

<div class="body-page">
    <div class="preview-game">
        <h1>Répondez aux questions pour arriver premier !</h1>
        <h4>Un serious game pour tester vos connaissances en réseau !</h4>
        <a href="connection.php" class="black-button">C'EST PARTI</a>
    </div>
    <img src="../assets/image/index_background.webp" alt="racing car image" id="homepage-banner" style="opacity: 1">
    <br/>

    <div>
        <h1>Qu'est-ce que NetKart</h1>
        <h4>Courte présentation du site, pour plus d'infos voir <a href="rules.php">Règles du Jeu</a></h4>
    </div>

    <div class="description">
        <div>
            <p>Pour commencer, qu'est-ce qu'un <b>serious game</b> ?</p>
            <p>Un serious game peut se présenter sous la forme d'une application informatique ayant pour but de transmettre une connaissance par un moyen ludique. Ainsi, en participant à des serious game, il est possible de développer des connaissances, son sens logique, sa culture...</p>
            <img src="../assets/image/serious_game_definition.png" alt="book and dices">
        </div>
        <div>
            <p>Quel est l'intérêt de <b>NetKart</b> ?</p>
            <p>NetKart propose une variante aux serious game en explorant un domaine de connaissance peu mis en avant dans les serious game actuellement. Il s'agit d'acquérir des connaissances en réseaux informatiques. Pour cela, il vous faudra répondre aux questions afin de terminer le circuit dans les temps !</p>
            <img src="../assets/image/netkart_definition.png" alt="racing car and network">
        </div>
    </div>
</div>
<?php
require './footer.php';
endPage();
?>
