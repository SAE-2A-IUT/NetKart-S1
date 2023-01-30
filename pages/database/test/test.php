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

    $query = file_get_contents("netkart_db_test_bien.sql");

    if ($l_db->multi_query($query)) {
        do {
            if ($result = $l_db->store_result()) {
                while ($row = $result->fetch_row()) {
                    printf("%s\n", $row[0]);
                }
                $result->free();
            }

        } while ($l_db->next_result());
    }else{
        throw new Exception("Fatal Error");
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

function testCase1($l_db2, &$array_test){
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
}

function testCase2($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de f_insert_strings", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok = $l_db2->f_insert_strings("Theme",["nom_theme", "description"],  ["A_THEME_NAME", "A_THEME_DESC"]);
            if($l_is_insert_ok){
                $array_test[count($array_test)-1]["valid"] = true;
            }
    }catch(Exception $e){
    }
}

function testCase3($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de f_query", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $data=$l_db2->f_query("SELECT * FROM Theme");
    
        if(count($data)>0){
            $array_test[count($array_test)-1]["valid"] = true;
        }
    }catch(Exception $e){
    }
}

function testCase4($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de f_delete", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok = $l_db2->f_delete("Question_Image", "1=1");
            if($l_is_insert_ok){
                $array_test[count($array_test)-1]["valid"] = true;
            }
    }catch(Exception $e){
    }
}

function testCase5($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de get_password", "valid" => false, "r_ok" =>"tibo", "r_attempt" => false);
        $l_is_insert_ok = $l_db2->get_password("Admin");
            if($l_is_insert_ok=="admin_netkart"){
                $array_test[count($array_test)-1]["valid"] = true;
            }else{
                $array_test[count($array_test)-1]["r_attempt"] = $l_is_insert_ok;
            }
    }catch(Exception $e){
    }
}

function testCase6($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de update_password", "valid" => false, "r_ok" =>true, "r_attempt" => false);
        $l_is_insert_ok = $l_db2->update_password("Admin","admin_netkart");
            if($l_is_insert_ok){
                $array_test[count($array_test)-1]["valid"] = true;
            }else{
                $array_test[count($array_test)-1]["r_attempt"] = $l_is_insert_ok;
            }
    }catch(Exception $e){
    }
}

function testCaseLast($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de nettoyage", "valid" => false, "r_ok" => true, "r_attempt" => false);
        environment_cleaning($l_db2);
        $array_test[count($array_test)-1]["valid"] = true;
        $array_test[] = array("name" => "Test de fermeture", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_db2->close();
        $array_test[count($array_test)-1]["valid"] = true;
    }catch(Exception $e){
    
    }
}

function testCase8($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de check_if_element_already_used", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->check_if_element_already_used("Joueur","nom","ADMIN");
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = $l_is_insert_ok;
        }
    }catch(Exception $e){
    
    }
}

function testCase9($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de get_circuit_created_by_user", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->get_circuit_created_by_user(3);
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){
    
    }
}

function testCase10($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de get_circuit_information", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->get_circuit_information(8);
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){
    
    }
}

function testCase11($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de get_all_circuit", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->get_all_circuit();
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){
    
    }
}

function testCase12($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de get_all_circuit", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->get_all_circuit();
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){
    
    }
}

function testCase13($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de get_image_circuit", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->get_image_circuit(1);
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){
    
    }
}

function testCase14($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de get_question_circuit", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->get_question_circuit(8);
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){
    
    }
}

function testCase15($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de get_image_question", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->get_image_question(24);
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){
    
    }
}

function testCase16($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de get_url_question", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->get_url_question(18);
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){
    
    }
}

function testCase17($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de delete_circuit_with_id", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->delete_circuit_with_id(8);
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){
    
    }
}

function testCase18($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de get_all_themes", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->get_all_themes();
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){
    
    }
}

function testCase19($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de get_all_images_circuit", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->get_all_images_circuit();
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){
    
    }
}

function testCase20($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de get_score_player_id", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->get_score_player_id(3);
        if($l_is_insert_ok!=-1){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){
    
    }
}

function testCase21($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de insert_theme", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->insert_theme("taame","desc");
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){
    
    }
}

function testCase22($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de insert_circuit", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->insert_circuit("taame",89,7,3,1);
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){
    
    }
}

function testCase23($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de insert_question", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->insert_question("taame","test", "tdd", 8);
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){
    
    }
}

function testCase24($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de insert_links", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->insert_links("taame",20);
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){
    
    }
}

function testCase25($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de insert_images_question", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->insert_images_question("taame",20);
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){
    
    }
}

function testCase26($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de insert_session", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->insert_session("taame","terrt","2101-12-31","2102-01-30",3,8);
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){

    }
}

function testCase27($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de check_if_victory_already", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->check_if_victory_already(3,20);
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){

    }
}

function testCase28($l_db2, &$array_test){
    try{
        $array_test[] = array("name" => "Test de insert_victory", "valid" => false, "r_ok" => true, "r_attempt" => false);
        $l_is_insert_ok =$l_db2->insert_victory(3,20);
        if($l_is_insert_ok){
            $array_test[count($array_test)-1]["valid"] = true;
        }else{
            $array_test[count($array_test)-1]["r_attempt"] = "An array";
        }
    }catch(Exception $e){

    }
}

function testCaseTemplate($l_db2, &$array_test){
}

$array_test = [];
$l_db2 = new database($A_SERVERNAME = "mysql-netkart.alwaysdata.net",
    $A_USERNAME = "netkart_admin",
    $A_PASSWORD = "NetkartSAES3",
    $A_DBNAME = "netkart_db_test");
    $l_db2->connection();

testCase1($l_db2, $array_test);
testCase2($l_db2, $array_test);
testCase3($l_db2, $array_test);
testCase5($l_db2, $array_test);
testCase6($l_db2, $array_test);
testCase8($l_db2, $array_test);
testCase9($l_db2, $array_test);
testCase10($l_db2, $array_test);
testCase11($l_db2, $array_test);
testCase12($l_db2, $array_test);
testCase13($l_db2, $array_test);
testCase14($l_db2, $array_test);
testCase15($l_db2, $array_test);
testCase16($l_db2, $array_test);
testCase18($l_db2, $array_test);
testCase19($l_db2, $array_test);
testCase20($l_db2, $array_test);
testCase21($l_db2, $array_test);
testCase22($l_db2, $array_test);
testCase23($l_db2, $array_test);
testCase24($l_db2, $array_test);
testCase25($l_db2, $array_test);
testCase26($l_db2, $array_test);
testCase27($l_db2, $array_test);
testCase28($l_db2, $array_test);
/*
testCase4($l_db2, $array_test);
testCase17($l_db2, $array_test);*/

/*
connection OK
f_query OK
f_insert_strings OK
f_delete OK
close OK
get_password OK
update_password OK
check_if_element_already_used OK
get_circuit_created_by_user OK
get_circuit_information OK
get_all_circuit OK
get_image_circuit OK
get_question_circuit OK
get_image_question OK
get_url_question OK
delete_circuit_with_id OK
insert_theme OK
insert_circuit OK
insert_question OK
insert_links OK
insert_images_question OK
get_all_themes OK
get_all_images_circuit OK
insert_session OK
check_if_victory_already OK
insert_victory
delete_session_multi
get_score_player_id OK
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
                        <img src="../../../assets/image/check.png"></img>
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