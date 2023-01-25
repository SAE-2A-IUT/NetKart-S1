<?php
/** @file /pages/host-session_post.php
 *
 * @details File removing session from database.
 *
 * @author SAE S3 NetKart
 */

require 'database/database.php';
if (isset($_POST['delete_session']) && $_POST['delete_session'] == 'ok'){
    $l_db = new database();
    $l_db->connection();
    if ($l_db->delete_session_multi($_POST['id_session'])) {
        header('Location: create-session.php?deleted=1');
    }
    $l_db->close();
    exit();
}

