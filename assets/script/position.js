function moveImage(imageId, coordinates, status) {
    if (coordinates.length === 0) {
        return;
    }

    let image = document.getElementById(imageId);
    let delay = status === "enemy" ? 500 : 100;
    coordinates[0].forEach(([x, y], i) => {
        setTimeout(() => {
            image.style.marginLeft = x + "%";
            image.style.marginTop = y + "%";
        }, delay);
    });
    coordinates.shift();
}

function generateCoordinates(startX, startY, endX, endY) {
    const coordinates = [];
    const xStep = (endX - startX) / 200;
    const yStep = (endY - startY) / 200;

    for (let i = 0; i < 200; i++) {
        const x = startX + i * xStep;
        const y = startY + i * yStep;
        coordinates.push([x, y]);
    }
    return coordinates;
}

function populateArray(coordinates) {
    let arrayCoordinates = [];
    for (let i = 0; i < coordinates.length - 1; i++) {
        arrayCoordinates.push(generateCoordinates(player_coordinates[i][0], player_coordinates[i][1], player_coordinates[i + 1][0], player_coordinates[i + 1][1]));
    }
    console.log(arrayCoordinates);
    return arrayCoordinates;
}

function sendCommand() {
    const input = document.getElementById("terminal-input");
    const output = document.getElementById("terminal-output");
    const response = processCommand(input.value);
    if (input.value && response[0] !== 'clear') {
        output.innerHTML += '<span style="color: cornflowerblue">NetKart:~$</span>  ' + input.value + "<br>";
        output.innerHTML += "<span style=\"color: " + response[1] + "\">" + response[0] + "</span>" + "<br>";
        input.value = "";
        scroll(output);
    }else if ( response[0] === "clear"){
        output.innerHTML = '';
        input.value = "";
    }
}

function processCommand(input) {
    switch (input) {
        case "hello":
            return ["Bonjour!", "limegreen"];

        case "help":
            return ["Liste des commandes disponibles : hello", "yellow"];

        case "avancerJ":
            moveImage('player_kart', player_coordinates, 'ally')
            return ["Le joueur avance :)", "limegreen"];

        case "avancerE":
            moveImage('enemy_kart', player_coordinates, 'enemy');
            return ["L'adversaire avance :(", "red"];

        case "clear" :
            return  ["clear","null"];

        case "déçou" :
            return  ["DESSOUS, DESSUS, DES SOUS","blue"];

        default:
            return ["Commande non reconnue","red"];
    }
}

function scroll(item) {
    item.scrollTop = item.scrollHeight - item.clientHeight;
}

window.onload = () => {
    let terminal = document.getElementById("terminal-input");
    terminal.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            sendCommand();
        }
    });
}

