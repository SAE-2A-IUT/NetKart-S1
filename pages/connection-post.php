<?php
session_start();
/**
 * @file /pages/connection-post.php
 *
 * @details File to manage data from connection/register form. Save data into database if registering / check if password correct if connecting.
 *
 * @author SAE S3 NetKart
 */
require ("./database/database.php");

/**
 * Check if password/username are correct
 */
if(isset($_POST["username-connection"]) and isset($_POST["password-connection"])){

    $l_username_connection = $_POST["username-connection"];
    $l_password_connection = $_POST["password-connection"];

    $l_db = new database();

    $l_db->connection();

    $l_password = $l_db->get_password($l_username_connection);

    $l_is_verif = $l_db->f_query("SELECT verification FROM Joueur WHERE pseudo='".$l_username_connection."'")[0]['verification'];
    if (!$l_is_verif) {
        header('Location: connection.php?error=6');
    }
    else if($l_password == '' || !password_verify($l_password_connection,$l_password)){
        header('Location: connection.php?error=1');
    }
    else {
        $_SESSION['username'] = $l_username_connection;
        $_SESSION['id_user'] = $l_db->f_query("SELECT id_joueur FROM `Joueur` WHERE pseudo='".$l_username_connection."'")[0]['id_joueur'];
        header('Location: ../index.php');
    }
    // $_SESSION['username'] = $l_username_connection;
    $l_db->close();
}
/**
 * Insert data if new person
 */
elseif (isset($_POST["firstname"]) and isset($_POST["lastname"])
    and isset($_POST["mail-register"]) and isset($_POST["username-register"])
    and isset($_POST["password-register"]) and isset($_POST["password-verify"])) {

    $l_firstname = $_POST["firstname"];
    $l_lastname = $_POST["lastname"];
    $l_email = $_POST["mail-register"];
    $l_username_register = $_POST["username-register"];

    // Check if password and confirmation are the same
    if (!strcmp($_POST["password-register"], $_POST["password-verify"])) {
        $l_password_register = $_POST["password-register"];
    } else {
        header('Location: connection.php?error=2');
    }

    $l_db = new database();

    $l_db->connection();

    echo $l_email;

    // Check if email already in database
    if ($l_db->check_if_element_already_used("Joueur","email", $l_email)) {
        header('Location: connection.php?error=3');
    } // Check if username already in database
    elseif ($l_db->check_if_element_already_used("Joueur","pseudo", $l_username_register)) {
        header('Location: connection.php?error=4');
    } // If pseudo and email not already used, insert data
    else {
        $l_password_register = password_hash($l_password_register,PASSWORD_DEFAULT );

        $l_digits = 10;
        $l_code_verification = "".rand(pow(10, $l_digits-1), pow(10, $l_digits)-1);
        $l_is_insert_ok = $l_db->f_insert_strings("Joueur", ["nom", "prenom", "pseudo", "email", "mot_de_passe", "code_confirmation"],
            [$l_lastname, $l_firstname, $l_username_register, $l_email, $l_password_register, $l_code_verification]);

        // Check if register is successful
        if(!$l_is_insert_ok){
            header('Location: connection.php?error=5');
        }else{

            $l_page = "http://localhost/pages/mail-confirm.php?user=" . $l_username_register . "&code=" . $l_code_verification;
            //$l_page = "https://netkart.alwaysdata.net/pages/mail-confirm.php?user=" . $l_username_register . "&code=" . $l_code_verification;
            echo $l_page;
            $l_message = "Bonjour " . $l_username_register . ", merci de cliquer sur ce lien pour verifié votre email: " . $l_page;
            mail($l_email,'Confirmation de mail pour Netkart', $l_message);
            header('Location: connection.php?success=1');
        }
    }

    $l_db->close();
}else{
    header('Location: error.html');
}