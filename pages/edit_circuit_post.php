<?php
/**
 * @file /pages/edit_circuit_post.php
 *
 * @details File to delete a circuit created by user
 *
 * @author SAE S3 NetKart
 */
require ("./database/database.php");
session_start();
$l_player_id = $_SESSION['id_user'];

/**
 * Check if id of circuit to delete is set
 */
$l_db = new database();

$l_db->connection();

if(isset($_POST["id_circuit_to_delete"])){

    $l_id_circuit = $_POST["id_circuit_to_delete"];


    $l_is_delete_ok = $l_db->delete_circuit_with_id($l_id_circuit);

    // Check if delete is successful
    if (!$l_is_delete_ok){
        // Redirect to page and display that an error occured
        header('Location: edit_circuit.php?error=1');
        exit();
    }

    $l_db->close();


    // Redirect to page and display that delete was successful
    header('Location: edit_circuit.php?success=1');
    exit();
}
elseif (isset($_POST["id_circuit"]) and isset($_POST["circuit_name"]) and isset($_POST["circuit_theme"])
    and isset($_POST["circuit_points"]) and isset($_POST["circuit_image"]) and isset($_POST["question"])){
    echo "coucou";
    $l_id_circuit = $_POST["id_circuit"];
    $l_theme_selected = $_POST["circuit_theme"];
    $l_circuit_name = $_POST["circuit_name"];
    $l_image_selected = $_POST["circuit_image"];
    $l_circuit_points = $_POST["circuit_points"];
    $l_all_questions = $_POST["question"];


    // Checking if circuit already in database
    if ($l_db->check_if_element_already_used("Circuit","nom_circuit", $l_circuit_name)
        and $l_db->f_query("SELECT id_circuit FROM Circuit WHERE nom_circuit='".$l_circuit_name."'")[0]["id_circuit"] != $l_id_circuit) {
        // Redirect vers formulaire et dire que le circuit existe déjà
        $l_db->close();
        header('Location: edit_circuit.php?error=3');
        exit();
    }

    // Update circuit
    $l_is_update_ok = $l_db->update_circuit($l_id_circuit,$l_circuit_name,$l_circuit_points,$l_theme_selected,$l_player_id,$l_image_selected);
    if(!$l_is_update_ok){
        $l_db->close();
        header('Location: edit_circuit.php?error=2');
        exit();
    }

    // Update questions
    for ($i = 1; $i <= sizeof($l_all_questions); $i++) {
        //Insert data into Question table
        $l_is_update_ok = $l_db->update_question($l_all_questions[$i]["id_question"],$l_all_questions[$i]["question"], $l_all_questions[$i]["consigne"], $l_all_questions[$i]["reponse"]);
        if (!$l_is_update_ok) {
            $l_db->close();
            // Redirect to page and print that an error occured
            header('Location: edit_circuit.php?error=2');
            exit();
        }
    }

    $l_db->close();
    header('Location: edit_circuit.php?success=2');
    exit();
}
else{
    // Redirect to error page
    $l_db->close();
    header('Location: error.html');
    exit();
}

