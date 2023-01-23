<?php
require '../database.php';

function testConfiguration($l_db)
{
    if ($l_db->connect_errno) {
        printf("Echec de la connexion : %s\n", $l_db->connect_error);
        exit();
    }

    $tables = array();
    if ($result = $l_db->query("SHOW TABLES")) {
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            $tables[] = $row[0];
        }
    }

    $l_db->query("SET FOREIGN_KEY_CHECKS=0;");

    while (count($tables) > 0) {
        $table = array_pop($tables);
        $l_db->query("DROP TABLE IF EXISTS " . $table);
    }

    $l_db->query("SET FOREIGN_KEY_CHECKS=1;");

    $query = file_get_contents("netkart_db_test.sql");

    if ($l_db->multi_query($query)) {
        do {
            if ($result = $l_db->store_result()) {
                while ($row = $result->fetch_row()) {
                    printf("%s\n", $row[0]);
                }
                $result->free();
            }

        } while ($l_db->next_result());
    }
}


function environment_cleaning($l_db)
{
    $tables = array();
    if ($result = $l_db->query("SHOW TABLES")) {
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            $tables[] = $row[0];
        }
    }
    $l_db->query("SET FOREIGN_KEY_CHECKS=0;");
    foreach ($tables as $table) {
        $l_db->query("DELETE FROM " . $table);
    }
    $l_db->query("SET FOREIGN_KEY_CHECKS=1;");
}

function testCase1($l_db){
    $this->assertEquals("1","2");
}

$l_db = new mysqli("mysql-netkart.alwaysdata.net","netkart_admin","NetkartSAES3", "netkart_db_test");
$l_db->connect();
testConfiguration($l_db);
testCase1($l_db);
environment_cleaning($l_db);
$l_db->close();

/*
connection
f_query
f_insert_strings
f_delete
close
get_password
update_password
check_if_element_already_used
get_circuit_created_by_user
get_circuit_information
get_all_circuit
get_image_circuit
get_question_circuit
get_image_question
get_url_question
delete_circuit_with_id
insert_theme
insert_circuit
insert_question
insert_links
insert_images_question
get_all_themes
get_all_images_circuit
insert_session
check_if_victory_already
insert_victory
delete_session_multi
get_score_player_id
*/