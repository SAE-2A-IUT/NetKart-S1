<?php
/**
 * @file /pages/create-session.php
 *
 * @details File to create circuits
 *
 * @author SAE S3 NetKart
 */
require ('header.php');
session_start();
startPage("Création une session",["../assets/style/main", "../assets/style/create-session"],[K_SCRIPT."check_connection"]);
require 'database/database.php';
$l_db = new database();
$l_db->connection();

if(($l_db->verifyPlayerSession(12))&& !(isset($_GET['success']))){
    header('Location: host-session.php');
    exit();
}
unset($_SESSION['session_hosted']);
$l_themes = $l_db->get_all_themes();
$l_db->close();


if (!isset($_SESSION['id_user'])) {
    ?>
    <script>
        check_connection(false);
    </script>
    <?php
}
?>
<div class="body-page">
    <div id="page-description">
        <h1>Créer une session</h1>
        <h4>Créer une session permet à des joueurs de s'affronter sur un thème choisi. Pour cela, pas besoin qu'ils se créent un compte ! Il leur suffit de copier le code généré après ce formulaire pour rejoindre la session</h4>
    </div>
<?php if (isset($_GET['success']) && $_GET['success']){?>
    <form class="session_redirect" method="post" action="host-session.php?session=<?php echo $_GET['session'];?>">
        <p>Session créée !</p>
        <p>Cliquez sur la flèche pour gérer la session.</p>
        <p><?php echo $_GET['session'];?></p>

        <button type="submit" style="background-color: <?php if ($_GET['session'] == 'ebebeb'){ echo 'var(--black)';}else{ echo '#'.$_GET['session'];}?>;"><div class="arrow"></div></button>
    </form>
<?php }
if (isset($_GET['deleted']) && $_GET['deleted']){?>
    <div class="deleted"> Votre session multijoueur a bel et bien été supprimée.</div>
<?php }?>

    <form id="create-session" class="form-session" method="post" action="create-session_post.php">
        <label for="session-name">Nom de la session</label>
        <input type="text" placeholder="Nom" id="session-name" name="session-name" class="form-input" required><br>

        <label for="session-time">Durée de la session</label>
        <select name="session-time" id="session-time" class="form-input" required>
            <option value="">Choisir la durée</option>
            <option value="15">15 minutes</option>
            <option value="30">30 minutes</option>
            <option value="45">45 minutes</option>
            <option value="60">1 heure</option>
        </select><br>

        <label for="session-theme">Thème de la session</label>
        <select name="session-theme" id="session-theme" class="form-input" required>
            <option value="">Choisir le thème</option>
            <?php
            foreach ($l_themes as $l_theme){?>
            <label for="theme">
                <option value="<?php echo $l_theme["id_theme"]; ?>"><?php echo $l_theme["nom_theme"];
            } ?>
        </select><br>

        <input type="submit" value="Créer la session" id="submit" class="form-label-input">
    </form>
</div>
<?php
require './footer.php';
endPage();
?>
