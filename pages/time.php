<?php
session_start();
require './database/database.php';

$l_db = new database();

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

if (timeDiff($_POST['session_code'],$l_db)['finished']){
    print_r('finished');
}else{
    print_r(timeDiff($_POST['session_code'],$l_db)['timeDiff']);
}