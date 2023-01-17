<?php
/*
 * @file /pages/new-circuit_post.php
 *
 * @details File to insert or update data of circuit created by user
 *
 * @author SAE S3 NetKart
 */
require("./database/database.php");

$l_db = new database();

$l_db->connection();

/*
 * Check if required fields of form are set
 */

$l_player_id = 1;

if (isset($_POST["circuit_name"]) and isset($_POST["circuit_theme"]) and isset($_POST["circuit_image"]) and isset($_POST["circuit_points"]) and isset($_POST["question"])) {

    $l_theme_selected = $_POST["circuit_theme"];
    $l_circuit_name = $_POST["circuit_name"];
    $l_image_selected = $_POST["circuit_image"];
    $l_circuit_points = $_POST["circuit_points"];
    $l_all_questions = $_POST["question"];

    // Checking if we need to create a new theme
    if (isset($_POST["other_theme"]) and isset($_POST["other_theme_desc"])) {
        $l_new_theme = $_POST["other_theme"];
        $l_new_theme_desc = $_POST["other_theme_desc"];
        $l_theme_selected = $l_db->insert_theme($l_new_theme, $l_new_theme_desc);
    } elseif (isset($_POST["other_theme"]) or isset($_POST["other_theme_desc"])) {
        $l_theme_selected = "1";
    }

    //Insert circuit
    $l_new_circuit_id = $l_db->insert_circuit($l_circuit_name, $l_circuit_points, $l_theme_selected, $l_player_id, $l_image_selected);
    if ($l_new_circuit_id == -1) {
        // TODO : afficher erreur pour dire que l'insertion n'a pas fonction + redirect vers new-circuit
    }

    // Insert each question
    for ($i = 1; $i <= sizeof($l_all_questions); $i++) {
        //Insert data into Question table
        $id_question = $l_db->insert_question($l_all_questions[$i]["titre"], $l_all_questions[$i]["consigne"], $l_all_questions[$i]["reponse"], $l_new_circuit_id);
        if ($id_question == -1) {
            //TODO : redirect vers new-circuit et afficher que l'insertion des données est partielle et demander d'aller sur le formulaire de modification pour terminer l'insertion
        }
        foreach ($l_all_questions[$i]["lien"] as $link) {
            if(empty($link)){
                break;
            }
            $l_is_link_insert_ok = $l_db->insert_links($link, $id_question);
            if (!$l_is_link_insert_ok) {
                //TODO : redirect vers new-circuit et afficher que l'insertion des données est partielle et demander d'aller sur le formulaire de modification pour terminer l'insertion
            }
        }
    }

    $l_db->close();


    //TODO : renvoyer sur la page new-circuit et afficher que l'insertion a fonctionné
}
//TODO : renvoyer sur la page (redirection automatique VERS LA PAGE D'ERREUR)
