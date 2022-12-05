<?php

/** @file /pages/database/database.php
 *
 * File to manage database
 *
 * @author SAE S3 NetKart
 */

/*
 * class to manage database
 */
class database{
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
    function connection(){
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
     */
    function query($A_QUERY){
        if (!$this->l_conn -> query($A_QUERY)) {
            echo("Error description: " . $this->l_conn-> error);
            exit();
        }
    }

    /*
     * @biref this function inserts the given data into the table
     *
     * @param $A_TABLE (String) the table to insert data
     * @param $A_KEYS (String) column where data will be added
     * @param $A_VALUES (String) data to insert
     */
    function insert($A_TABLE, $A_KEYS, $A_VALUES){
        $l_sql = "INSERT INTO ". $A_TABLE . " ". implode(",",$A_KEYS) . " VALUES (" . implode(",",$A_VALUES) . ")";
        if(! $this->l_conn->query($l_sql)){
            echo("Error description: " . $this->l_conn-> error);
            exit();
        }
    }

    /*
     * @brief this function will delete some rows from database
     *
     * @param $A_TABLE (String) the table of the rows to delete
     * @param $A_WHERE (String) [** Optional **] the rows that will fit this condition will be deleted
     */
    function delete($A_TABLE, $A_WHERE=""){
        $l_sql = "DELETE ". $A_TABLE . ($A_WHERE!="" ? " WHERE " . $A_WHERE : "");
        if(! $this->l_conn->query($l_sql)) {
            echo("Error description: " . $this->l_conn->error);
            exit();
        }
    }

    /*
     * @brief this function closes the connection with the database
     */
    function close(){
        $this->l_conn->close();
    }
}

?>
