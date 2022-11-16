<?php
require 'pages/constants.php';
function startPage($title, $css_name, $js_script){
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Serious Game pour comprendre les réseaux informatiques">
    <meta name="keywords" content="serious game network">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> <?php echo $title;?> </title>
    <link rel="icon" type="image/x-icon" href="<?php echo K_IMAGE?>icon.ico">
    <link rel="stylesheet" href="<?php echo K_STYLE?>header_and_footer.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php
    //stylesheet
    foreach($css_name as $stylesheet){?>
        <link rel="stylesheet" href="<?php echo $stylesheet; ?>.css" type="text/css">
        <?php
    }
    //script
    foreach($js_script as $script){?>
        <script src="<?php echo $script; ?>.js"></script>
        <?php
    }
    ?>
</head>

<body>
<header>
</header>

<div class="header">
    <div>
        <a href="#default"><img src="<?php echo K_IMAGE?>icon_black_small.png " alt="logo" width="90em"></a>
    <div class="header-left">
        <a href="#default"><img src="./assets/image/icon_black_small.png " alt="logo" width="90em"></a>
    </div>
    <div class="header-right">
        <div>
        <a class="active" href="#home">ACCUEIL</a>
        </div>
        <div>
        <a href="#contact">THÈMES</a>
        </div>
        <div>
        <a href="#about">RÈGLES DU JEU</a>
        </div>
        <div>
        <form method="post" action="#" enctype="text/plain" style="display: flex; flex-direction: row">
            <input type="text" placeholder="Code multijoueur" required class="input-header">
            <input type="submit" value="OK" class="submit-header">
        </form>
        </div>
        <div>
        <a href="#connection" class="hbutton">CONNEXION</a>
        </div>
    </div>
</div>


<!-- TODO : add a button go back on top of the page-->
<?php
}?>
