function moveImage(imageId, coordinates, status) {
    if (coordinates.length === 0) {
        return; // sortir de la fonction si la liste est vide
    }

    // Récupérer l'élément image
    let image = document.getElementById(imageId);
    let delay = status === "enemy" ? 1000 : 100;
    coordinates[0].forEach(([x, y], i) => {
        setTimeout(() => {
            image.style.marginLeft = x + "px";
            image.style.marginTop = y + "px";
        }, i * delay);
    });
    coordinates.shift();
}

function generateCoordinates(startX, startY, endX, endY) {
    const coordinates = [];
    const xStep = (endX - startX) / 100;
    const yStep = (endY - startY) / 100;

    for (let i = 0; i < 100; i++) {
        const x = startX + i * xStep;
        const y = startY + i * yStep;
        coordinates.push([x, y]);
    }
    return coordinates;
}

function populateArray(coordinates) {
    let arrayCoordinates = [];
    for (let i = 0; i < coordinates.length - 1; i++) {
        arrayCoordinates.push(generateCoordinates(player_coordinates[i][0], player_coordinates[i][1], player_coordinates[i + 1][0], player_coordinates[i + 1][1]))
    }
    return arrayCoordinates;
}

function sendCommand() {
    console.log("POULOULOU");
    // Récupère la valeur saisie dans le terminal
    var input = document.getElementById("terminal-input").value;
    // Vérifie si une commande a été saisie
    if (input) {
        // Traitement de la commande saisie
        var response = processCommand(input);
        // Affiche la réponse dans le terminal
        document.getElementById("terminal-output").innerHTML += response + "<br>";
        // Efface la valeur saisie dans le terminal
        document.getElementById("terminal-input").value = "";
    }
}

function processCommand(input) {
    // Traitement de la commande saisie
    switch (input) {
        case (input === "hello") :
            return "Bonjour!";

        case (input === "help") :
            return "Liste des commandes disponibles : hello";

        case (input === "avancerJ") :
            return moveImage('player_kart', player_coordinates, 'ally');

        case (input === "avancerE") :
            return moveImage('enemy_kart', player_coordinates, 'enemy');

        default :
            return 'Commande non reconnu'
    }

}

window.onload = (event) => {
    document.getElementById("terminal-input").addEventListener("keydown", function (event) {
        if (event.key === "Enter")
            sendCommand()
        else console.log('oupsi');
    });
}
