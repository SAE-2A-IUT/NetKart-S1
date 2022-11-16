<?php
include './pages/header.php';
startPage("Accueil",[K_STYLE."main"],[]);
?>

<div style="position:absolute; top: 15%; left: 5%">
    <h1>Répondez aux questions pour arriver premier !</h1>
    <h4>Un serious game pour tester vos connaissances en réseau !</h4>
    <a href="#connexion" class="black-button">C'EST PARTI</a>
</div>
<img src="<?php echo K_IMAGE?>index_background.webp" width="100%" alt="racing car image" style="opacity: 1">
<br/>

<?php
include './pages/footer.php';
endPage();
?>
