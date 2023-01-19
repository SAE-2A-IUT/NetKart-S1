<?php

/** @file /pages/database/database.php
 *
 * @details File to manage database
 *
 * @author SAE S3 NetKart
 */

/*
 * class to manage database
 */

class database
{
    protected $l_servername;
    protected $l_username;
    protected $l_password;
    protected $l_dbname;

    protected $l_conn;

    /*
     * constructor of database class, initialise variables to connect to database
     */
    function __construct($A_SERVERNAME = "mysql-netkart.alwaysdata.net",
                         $A_USERNAME = "netkart_admin",
                         $A_PASSWORD = "NetkartSAES3",
                         $A_DBNAME = "netkart_db_main"
                        )
    {
        $this->l_servername = $A_SERVERNAME;
        $this->l_username = $A_USERNAME;
        $this->l_password = $A_PASSWORD;
        $this->l_dbname = $A_DBNAME;
    }

    /*
     * @brief this function initialises the connection with database
     */
    function connection()
    {
        $this->l_conn = new mysqli($this->l_servername, $this->l_username, $this->l_password, $this->l_dbname);
        // Check connection
        if ($this->l_conn->connect_error) {
            die("Connection failed: " . $this->l_conn->connect_error);
            exit();
        }
    }

    /*
     * @brief this function executes a sql query and handle errors
     *
     * @param $A_QUERY (String) the sql query that will be run
     * @param $A_IS_INSERT (Boolean) true if query is an insert
     */
    function f_query($A_QUERY, $A_IS_INSERT=false)
    {
        if (!$this->l_conn->query($A_QUERY)) {
            echo("Error description: " . $this->l_conn->error);
            return "Error";
        }
        if($A_IS_INSERT){
            return "Success";
        }
        return $this->l_conn->query($A_QUERY)->fetch_all(MYSQLI_ASSOC);
    }

    /*
     * @biref this function inserts the given data into the table
     *
     * @param $A_TABLE (String) the table to insert data
     * @param $A_KEYS (String) column where data will be added
     * @param $A_VALUES (String) data to insert
     *
     * @return (Boolean) : True if insert successful, False if an error occured
     */
    function f_insert_strings($A_TABLE, $A_KEYS, $A_VALUES)
    {
        $l_sql = "INSERT INTO " . $A_TABLE . " (" . implode(",", $A_KEYS) . ") VALUES ('" . implode("','", $A_VALUES) . "')";
        echo $l_sql;
        if (!$this->l_conn->query($l_sql)) {
            echo("Error description: " . $this->l_conn->error);
            return False;
        }
        return True;
    }

    /*
     * @brief this function will delete some rows from database
     *
     * @param $A_TABLE (String) the table of the rows to delete
     * @param $A_WHERE (String) [** Optional **] the rows that will fit this condition will be deleted
     *
     * @return (Boolean) : True if delete successful, False if an error occured
     */
    function f_delete($A_TABLE, $A_WHERE = "")
    {
        $l_sql = "DELETE FROM " . $A_TABLE . ($A_WHERE != "" ? " WHERE " . $A_WHERE : "");
        if (!$this->l_conn->query($l_sql)) {
            echo("Error description: " . $this->l_conn->error);
            return False;
        }
        return True;
    }

    /*
     * @brief this function closes the connection with the database
     */
    function close()
    {
        $this->l_conn->close();
    }

    /*
     * @brief this function will return the password of a given user
     *
     * @param $A_USERNAME (String) the username to get the password from
     *
     * @return (String) : Password of given user or empty string if an error occured
     */
    function get_password($A_USERNAME)
    {
        $l_query = "SELECT mot_de_passe FROM Joueur WHERE pseudo='" . $A_USERNAME . "';";

        $l_result = $this->l_conn->query($l_query);

        $l_fetch = $l_result->fetch_all(MYSQLI_ASSOC);
        if (!$l_result) {
            echo("Error description: " . $this->l_conn->error);
            return "";
        }
        if (sizeof($l_fetch)==0){
            return '';
        }
        return $l_fetch[0]["mot_de_passe"];
    }

    /*
     * @brief this function will update the password from a given user by replacing it with a given new password
     *
     * @param $A_USERNAME (String) user that password will be updated
     * @param $A_NEW_PASSWORD (String) new password to update in database
     *
     * @return (Boolean) : True if update successful, False if an error occured
     */
    function update_password($A_USERNAME, $A_NEW_PASSWORD)
    {
        $l_sql = "UPDATE Joueur SET mot_de_passe = " . $A_NEW_PASSWORD . " WHERE pseudo = " . $A_USERNAME;
        if (!$this->l_conn->query($l_sql)) {
            echo("Error description: " . $this->l_conn->error);
            return False;
        }
        return True;
    }

    /*
     * @brief this function will check if a given element from a given column exists or not
     *
     * @param $A_TABLE (String) the table where to search for the element
     * @param $A_COLUMN (String) the column of the element
     * @param $A_ELEMENT (String) the value of the column to search
     *
     * @return (Boolean) : True if element already in table, False other way
     */
    function check_if_element_already_used($A_TABLE, $A_COLUMN, $A_ELEMENT)
    {
        $l_query = "SELECT * FROM " . $A_TABLE . " WHERE " . $A_COLUMN . "='" . $A_ELEMENT . "';";

        $l_result = $this->l_conn->query($l_query);

        if (!$l_result) {
            echo("Error description: " . $this->l_conn->error);
            exit();
        }
        return $l_result->num_rows > 0;
    }

    /*
     * @brief this function return the circuits created by an user
     *
     * @param $A_PLAYER_ID (String)
     *
     * @return (Array of Integers) : the id of all the circuits created by a given user
     */
    function get_circuit_created_by_user($A_PLAYER_ID)
    {
        $l_sql = "SELECT id_circuit FROM Circuit WHERE id_joueur=" . $A_PLAYER_ID;
        $l_result = $this->l_conn->query($l_sql);

        if (!$l_result) {
            echo("Error description: " . $this->l_conn->error);
            return [];
        }
        return $l_result->fetch_all(MYSQLI_ASSOC);
    }

    /*
     * @brief this function return the circuits created by an user
     *
     * @param $A_CIRCUIT_ID ()
     *
     * @return () :
     */
    function get_circuit_information($A_CIRCUIT_ID)
    {
        $l_sql = "SELECT id_circuit, nom_circuit, points, id_circuitimage FROM Circuit WHERE id_circuit=" . $A_CIRCUIT_ID;
        $l_result = $this->l_conn->query($l_sql);

        if (!$l_result) {
            echo("Error description: " . $this->l_conn->error);
            return [];
        }
        return $l_result->fetch_all(MYSQLI_ASSOC);
    }

    /*
     * @brief this function return the image
     *
     * @param $A_IMAGE_ID (String) : id of the image
     *
     * @return (String) : name of the image (path)
     */
    function get_image_circuit($A_IMAGE_ID)
    {
        $l_sql = "SELECT image  FROM Circuit_Image WHERE id_circuitimage=" . $A_IMAGE_ID;
        $l_result = $this->l_conn->query($l_sql);
        if (!$l_result) {
            echo("Error description: " . $this->l_conn->error);
            return "";
        }
        return $l_result->fetch_all(MYSQLI_ASSOC);
    }

    /*
     * @brief this function delete a Circuit with a given ID and all the questions of this circuit
     *
     * @param $A_CIRCUIT_ID (String) : ID of the circuit to delete
     *
     * @return (Boolean) : True if delete of Circuit successful, False if an error occured
     */
    function delete_circuit_with_id($A_CIRCUIT_ID)
    {

        $l_all_questions = self::f_query("SELECT id_question FROM Question WHERE id_circuit=" . $A_CIRCUIT_ID);
        foreach ($l_all_questions as $l_questions) {
            if ($l_questions == NULL) {
                break;
            }
            foreach ($l_questions as $l_question) {

                $l_all_images = self::f_query("SELECT id_questionimage FROM Question_Image WHERE id_question=" . $l_question);
                if ($l_all_images != NULL) {
                    foreach ($l_all_images as $l_images) {
                        foreach ($l_images as $l_image) {
                            self::f_delete("Question_Image", "id_questionimage=" . $l_image);
                        }
                    }
                }

                $l_all_links = self::f_query("SELECT id_questionlien FROM Question_Lien WHERE id_question=" . $l_question);
                if ($l_all_links != NULL) {
                    foreach ($l_all_links as $l_links) {
                        foreach ($l_links as $l_link) {
                            self::f_delete("Question_Lien", "id_questionlien=" . $l_link);
                        }
                    }
                }
                // Delete question
                self::f_delete("Question", "id_question=" . $l_question);

            }
        }
        // Delete circuit
        return self::f_delete("Circuit","id_circuit=".$A_CIRCUIT_ID);
    }

    /*
     * @brief this function insert a new theme into database
     *
     * @param $A_THEME_NAME (String) : name of the new theme
     * @param $A_THEME_DESC (String) : description of the new theme
     *
     * @return (Integer) : the id of the theme created or -1 if an error occurred
     */
    function insert_theme($A_THEME_NAME, $A_THEME_DESC){
        $l_is_insert_ok = self::f_insert_strings("Theme",["nom_theme", "description"],  [$A_THEME_NAME, $A_THEME_DESC]);
        if($l_is_insert_ok){
            $l_theme_id = self::f_query("SELECT id_theme FROM Theme WHERE nom_theme ='".$A_THEME_NAME."'");
            return $l_theme_id[0]["id_theme"];
        }
        return -1;
    }

    /*
     * @brief this function insert a new circuit into database
     *
     * @param $A_NOM_CIRCUIT (String) : name of the new circuit
     * @param $A_POINTS (Integer) : number of points the user will get after finishing circuit
     * @param $A_THEME (Integer) : id of the theme the circuit belong to
     * @param $A_JOUEUR (Integer) : id of the player who created the circuit
     * @param $A_CIRCUIT_IMAGE (Integer) : id of the image of the circuit
     *
     * @return (Integer) : the id of the circuit created or -1 if an error occurred
     */
    function insert_circuit($A_NOM_CIRCUIT, $A_POINTS, $A_THEME, $A_JOUEUR, $A_CIRCUIT_IMAGE){
        $l_is_inert_ok = self::f_query("INSERT INTO Circuit (nom_circuit, points, id_theme, id_joueur, id_circuitimage) VALUES ('$A_NOM_CIRCUIT', $A_POINTS, $A_THEME, $A_JOUEUR, $A_CIRCUIT_IMAGE)",true);
        if ($l_is_inert_ok=="Success"){
            $l_circuit_id = self::f_query("SELECT id_circuit FROM Circuit WHERE nom_circuit ='".$A_NOM_CIRCUIT."'");
            return $l_circuit_id[0]["id_circuit"];
        }
        return -1;
    }

    /*
     * @brief this function insert a question from a circuit into database
     *
     * @param $A_TITRE (String) : title of the question
     * @param $A_CONSIGNE (String) : detailed question
     * @param $A_REPONSE (String) : answer of the question
     * @param $A_CIRCUIT (Integer) : id of the circuit the question belongs to
     *
     * @return (Integer) : the id of the question created or -1 if an error occurred
     */
    function insert_question($A_TITRE, $A_CONSIGNE, $A_REPONSE, $A_CIRCUIT){
        $l_is_insert_ok = self::f_query("INSERT INTO Question (consigne, question, reponse, id_circuit) VALUES ('".$A_CONSIGNE."', '".$A_TITRE."', '".$A_REPONSE."',".$A_CIRCUIT.")",true);
        if ($l_is_insert_ok=="Success"){
            $l_question_id = self::f_query("SELECT id_question FROM Question WHERE question ='".$A_TITRE."' AND id_circuit=".$A_CIRCUIT);
            return $l_question_id[0]["id_question"];
        }
        return -1;
    }

    /*
     * @brief this function insert the links given with a specified question
     *
     * @param $A_LINK (String) : link to help answer the question
     * @param $A_QUESTION (Integer) : id of the question the link refers to
     *
     * @return (Boolean) : True if insert successful, False otherwise
     */
    function insert_links($A_LINK, $A_QUESTION){
        $l_is_insert_ok = self::f_query("INSERT INTO Question_Lien (lien, id_question) VALUES ('".$A_LINK."', ".$A_QUESTION.")",true);
        return $l_is_insert_ok=="Success";
    }

    /*
     * @brief this function returns all the themes in database
     *
     * @return (Array) : array that contains the id and name of all themes
     */
    function get_all_themes(){
        return self::f_query("SELECT id_theme, nom_theme FROM Theme");
    }

    /*
     * @brief this function returns all the images of circuits in database
     *
     * @return (Array) : id and name of all the possible images for a circuit
     */
    function get_all_images_circuit(){
        return self::f_query("SELECT id_circuitimage,image FROM Circuit_Image");
    }

    /*
     * @brief this function insert a new multiplayer session in database
     *
     * @param $A_NOM (String) : link to help answer the question
     * @param $A_CODE (String) : code to join the session
     * @param $A_DEBUT (String) : time the session started
     * @param $A_DUREE (String) : time the session will last
     * @param $A_JOUEUR (Integer) : id of the user who created the session
     *
     * @return (Integer) : id of the created session
     */
    function insert_session($A_NOM, $A_CODE, $A_DEBUT, $A_DUREE, $A_JOUEUR){
        $l_is_insert_ok = self::f_query("INSERT INTO Groupe (nom_groupe, code, debut, duree, id_joueur) VALUES ('".$A_NOM."', '".$A_CODE."', '".$A_DEBUT."', '".$A_DUREE."',".$A_JOUEUR.")",true);
        if ($l_is_insert_ok=="Success"){
            $l_question_id = self::f_query("SELECT id_groupe FROM Groupe WHERE nom_groupe ='".$A_NOM."' AND code='".$A_CODE."'");
            return $l_question_id[0]["id_groupe"];
        }
        return -1;
    }
}
//TODO : voir pour de la composition

//TODO : functions => get_circuit_created_by_user / get_circuit_information / insert_circuit / delete_circuit /  update ???

// TODO : voir pr utiliser le f_query partout  ??