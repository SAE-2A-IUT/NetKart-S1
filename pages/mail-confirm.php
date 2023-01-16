<?php
session_start();
/*
 * @file /pages/mail-confirm.php
 *
 * @details File to confirm an email when registering in the website.
 *
 * @author SAE S3 NetKart
 */
require ("./database/database.php");
if(isset($_GET["user"]) and isset($_GET["code"])){

    $l_username = $_GET["user"];
    $l_code = $_GET["code"];
    $l_db = new database();

    //$l_db->connection();

    //TODO call database to verif if an username with this code exist and fill these 3 variable
    $l_username_match = "pelote";
    $l_code_match = "1";
    $l_already_matched = false;

    if ($l_username == $l_username_match and $l_code == $l_code_match and !$l_already_matched) {
        //TODO modify database to confirm creation
        header('Location: connection.php?success=2');
    }
    else {
        header('Location: connection.php?error=7');
    }
}