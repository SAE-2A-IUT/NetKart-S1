<?php
/** @file /pages/homepage.php
 *
 * @details File verifying if the player has already made a victory of this circuit and if not
 *
 * @author SAE S3 NetKart
 */

session_start();
require("./database/database.php");

if (isset($_POST['circuitListSize']) && isset($_POST['playerId'])){
    $l_db = new database();
    $l_db->connection();
    $l_db->setSessionPlayerScore((int)$_POST['playerId'],$_SESSION['session_circuit']);
    $l_db->close();
    function nextCircuit($l_circuitListSize, $index ){
        if(!isLastCircuit($l_circuitListSize, $index)){
            ++$_SESSION['session_circuit'];
        }
        else{
            print_r('finish');
        }
    }

    function isLastCircuit($l_circuitListSize, $index){
        if ($l_circuitListSize-1 == $index){
            return true;
        }
        return false;
    }
    nextCircuit($_POST['circuitListSize'],$_SESSION['session_circuit']);
}else{
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
}

