let circuit_1_coordinates = [[58, 10], [28, 13], [57, 41], [17, 70], [38.8, 94], [65, 57], [58, 10]];
let circuit_2_coordinates = [[62, 21], [25, 30], [20, 49], [28, 80], [50, 81], [55, 52], [62, 21]];
let circuit_3_coordinates = [[6, 54], [29, 56], [51, 85], [70, 83], [45, 72], [32, 44], [6, 54]];
let circuit_4_coordinates = [[63, 2], [30, 52], [8, 101], [36, 107], [59, 80], [78, 45], [63, 2]];
let coordinate = circuit_1_coordinates;
let player_coordinates_ = populateArray(coordinate);
let enemy_coordinates = populateArray(coordinate)
let game = false;

window.onload = () => {
    moveImage('enemy_kart', enemy_coordinates, 'enemy');
    setInitialPosition("flag", coordinate);
    setInitialPosition("enemy_kart", coordinate);
    setInitialPosition("player_kart", coordinate);
}

function sendCommand(questionResponse) {
    const input = document.getElementById("terminal-input");
    const output = document.getElementById("terminal-output");
    const response = processCommand(input.value, questionResponse);
    if (input.value && response[0] !== 'clear') {
        output.innerHTML += '<span style="color: cornflowerblue">NetKart:~$</span>  ' + input.value + "<br>";
        output.innerHTML += "<span style=\"color: " + response[1] + "\">" + response[0] + "</span>" + "<br>";
        input.value = "";
        scroll(output);
    } else if (response[0] === "clear") {
        output.innerHTML = '';
        input.value = "";
    }
}

function displayModal() {
    const modal = document.getElementById("modal");
    const close = document.getElementById("modal-close");
    const returnBtn = document.getElementById("modal-return");
    const restartBtn = document.getElementById("modal-restart");

    modal.style.display = "block";

    close.onclick = function () {
        modal.style.display = "none";
    }

    returnBtn.onclick = function () {
        modal.style.display = "none";
        window.location.assign("themes.php");
    }

    restartBtn.onclick = function () {
        window.location.reload();
    }
}

function moveImage(imageId, coordinates, status) {
    if (!game) {
        if (status === "ally")
        if (coordinates.length === 0) {
            return;
        }
        let image = document.getElementById(imageId);
        let delay = status === "enemy" ? 100 : 10;
        let count = 0
        coordinates[0].forEach(([x, y], i) => {
            setTimeout(() => {
                image.style.marginLeft = x + "%";
                image.style.marginTop = y + "%";
                count++;
                if (count === coordinates[0].length) {
                    coordinates.shift();
                    if (coordinates.length === 0) {
                        setVictory('modal-body', status)
                    } else if (status === "enemy") {
                        setTimeout(() => {
                            moveImage(imageId, coordinates, status);
                        }, delay);
                    }
                }
            }, i * delay);
        });
    }
}

function correctAnswer(imageId, coordinates, status) {
    moveImage(imageId, coordinates, status);
    setTimeout(() => {
        moveImage(imageId, coordinates, status);
    }, 400 * 6);
}

function setVictory(element, status) {
    let modal = document.getElementById(element);
    game = true;
    modal.innerHTML = status === "enemy" ? "Défaite ... <img src=\'../assets/image/lose.webp\' alt=\'lose\' id=\'lose\'>" : "Victoire ! <img src=\'../assets/image/victory.webp\' alt=\'victory\' id=\'victory\'>";
    displayModal();
}

function setInitialPosition(imageId, coordinates) {
    if (coordinates.length === 0) {
        return;
    }
    let image = document.getElementById(imageId);
    image.style.marginLeft = coordinates[0][0] + "%";
    image.style.marginTop = coordinates[0][1] + "%";
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
        arrayCoordinates.push(generateCoordinates(coordinates[i][0], coordinates[i][1], coordinates[i + 1][0], coordinates[i + 1][1]));
    }
    return arrayCoordinates;
}

function scroll(item) {
    item.scrollTop = item.scrollHeight - item.clientHeight;
}
