<?php
require 'header.php';
startPage("A propos",[K_STYLE."main",K_STYLE."about"],[]);
?>

    <div class="title">
        <img src="<?php echo K_IMAGE ?>about.webp" alt="fond avec des gens qui travaillent">
        <h1>A propos</h1>
        <span>Qui sommes nous ? Pourquoi avoir crée NetKart</span>
    </div>
    <div class="body">
        <h2>NetKart, une serious game imaginé par des étudiants</h2>
        <h3>2022</h3>
        <div class="text inline-text">
            <span class="left">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget euismod erat. Praesent euismod
                tincidunt risus, non efficitur ipsum malesuada porta. Nullam porttitor tortor et ante posuere, a luctus
                sapien eleifend. Morbi sit amet ligula eu sem pulvinar gravida.
            </span>
            <span class="right">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget euismod erat. Praesent euismod
                tincidunt risus, non efficitur ipsum malesuada porta. Nullam porttitor tortor et ante posuere, a luctus
                sapien eleifend. Morbi sit amet ligula eu sem pulvinar gravida.
            </span>
        </div>
        <h2>Plus d'infos sur le projet</h2>
        <span class="text">Pour plus d'informations concernant notre projet, nous vous proposons de vous rendre sur notre page GitHub
            ! Vous pourrez y découvrir les codes sources pour les développeurs et les curieux :)
            <br>
            <a href="https://github.com/SAE-2A-IUT/NetKart-S1">https://github.com/SAE-2A-IUT/NetKart-S1</a>
        </span>

    </div>

<?php
require 'footer.php';
endPage();
?>