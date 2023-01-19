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

    $l_db->connection();
    $l_query = $l_db->f_query("SELECT COUNT(*) FROM Joueur WHERE pseudo='".$l_username."' and code_confirmation='".$l_code."' and verification=0;");
    print_r($l_query[0]["COUNT(*)"]);
    if ($l_query[0]["COUNT(*)"] == 1) {
        $l_db->f_query("UPDATE Joueur SET verification=1 WHERE pseudo='".$l_username."'", true);
        header('Location: connection.php?success=2');
    }
    else {
        header('Location: connection.php?error=7');
    }
}