<?php
/** @file /pages/host-session.php
 *
 * @details File displaying session info to the host.
 *
 * @author SAE S3 NetKart
 */

require('header.php');
session_start();
startPage("Détails de la session", [K_STYLE . "main", K_STYLE . "host-session"], [K_SCRIPT . "check_connection",K_SCRIPT . "leaderboard"]);
require 'database/database.php';
if (!isset($_SESSION['id_user'])) {
    ?>
    <script>
        check_connection(false);
    </script>
    <?php
}
$l_db = new database();
$l_db->connection();

$l_id_joueur = $_SESSION['id_user'];

/**
 * Function to give the time before the end of the session and alert if this one is expired or near it end.
 *
 * @param $A_CODE_SESSION (String) the session code
 * @param $A_db (database) the database
 * @return (Array) array with the boolean if the session expired and
 * the time diff between actual and final time of the session.
 */
function timeDiff($A_CODE_SESSION, $A_db)
{
    if (!isset($_SESSION['session_hosted'])) {
        $l_query = $A_db->f_query("SELECT debut,duree FROM Groupe  WHERE code ='" . $A_CODE_SESSION . "'");
        $l_duree = $l_query[0]['duree'];
        $l_debut = $l_query[0]['debut'];
        $l_debut = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $l_debut, new DateTimeZone('Europe/Paris'));
        $l_duree = explode(':', $l_duree);
        $l_duree = DateInterval::createFromDateString($l_duree[0] . ' hours + ' . $l_duree[1] . ' minutes + ' . $l_duree[2] . ' seconds');
        $l_fin = $l_debut;
        $l_fin = $l_fin->add($l_duree);
        $_SESSION['session_hosted']['session_fin'] = $l_fin;
    }
    $l_fin = $_SESSION['session_hosted']['session_fin'];
    $l_now = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'), new DateTimeZone('Europe/Paris'));
    return ['finished' => $l_now->diff($l_fin)->invert,
        'timeDiff' => $l_now->diff($l_fin)->i];
}

if (!($l_db->verifyPlayerSession($l_id_joueur))) {
    $l_db->close();
    header('Location: create-session.php');
    exit();
}

$l_session = $l_db->getSessionByHost($l_id_joueur);


$l_players = [];
if (isset($l_session[0]['id_groupejoueur'])) {

    $l_session = $l_db->getSessionByHost($l_id_joueur)[0];

    foreach ($l_db->getSessionByHost($l_id_joueur) as $l_player) {
        $l_players[] = [
            'score' => $l_player['score'],
            'nickname' => $l_player['pseudo_groupe'],
        ];
    }
}
?>
<script type="text/javascript">
    setTimeout(() => {
        refreshLeaderboard('<?=$l_session ["code"];?>','null',true);
    }, 5000);
</script>
<div class="body-page">
    <?php
    $l_time_diff = timeDiff($l_session ["code"], $l_db)['timeDiff'];
    $l_session_expired = timeDiff($l_session ["code"], $l_db)['finished'];
    $l_delete_error = (isset($_GET['deleted']) && !$_GET['deleted']);
    if (($l_time_diff < 5) || $l_session_expired || $l_delete_error) {
        ?>
        <div class="alert not-print-section">
            <?php if ($l_session_expired) {
                echo 'La partie a expiré';
            } elseif ($l_delete_error) {
                echo 'La suppression n\'a pas eu lieu';
            } else {
                echo 'Il reste moins de ' . ($l_time_diff + 1) . ' minutes !';
            } ?>
        </div>
    <?php } ?>
    <div class="body">
        <H1 class="print-section" style="display: none">Résultats de la session multijoueur</H1>
        <p class="print-section" style="display: none"><?php
            date_default_timezone_set('Europe/Paris');
            echo date('d-m-Y H:i:s');?></p>
            <div class="left" class="print-section">
                <h1>Participants</h1>
                <div class="classement">
                    <?php
                    if (sizeof($l_players) > 0) {
                        $l_player_position = 0;
                        foreach ($l_players as $l_player) {
                            ?>
                            <div class="player<?php if ($l_player_position % 2 == 0) {
                                echo ' even';
                            } ?>">
                                <span class="left"><?php echo $l_player['nickname']; ?></span>
                                <div class="right"><?php
                                    if ($l_player_position == 0) {
                                        ?><img id="crown" src="<?php echo K_IMAGE ?>crown.png"><?php
                                    }
                                    echo $l_player['score']; ?>
                                </div>
                            </div>
                            <?php
                            ++$l_player_position;
                        }
                    } else {
                        echo 'Aucun joueur n\'a rejoint la partie.';
                    }

                    ?>
                </div>
            </div>
            <div class="right">
                <h1 class="not-print-section">Temps restant</h1>
                <span class="not-print-section"><?php if (!($l_session_expired)) {
                        echo $l_time_diff . ' minutes';
                    } else {
                        echo '@TODO : supprimer session';
                    } ?></span>
                <h1 class="not-print-section">Code session</h1>
                <span class="not-print-section"><?php if ($l_session["code"]) {
                        echo $l_session["code"];
                    } else {
                        echo 'ARJM3D';
                    } ?></span>
                <?php if ($l_session["id_groupe"]) { ?>
                    <form class="export not-print-section" id="export" method="post" action="javascript:exportToPDF()">
                        <input type="submit" value="Exporter">
                    </form>
                    <form class="first_delete not-print-section" id="first_delete" method="post" action="javascript:Confirm()">
                        <input type="submit" value="Supprimer">
                    </form>
                    <form class="delete" id="delete" method="post" action="host-session_post.php">
                        <input type="hidden" value="ok" name="delete_session">
                        <input type="hidden" value="<?= $l_session['id_groupe']; ?>" name="id_session">
                        <input type="submit" value="Confirmer">
                    </form>
                <?php } ?>

                <script>
                    function exportToPDF() {
                        window.print();
                    }

                    function Confirm() {
                        document.getElementById("first_delete").style.display = "none";
                        document.getElementById("delete").style.display = "block";
                    }
                </script>
            </div>
        </div>
    </div>
</div>
<?php
$l_db->close();

require 'footer.php';
endPage();
?>
