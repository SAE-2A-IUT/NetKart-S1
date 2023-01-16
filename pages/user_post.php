<?php
/*
 * @file /pages/user_post.php
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

    $l_username = 1; //TODO : recupérer le pseudo stocké en variable de session

    $l_db = new database();

    $l_db->connection();

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
        header("Location:user.php?success=TwT");
    }
    else {
        header("Location:connection.php?success=UwU");
    }
    $l_db->close();
}
else {
    header("Location:error.html");
}
