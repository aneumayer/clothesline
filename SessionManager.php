<?php

class SessionManager {

    public static function open($save_path, $session_name) {
        return true;
    }

    public static function close() {
        return true;
    }

    public static function read($session_id){
        $session = Session::find_by_session_id($session_id);
        if ($session instanceOf Session) {
            return $session->session_data;
        } else {
            return "";
        }
    }

    public static function write($session_id, $session_data) {
        $session = Session::find_by_session_id($session_id);
        if (!($session instanceOf Session)) {
            $session             = new Session();
            $session->session_id = $session_id;
        }
        $session->session_data = $session_data;
        $session->save();
        return true;
    }

    public static function destroy($session_id) {
        $session = Session::find_by_session_id($session_id);
        if ($session instanceOf Session) {
            $session->delete();
        }
        return true;
    }

    public static function gc($lifetime) {
        $max_date = date('Y-m-d H:m:s', time() - $lifetime);
        $sessions = Session::find('all', ['conditions' => ['updated_at < ?', $max_date]]);
        foreach($sessions as $session) {
            $session->delete();
        }
        return true;
    }
}

?>
