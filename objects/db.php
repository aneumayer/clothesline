<?php 

class db {
    
    public $conn;
    
    public function __construct() {
        # Get the values in the config variable
        globals $config;
        
        # Connect to the mysql database
        $this->conn = new mysqli_connect($config["db"]["host"], $config["db"]["user"], $config["db"]["pass"], $config["db"]["base"]);
        
        # Check if the connection worked
        if(mysqli_connect_errno() != 0) {
            echo("Unable to connect to database.")
        }
    }
    
    public function __destruct() {
        # Close the database connection
        $this->conn->close();
    }
}

?>