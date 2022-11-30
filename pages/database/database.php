<?php

class database{
    protected $l_servername;
    protected $l_username;
    protected $l_password;
    protected $l_dbname;

    protected $l_conn;

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

    function connection(){
        $this->l_conn = new mysqli($this->l_servername, $this->l_username, $this->l_password, $this->l_dbname);
        // Check connection
        if ($this->l_conn->connect_error) {
            die("Connection failed: " . $this->l_conn->connect_error);
            exit();
        }
    }

    function query($A_QUERY){
        if (!$this->l_conn -> query($A_QUERY)) {
            echo("Error description: " . $this->l_conn-> error);
            exit();
        }
    }

    function insert($A_TABLE, $A_KEYS, $A_VALUES){
        $l_sql = "INSERT INTO ". $A_TABLE . " ". implode(",",$A_KEYS) . " VALUES (" . implode(",",$A_VALUES) . ")";
        if(! $this->l_conn->query($l_sql)){
            echo("Error description: " . $this->l_conn-> error);
            exit();
        }
    }

    function delete($A_TABLE, $A_WHERE=""){
        $l_sql = "DELETE ". $A_TABLE . ($A_WHERE!="" ? " WHERE " . $A_WHERE : "");
        if(! $this->l_conn->query($l_sql)) {
            echo("Error description: " . $this->l_conn->error);
            exit();
        }
    }

    function close(){
        $this->l_conn->close();
    }
}

?>
