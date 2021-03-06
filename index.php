<?php
    # Include the configuration settings
    require_once("config.php");

    # Setup ActiveRecord
    require_once('activerecord/ActiveRecord.php');
    ActiveRecord\Config::initialize(function($cfg)
    {
        global $config;
        $cfg->set_model_directory('models');
        $cfg->set_connections([
            'production'  => 'mysql://'.$config["db"]["user"].':'.$config["db"]["pass"].'@'.$config["db"]["host"].'/'.$config["db"]["base"]
        ]);
        $cfg->set_default_connection('production');
    });

    # Setup custom session management with database
    require_once("SessionManager.php");
    session_set_save_handler(
       ['SessionManager', 'open'],
       ['SessionManager', 'close'],
       ['SessionManager', 'read'],
       ['SessionManager', 'write'],
       ['SessionManager', 'destroy'],
       ['SessionManager', 'gc']
    );
    session_name($config["app"]["sess"]);
    session_start();

    # Include the controller for handling actions
    require_once("router.php");
?>
