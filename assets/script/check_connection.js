function check_connection(connected = false) {
    if (!connected) {
        window.open("../pages/connection.php?error=8","_self");
    }
}