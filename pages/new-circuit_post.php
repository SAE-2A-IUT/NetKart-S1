<?php
/*
 * @file /pages/new-circuit_post.php
 *
 * @details File to insert or update data of circuit created by user
 *
 * @author SAE S3 NetKart
 */
require ("./database/database.php");

/*
 * Check if required fields of form are set
 */

if(isset($_POST["circuit_name"]) and isset($_POST["circuit_theme"]) and isset($_POST["circuit_image"])){

    $l_theme_selected = $_POST["circuit_theme"];
    $l_circuit_name = $_POST["circuit_name"];
    $l_image_selected = $_POST["circuit_image"];
    // Checking if we need to create a new theme
    if($l_theme_selected == 5){
        // TODO before : créer un champs pr saisir une description (minimum 50 char)
        // TODO : créer un nouveau theme
        $l_new_theme = $_POST["other_theme"];
    }

    echo "THEME : ".$l_theme_selected." NAME : ".$l_circuit_name." IMAGE : ".$l_image_selected;

    if(isset($_POST["question"])){
        $l_all_questions = $_POST["question"];
        print_r($l_all_questions);/*
        foreach ($l_all_questions as $l_question){
            foreach ($l_question as $l_element){
                if(gettype($l_element)=="array"){
                    echo " ARRAY ";
                    foreach ($l_element as $i){
                        echo "element (array) : ".$i;
                    }
                }
                else{
                    echo "ELEMENT : ".$l_element;
                }
            }

        }*/
    }

    print_r($_FILES);

    /*
    $l_id_circuit = $_POST["id_circuit_to_delete"];

    echo $l_id_circuit;

    $l_db = new database();

    $l_db->connection();

    $l_is_delete_ok = $l_db->delete_circuit_with_id($l_id_circuit);

    // Check if delete is successful
    if (!$l_is_delete_ok){
        // TODO : renvoyer sur la page, afficher qu'une erreur est survenue et que la suppression du circuit n'a pas fonctionné
    }

    $l_db->close();

*/
    //TODO : renvoyer sur la page, afficher que la suppression a fonctionné
}
//TODO : renvoyer sur la page (redirection automatique VERS LA PAGE D'ERREUR si )
