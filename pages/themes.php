<?php
include './header.php';
startPage("Themes",["../assets/style/main", "../assets/style/themes"],["../assets/script/theme"]);
$l_circuits = [
    [   'id' => 1,
        'name' => 'Adressage: adresse IP, adresse',
        'theme' => 'adressage',
        'progress' => '50',
        'circuit-image' => '2'],
    [   'id' => 2,
        'name' => 'Adressage: adresse IP, adresse',
        'theme' => 'reseau',
        'progress' => '25',
        'circuit-image' => '3'],
    [   'id' => 3,
        'name' => 'Adressage: adresse IP, adresse',
        'theme' => 'adressage',
        'progress' => '15',
        'circuit-image' => '1'],
    [   'id' => 4,
        'name' => 'Adressage: adresse IP, adresse',
        'theme' => 'reseau',
        'progress' => '75',
        'circuit-image' => '1'],
];
$l_themes = [];
foreach ($l_circuits as $l_circuit){
    if(!in_array($l_circuit['theme'],$l_themes)){
        $l_themes[] = $l_circuit['theme'];
    }
}
?>
<div class="body-page">
    <div id="theme_choice" class="item_choice">
        <?php
        foreach ($l_themes as $l_theme) {?>
        <button id="<?php echo $l_theme; ?>" class="button_theme" onclick="show_theme('<?php echo $l_theme; ?>')"><b> <?php echo $l_theme; ?></b></button>
        <?php } ?>
    </div>
    <form class="all_theme" action="game-solo.php" method="post">
        <h1 id="waiting">Merci de sélectionner au minimum un thème</h1>
        <?php foreach ($l_circuits as $l_circuit){?>
            <button type="submit" class="circuit <?php echo $l_circuit['theme']; ?>" name="circuit_id" value="<?php echo $l_circuit['id']; ?>">
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
include './footer.php';
endPage();
?>
