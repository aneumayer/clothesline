<?php
    # Include the configuration settings
    require_once("config.php");
    
    # Include the database class an create a global object
    require_once("objects/db.php");
    $db = new db();

    # Setup custom session management with database
    /*require_once("objects/session.php");
    session_set_save_handler(
        array('session', 'open'),
        array('session', 'close'),
        array('session', 'read'),
        array('session', 'write'),
        array('session', 'destroy'),
        array('session', 'gc')
    );*/
    session_name($config["app"]["sess"]);
    session_start();
    
    # Include the controller for handling actions
    require_once("controller.php");
?>