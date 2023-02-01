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
session_start();

$l_db->connection();

if(!isset($_SESSION['id_user'])){
    $l_db->close();
    header("Location:error.html");
    exit();
}

$l_user_id = $_SESSION['id_user'];

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
    $l_is_update_ok = $l_db->update_password($l_user_id, $l_password);

    // Check if update is successful
    if(!$l_is_update_ok){
        $l_db->close();
        header("Location:user.php?error=2");
        exit();
    }
    else {
        $l_db->close();
        header("Location:connection.php?success=4");
        exit();
    }
    $l_db->close();
}
elseif (isset($_POST["delete_account"])){

    $l_user_circuits = $l_db->get_circuit_created_by_user($l_user_id);

    // Deleting all circuits created by user
    foreach ($l_user_circuits as $l_circuit){
        $l_is_circuit_delete_ok = $l_db->delete_circuit_with_id($l_circuit["id_circuit"]);
        if(!$l_is_circuit_delete_ok){
            $l_db->close();
            //redirect to user page and print that delete was incomplete as an error occurred
            header("Location:connection.php?error=1");
            exit();
        }
    }

    // Deleting user
    $l_id_session = $l_db->f_query("SELECT id_groupe FROM Groupe WHERE id_joueur=".$l_user_id);
    print_r($l_id_session);
    if($l_id_session !="Error" and sizeof($l_id_session) > 0){
        $l_id_session = $l_id_session[0]["id_groupe"];
        echo "deuxieme : ".$l_id_session;
        $l_is_group_delete_ok = $l_db->delete_session_multi($l_id_session);
        if(!$l_is_group_delete_ok){
            //redirect to user page and print that an error occurred when trying to delete the user session
            header("Location:connection.php?error=2");
            exit();
        }
    }
    $l_is_user_delete_ok = $l_db->f_delete("Joueur","id_joueur=".$l_user_id);
    if(!$l_is_user_delete_ok){
        $l_db->close();
        //redirect to user page and print that delete was incomplete as an error occured
        header("Location:connection.php?error=3");
        exit();
    }

    $l_db->close();
    session_destroy();
    //redirect to homepage, end session and print that account deletion was successful
    header("Location:homepage.php?userdeleted=1");
    exit();
}
else {
    $l_db->close();
    header("Location:error.html");
    exit();
}
