<?php
require 'header.php';
startPage("Détails de la session",[K_STYLE."main",K_STYLE."host-session"],[]);
require 'database/database.php';

$l_db = new database();
$l_db->connection();

$l_id_joueur = 12;

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
    if (!isset($_SESSION['session_hosted'])){
        $l_query = $A_db->f_query("SELECT debut,duree FROM Groupe  WHERE code ='".$A_CODE_SESSION."'");
        $l_duree = $l_query[0]['duree'];
        $l_debut = $l_query[0]['debut'];
        $l_debut = DateTimeImmutable::createFromFormat('Y-m-d H:i:s',$l_debut,new DateTimeZone('Europe/Paris'));
        $l_duree = explode(':',$l_duree);
        $l_duree = DateInterval::createFromDateString($l_duree[0].' hours + '.$l_duree[1].' minutes + '.$l_duree[2].' seconds');
        $l_fin = $l_debut;
        $l_fin = $l_fin->add($l_duree);
        $_SESSION['session_hosted']['session_fin'] = $l_fin;
    }
    $l_fin = $_SESSION['session_hosted']['session_fin'];
    $l_now = DateTimeImmutable::createFromFormat('Y-m-d H:i:s',date('Y-m-d H:i:s'),new DateTimeZone('Europe/Paris'));
    return ['finished' => $l_now->diff($l_fin)->invert,
            'timeDiff' => $l_now->diff($l_fin)->i];
}

if(!($l_db->verifyPlayerSession($l_id_joueur))){
    header('Location: create-session.php');
}

$l_session = $l_db->getSessionByHost($l_id_joueur);



$l_players = [];
if (isset($l_session[0]['id_groupejoueur'])){

    $l_session = $l_db->getSessionByHost($l_id_joueur)[0];

    foreach ($l_db->getSessionByHost($l_id_joueur) as $l_player){
        $l_players[]=[
                'score'     => $l_player['score'],
                'nickname'  => $l_player['pseudo_groupe'],
        ];
    }
}



?>
<script type="text/javascript">
    setTimeout(() =>{location.reload();} ,30000);
</script>
<div class="body-page">
    <?php
    $l_time_diff = timeDiff($l_session ["code"],$l_db)['timeDiff'];
    $l_session_expired = timeDiff($l_session ["code"],$l_db)['finished'];
    if (($l_time_diff<5) || $l_session_expired){?>
        <div class="alert">
            <?php if ($l_session_expired){
                echo 'La partie a expirée';
            }else{
                echo 'Il reste moins de '.($l_time_diff+1).' minutes !';
            }?>
        </div>
    <?php } ?>
    <div class="body">

        <div class="left">
            <h1>Participants</h1>
            <?php
            if (sizeof($l_players)>0){
                $l_player_position = 0;
                foreach ($l_players as $l_player){
                    ?>
                    <div class="player<?php if ($l_player_position % 2 == 0) {echo ' even';} ?>">
                        <span class="left"><?php echo $l_player['nickname'] ;?></span>
                        <div class="right"><?php
                            if ($l_player_position == 0) {
                                ?><img id="crown" src="<?php echo K_IMAGE?>crown.png"><?php
                            }
                            echo $l_player['score'] ;?>
                        </div>
                    </div>
                    <?php
                    ++$l_player_position;
                }
            }else{
                echo 'Aucun joueur n\'a rejoint la partie.';
            }

            ?>
        </div>
        <div class="right">
            <h1>Temps restant</h1>
            <span><?php if (!($l_session_expired)){ echo $l_time_diff.' minutes';}else{echo '@TODO : supprimer session';}?></span>
            <h1>Code session</h1>
            <span><?php if($l_session["code"]){echo $l_session["code"];}else{ echo 'ARJM3D';}?></span>
        </div>
    </div>
</div>
<?php
$l_db->close();

require 'footer.php';
endPage();
?>
