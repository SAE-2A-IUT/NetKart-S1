<?php
/**
 * @file /pages/new-circuit.php
 *
 * @details File to show circuits created by user
 *
 * @author SAE S3 NetKart
 */
require ("./database/database.php");
require ('header.php');
session_start();
startPage("Edit",["../assets/style/main", "../assets/style/edit_theme"],["../assets/script/theme", K_SCRIPT."check_connection"]);
if (!isset($_SESSION['id_user'])) {
    ?>
    <script>
        check_connection(false);
    </script>
    <?php
}
/*

 * Check if password and confirmation are set
 */
if(isset($_SESSION['id_user'])){ # isset($_SESSION id joueur

    $l_user_id = $_SESSION['id_user'];


    $l_db = new database();

    $l_db->connection();


    // Get the circuit created by users
    $l_id_circuit_user = $l_db->get_circuit_created_by_user($l_user_id);

    // Get the information of circuits created by user
    $l_count_loop = 0;
    ?>
<div class="body-page">
    <div class="create_ciruit" id="UwU">
    <form class="create" method="post" action="new-circuit.php">
        <input type="submit" value="Créer un circuit">
    </form>
    </div>
    <?php  if (isset($_GET['error'])){?>
    <div class="error">
        <?php
        if($_GET['error']==1){
            echo "Une erreur est survenue et la suppression ne s'est pas réalisée.";
        }
        elseif ($_GET['error']==2){
            echo "Une erreur est survenue lors de la mise à jour du circuit.";
        }
        elseif ($_GET['error']==3){
            echo "Un circuit avec ce nom existe déjà.";
        }?>
    </div>
    <?php }
    if (isset($_GET['success'])){?>
    <div class="success">
        <?php
        if($_GET['success']==1){
            echo "La suppression s'est réalisée correctement.";
        }
        elseif($_GET['success']==2){
            echo "La mise à jour s'est réalisée correctement.";
        }?>

    </div>
<?php }?>
    <div class="all_theme">

    <?php
    foreach ($l_id_circuit_user as $items){
        ?>

            <?php
        $l_circuit_informations = $l_db->get_circuit_information($items["id_circuit"]);
        foreach ($l_circuit_informations as $item):?>
            <?php $l_count_loop = $l_count_loop + 1; ?>
        <script>
            /**
             * @brief this function change the button to a confirm button
             *
             * @param count (int) : the id of the button
             */
            function Confirm(count) {
                document.getElementById("first_delete" + count).style.display = "none";
                document.getElementById("delete" + count).style.display = "block";
            }

            /**
             * @brief this change the page
             *
             * @param link (String) : the path of the new page
             */
            function redirect(link) {
                window.open(link);
            }
        </script>
        <div class="modify_delete">
            <div class="theme">
                <img class="theme_image" alt="circuit" src=<?=K_IMAGE . $l_db->get_image_circuit($item["id_circuitimage"])[0]["image"].PHP_EOL;?>>
                <?php
                    $l_title = $item["nom_circuit"];
                    if (strlen($l_title) > 30) {
                        $l_title = substr("$l_title", 0, 30)."...";
                    }
                    if (strlen($l_title) > 15)
                    {
                        $l_title = substr("$l_title", 0, 15).PHP_EOL.substr("$l_title", 15, 30);

                    }

                ?>
                <h3><?php echo $l_title?></h3>
                <p class="points">Points: <?= $item["points"].PHP_EOL;?></p>
                <div class="form_div">
                    <form class="modify" method="post" action="modify-circuit.php">
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
    }?>
    </div>
    <?php

    $l_db->close();


include './footer.php';
endPage();

    ?>