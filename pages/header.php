<?php
/** @file /pages/header.php
 *
 * @details File that generate the header of other pages
 *
 * @author SAE S3 NetKart
 */

session_start();

require 'constants.php';


/**
 * Construit un header personnalisé en plus de lier des pages styles et javascript personnalisés
 * @param $A_TITLE
 * @param $A_CSS_NAME
 * @param $A_JS_SCRIPT
 * @param $A_CONNECTED
 * @return void
 */
function startPage($A_TITLE, $A_CSS_NAME, $A_JS_SCRIPT){
session_start();
?>
<!-- Header connected -->
<?php if (isset($_SESSION['id_user'])){?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Serious Game pour comprendre les réseaux informatiques">
    <meta name="keywords" content="serious game network">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> <?php echo $A_TITLE;?> </title>
    <link rel="icon" type="image/x-icon" href="<?php echo K_IMAGE?>icon.ico">
    <link rel="stylesheet" href="<?php echo K_STYLE?>header_and_footer.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php
    //stylesheet
    foreach($A_CSS_NAME as $l_stylesheet){?>
        <link rel="stylesheet" href="<?php echo $l_stylesheet; ?>.css" type="text/css">
        <?php
    }
    //script
    foreach($A_JS_SCRIPT as $l_script){?>
        <script src="<?php echo $l_script; ?>.js"></script>
        <?php
    }
    ?>
</head>

<body>
<header>
</header>

<div class="header">
    <div class="header-left">
        <a href="homepage.php"><img src="<?php echo K_IMAGE?>icon_black_small.png" alt="logo" width="90em"></a>
    </div>
    <div class="header-right">
        <div>
        <a class="active" href="homepage.php">ACCUEIL</a>
        </div>
        <div>
        <a href="themes.php">THÈMES</a>
        </div>
        <div>
        <a href="rules.php">RÈGLES DU JEU</a>
        </div>
        <div>
            <a href="#mes-circuits">NOUVELLE SESSION</a>
        </div>
        <div>
            <a href="#mes-circuits">MES CIRCUITS</a>
        </div>
        <div>
            <a href="user.php">PROFIL</a>
        </div>
        <div>
        <form method="post" action="#" enctype="text/plain" style="display: flex; flex-direction: row">
            <input type="text" placeholder="Code multijoueur" required class="input-header">
            <input type="submit" value="OK" class="submit-header">
        </form>
        </div>
        <div>
        <a href="connection.php" class="hbutton">DECONNEXION</a>
        </div>
    </div>
</div>

<?php
}
else {
?>
<!-- Header disconnected -->
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Serious Game pour comprendre les réseaux informatiques">
    <meta name="keywords" content="serious game network">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> <?php echo $A_TITLE;?> </title>
    <link rel="icon" type="image/x-icon" href="<?php echo K_IMAGE?>icon.ico">
    <link rel="stylesheet" href="<?php echo K_STYLE?>header_and_footer.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <?php
    //stylesheet
    foreach($A_CSS_NAME as $l_stylesheet){?>
        <link rel="stylesheet" href="<?php echo $l_stylesheet; ?>.css" type="text/css">
        <?php
    }
    //script
    foreach($A_JS_SCRIPT as $l_script){?>
        <script src="<?php echo $l_script; ?>.js"></script>
        <?php
    }
    ?>
</head>

<body>
<header>
</header>

<div class="header">
    <div class="header-left">
        <a href="homepage.php"><img src="<?php echo K_IMAGE?>icon_black_small.png" alt="logo" width="90em"></a>
    </div>
    <div class="header-right">
        <div>
            <a class="active" href="homepage.php">ACCUEIL</a>
        </div>
        <div>
            <a href="themes.php">THÈMES</a>
        </div>
        <div>
            <a href="rules.php">RÈGLES DU JEU</a>
        </div>
        <div>
            <form method="post" action="#" enctype="text/plain" style="display: flex; flex-direction: row">
                <input type="text" placeholder="Code multijoueur" required class="input-header">
                <input type="submit" value="OK" class="submit-header">
            </form>
        </div>
        <div>
            <a href="connection.php" class="hbutton">CONNEXION</a>
        </div>
    </div>
</div>
<?php
}}
?>

