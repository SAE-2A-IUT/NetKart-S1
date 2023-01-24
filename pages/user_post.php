<?php
/**
 * @file /pages/user_post.php
 *
 * @details File to manage data from connection/register form. Save data into database if registering / check if password correct if connecting.
 *
 * @author SAE S3 NetKart
 */
require ("./database/database.php");

$l_db = new database();

$l_db->connection();

$l_username = 16; //TODO : recupérer le pseudo stocké en variable de session

/*
 * Check if password and confirmation are set
 */
if(isset($_POST["new_password"]) and isset($_POST["new_password_conf"])){

    $l_password = $_POST["new_password"];
    $l_password_confirmation = $_POST["new_password_conf"];

    // Check if password and its confirmation are the same
    if (strcmp($l_password, $l_password_confirmation) == 0) {
        $l_password_register = $_POST["new_password"];
    } else {
        echo("Error description");
        exit();
    }


    $l_password = password_hash($l_password, PASSWORD_DEFAULT);
    echo $l_password;

    //Updating password
    $l_is_update_ok = $l_db->update_password($l_username, $l_password);

    // Check if update is successful
    if(!$l_is_update_ok){
        $l_db->close();
        header("Location:user.php?success=TwT");
    }
    else {
        $l_db->close();
        header("Location:connection.php?success=UwU");
    }
    $l_db->close();
}
elseif (isset($_POST["delete_account"])){

    $l_user_circuits = $l_db->get_circuit_created_by_user($l_username);

    // Deleting all circuits created by user
    foreach ($l_user_circuits as $l_circuit){
        $l_is_circuit_delete_ok = $l_db->delete_circuit_with_id($l_circuit["id_circuit"]);
        if(!$l_is_circuit_delete_ok){
            $l_db->close();
            //TODO : redirect to user page and print that delete was incomplete as an error occured
        }
    }

    // Deleting user
    $l_is_user_delete_ok = $l_db->f_delete("Joueur","id_joueur=".$l_username);
    if(!$l_is_user_delete_ok){
        $l_db->close();
        //TODO : redirect to user page and print that delete was incomplete as an error occured
    }

    $l_db->close();

    //TODO : redirect to homepage, end session and print that account deletion was successful

}
else {
    $l_db->close();
    header("Location:error.html");
}
