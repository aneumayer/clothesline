<?php

class session {
    
    public static function open($save_path, $session_name) {
        return true;
    }
    
    public static function close() {
        # No code needed
    }
    
    public static function read($session_id) {
        global $db;
        $session_id = $db->escape_string($session_id);
        $result = $db->query("SELECT * FROM session WHERE session_id = '{$session_id}'");
        if(is_array($result)) {
            if(isset($result[0]["session_data"])) {
                $return_value = $result[0]["session_data"];
            } else {
                $return_value = "";
            }
        } else {
            $return_value = "";
        }
        return $return_value;
    }
    
    public static function write($session_id, $session_data) {
        global $db;
        $session_id = $db->escape_string($session_id);
        $session_data = $db->escape_string($session_data);
        $db->query("DELETE FROM session WHERE session_id = '{$session_id}'");
        $db->query("INSERT INTO session (session_id, last_update, session_data) VALUES ('{$session_id}', NOW(), '{$session_data}')");
        return true;
    }
    
    public static function destroy($session_id) {
        global $db;
        $session_id = $db->escape_string($session_id);
        $db->query("DELETE FROM session WHERE session_id = '{$session_id}'");
        return true;
    }
    
    public static function gc($max_lifetime) {
        global $db;
        $max_date = date('Y-m-d H:m:s', time() - $max_lifetime);
        $db->query("DELETE FROM session WHERE last_update < '{$max_date}'");
        return true;
    }
}


?>