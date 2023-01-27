<?php
session_start();
require ("./database/database.php");
/**
 *
 * @param $l_username
 * @param $l_date
 * @return string
 */
function getSessionCode($l_username, $l_date){
    $l_username = substr(bin2hex($l_username),0,2);

    return  $l_username. signed2hex($l_date,2);
}

function signed2hex($l_value,$l_nb)
{
    $l_packed = pack('i', $l_value);
    $l_hex='';
    for ($l_i=0; $l_i < $l_nb; $l_i++){
        $l_hex .= str_pad( dechex(ord($l_packed[$l_i])) , 2, '0', STR_PAD_LEFT);
    }
    $l_tmp = str_split($l_hex, 2);
    $l_out = implode('',array_reverse($l_tmp));
    return $l_out;
}

$l_db = new database();

$l_db->connection();

if(isset($_POST['session-time']) && isset($_POST['session-name']) && isset($_SESSION['id_user'])){

    $l_id_joueur = $_SESSION['id_user'];
    echo $l_id_joueur;

    $l_username = $l_db->get_username_from_id($l_id_joueur);
    print_r($l_username);

    $l_code = getSessionCode($l_username,date('is'));

    $l_duree = '00:'.$_POST['session-time'].':00';
    if ($_POST['session-time']==60) {
        $l_duree = '01:00:00';
    }
    $l_is_insert_ok = $l_db->insert_session($_POST['session-name'],$l_code,date('Y-m-d H:i:s'),$l_duree,$l_id_joueur,$_POST['session-theme']);
    $l_db->close();
    if(!$l_is_insert_ok){
        //TODO : redirect to page and print that an error occured while inserting session
    }
    header('Location: create-session.php?success=true&session='.$l_code);
    exit();
}
header('Location: create-session.php');
exit();


?>
