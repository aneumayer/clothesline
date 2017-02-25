<?php
    #If there is no action in the url default to home
    require_once("config.php");
    require_once("objects/db.php");
    require_once("objects/session.php");
    session_set_save_handler(
        array('session', 'open'),
        array('session', 'close'),
        array('session', 'read'),
        array('session', 'write'),
        array('session', 'destroy'),
        array('session', 'gc')
    );
    session_name($config["app"]["sess"]);
    session_start();
    $db = new db();
    require_once("controller.php");
?>