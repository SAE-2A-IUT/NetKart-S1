function check_connection(connected = false) {
    if (!connected) {
        window.open("../pages/connection.php?error=1","_self");
    }
}