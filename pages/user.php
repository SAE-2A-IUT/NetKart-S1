<?php
/** @file /pages/user.php
 *
 * File to check and modify user information
 *
 * @author SAE S3 NetKart
 */

require 'header.php';
startPage("Utilisateur",[K_STYLE."main",K_STYLE."user"],[]);
?>
    <div class="body-page">
        <div class="body">
            <div class="left">
                <h1>User1207</h1>
                <div class="new_password">
                    <span>Changer son mot de passe :</span>
                    <!-- ajouter un message d'alerte en php -->
                    <form class="new_psw_form" method="post" action="#">
                        <label>Nouveau mot de passe</label>
                        <input name="new_password" type="password">
                        <label>Confirmation</label>
                        <input name="new_password_conf" type="password">
                        <input name="new_psw_form" type="submit" value="Changer">
                    </form>
                </div>
            </div>
            <div class="right">
                <img alt="avatar" src="<?php echo K_IMAGE; ?>default_avatar.jpg">
            </div>
        </div>
    </div>
<?php
require 'footer.php';
endPage();
?>