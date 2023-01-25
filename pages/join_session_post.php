<?php
    require 'database/database.php';
    $l_db = new database();
    $l_db->connection();
    echo $l_db->insert_player_to_multiplayer_session($_POST['session_pseudo'],$_POST['session_code']);
    $l_db->close();
?>