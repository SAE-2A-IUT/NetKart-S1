
    let l_is_leaderboard_displayed = 0;

    function refreshLeaderboard(session_code,player_name,auto_reload = false) {

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "./leaderboard.php", true);
        const formData = new FormData();
        formData.append("session_code", session_code);
        formData.append("player_name", player_name);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    document.getElementsByClassName('classement')[0].innerHTML = xhr.responseText;
                } else {
                    console.error(xhr.status + " " + xhr.statusText);
                }
            }
        }
        xhr.send(formData);
        if (auto_reload){
            setTimeout(() => {refreshLeaderboard(session_code,player_name,auto_reload);},5000);
        }
    }

    function displayLeaderboard(){
        let l_classement = document.getElementsByClassName('leaderboard')[0];
        if (l_is_leaderboard_displayed){
            l_classement.classList.add('button');
            l_classement.classList.remove('popup');
            l_is_leaderboard_displayed = 0;
        }else {
            l_classement.classList.remove('button');
            l_classement.classList.add('popup');
            l_is_leaderboard_displayed = 1;
        }
    }