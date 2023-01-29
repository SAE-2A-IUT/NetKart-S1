<?php
/** @file /pages/homepage.php
 *
 * @details File to create a new circuit
 *
 * @author SAE S3 NetKart
 */

require ('header.php');
session_start();
require ("./database/database.php");

startPage("Nouveau circuit", [K_STYLE . "main", K_STYLE . "new-circuit"], ['../assets/script/new-circuit']);

$l_db = new database();

$l_db->connection();

if (isset($_POST["id_circuit_to_modify"])){
    $l_id_circuit = $_POST["id_circuit_to_modify"];

    $l_general_informations = $l_db->get_circuit_information($l_id_circuit);

    $l_questions = $l_db->get_question_circuit($l_id_circuit);
}

$l_nb_max_question = K_MAX_QUESTIONS;

if (isset($_GET['error'])){
    $l_code_err = $_GET['error'];?>
    <div class="error">
        <?php
        if ($l_code_err == 1){
            ?>Le nouveau thème existe déjà.
        <?php }
        if ($l_code_err == 2){
            ?>Un circuit existe déjà sous ce nom.
        <?php }
        if ($l_code_err == 3){
            ?>L'enregistrement n'a pas fonctionné.
        <?php }
        if ($l_code_err == 4){
            ?>Les questions se sont enregistrées partiellement (titre, consigne ou réponse). Consulter la page de <a href="edit_circuit.php">modification de circuit</a>.
        <?php }
        if ($l_code_err == 5){
            ?>Les questions se sont enregistrées partiellement (ressources). Consulter la page de <a href="edit_circuit.php">modification de circuit</a>.
        <?php }?>
    </div>
<?php } ?>
<?php  if (isset($_GET['success'])){?>
    <div class="success">
        Le circuit a bien été créé ! Vous pouvez le modifier <a href="edit_circuit.php" target="_blank">maintenant</a> ou plus tard.
    </div>
<?php }?>
    <form method="post" class="new_circuit_form body" action="edit_circuit_post.php" enctype="multipart/form-data">
        <div class="left">
            <input type="hidden" name="id_circuit" value="<?php echo $l_general_informations[0]["id_circuit"]; ?>">
            <label>Nom du circuit</label>
            <input name="circuit_name" type="text" value="<?php echo $l_general_informations[0]["nom_circuit"] ?>" placeholder="Nom du circuit (Limite : 100 charactères)" maxlength="100" required>
            <label>Thème du circuit</label>
            <select name="circuit_theme" required>
                <?php
                $l_themes = $l_db->get_all_themes();
                foreach ($l_themes as $l_theme){
                    if($l_theme["id_theme"]==$l_general_informations[0]["id_theme"]){?>
                        <label for="theme">
                        <option value="<?php echo $l_theme["id_theme"]; ?>" selected><?php echo $l_theme["nom_theme"];
                    }
                    else{?>
                        <label for="theme">
                    <option value="<?php echo $l_theme["id_theme"]; ?>"><?php echo $l_theme["nom_theme"];
                    }
                } ?>
            </select>

            <label>Nombre de points que rapporte le circuit (entre 10 et 100)</label>
            <input name="circuit_points" type="number" min="10" max="100" value="<?php echo $l_general_informations[0]["points"]?>" required>
            <label>Choisir l'image du circuit</label>
            <select name="circuit_image" id="circuit_image" required>
                <option value="">Choisir un circuit</option>
                <?php
                $l_images = $l_db->get_all_images_circuit();
                foreach ($l_images as $l_image){
                    if($l_image['id_circuitimage']==$l_general_informations[0]["id_circuitimage"]){?>
                        <option value="<?php echo $l_image['id_circuitimage']; ?>" selected><?php echo $l_image['image'];
    }
                    else{?>
                        <option value="<?php echo $l_image['id_circuitimage']; ?>"><?php echo $l_image['image'];
                        }
                    } ?>
            </select>
            <div class="images">
                <?php
                $l_nb_img = 1;
                foreach ($l_images as $l_image){?>
                    <div>
                        <img class="original_img" src="<?php echo K_IMAGE; ?>circuit<?php echo $l_nb_img; ?>.webp" alt="<?php echo $l_image['image']; ?> - originale">
                        <img class="hover_img" src="<?php echo K_IMAGE; ?>circuit<?php echo $l_nb_img; ?>.webp" alt="<?php echo $l_image['image']; ?>">
                        <span><?php echo $l_image['image']; ?></span>
                    </div>
                    <?php
                    ++$l_nb_img;
                } ?>
            </div>
        </div>
        <div class="right">
            <h1>Les questions</h1>

            <?php
            for ($l_nb_question = 1; $l_nb_question<=$l_nb_max_question; ++$l_nb_question){
                ?>
                <label class="question"><span>Question n°<?php echo $l_nb_question;?></span><span class="arrow close"></span></label>
                <div class="hidden question_content">
                    <input value="<?php echo $l_questions[$l_nb_question-1]["question"]; ?>" name="question[<?php echo $l_nb_question;?>][question]" type="text" placeholder="Intitulé de la question" maxlength="200" required>
                    <label>Consigne</label>
                    <textarea name="question[<?php echo $l_nb_question;?>][consigne]" placeholder="Consigne de la question" aria-atomic="true" required><?php echo $l_questions[$l_nb_question-1]["consigne"]; ?></textarea>
                    <label>Réponse</label>
                    <input value="<?php echo $l_questions[$l_nb_question-1]["reponse"]; ?>" name="question[<?php echo $l_nb_question;?>][reponse]" type="text" placeholder="Réponse de la question" maxlength="200" required>
                    <h1>Les ressources ne sont pas modifiables</h1>
                    <input type="hidden" value="<?php echo $l_questions[$l_nb_question-1]["id_question"]; ?>" name="question[<?php echo $l_nb_question;?>][id_question]">
                </div>
                <?php
            }
            ?>
            <input type="submit" value="Modifier le circuit">
        </div>

    </form>

<?php

$l_db->close();

require 'footer.php';
endPage();
?>