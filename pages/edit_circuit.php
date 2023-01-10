<?php
/*
 * @file /pages/new-circuit.php
 *
 * @details File to show circuits created by user
 *
 * @author SAE S3 NetKart
 */
require ("./database/database.php");
include './header.php';
startPage("Themes",["../assets/style/main", "../assets/style/themes"],["../assets/script/theme"]);

/*
 * Check if password and confirmation are set
 */
if(True){ # isset($_SESSION id joueur

    $l_user_id = 1; //TODO : recupérer le pseudo stocké en variable de session

    $l_db = new database();

    $l_db->connection();


    // Get the circuit created by users
    $l_id_circuit_user = $l_db->get_circuit_created_by_user($l_user_id);

    // Get the information of circuits created by user
    foreach ($l_id_circuit_user as $item){
        ?>
        <form method="post" action="edit_circuit_post.php">
            <?php
        $l_circuit_informations = $l_db->get_circuit_information($item["id_circuit"]);
        foreach ($l_circuit_informations as $item){
            echo "Circuit id : ".$item["id_circuit"].PHP_EOL.
                "Nom circuit".$item["nom_circuit"].PHP_EOL.
                "Nombre points".$item["points"].PHP_EOL.
                $l_img = $l_db->get_image_circuit($item["id_circuitimage"])[0]["image"];
                "Circuit image".$l_img.PHP_EOL;
        }?>
            <input type="hidden" value="<?php echo $item["id_circuit"]; ?>" name="id_circuit_to_delete">
            <input type="submit" value="Supprimer">
        </form>
        <?php
    }

    //TODO : afficher les données sous forme d'éléments comme dans la page thèmes



    // TODO : if there is no circuit created by user, redirect to page and print "no circuit" + button to create new one

    $l_db->close();


    //TODO : renvoyer sur la page, afficher que l'inscription est ok et demander de se connecter
}

//TODO : renvoyer sur la page (redirection automatique VERS LA PAGE D'ERREUR si aucun des champs n'est rempli)<?php

include './footer.php';
endPage();

?>