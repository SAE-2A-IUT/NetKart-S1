var l_number_theme_showed = 0;

/**
 * Display or hide the selected themes circuits.
 *
 * @param theme (String) Theme name.
 */
function show_theme(theme) {
    const theme_id = theme.id.slice(8);
    const form = document.getElementById("circuit_form");
    const buttons_form = form.getElementsByTagName("button");
    for(const button of buttons_form){
        if(button.name.slice(11) == theme_id) {
            if (button.style.display == "block") {
                button.style.display = "none";
                l_number_theme_showed--;
            } else {
                button.style.display = "block";
                l_number_theme_showed++;
            }
        }
    }

    if (l_number_theme_showed===0) {
        document.getElementById('waiting').style.display = 'block';
    }
    else {
        document.getElementById('waiting').style.display = 'none';
    }
}
