<?php
    session_start();
    require 'database/database.php';
    $l_db = new database();
    $l_db->connection();
    if ($l_db->insert_player_to_multiplayer_session($_POST['session_pseudo'],$_POST['session_code'])){
        $_SESSION['session_code'] = $_POST['session_code'];
        $_SESSION['session_pseudo'] = $_POST['session_pseudo'];
        $_SESSION['session_circuit'] = 0;
        header('Location: game-multi.php');
    }

    $l_db->close();
?>