function openConnection(selectedButton) {
    var i;
    var x = document.getElementsByClassName("connection-form");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    document.getElementById(selectedButton).style.display = "flex";

    if (selectedButton.EQUAL("connection")){
        document.getElementById("button-connection").style.color = "var(--black)";
        document.getElementById("button-register").style.color = "var(--grey)";
    }
    else{
        document.getElementById("button-register").style.color = "var(--black)";
        document.getElementById("button-connection").style.color = "var(--grey)";
    }

}