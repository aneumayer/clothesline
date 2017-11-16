<?php
    # Include the configuration settings
    require_once("config.php");

    # Setup ActiveRecord
    require_once('php-activerecord/ActiveRecord.php');
    ActiveRecord\Config::initialize(function($cfg)
    {
        global $config;
        $cfg->set_model_directory('db-models');
        $cfg->set_connections([
            'production'  => 'mysql://'.$config["db"]["user"].':'.$config["db"]["pass"].'@'.$config["db"]["host"].'/'.$config["db"]["base"]
        ]);
        $cfg->set_default_connection('production');
    });

    # Setup custom session management with database
    require_once("session.php");
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
