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
    <div class="create_ciruit" id="UwU">
    <form class="create" method="post" action="new-circuit.php">
        <input type="submit" value="Créer un circuit">
    </form>
    </div>
    <div class="all_theme">

    <?php
    foreach ($l_id_circuit_user as $items){
        ?>

            <?php
        $l_circuit_informations = $l_db->get_circuit_information($items["id_circuit"]);
        foreach ($l_circuit_informations as $item):?>
            <?php $l_count_loop = $l_count_loop + 1; ?>
        <script>
            function Confirm(count) {
                document.getElementById("first_delete" + count).style.display = "none";
                document.getElementById("delete" + count).style.display = "block";
            }

            function redirect(link) {
                window.open(link);
            }
        </script>
        <div class="modify_delete">
            <div class="theme">
                <img class="theme_image" alt="circuit" src=<?=K_IMAGE . $l_db->get_image_circuit($item["id_circuitimage"])[0]["image"].PHP_EOL;?>>
                <h3><?= $item["nom_circuit"].PHP_EOL;?></h3>
                <p class="points">Points: <?= $item["points"].PHP_EOL;?></p>
                <div class="form_div">
                    <form class="modify" method="post" action="new-circuit_post.php">
                        <input type="hidden" value="<?php echo $item["id_circuit"]; ?>" name="id_circuit_to_modify">
                        <input type="submit" value="Modifier">
                    </form>
                    <form class="first_delete" id="first_delete<?= $l_count_loop;?>" method="post" action="javascript:Confirm(<?= $l_count_loop;?>)">
                        <input type="submit" value="Supprimer">
                    </form>
                    <form class="delete" id="delete<?= $l_count_loop;?>" method="post" action="edit_circuit_post.php">
                            <input type="hidden" value="<?php echo $item["id_circuit"]; ?>" name="id_circuit_to_delete">
                            <input type="submit" value="Confirmer">
                    </form>

                </div>
            </div>

        </div>
        <?php endforeach; ?>
        <?php
        }

    }
    ?></div><?php
    if ($l_count_loop == 0) {
        ?>
        <script>document.getElementById("UwU").style.display = "none";</script>
        <div class="no_circuit">
            <h1>Aucun circuit n'a encore été crée</h1>
            <form class="create2" method="post" action="new-circuit.php">
                <input type="submit" value="Créer un circuit">
            </form>
        </div>
        <?php
    }


    //TODO : afficher les données sous forme d'éléments comme dans la page thèmes



    // TODO : if there is no circuit created by user, redirect to page and print "no circuit" + button to create new one

    $l_db->close();


    //TODO : renvoyer sur la page, afficher que l'inscription est ok et demander de se connecter


//TODO : renvoyer sur la page (redirection automatique VERS LA PAGE D'ERREUR si aucun des champs n'est rempli)<?php

include './footer.php';
endPage();

?>