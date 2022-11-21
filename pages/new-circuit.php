<?php
require 'header.php';
startPage("Nouveau circuit", [K_STYLE . "main", K_STYLE . "new-circuit"], ['../assets/script/new-circuit']);
$l_theme_one = ['name' => 'Thème un'];
$l_theme_two = ['name' => 'Thème deux'];
$l_theme_three = ['name' => 'Thème trois'];
$l_theme_four = ['name' => 'Thème quatre'];
$l_themes = [$l_theme_one,$l_theme_two,$l_theme_three,$l_theme_four];

$l_image_one = ['alt' => 'Circuit un'];
$l_image_two = ['alt' => 'Circuit deux'];
$l_image_three = ['alt' => 'Circuit trois'];
$l_image_four = ['alt' => 'Circuit quatre'];
$l_images = [$l_image_one,$l_image_two,$l_image_three,$l_image_four];

$l_nb_max_question = 3;
$l_nb_max_question_images = 3;
?>

<form method="post" class="new_circuit_form body">
    <input type="hidden" id="image_limit" value="<?php echo $l_nb_max_question_images ?>">
    <div class="left">
        <label>Nom du circuit</label>
        <input name="circuit_name" type="text" placeholder="Nom du circuit" required>
        <label>Thèmes du circuit</label>
        <select name="circuit_theme" required>
            <option value="">Choisir un thème</option>
            <?php
            $l_nb_option = 1;
            foreach ($l_themes as $l_theme){?>
                <option value="<?php echo $l_nb_option; ?>"><?php echo $l_theme['name']; ?></option>
                <?php
                ++$l_nb_option;
            } ?>
            <option value="5">Autre thème</option>
        </select>

        <div class="other_theme">
            <label class="hidden">Si autre, précisez</label>
            <input class="hidden" name="other_theme" type="text" placeholder="Nom du theme" disabled>
        </div>
        <label>Choisir l'image du circuit</label>
        <select name="circuit_image" id="circuit_image" required>
            <option value="">Choisir un circuit</option>
            <?php
            $l_nb_option = 1;
            foreach ($l_images as $l_image){?>
                <option value="<?php echo $l_nb_option; ?>"><?php echo $l_image['alt']; ?></option>
                <?php
                ++$l_nb_option;
            } ?>
        </select>
        <div class="images">
        <?php
        $l_nb_img = 1;
        foreach ($l_images as $l_image){?>
            <div>
                <img class="original_img" src="<?php echo K_IMAGE; ?>circuit<?php echo $l_nb_img; ?>.jpg" alt="<?php echo $l_image['alt']; ?> - originale">
                <img class="hover_img" src="<?php echo K_IMAGE; ?>circuit<?php echo $l_nb_img; ?>.jpg" alt="<?php echo $l_image['alt']; ?>">
                <span><?php echo $l_image['alt']; ?></span>
            </div>
            <?php
            ++$l_nb_img;
        } ?>
        </div>
    </div>
    <div class="right">
        <h1>Les questions</h1>

        <?php
        for ($l_nb_question = 0; $l_nb_question<$l_nb_max_question; ++$l_nb_question){
        ?>
        <label>Question n°<?php echo $l_nb_question+1;?></label>
        <input name="question_title_<?php echo $l_nb_question+1;?>" type="text" placeholder="Intitulé de la question" required>
        <label>Consigne</label>
        <textarea name="question_rules_<?php echo $l_nb_question+1;?>" placeholder="Consigne de la question" aria-atomic="true" required></textarea>
        <label>Réponse</label>
        <input name="question_answer_<?php echo $l_nb_question+1;?>" type="text" placeholder="Réponse de la question" required>
        <h1>Ressources</h1>
        <h2>Il y a une limite de 3 images par question.</h2>
        <div class="medias">

            <div class="left">
                <label class="file_label" for="question_files_<?php echo $l_nb_question+1;?>">Images</label>
                <input type="hidden" value="<?php echo $l_nb_question;?>">

                <input class="img_store" id="question_files_<?php echo $l_nb_question+1;?>" name="question_files_<?php echo $l_nb_question+1;?>" type="file" accept="image/*" multiple>
                <?php
                for ($l_nb_question_image = 0; $l_nb_question_image<$l_nb_max_question_images; ++$l_nb_question_image){?>
                    <div>
                        <img class="question_img original_img" alt="question_image_<?php echo $l_nb_question+1;?>_<?php echo $l_nb_question_image+1;?>" src="">
                        <img class="question_img hover_img" alt="question_image_<?php echo $l_nb_question+1;?>_<?php echo $l_nb_question_image+1;?>" src="">
                        <span class="question_img remove hidden">x</span>
                        <input type="hidden" value="<?php echo $l_nb_question_image;?>">
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="right">
                <?php
                for ($l_nb_question_link = 0; $l_nb_question_link<$l_nb_max_question_images; ++$l_nb_question_link){?>
                    <input class="question_link" type="text" name="question_link_<?php echo $l_nb_question+1;?>_<?php echo $l_nb_question_link+1;?>"
                           placeholder="">
                    <?php
                }
                ?>
            </div>
        </div>

        <?php
        }
        ?>
        <input name="new_crct_form" type="submit" value="Créer le circuit">
    </div>

</form>

<?php
require 'footer.php';
endPage();
?>