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
        <img src="../assets/image/rules1.webp" id="image-rules1" alt="zoli imaze">
    </div>
    <p id="interface_text"></p>

    <h3 id="interface_title2"></h3>
    <div class="images">
        <img src="../assets/image/rules2.webp" id="image-rules2" alt="zoli imaze">
    </div>
    <p id="interface_text2"></p>

    <h3 id="interface_title3"></h3>
    <div class="images">
        <img src="../assets/image/rules3.webp" id="image-rules3" alt="zoli imaze">
        <img src="../assets/image/rules4.webp" id="image-rules4" alt="zoli imaze">
    </div>
    <p id="interface_text3"></p>

    <h3 id="interface_title4"></h3>
    <div class="images">
        <img src="../assets/image/rules.webp" id="image-rules5" alt="zoli imaze">
        <img src="../assets/image/rules6.webp" id="image-rules6" alt="zoli imaze">
    </div>
    <p id="interface_text4"></p>

    <h3 id="interface_title5"></h3>
    <div class="images">
        <img src="../assets/image/rules5.webp" id="image-rules7" alt="zoli imaze">
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
            interface_text5: "Il existe aussi d'autres commandes tel que « clear » et « help ». La commande clear permet de vider entièrement l'historique de commande saisies auparavant. La commande help permet de connaitre les commandes existantes ainsi que leurs utilités.",
        },
        en: {
            main_title: "Game rules",
            title2: "Netkart usage guide",
            interface_title: "Circuit interface (Game)",
            interface_text: "The game is made of four main blocks<br><ol><li>This part consists of the circuit name, image (between 0 and 3), instructions and current question. This block is updated whenever the question changes and contains all the information needed to finish the circuit.</li><li>This block contains the terminal in which the player must enter answers to the questions as typing commands in a real terminal. When an answer is entered, it is checked and a text is displayed in return to indicate whether the answer is correct.</li><li>The player can receive help when completing some questions. There may be between 0 and three clues which, when clicked, can redirect to an external help page for NetKart.</li><li>The circuit allows us to follow the remaining time by observing the progress of the enemy, but also to follow the progress of the user. A flag can be observed, it represents the starting point but also the finish line.</li></ol>",
            interface_title2: "Use images to get help",
            interface_text2: "Some circuits will give you the possibility to answer the questions by giving images to illustrate. To see those images more clearly, you can hover over an image to display it larger in the middle of the screen.",
            interface_title3: "Follow the path to victory!",
            interface_text3: "Here is an example of a question, each circuit consists of 3 questions.<br>When you press 'enter' after giving an answer in the terminal, your answer is checked and the previous answers entered appear above the latest. After several attempts, you will still have the possibility to see your previous answers thanks to a vertical scroll bar.<br>After entering a correct answer, the next question will be displayed with its instruction, images, and links if there are any. Moreover, the user's character will make two moves out of the six that he has to make in total in order to reach the finish line.",
            interface_title4: "Increase your score by coming first!",
            interface_text4: "When the player reaches the finish line, he wins the game and his score increases.<br>It is possible to return to the themes selection by pressing the back button. The restart button allows you to restart the current circuit.<br>You only earn points on the first victory on each circuit.",
            interface_title5: "There are other commands",
            interface_text5: "There are also other commands such as 'clear' and 'help'. The clear command allows you to completely clear the command history entered previously. The help command allows you to know the existing commands and their uses.",
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
            interface_text5.textContent = language.fr.interface_text5;
        }
        else if (window.location.hash === "#eng") {
            Title.textContent = language.en.main_title;
            Title2.textContent = language.en.title2;
            interface_title.innerHTML = language.en.interface_title;
            interface_text.innerHTML = language.en.interface_text;
            interface_title2.innerHTML = language.en.interface_title2;
            interface_text2.innerHTML = language.en.interface_text2;
            interface_title3.innerHTML = language.en.interface_title3;
            interface_text3.innerHTML = language.en.interface_text3;
            interface_title4.innerHTML = language.en.interface_title4;
            interface_text4.innerHTML = language.en.interface_text4;
            interface_title5.innerHTML = language.en.interface_title5;
            interface_text5.textContent = language.en.interface_text5;

        }
    }
</script>
<?php
require '../pages/footer.php';
endPage();
?>
