<?php
    # Setup ActiveRecord
    require_once('php-activerecord/ActiveRecord.php');
    $connections = array(
        'production'  => 'mysql://'.$config["db"]["user"].':'.$config["db"]["pass"].'@'.$config["db"]["host"].'/'.$config["db"]["base"]
    );
    ActiveRecord\Config::initialize(function($cfg) use ($connections)
    {
        $cfg->set_model_directory('/db-models');
        $cfg->set_connections($connections);
        $cfg->set_default_connection('production');
    });

    # Include the configuration settings
    require_once("config.php");

    # Include the database class an create a global object
    require_once("objects/db.php");
    $db = new db();

    # Setup custom session management with database
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

    # Include the controller for handling actions
    require_once("controller.php");
?>
