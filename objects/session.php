<?php

class session {
    
    private static $conn = null;
    
    public static function open($save_path, $session_name) {
        global $config;
        self::$conn = @new mysqli($config["db"]["host"], $config["db"]["user"], $config["db"]["pass"], $config["db"]["base"]);
        if(self::$conn->connect_errno != 0) {
            return false;
        } else {
            return true;
        }
    }
    
    public static function close() {
        if(self::$conn !== null) {
            self::$conn->close();
            self::$conn = null;
        }
    }
    
    public static function read($session_id){
        $session_id = self::$conn->real_escape_string($session_id);
        $result = @self::$conn->query("SELECT * FROM session WHERE session_id = '{$session_id}'");
        if(self::$conn->errno != 0) {
            $err = self::$conn->error;
            return "";
        }
        if(($row = @$result->fetch_assoc()) !== null) {
            $data = $row['session_data'];
        } else {
            $data = "";
        }
        $result->close();
        return $data;
    }
    
    public static function write($session_id, $session_data) {
        $session_id = self::$conn->real_escape_string($session_id);
        $result = @self::$conn->query("DELETE FROM session WHERE session_id = '{$session_id}'");
        if(self::$conn->errno != 0) {
            return false;
        }
        $session_data = self::$conn->real_escape_string($session_data);
        $result = @self::$conn->query("INSERT INTO session VALUES ('{$session_id}', now(), '{$session_data}')");
        if(self::$conn->errno != 0) {
            return false;
        } else {
            return true;
        }
    }
    
    public static function destroy($session_id) {
        $session_id = self::$conn->real_escape_string($session_id);
        $result = @self::$conn->query("DELETE FROM session WHERE session_id = '{$session_id}'");
        if(self::$conn->errno != 0) {
            return false;
        } else {
            return true;
        }
    }
    
    public static function gc($lifetime) {
        $max_date = date('Y-m-d H:m:s', time() - $lifetime);
        $result = @self::$conn->query("DELETE FROM session WHERE last_update < '{$max_date}'");
        if(self::$conn->errno != 0) {
            return false;
        } else {
            return true;
        }
    }
}


?>