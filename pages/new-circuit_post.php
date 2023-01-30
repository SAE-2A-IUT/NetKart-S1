<?php
/**
 * @file /pages/new-circuit_post.php
 *
 * @details File to insert or update data of circuit created by user
 *
 * @author SAE S3 NetKart
 */
require("./database/database.php");
session_start();

/**
 * @brief generate random string
 *
 * @param $length (int) : the lenght of the string generated
 * @return (String) : the randomly generated string
 */
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$l_db = new database();

$l_db->connection();

/*
 * Check if required fields of form are set
 */

$l_player_id = $_SESSION['id_user'];

if (isset($_POST["circuit_name"]) and isset($_POST["circuit_theme"]) and isset($_POST["circuit_image"]) and isset($_POST["circuit_points"]) and isset($_POST["question"])) {

    $l_theme_selected = $_POST["circuit_theme"];
    $l_circuit_name = $_POST["circuit_name"];
    $l_image_selected = $_POST["circuit_image"];
    $l_circuit_points = $_POST["circuit_points"];
    $l_all_questions = $_POST["question"];

    // Checking if we need to create a new theme
    if (isset($_POST["other_theme"]) and isset($_POST["other_theme_desc"])) {
        // Check if theme already in database
        if ($l_db->check_if_element_already_used("Theme","nom_theme", $_POST["other_theme"])) {
            // Redirect vers formulaire et dire que le thème existe déjà
            header('Location: new-circuit.php?error=1');
            exit();
        }
        $l_new_theme = $_POST["other_theme"];
        $l_new_theme_desc = $_POST["other_theme_desc"];
        $l_theme_selected = $l_db->insert_theme($l_new_theme, $l_new_theme_desc);
    } elseif (isset($_POST["other_theme"]) or isset($_POST["other_theme_desc"])) {
        $l_theme_selected = "1";
    }
    $target_dir = "../assets/image/upload/";
    foreach ($_FILES as $files) {
        if ($files["error"][0] == 4) {
            continue;
        }
        foreach ($files["tmp_name"] as $tmp_name) {
            $check = getimagesize($tmp_name);
            if ($check === false) {
                echo "image error !";
                exit;
            }
        }

        foreach ($files["name"] as $name) {
            if (file_exists($name)) {
                echo "already exists";
                exit;
            }
        }

        foreach ($files["size"] as $size) {
            if ($size > 5000000) {
                echo "size exceed";
                exit;
            }
        }
    }

    // Check if circuit already in database
    if ($l_db->check_if_element_already_used("Circuit","nom_circuit", $l_circuit_name)) {
        // Redirect vers formulaire et dire que le circuit existe déjà
        header('Location: new-circuit.php?error=2');
        exit();
    }

    //Insert circuit
    $l_new_circuit_id = $l_db->insert_circuit($l_circuit_name, $l_circuit_points, $l_theme_selected, $l_player_id, $l_image_selected);
    if ($l_new_circuit_id == -1) {
        // Redirect to page and print that an error occured
        header('Location: new-circuit.php?error=3');
        exit();
    }

    // Insert each question
    for ($i = 1; $i <= sizeof($l_all_questions); $i++) {
        //Insert data into Question table
        $id_question = $l_db->insert_question($l_all_questions[$i]["consigne"], $l_all_questions[$i]["question"], $l_all_questions[$i]["reponse"], $l_new_circuit_id);
        if ($id_question == -1) {
            // Redirect to page and print that an error occured
            header('Location: new-circuit.php?error=4');
            exit();
        }
        foreach ($l_all_questions[$i]["lien"] as $link) {
            if(empty($link)){
                break;
            }
            $l_is_link_insert_ok = $l_db->insert_links($link, $id_question);
            if (!$l_is_link_insert_ok) {
                // Redirect to page and print that an error occured
                header('Location: new-circuit.php?error=5');
                exit();
            }
        }
        // Insert images
        $files=$_FILES["question_files_".$i];
        print_r($files);
        foreach ($files["tmp_name"] as $key => $tmp_name){
            if ($files["error"][0] != 0) {
                continue;
            }
            $imageFileType = strtolower(pathinfo($files["name"][$key],PATHINFO_EXTENSION));
            $string = generateRandomString();
            $target_filename = $string . "." .$imageFileType;
            $target_new_filename = $string . ".webp";
            $target_file = $target_dir . $target_filename;
            $target_new_file = $target_dir . $target_new_filename;

            if (move_uploaded_file($tmp_name, $target_file)) {
                print_r("test" . $imageFileType);
                switch ($imageFileType) {
                    case "png":
                        ?><script>alert(<?=$target_file?>)</script><?php
                        $original_image = imagecreatefrompng($target_file);
                        imagepalettetotruecolor($original_image);
                        imagewebp($original_image, $target_new_file, 80);
                        unlink($target_file);
                        break;
                    case "jpg" or 'jpeg':
                        //duplicate jpeg
                        $original_image = imagecreatefromjpeg($target_file);
                        imagepalettetotruecolor($original_image);
                        imagewebp($original_image, $target_new_file, 80);
                        unlink($target_file);
                        break;
                    case "webp":
                        break;
                }
                echo "The file ". htmlspecialchars( basename( $files["name"][$key])). " has been uploaded.";

            } else {
                // Redirect to page and print that an error occured
                header('Location: new-circuit.php?error=5');
                exit();
            }
            $l_is_image_insert_ok = $l_db->insert_images_question($target_new_filename, $id_question);
            if(!$l_is_image_insert_ok){
                header('Location: new-circuit.php?error=5');
                // Redirect to page and print that an error occured
                exit();
            }
        }
    }

    $l_db->close();

    // Redirect to page and print that insert is ok
    header('Location: new-circuit.php?success=1');
    exit();
}
else{
    // Redirect to error page
    header('Location: error.html');
    exit();
}


