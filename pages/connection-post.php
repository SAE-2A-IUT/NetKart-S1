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
 * Check if password/username are correct
 */
if(isset($_POST["username-connection"]) and isset($_POST["password-connection"])){

    $l_username_connection = $_POST["username-connection"];
    $l_password_connection = $_POST["password-connection"];

    $l_db = new database();

    $l_db->connection();

    $l_password = $l_db->get_password($l_username_connection);

    $l_db->close();

    //check if password is the same as the one in db => use php_hash
}
/*
 * Insert data if new person
 */
elseif (isset($_POST["firstname"]) and isset($_POST["lastname"])
    and isset($_POST["mail-register"]) and isset($_POST["username-register"])
    and isset($_POST["password-register"]) and isset($_POST["password-verify"])) {

    $l_firstname = $_POST["firstname"];
    $l_lastname = $_POST["lastname"];
    $l_email = $_POST["mail-register"];
    $l_username_register = $_POST["username-register"];
    //check if password and its confirmation are the same

    if (strcmp($_POST["password-register"], $_POST["password-verify"]) == 0) {
        $l_password_register = $_POST["password-register"];
    } else {
        echo("Error description");
        exit();
    }

    $l_db = new database();

    $l_db->connection();

    echo $l_email;

    //check if email already in database
    if ($l_db->check_if_element_already_used("email", $l_email)) {
        echo("Mail déjà utilisé");
        //ajouter un renvoit vers la page pour afficher l'erreur
    } //check if username already in database
    elseif ($l_db->check_if_element_already_used("pseudo", $l_username_register)) {
        echo("Pseudo déjà utilisé");
        //ajouter un renvoit vers la page pour afficher l'erreur
    } //if pseudo and email not already used, insert data
    else {
        $l_db->f_insert_strings("Joueur", ["nom", "prenom", "pseudo", "email", "mot_de_passe"],
            [$l_lastname, $l_firstname, $l_username_register, $l_email, $l_password_register]);
    }

    $l_db->close();

    //renvoyer sur la page, afficher que l'inscription est ok et demander de se connecter
}