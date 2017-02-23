<?php
    #If there is no action in the url default to home
    require_once("config.php");
    require_once("objects/db.php");
    $db = new db();
    require_once("controller.php");
?>