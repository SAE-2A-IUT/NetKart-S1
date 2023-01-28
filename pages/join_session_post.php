<?php
    session_start();
    require 'database/database.php';
    $l_db = new database();
    $l_db->connection();
    if ($l_db->insert_player_to_multiplayer_session($_POST['session_pseudo'],$_POST['session_code'])
        && $l_db->check_if_element_already_used('Groupe_Joueur', 'pseudo_groupe',$_POST['session_pseudo'])){
        $_SESSION['session_code'] = $_POST['session_code'];
        $_SESSION['session_pseudo'] = $_POST['session_pseudo'];
        $_SESSION['session_circuit'] = 0;
        $_SESSION['id_user_session'] = $l_db->select_player_session_id($_SESSION['session_pseudo'],$_SESSION['session_code']);

        header('Location: game-multi.php');
        exit();
    }
    $l_db->close();
    header('Location: error.html');
    exit();
?>