<?php
/*
 * @file /pages/edit_circuit_post.php
 *
 * @details File to delete a circuit created by user
 *
 * @author SAE S3 NetKart
 */
require ("./database/database.php");

/*
 * Check if id of circuit to delete is set
 */

if(isset($_POST["id_circuit_to_delete"])){

    $l_id_circuit = $_POST["id_circuit_to_delete"];

    echo $l_id_circuit;

    $l_db = new database();

    $l_db->connection();

    $l_is_delete_ok = $l_db->delete_circuit_with_id($l_id_circuit);

    // Check if delete is successful
    if (!$l_is_delete_ok){
        // DONE : renvoyer sur la page, afficher qu'une erreur est survenue et que la suppression du circuit n'a pas fonctionné
        header('Location: edit_circuit.php?error=1');
        exit();
    }

    $l_db->close();


    //DONE : renvoyer sur la page, afficher que la suppression a fonctionné
    header('Location: edit_circuit.php?success=1');
    exit();
}
//DONE : renvoyer sur la page (redirection automatique VERS LA PAGE D'ERREUR si )
header('Location: error.html');
exit();