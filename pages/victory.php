<?php
require("./database/database.php");

function checkAlreadyVictory($id_user, $id_circuit){
    $l_db = new database();
    $l_db->connection();
    $response = $l_db->check_if_victory_already($id_user, $id_circuit);
    $l_db->close();
    return $response;
}

function setVictoryDB($id_user, $id_circuit){
    $l_db = new database();
    $l_db->connection();
    $response = $l_db->insert_victory($id_user, $id_circuit);
    $l_db->close();
    return $response;
}

if (isset($_POST['id_user']) && isset($_POST['id_circuit'])) {
    if (checkAlreadyVictory($_POST['id_user'], $_POST['id_circuit']) == 1) {
        setVictoryDB($_POST['id_user'], $_POST['id_circuit']);
        print_r("add");
    }else{
        print_r("already");
    }
}