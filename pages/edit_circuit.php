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
startPage("Edit",["../assets/style/main", "../assets/style/edit_theme"],["../assets/script/theme"]);
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
    $l_count_loop = 0;
    ?>
    <div class="all_theme">
    <?php
    foreach ($l_id_circuit_user as $item){
        ?>

            <?php
        $l_circuit_informations = $l_db->get_circuit_information($item["id_circuit"]);
        foreach ($l_circuit_informations as $item):?>
            <?php $l_count_loop = $l_count_loop + 1; ?>
        <div class="modify_delete">
            <div class="theme">
                <img class="theme_image" alt="circuit" src=<?=K_IMAGE . $l_db->get_image_circuit($item["id_circuitimage"])[0]["image"].PHP_EOL;?>>
                <h3><?= $item["nom_circuit"].PHP_EOL;?></h3>
                <p><?= $item["points"].PHP_EOL;?></p>
                <div class="form_div">
                    <form class="modify" method="post" action="new-circuit_post.php">
                        <input type="hidden" value="<?php echo $item["id_circuit"]; ?>" name="id_circuit_to_modify">
                        <input type="submit" value="Modifier">
                    </form>
                    <form class="delete" method="post" action="">
                        <input type="hidden" value="<?php echo $item["id_circuit"]; ?>" name="id_circuit_to_delete">
                        <input type="submit" value="Supprimer">
                    </form>
                    <input type="checkbox" class="test">
                    <div>
                        <span>
                            test
                        </span>
                    </div>
                    <form  method="post" action="">
                            <input type="hidden" value="<?php echo $item["id_circuit"]; ?>" name="id_circuit_to_delete">
                            <input type="submit" value="test">
                        </form>

                </div>
            </div>

        </div>
        <?php endforeach; ?>
        <?php
    }
    ?></div><?php
    if ($l_count_loop == 0) {
        ?>
        <img class="no_circuit" alt="circuit" src=<?=K_IMAGE."no_circuit.jpg";?>>
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