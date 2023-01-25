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
    <div class="images">
        <img src="../assets/image/rules_exemple_image.png" alt="zoli sircui 1">
        <img src="../assets/image/rules_exemple_image.png" alt="ancor plu zoli sircuit">
    </div>
    <h1 id="interface_title"></h1>
    <p id="interface_text"></p>
</div>



<script>
    //use to create new texts for each language
    var language = {
        fr: {
            main_title: "Règles du jeu",
            title2: "Guide d'utilisation de Netkart",
            interface_title: "Interface du serious Game",
            interface_text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare ipsum quis nulla tincidunt pulvinar. Proin faucibus ex nunc, nec consequat mi tempus vel. In in eros efficitur, efficitur justo vitae, aliquam diam. Proin dui erat, scelerisque non arcu at, pellentesque luctus mi. Proin quis consectetur diam. Maecenas a viverra mi. Proin interdum cursus eleifend. In tempus libero orci, id interdum ligula cursus eget. Vestibulum at metus nibh. Pellentesque sapien mi, tempus et ipsum sit amet, congue blandit eros. Ut sit amet tortor nec mi sodales consectetur ac et quam. Nam diam urna, tincidunt sed aliquam ut, elementum sed sapien. Nam in odio iaculis, vehicula orci id, blandit nunc. Nunc convallis lacinia tellus at ornare.Etiam sit amet orci commodo, sollicitudin elit id, ullamcorper arcu. Phasellus eleifend ultrices odio. Ut gravida vehicula urna eu viverra. Ut a laoreet risus, at euismod ligula. Nunc pulvinar sollicitudin mauris non varius. In sed dictum arcu. Morbi molestie placerat dolor id feugiat. Sed in velit ipsum. Sed egestas diam vitae pellentesque vehicula. Vestibulum porttitor malesuada lorem eget molestie. Aliquam hendrerit hendrerit purus, non dictum ex mollis sed. Morbi sed euismod ligula. Donec fermentum quis neque sed feugiat. Praesent luctus turpis velit, eget molestie eros rutrum non. Maecenas commodo ornare tincidunt. In faucibus tortor et tincidunt dapibus. Donec non diam sit amet orci eleifend pulvinar. Phasellus vitae nunc at dolor pellentesque accumsan. Duis non sem porta, dignissim mi et, eleifend risus."
        },
        eng: {
            main_title: "Game Rules",
            title2: "Netkart utilisation guide",
            interface_title: "Game interface",
            interface_text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare ipsum quis nulla tincidunt pulvinar. Proin faucibus ex nunc, nec consequat mi tempus vel. In in eros efficitur, efficitur justo vitae, aliquam diam. Proin dui erat, scelerisque non arcu at, pellentesque luctus mi. Proin quis consectetur diam. Maecenas a viverra mi. Proin interdum cursus eleifend. In tempus libero orci, id interdum ligula cursus eget. Vestibulum at metus nibh. Pellentesque sapien mi, tempus et ipsum sit amet, congue blandit eros. Ut sit amet tortor nec mi sodales consectetur ac et quam. Nam diam urna, tincidunt sed aliquam ut, elementum sed sapien. Nam in odio iaculis, vehicula orci id, blandit nunc. Nunc convallis lacinia tellus at ornare.Etiam sit amet orci commodo, sollicitudin elit id, ullamcorper arcu. Phasellus eleifend ultrices odio. Ut gravida vehicula urna eu viverra. Ut a laoreet risus, at euismod ligula. Nunc pulvinar sollicitudin mauris non varius. In sed dictum arcu. Morbi molestie placerat dolor id feugiat. Sed in velit ipsum. Sed egestas diam vitae pellentesque vehicula. Vestibulum porttitor malesuada lorem eget molestie. Aliquam hendrerit hendrerit purus, non dictum ex mollis sed. Morbi sed euismod ligula. Donec fermentum quis neque sed feugiat. Praesent luctus turpis velit, eget molestie eros rutrum non. Maecenas commodo ornare tincidunt. In faucibus tortor et tincidunt dapibus. Donec non diam sit amet orci eleifend pulvinar. Phasellus vitae nunc at dolor pellentesque accumsan. Duis non sem porta, dignissim mi et, eleifend risus."
        },
    };

    //set the previously created text in the good places
    if (window.location.hash) {
        if (window.location.hash === "#fr") {
            Title.textContent = language.fr.main_title;
            Title2.textContent = language.fr.title2;
            interface_title.textContent = language.fr.interface_title;
            interface_text.textContent = language.fr.interface_text;
        }
        else if (window.location.hash === "#eng") {
            Title.textContent = language.eng.main_title;
            Title2.textContent = language.eng.title2;
            interface_title.textContent = language.eng.interface_title;
            interface_text.textContent = language.eng.interface_text;

        }
    }
</script>
<?php
require '../pages/footer.php';
endPage();
?>
