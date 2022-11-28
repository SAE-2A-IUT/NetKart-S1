var l_number_theme_showed = 0;
function show_theme(theme) {

    document.querySelectorAll("." + theme).forEach(test => {
        if (test.style.display === "none" || test.style.display === "") {
            test.style.display = "block";
            document.getElementById(theme).style.backgroundColor = '#8D8D8D';
            l_number_theme_showed ++;
        }
        else if (test.style.display === "block") {
            test.style.display = "none";
            document.getElementById(theme).style.backgroundColor = '#EBEBEB';
            l_number_theme_showed --;
        }
        if (l_number_theme_showed===0) {
            document.getElementById('waiting').style.display = 'block';
        }
        else {
            document.getElementById('waiting').style.display = 'none';
        }
    });
}
