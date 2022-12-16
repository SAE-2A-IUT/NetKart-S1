<?php
/*
 * @file /pages/connection-post.php
 *
 * @details File to manage data from connection/register form. Save data into database if registering / check if password correct if connecting.
 *
 * @author SAE S3 NetKart
 */
require ("./database/database.php");

/*
 * Check if password and confirmation are set
 */
if(isset($_POST["new_password"]) and isset($_POST["new_password_conf"])){

    $l_password = $_POST["new_password"];
    $l_password_confirmation = $_POST["new_password_conf"];

    $l_username = None; //TODO : recupérer le pseudo stocké en variable de session

    $l_db = new database();

    $l_db->connection();

    //TODO : check if password is the same as the one in db => use php_hash

    // Check if password and its confirmation are the same
    if (strcmp($_POST["new_password"], $_POST["new_password_conf"]) == 0) {
        $l_password_register = $_POST["new_password"];
    } else {
        echo("Error description");
        exit();
    }

    //TODO : Check if password long enough

    //TODO : hash password

    //Updating password
    $l_is_update_ok = $l_db->update_password($l_username, $l_password);

    // Check if update is successful
    if(!$l_is_update_ok){
        //TODO : renvoyer sur la page, afficher qu'un erreur est survenue et que la mise a jour du mot de passe n'a pas fonctionné
    }

    $l_db->close();


    //TODO : renvoyer sur la page, afficher que l'inscription est ok et demander de se connecter
}

//TODO : renvoyer sur la page (redirection automatique VERS LA PAGE D'ERREUR si aucun des champs n'est rempli)