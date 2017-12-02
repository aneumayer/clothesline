<?php
    if(!isset($_SESSION["user"])) {
        // If the user is not logged in send them to the login page
        $_GET["action"] = "login";
    } elseif (!isset($_GET["action"]))  {
        // If the action is not set default to home
        $_GET["action"] = "home";
    }

    // If the neither of the files exist redirect to home
    if(!file_exists("controllers/ctl_".$_GET["action"].".php") && !file_exists("views/vw_".$_GET["action"].".php")) {
        $_GET["action"] = "home";
    }

    // Include the standard Footer
    if(file_exists("controllers/ctl_".$_GET["action"].".php")) {
        require_once("controllers/ctl_".$_GET["action"].".php");
    }
    require_once("views/vw_header.php");
    if(file_exists("views/vw_".$_GET["action"].".php")) {
        require_once("views/vw_".$_GET["action"].".php");
    }
    require_once("views/vw_footer.php");
?>
