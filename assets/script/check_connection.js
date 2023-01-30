/**
 * @brief this function check if the user is connected
 *
 * @param connected (boolean) : is the user connected
 */
function check_connection(connected = false) {
    if (!connected) {
        window.open("../pages/connection.php?error=8","_self");
    }
}