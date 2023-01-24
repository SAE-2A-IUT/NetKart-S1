<?php
/**
 * @file /pages/about.php
 *
 * @details File to show site's details
 *
 * @author SAE S3 NetKart
 */
require 'header.php';
startPage("A propos",[K_STYLE."main",K_STYLE."about"],[]);
?>
    <div class="body-page">
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
                    Ce projet NetKart a été imaginé par un groupe de 4 étudiants en deuxième année de B.U.T. (Bachelor Universitaire et Technologique).
                    Il s'agissait de réaliser un serious game sous forme d'un site web. Nous avons ainsi pensé à proposer un serious game autour
                    de nos cours de réseau de première année.
                </span>
                <span class="right">
                    Nous avons travaillé essentiellement en HTML, CSS, PHP et JS en lien avec une base de données pendant 120 heures.
                    Le projet a été géré grâce à GitHub. Nous avons travaillé la responsivité et l'accessibilité du site. Il s'agissait de proposer
                    un site accessible à tous les niveaux.
                </span>
            </div>
            <h2>Plus d'infos sur le projet</h2>
            <span class="text">Pour plus d'informations concernant notre projet, nous vous proposons de vous rendre sur notre page GitHub
                ! Vous pourrez y découvrir les codes sources pour les développeurs et les curieux :)
                <br>
                <a href="https://github.com/SAE-2A-IUT/NetKart-S1" target="_blank">https://github.com/SAE-2A-IUT/NetKart-S1</a>
            </span>
            <h2>Credit</h2>
            <h3 class="credit-title"><a href="https://fr.freepik.com/" target="_blank">Image sur Freepik</a></h3>
            <span class="text">
                <p>jcomp</p>
                <p>pch.vector</p>
                <p>vectorjuice</p>
                <p>iconixar</p>
            </span>

        </div>
    </div>

<?php
require 'footer.php';
endPage();
?>