<?php 

class db {
    
    public $conn;
    
    public function __construct() {
        # Get the values in the config variable
        global $config;
        
        # Connect to the mysql database
        $this->conn = new mysqli($config["db"]["host"], $config["db"]["user"], $config["db"]["pass"], $config["db"]["base"]);
        
        # Check if the connection worked
        if(mysqli_connect_errno() != 0) {
            echo("Unable to connect to database.");
            exit;
        } 
        
        # Set the character set
        $this->conn->query("SET NAMES 'utf8'");
    }
    
    public function getConnection() {
        return $this->conn;
    }
    
    public function __destruct() {
        # Close the database connection
        $this->conn->close();
    }
}

?>