var l_number_theme_showed = 0;

/**
 * Display or hide the selected themes circuits.
 *
 * @param theme (String) Theme name.
 */
function show_theme(theme) {
    //remove the "circuit_" from the theme name
    const theme_id = theme.id.slice(8);
    const form = document.getElementsByClassName("joue_div");
    for(const element of form){
        //remove the "circuit_id_" from the theme name
        if(element.id.slice(11) === theme_id) {
            if (element.style.display === "block") {
                element.style.display = "none";
                theme.style.background = "var(--light-grey)";
                theme.style.border = "none";
                l_number_theme_showed--;
            } else {
                element.style.display = "block";
                theme.style.background = "var(--half-light-grey)";
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
