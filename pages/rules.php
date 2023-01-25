<?php
/** @file /pages/homepage.php
 *
 * @details File displaying rules of the game
 *
 * @author SAE S3 NetKart
 */

require ('header.php');
session_start();
startPage("Contact",["../assets/style/main", "../assets/style/rules"],[]);
?>
<script>
    function change_language_check_box(checkbox)
    {
        if (checkbox.checked)
        {
            if (location.hash==="#eng")
            {

                change_language("fr")
            }
        }
        else
        {
            change_language("eng")
        }
    }
    function change_language(lang) {
        location.hash = lang;
        location.reload();
    }
    if (location.hash === "") {
        change_language("fr")
    }
</script>
<div class="change_lang">
    <h6>English</h6>
    <label class="switch">
        <script>
            if (location.hash==="#fr")
            {
                document.write('<input type="checkbox" name="change_language" onclick="change_language_check_box(this)" checked>');
            }
            else
            {
                document.write('<input type="checkbox" name="change_language" onclick="change_language_check_box(this)">');
            }
        </script>
        <span class="slider round"></span>
    </label>
    <h6>Français</h6>
</div>

<!-- create the placeholders for the language related text (use id to set the text inside) -->
<div class="content">
    <h1 id="Title"></h1>
    <h2 id="Title2"></h2>

    <h3 id="interface_title"></h3>
    <div class="images">
        <img src="../assets/image/rules1.png" id="image-rules1" alt="zoli imaze">
    </div>
    <p id="interface_text"></p>

    <h3 id="interface_title2"></h3>
    <div class="images">
        <img src="../assets/image/rules2.png" id="image-rules2" alt="zoli imaze">
    </div>
    <p id="interface_text2"></p>

    <h3 id="interface_title3"></h3>
    <div class="images">
        <img src="../assets/image/rules3.png" id="image-rules3" alt="zoli imaze">
        <img src="../assets/image/rules4.png" id="image-rules4" alt="zoli imaze">
    </div>
    <p id="interface_text3"></p>

    <h3 id="interface_title4"></h3>
    <div class="images">
        <img src="../assets/image/rules.png" id="image-rules5" alt="zoli imaze">
        <img src="../assets/image/rules6.png" id="image-rules6" alt="zoli imaze">
    </div>
    <p id="interface_text4"></p>

    <h3 id="interface_title5"></h3>
    <div class="images">
        <img src="../assets/image/rules5.png" id="image-rules7" alt="zoli imaze">
    </div>
    <p id="interface_text5"></p>
</div>

<script>
    //use to create new texts for each language
    var language = {
        fr: {
            main_title: "Règles du jeu",
            title2: "Guide d'utilisation de Netkart",
            interface_title: "Interface d'un circuit (Partie)",
            interface_text: "Le jeu se présente sous la forme de quatre blocs principaux<br><ol><li>Cette partie est composée du nom du circuit, d'image (entre 0 et 3), de la consigne et de la question actuelle. Ce bloc est mis à jour à chaque changement de question et contient toute l'information nécessaire a la réussite d'un circuit.</li><li>Ce bloc contient le terminal dans lequel le joueur doit saisir les réponses aux questions de la même manière qu'il est possible de taper des commandes dans un réel terminal. Lors de la saisie d'une réponse celle-ci est vérifiée et un texte s'affiche en retour pour indiquer si la réponse est juste.</li><li>Le joueur peut bénéficier d'aide lorsqu'il réalise certaines questions. Il peut y avoir entre 0 et trois indices qui lorsqu'ils seront cliqués pourront rediriger vers une page d'aide externe a NetKart.</li><li>Le circuit nous permet de suivre le temps restant en observant l'avancée de l'ennemi, mais aussi de suivre l'avancée de l'utilisateur. On peut y observer un drapeau, celui-ci représente le point de départ mais aussi le point d'arrivée.</li></ol>",
            interface_title2: "Aidez vous d'image",
            interface_text2: "Sur certains circuits, vous aurez la possibilité de réaliser vos questions avec l’aide d’images mis a votre disposition. Afin de mieux les observer, vous pouvez survoler une image afin de l’afficher en plus grand au milieu de l’écran.",
            interface_title3: "Suivez la route de la victoire !",
            interface_text3: "Voici un exemple de question, chaque circuit est composé de 3 questions.<br>Lorsque vous appuyez sur « entrée » après avoir saisi une réponse dans le terminal, votre réponse et vérifiée et les anciennes réponses saisies apparaissent au-dessus des dernières. Après plusieurs tentatives vous aurez tout de même la possibilité de voir vos ancienne réponse grâce à une barre de scroll vertical.<br>Après avoir saisi une bonne réponse, la question suivante va s'afficher avec sa consigne, ses images et ses liens s'il y en a. De plus, le personnage de l'utilisateur va réaliser deux mouvements sur les six qu'il a réaliser au total afin d'atteindre la ligne d'arrivée.",
            interface_title4: "Augmentez votre score en arrivant premier !",
            interface_text4: "Lorsque le joueur atteint la ligne d'arrivée, il remporte la partie et son score augmente.<br>Il est possible de retourner au choix des thèmes en appuyant sur le bouton retour. Le bouton recommencer permet de recommencer le circuit actuel.<br>Vous ne remportez les points que lors de la première victoire sur chaque circuit.",
            interface_title5: "Il existe d'autres commandes",
            interface_text5: "Il existe aussi d'autres commandes tel que « clear » et « help ».<br>La commande clear permet de vider entièrement l'historique de commande saisies auparavant.<br>La commande help permet de connaitre les commandes existantes ainsi que leurs utilités."
        },
        eng: {
            main_title: "Game Rules",
            title2: "Netkart utilisation guide",
            interface_title: "Interface d'un circuit (Partie)",
            interface_text: "Le jeu se présente sous la forme de quatre blocs principaux<br><ol><li>Cette partie est composée du nom du circuit, d'image (entre 0 et 3), de la consigne et de la question actuelle. Ce bloc est mis à jour à chaque changement de question et contient toute l'information nécessaire a la réussite d'un circuit.</li><li>Ce bloc contient le terminal dans lequel le joueur doit saisir les réponses aux questions de la même manière qu'il est possible de taper des commandes dans un réel terminal. Lors de la saisie d'une réponse celle-ci est vérifiée et un texte s'affiche en retour pour indiquer si la réponse est juste.</li><li>Le joueur peut bénéficier d'aide lorsqu'il réalise certaines questions. Il peut y avoir entre 0 et trois indices qui lorsqu'ils seront cliqués pourront rediriger vers une page d'aide externe a NetKart.</li><li>Le circuit nous permet de suivre le temps restant en observant l'avancée de l'ennemi, mais aussi de suivre l'avancée de l'utilisateur. On peut y observer un drapeau, celui-ci représente le point de départ mais aussi le point d'arrivée.</li></ol>",
            interface_title2: "Aidez vous d'image",
            interface_text2: "Sur certains circuits, vous aurez la possibilité de réaliser vos questions avec l’aide d’images mis a votre disposition. Afin de mieux les observer, vous pouvez survoler une image afin de l’afficher en plus grand au milieu de l’écran.",
            interface_title3: "Suivez la route de la victoire !",
            interface_text3: "Voici un exemple de question, chaque circuit est composé de 3 questions.<br>Lorsque vous appuyez sur « entrée » après avoir saisi une réponse dans le terminal, votre réponse et vérifiée et les anciennes réponses saisies apparaissent au-dessus des dernières. Après plusieurs tentatives vous aurez tout de même la possibilité de voir vos ancienne réponse grâce à une barre de scroll vertical.<br>Après avoir saisi une bonne réponse, la question suivante va s'afficher avec sa consigne, ses images et ses liens s'il y en a. De plus, le personnage de l'utilisateur va réaliser deux mouvements sur les six qu'il a réaliser au total afin d'atteindre la ligne d'arrivée.",
            interface_title4: "Augmentez votre score en arrivant premier !",
            interface_text4: "Lorsque le joueur atteint la ligne d'arrivée, il remporte la partie et son score augmente.<br>Il est possible de retourner au choix des thèmes en appuyant sur le bouton retour. Le bouton recommencer permet de recommencer le circuit actuel.<br>Vous ne remportez les points que lors de la première victoire sur chaque circuit.",
            interface_title5: "Il existe d'autres commandes",
            interface_text5: "Il existe aussi d'autres commandes tel que « clear » et « help ».<br>La commande clear permet de vider entièrement l'historique de commande saisies auparavant.<br>La commande help permet de connaitre les commandes existantes ainsi que leurs utilités."
        },
    };

    //set the previously created text in the good places
    if (window.location.hash) {
        if (window.location.hash === "#fr") {
            Title.innerHTML = language.fr.main_title;
            Title2.innerHTML = language.fr.title2;
            interface_title.innerHTML = language.fr.interface_title;
            interface_text.innerHTML = language.fr.interface_text;
            interface_title2.innerHTML = language.fr.interface_title2;
            interface_text2.innerHTML = language.fr.interface_text2;
            interface_title3.innerHTML = language.fr.interface_title3;
            interface_text3.innerHTML = language.fr.interface_text3;
            interface_title4.innerHTML = language.fr.interface_title4;
            interface_text4.innerHTML = language.fr.interface_text4;
            interface_title5.innerHTML = language.fr.interface_title5;
            interface_text5.innerHTML = language.fr.interface_text5;
        }
        else if (window.location.hash === "#eng") {
            Title.textContent = language.eng.main_title;
            Title2.textContent = language.eng.title2;
            interface_title.textContent = language.eng.interface_title;
            interface_text.textContent = language.eng.interface_text;
            interface_title2.textContent = language.eng.interface_title2;
            interface_text2.textContent = language.eng.interface_text2;
            interface_title3.textContent = language.eng.interface_title3;
            interface_text3.textContent = language.eng.interface_text3;
            interface_title4.textContent = language.eng.interface_title4;
            interface_text4.textContent = language.eng.interface_text4;
            interface_title5.textContent = language.eng.interface_title5;
            interface_text5.textContent = language.eng.interface_text5;

        }
    }
</script>
<?php
require '../pages/footer.php';
endPage();
?>
