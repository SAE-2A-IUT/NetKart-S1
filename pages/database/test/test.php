<?php
require '../database.php';

function testConfiguration($l_db)
{
    if ($l_db->connect_errno) {
        printf("Echec de la connexion : %s\n", $l_db->connect_error);
        return false;
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
    return true;
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

$array_test = [];

try{
    $array_test[] = array("name" => "Test de connexion", "valid" => false, "r_ok" => true, "r_attempt" => false);
    $l_db = new mysqli("mysql-netkart.alwaysdata.net","netkart_admin","NetkartSAES3", "netkart_db_test");
    if ($l_db->connect_error) {
        throw new Exception("Connect Error !");
    }
    $array_test[count($array_test)-1]["valid"] = true;
    $array_test[] = array("name" => "Test de configuration", "valid" => false, "r_ok" => true, "r_attempt" => false);
    testConfiguration($l_db);
    $array_test[count($array_test)-1]["valid"] = true;
}catch(Exception $e){
}

try{
    $l_db2 = new database($A_SERVERNAME = "mysql-netkart.alwaysdata.net",
    $A_USERNAME = "netkart_admin",
    $A_PASSWORD = "NetkartSAES3",
    $A_DBNAME = "netkart_db_test");
    $l_db2->connection();
    
    $array_test[] = array("name" => "Test de f_query", "valid" => false, "r_ok" => true, "r_attempt" => false);
    $data=$l_db2->f_query("SELECT * FROM Theme");

    if(count($data)>0){
        $array_test[count($array_test)-1]["valid"] = true;
    }
}catch(Exception $e){
}

try{
    $array_test[] = array("name" => "Test de f_insert_strings", "valid" => false, "r_ok" => true, "r_attempt" => false);
    $l_is_insert_ok = $l_db2->f_insert_strings("Theme",["nom_theme", "description"],  ["A_THEME_NAME", "A_THEME_DESC"]);
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }
}catch(Exception $e){
}

try{
    $array_test[] = array("name" => "Test de f_delete", "valid" => false, "r_ok" => true, "r_attempt" => false);
    $l_is_insert_ok = $l_db2->f_delete("Question_Image", "1=1");
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }
}catch(Exception $e){
}

try{
    $array_test[] = array("name" => "Test de get_password", "valid" => false, "r_ok" =>"tibo", "r_attempt" => false);
    $l_is_insert_ok = $l_db2->get_password("Tibo");
        if($l_is_insert_ok=="tibo"){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = $l_is_insert_ok;
        }
}catch(Exception $e){
}

try{
    $array_test[] = array("name" => "Test de update_password", "valid" => false, "r_ok" =>true, "r_attempt" => false);
    $l_is_insert_ok = $l_db2->update_password("Tibo","tibo78");
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = $l_is_insert_ok;
        }
}catch(Exception $e){
}

try{
    $array_test[] = array("name" => "Test de nettoyage", "valid" => false, "r_ok" => true, "r_attempt" => false);
    environment_cleaning($l_db);
    $array_test[count($array_test)-1]["valid"] = true;
    $array_test[] = array("name" => "Test de fermeture", "valid" => false, "r_ok" => true, "r_attempt" => false);
    $l_db->close();
    $array_test[count($array_test)-1]["valid"] = true;
}catch(Exception $e){

}
/*
connection OK
f_query OK
f_insert_strings OK
f_delete OK
close OK
get_password OK
update_password OK
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
?>
<html lang="fr-FR">
    <head>
        <meta charset="utf-8">
        <title>Test</title>
        <style>
            table, th, td {
                border: 1px solid;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Index</th>
                    <th>Nom</th>
                    <th>Resultat</th>
                    <th>Différence</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=0;
                foreach($array_test as $test){
                    ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $test["name"]; ?></td>
                    <td><?php
                    if($test["valid"]){
                        ?>
                        <img src="../../../assets/image/check.jpg"></img>
                        <?php
                    }else{
                        ?>
                        <img src="../../../assets/image/error.png"></img>
                        <?php
                    }
                    ?>
                    </td>
                    <td>
                    <?php
                    if($test["valid"]){
                        ?>
                       <p>Aucune</p>
                        <?php
                    }else{
                        ?>
                        <p><?php echo $test["r_ok"]; ?>!=<?php echo $test["r_attempt"]; ?></p>
                        <?php
                    }
                    ?>
                    </td>
                </tr>
                <?php
                $i++;
                }
                ?>
            </tbody>
        </table>
    </body>
</html>