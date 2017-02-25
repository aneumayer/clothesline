<?php

class session {
    
    public function open($save_path, $session_name) {
        return true;
    }
    
    public function close() {
        # No code needed
    }
    
    public function read($session_id) {
        global $db;
        $session_id = $db->escape_string($session_id);
        $result = $db->query("SELECT * FROM session WHERE session_id = '{$session_id}'");
        if(isarray($result)) {
            return $result["session_data"];
        } else {
            return "";
        }
    }
    
    public function write($session_id, $session_data) {
        global $db;
        $session_id = $db->escape_string($session_id);
        $session_data = $db->escape_string($session_data);
        $db->query("DELETE FROM session WHERE session_id = '{$sesion_id}'");
        $db->query("INSERT INTO session (session_id, last_update, session_data) VALUES ('{$session_id}', NOW(), '{$sesssion_data}')");
        return true;
    }
    
    public function destroy($session_id) {
        $session_id = $db->escape_string($session_id);
        $db->query("DELETE FROM session WHERE session_id = '{$sesion_id}'");
        return true;
    }
    
    public function gc($max_lifetime) {
        global $db;
        $max_date = date('Y-m-d H:m:s', time() - $max_lifetime);
        $db->query("DELETE FROM session WHERE last_update < '{$max_date}'");
        return true;
    }
}


?>