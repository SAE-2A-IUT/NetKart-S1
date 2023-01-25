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
            interface_text2: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare ipsum quis nulla tincidunt pulvinar. Proin faucibus ex nunc, nec consequat mi tempus vel. In in eros efficitur, efficitur justo vitae, aliquam diam. Proin dui erat, scelerisque non arcu at, pellentesque luctus mi. Proin quis consectetur diam. Maecenas a viverra mi. Proin interdum cursus eleifend. In tempus libero orci, id interdum ligula cursus eget. Vestibulum at metus nibh. Pellentesque sapien mi, tempus et ipsum sit amet, congue blandit eros. Ut sit amet tortor nec mi sodales consectetur ac et quam. Nam diam urna, tincidunt sed aliquam ut, elementum sed sapien. Nam in odio iaculis, vehicula orci id, blandit nunc. Nunc convallis lacinia tellus at ornare.Etiam sit amet orci commodo, sollicitudin elit id, ullamcorper arcu. Phasellus eleifend ultrices odio. Ut gravida vehicula urna eu viverra. Ut a laoreet risus, at euismod ligula. Nunc pulvinar sollicitudin mauris non varius. In sed dictum arcu. Morbi molestie placerat dolor id feugiat. Sed in velit ipsum. Sed egestas diam vitae pellentesque vehicula. Vestibulum porttitor malesuada lorem eget molestie. Aliquam hendrerit hendrerit purus, non dictum ex mollis sed. Morbi sed euismod ligula. Donec fermentum quis neque sed feugiat. Praesent luctus turpis velit, eget molestie eros rutrum non. Maecenas commodo ornare tincidunt. In faucibus tortor et tincidunt dapibus. Donec non diam sit amet orci eleifend pulvinar. Phasellus vitae nunc at dolor pellentesque accumsan. Duis non sem porta, dignissim mi et, eleifend risus.",
            interface_title3: "Suivez la route de la victoire !",
            interface_text3: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare ipsum quis nulla tincidunt pulvinar. Proin faucibus ex nunc, nec consequat mi tempus vel. In in eros efficitur, efficitur justo vitae, aliquam diam. Proin dui erat, scelerisque non arcu at, pellentesque luctus mi. Proin quis consectetur diam. Maecenas a viverra mi. Proin interdum cursus eleifend. In tempus libero orci, id interdum ligula cursus eget. Vestibulum at metus nibh. Pellentesque sapien mi, tempus et ipsum sit amet, congue blandit eros. Ut sit amet tortor nec mi sodales consectetur ac et quam. Nam diam urna, tincidunt sed aliquam ut, elementum sed sapien. Nam in odio iaculis, vehicula orci id, blandit nunc. Nunc convallis lacinia tellus at ornare.Etiam sit amet orci commodo, sollicitudin elit id, ullamcorper arcu. Phasellus eleifend ultrices odio. Ut gravida vehicula urna eu viverra. Ut a laoreet risus, at euismod ligula. Nunc pulvinar sollicitudin mauris non varius. In sed dictum arcu. Morbi molestie placerat dolor id feugiat. Sed in velit ipsum. Sed egestas diam vitae pellentesque vehicula. Vestibulum porttitor malesuada lorem eget molestie. Aliquam hendrerit hendrerit purus, non dictum ex mollis sed. Morbi sed euismod ligula. Donec fermentum quis neque sed feugiat. Praesent luctus turpis velit, eget molestie eros rutrum non. Maecenas commodo ornare tincidunt. In faucibus tortor et tincidunt dapibus. Donec non diam sit amet orci eleifend pulvinar. Phasellus vitae nunc at dolor pellentesque accumsan. Duis non sem porta, dignissim mi et, eleifend risus.",
            interface_title4: "Augmentez votre score en arrivant premier !",
            interface_text4: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare ipsum quis nulla tincidunt pulvinar. Proin faucibus ex nunc, nec consequat mi tempus vel. In in eros efficitur, efficitur justo vitae, aliquam diam. Proin dui erat, scelerisque non arcu at, pellentesque luctus mi. Proin quis consectetur diam. Maecenas a viverra mi. Proin interdum cursus eleifend. In tempus libero orci, id interdum ligula cursus eget. Vestibulum at metus nibh. Pellentesque sapien mi, tempus et ipsum sit amet, congue blandit eros. Ut sit amet tortor nec mi sodales consectetur ac et quam. Nam diam urna, tincidunt sed aliquam ut, elementum sed sapien. Nam in odio iaculis, vehicula orci id, blandit nunc. Nunc convallis lacinia tellus at ornare.Etiam sit amet orci commodo, sollicitudin elit id, ullamcorper arcu. Phasellus eleifend ultrices odio. Ut gravida vehicula urna eu viverra. Ut a laoreet risus, at euismod ligula. Nunc pulvinar sollicitudin mauris non varius. In sed dictum arcu. Morbi molestie placerat dolor id feugiat. Sed in velit ipsum. Sed egestas diam vitae pellentesque vehicula. Vestibulum porttitor malesuada lorem eget molestie. Aliquam hendrerit hendrerit purus, non dictum ex mollis sed. Morbi sed euismod ligula. Donec fermentum quis neque sed feugiat. Praesent luctus turpis velit, eget molestie eros rutrum non. Maecenas commodo ornare tincidunt. In faucibus tortor et tincidunt dapibus. Donec non diam sit amet orci eleifend pulvinar. Phasellus vitae nunc at dolor pellentesque accumsan. Duis non sem porta, dignissim mi et, eleifend risus.",
            interface_title5: "Il existe d'autres commandes",
            interface_text5: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare ipsum quis nulla tincidunt pulvinar. Proin faucibus ex nunc, nec consequat mi tempus vel. In in eros efficitur, efficitur justo vitae, aliquam diam. Proin dui erat, scelerisque non arcu at, pellentesque luctus mi. Proin quis consectetur diam. Maecenas a viverra mi. Proin interdum cursus eleifend. In tempus libero orci, id interdum ligula cursus eget. Vestibulum at metus nibh. Pellentesque sapien mi, tempus et ipsum sit amet, congue blandit eros. Ut sit amet tortor nec mi sodales consectetur ac et quam. Nam diam urna, tincidunt sed aliquam ut, elementum sed sapien. Nam in odio iaculis, vehicula orci id, blandit nunc. Nunc convallis lacinia tellus at ornare.Etiam sit amet orci commodo, sollicitudin elit id, ullamcorper arcu. Phasellus eleifend ultrices odio. Ut gravida vehicula urna eu viverra. Ut a laoreet risus, at euismod ligula. Nunc pulvinar sollicitudin mauris non varius. In sed dictum arcu. Morbi molestie placerat dolor id feugiat. Sed in velit ipsum. Sed egestas diam vitae pellentesque vehicula. Vestibulum porttitor malesuada lorem eget molestie. Aliquam hendrerit hendrerit purus, non dictum ex mollis sed. Morbi sed euismod ligula. Donec fermentum quis neque sed feugiat. Praesent luctus turpis velit, eget molestie eros rutrum non. Maecenas commodo ornare tincidunt. In faucibus tortor et tincidunt dapibus. Donec non diam sit amet orci eleifend pulvinar. Phasellus vitae nunc at dolor pellentesque accumsan. Duis non sem porta, dignissim mi et, eleifend risus."
        },
        eng: {
            main_title: "Game Rules",
            title2: "Netkart utilisation guide",
            interface_title: "Interface du serious Game",
            interface_text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare ipsum quis nulla tincidunt pulvinar. Proin faucibus ex nunc, nec consequat mi tempus vel. In in eros efficitur, efficitur justo vitae, aliquam diam. Proin dui erat, scelerisque non arcu at, pellentesque luctus mi. Proin quis consectetur diam. Maecenas a viverra mi. Proin interdum cursus eleifend. In tempus libero orci, id interdum ligula cursus eget. Vestibulum at metus nibh. Pellentesque sapien mi, tempus et ipsum sit amet, congue blandit eros. Ut sit amet tortor nec mi sodales consectetur ac et quam. Nam diam urna, tincidunt sed aliquam ut, elementum sed sapien. Nam in odio iaculis, vehicula orci id, blandit nunc. Nunc convallis lacinia tellus at ornare.Etiam sit amet orci commodo, sollicitudin elit id, ullamcorper arcu. Phasellus eleifend ultrices odio. Ut gravida vehicula urna eu viverra. Ut a laoreet risus, at euismod ligula. Nunc pulvinar sollicitudin mauris non varius. In sed dictum arcu. Morbi molestie placerat dolor id feugiat. Sed in velit ipsum. Sed egestas diam vitae pellentesque vehicula. Vestibulum porttitor malesuada lorem eget molestie. Aliquam hendrerit hendrerit purus, non dictum ex mollis sed. Morbi sed euismod ligula. Donec fermentum quis neque sed feugiat. Praesent luctus turpis velit, eget molestie eros rutrum non. Maecenas commodo ornare tincidunt. In faucibus tortor et tincidunt dapibus. Donec non diam sit amet orci eleifend pulvinar. Phasellus vitae nunc at dolor pellentesque accumsan. Duis non sem porta, dignissim mi et, eleifend risus.",
            interface_title2: "S'aider d'image !",
            interface_text2: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare ipsum quis nulla tincidunt pulvinar. Proin faucibus ex nunc, nec consequat mi tempus vel. In in eros efficitur, efficitur justo vitae, aliquam diam. Proin dui erat, scelerisque non arcu at, pellentesque luctus mi. Proin quis consectetur diam. Maecenas a viverra mi. Proin interdum cursus eleifend. In tempus libero orci, id interdum ligula cursus eget. Vestibulum at metus nibh. Pellentesque sapien mi, tempus et ipsum sit amet, congue blandit eros. Ut sit amet tortor nec mi sodales consectetur ac et quam. Nam diam urna, tincidunt sed aliquam ut, elementum sed sapien. Nam in odio iaculis, vehicula orci id, blandit nunc. Nunc convallis lacinia tellus at ornare.Etiam sit amet orci commodo, sollicitudin elit id, ullamcorper arcu. Phasellus eleifend ultrices odio. Ut gravida vehicula urna eu viverra. Ut a laoreet risus, at euismod ligula. Nunc pulvinar sollicitudin mauris non varius. In sed dictum arcu. Morbi molestie placerat dolor id feugiat. Sed in velit ipsum. Sed egestas diam vitae pellentesque vehicula. Vestibulum porttitor malesuada lorem eget molestie. Aliquam hendrerit hendrerit purus, non dictum ex mollis sed. Morbi sed euismod ligula. Donec fermentum quis neque sed feugiat. Praesent luctus turpis velit, eget molestie eros rutrum non. Maecenas commodo ornare tincidunt. In faucibus tortor et tincidunt dapibus. Donec non diam sit amet orci eleifend pulvinar. Phasellus vitae nunc at dolor pellentesque accumsan. Duis non sem porta, dignissim mi et, eleifend risus.",
            interface_title3: "Interface du serious Game",
            interface_text3: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare ipsum quis nulla tincidunt pulvinar. Proin faucibus ex nunc, nec consequat mi tempus vel. In in eros efficitur, efficitur justo vitae, aliquam diam. Proin dui erat, scelerisque non arcu at, pellentesque luctus mi. Proin quis consectetur diam. Maecenas a viverra mi. Proin interdum cursus eleifend. In tempus libero orci, id interdum ligula cursus eget. Vestibulum at metus nibh. Pellentesque sapien mi, tempus et ipsum sit amet, congue blandit eros. Ut sit amet tortor nec mi sodales consectetur ac et quam. Nam diam urna, tincidunt sed aliquam ut, elementum sed sapien. Nam in odio iaculis, vehicula orci id, blandit nunc. Nunc convallis lacinia tellus at ornare.Etiam sit amet orci commodo, sollicitudin elit id, ullamcorper arcu. Phasellus eleifend ultrices odio. Ut gravida vehicula urna eu viverra. Ut a laoreet risus, at euismod ligula. Nunc pulvinar sollicitudin mauris non varius. In sed dictum arcu. Morbi molestie placerat dolor id feugiat. Sed in velit ipsum. Sed egestas diam vitae pellentesque vehicula. Vestibulum porttitor malesuada lorem eget molestie. Aliquam hendrerit hendrerit purus, non dictum ex mollis sed. Morbi sed euismod ligula. Donec fermentum quis neque sed feugiat. Praesent luctus turpis velit, eget molestie eros rutrum non. Maecenas commodo ornare tincidunt. In faucibus tortor et tincidunt dapibus. Donec non diam sit amet orci eleifend pulvinar. Phasellus vitae nunc at dolor pellentesque accumsan. Duis non sem porta, dignissim mi et, eleifend risus.",
            interface_title4: "Interface du serious Game",
            interface_text4: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare ipsum quis nulla tincidunt pulvinar. Proin faucibus ex nunc, nec consequat mi tempus vel. In in eros efficitur, efficitur justo vitae, aliquam diam. Proin dui erat, scelerisque non arcu at, pellentesque luctus mi. Proin quis consectetur diam. Maecenas a viverra mi. Proin interdum cursus eleifend. In tempus libero orci, id interdum ligula cursus eget. Vestibulum at metus nibh. Pellentesque sapien mi, tempus et ipsum sit amet, congue blandit eros. Ut sit amet tortor nec mi sodales consectetur ac et quam. Nam diam urna, tincidunt sed aliquam ut, elementum sed sapien. Nam in odio iaculis, vehicula orci id, blandit nunc. Nunc convallis lacinia tellus at ornare.Etiam sit amet orci commodo, sollicitudin elit id, ullamcorper arcu. Phasellus eleifend ultrices odio. Ut gravida vehicula urna eu viverra. Ut a laoreet risus, at euismod ligula. Nunc pulvinar sollicitudin mauris non varius. In sed dictum arcu. Morbi molestie placerat dolor id feugiat. Sed in velit ipsum. Sed egestas diam vitae pellentesque vehicula. Vestibulum porttitor malesuada lorem eget molestie. Aliquam hendrerit hendrerit purus, non dictum ex mollis sed. Morbi sed euismod ligula. Donec fermentum quis neque sed feugiat. Praesent luctus turpis velit, eget molestie eros rutrum non. Maecenas commodo ornare tincidunt. In faucibus tortor et tincidunt dapibus. Donec non diam sit amet orci eleifend pulvinar. Phasellus vitae nunc at dolor pellentesque accumsan. Duis non sem porta, dignissim mi et, eleifend risus.",
            interface_title5: "Interface du serious Game",
            interface_text5: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare ipsum quis nulla tincidunt pulvinar. Proin faucibus ex nunc, nec consequat mi tempus vel. In in eros efficitur, efficitur justo vitae, aliquam diam. Proin dui erat, scelerisque non arcu at, pellentesque luctus mi. Proin quis consectetur diam. Maecenas a viverra mi. Proin interdum cursus eleifend. In tempus libero orci, id interdum ligula cursus eget. Vestibulum at metus nibh. Pellentesque sapien mi, tempus et ipsum sit amet, congue blandit eros. Ut sit amet tortor nec mi sodales consectetur ac et quam. Nam diam urna, tincidunt sed aliquam ut, elementum sed sapien. Nam in odio iaculis, vehicula orci id, blandit nunc. Nunc convallis lacinia tellus at ornare.Etiam sit amet orci commodo, sollicitudin elit id, ullamcorper arcu. Phasellus eleifend ultrices odio. Ut gravida vehicula urna eu viverra. Ut a laoreet risus, at euismod ligula. Nunc pulvinar sollicitudin mauris non varius. In sed dictum arcu. Morbi molestie placerat dolor id feugiat. Sed in velit ipsum. Sed egestas diam vitae pellentesque vehicula. Vestibulum porttitor malesuada lorem eget molestie. Aliquam hendrerit hendrerit purus, non dictum ex mollis sed. Morbi sed euismod ligula. Donec fermentum quis neque sed feugiat. Praesent luctus turpis velit, eget molestie eros rutrum non. Maecenas commodo ornare tincidunt. In faucibus tortor et tincidunt dapibus. Donec non diam sit amet orci eleifend pulvinar. Phasellus vitae nunc at dolor pellentesque accumsan. Duis non sem porta, dignissim mi et, eleifend risus."
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
