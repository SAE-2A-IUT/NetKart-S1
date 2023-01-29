<?php
/** @file /pages/footer.php
 *
 *  @details File that generate the footer of other pages
 *
 * @author SAE S3 NetKart
 */

/**
 * Footer generator
 *
 * @return void
 */
function endPage(){
?>
    <footer class="footer not-print-section">
        <div class="footer-one"><img src="<?php echo K_IMAGE ?>icon_black.webp" alt="NetKart Icon"></div>
        <div class="footer-two">
            PAGES<br/>
            <a href="homepage.php">Accueil</a>
            <br/><a href="themes.php">Thèmes</a>
            <br/><a href="rules.php">Règles du jeu</a>
        </div>
        <div class="footer-three">
            DOCUMENTS<br/>
            <a href="rules.php">Règles du jeu</a>
            <br/><a href="terms-of-use.php">Mention Légales</a>
        </div>
        <div class="footer-three">
            NETKART<br/>
            <a href="about.php">A propos</a>
            <br/><a href="contact.php">Nous contacter</a>
        </div>
    </footer>

    </body>

</html>
<?php
}?>
