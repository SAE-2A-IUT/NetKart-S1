<?php
/** @file /pages/user.php
 *
 * @details File to check and modify user information
 *
 * @author SAE S3 NetKart
 */

require ('header.php');
session_start();
require ("./database/database.php");

startPage("Utilisateur",[K_STYLE."main",K_STYLE."user"],[K_SCRIPT."check_connection"]);
if (!isset($_SESSION['id_user'])) {
    ?>
    <script>
        check_connection(false);
    </script>
    <?php
}
$l_player_id = $_SESSION['id_user'];

$l_db = new database();

$l_db->connection();

$l_score= $l_db->get_score_player_id($l_player_id);

if($l_score == NULL){
    $l_score = 0;
}

?>
    <div class="body-page">
        <div class="body">
        <div class="left">
            <h1><?php echo $l_db->get_username_from_id($l_player_id); ?></h1>
            <?php
                if (isset($_GET['success']))
                {
                    if ($_GET['success'] == "UwU"){
                        ?><h2 class="success">Mot de passe modifié</h2><?php
                    }
                }
                if (isset($_GET['error']))
                {?><h2 class="error"><?php
                    if ($_GET['error'] == "TwT"){
                        echo 'Une erreur est survenue et la mise a jour du mot de passe n\'a pas fonctionné';
                    }
                    if ($_GET['error'] == 1){
                        echo 'Une erreur a eu lieu et le compte ne s\'est pas supprimée car ses circuit ne se sont pas supprimés';
                    }
                    if ($_GET['error'] == 2){
                        echo 'Suite à une erreur dans la suppression de la session associé, le compte ne s\'est pas supprimée';
                    }
                    if ($_GET['error'] == 3){
                        echo 'Une erreur a eu lieu et le compte ne s\'est pas supprimée';
                    }
                    ?> </h2><?php
                }
            ?>
            <div class="new_password">
                <span>Changer son mot de passe :</span>
                <form class="new_psw_form" method="post" action="user_post.php">
                    <label>Nouveau mot de passe</label>
                    <input name="new_password" type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[?!*µ$£¤=+°@_~#]).{8,72}$" title="Mot de passe d'au moins 8 caractères, avec au moins une majuscule, une minuscule, un chiffre et un caractère spécial parmi cette liste : ? ! * µ $ £ ¤ = + ° @ _ ~ #">                    <label>Confirmation</label>
                    <input name="new_password_conf" type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[?!*µ$£¤=+°@_~#]).{8,72}$" aria-label="Mot de passe d'au moins 8 caractères, avec au moins une majuscule, une minuscule, un chiffre et un caractère spécial parmi cette liste : ? ! * µ $ £ ¤ = + ° @ _ ~ #">
                    <input name="new_psw_form" type="submit" value="Changer">
                </form>
            </div>
        </div>
        <div class="right">
            <div class="top">
                <img alt="default avatar" src="<?php echo K_IMAGE; ?>default_avatar.webp">
                <div class="score">Score<span><?php echo $l_score ;?></span></div>
            </div>
            <button id="delete_account" class="delete">Supprimer compte</button>
            <div id="horizontal" class="horizontal">
                <form method="post" action="user_post.php">
                    <input type="hidden" name="delete_account" value="ok">
                    <input type="submit" value="Continuer" class="send_from" id="button_click">
                </form>
                <button id="cancel_delete_account">annuler</button>
            </div>

            <p id="alert">etes vous sûr? <br>les circuits que vous avez créer seront egalement supprimé les circuits que vous avez créer seront egalement supprimé</p>
            <script>
                document.getElementById("horizontal").style.display ="none";
                document.getElementById("alert").style.display ="none";

                function delete_account() {
                    document.getElementById("horizontal").style.display = "flex";
                    document.getElementById("alert").style.display = "flex";
                }

                function cancel_delete_account() {
                    document.getElementById("horizontal").style.display = "none";
                    document.getElementById("alert").style.display = "none";
                }

                document.getElementById('delete_account').addEventListener('click', delete_account);
                document.getElementById('cancel_delete_account').addEventListener('click', cancel_delete_account);
            </script>
        </div>
    </div>
    </div>

<?php
require 'footer.php';
endPage();
?>