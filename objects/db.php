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
            trigger_error("Unable to connect to database.");
        } 
        # Set the character set
        $this->conn->query("SET NAMES 'utf8'");
    }
    
    # Attempt 
    public function query($query) {
        $result = $this->conn->query($query);
        # Throw an error is the query is bad
        if($result === false){
            trigger_error("Data selection error");
        }
        # Put the results into an array
        if(is_object($result)){
            $return_result = array();
            while($row = $result->fetch_assoc()){
                $return_result[] = $row;
            }
        } else {
            $return_result = true;
        }
        return $return_result;
    }
    
    public function escape_string($string, $remove_percent = false) {
        $str = $this->conn->real_escape_string($string);
        if($remove_percent) {
            $str = ereg_replace('(%)', '\\\1', $str);
        }
        return $str;
    }
    
    public function __destruct() {
        # Close the database connection
        $this->conn->close();
    }
}

?>