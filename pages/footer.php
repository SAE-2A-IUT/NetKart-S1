<?php
/** @file /pages/footer.php
 *
 * File that generate the footer of other pages
 *
 * @author SAE S3 NetKart
 */

function endPage(){
?>
    <footer class="footer">
        <div class="footer-one"><img src="<?php echo K_IMAGE ?>icon_black.png" alt="NetKart Icon"></div>
        <div class="footer-two">
            PAGES<br/>
            <a href="homepage.php">Accueil</a>
            <br/><a href="themes.php">Thèmes</a>
        </div>
        <div class="footer-three">
            DOCUMENTS<br/>
            <a href="rules.php">Règles du jeu</a>
            <br/><a href="terms-of-use.php">Conditions d'utilisation</a>
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
