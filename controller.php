<?php
    if(!isset($_SESSION["logged_in"])) {
        # If the user is not logged in send them to the login page
        $_GET["action"] = "login";
    } elseif (!isset($_GET["action"]))  {
        # If the action is not set default to home
        $_GET["action"] = "home";
    }
    
    
    # For each action include the corresponding model and controller
    switch($_GET["action"]){
        /* ------ General Pages ------ */
        case "account":
            $page_title = "Edit Account";
            break;
        
        case "register":
            $page_title = "Register New Load";
            break;
        
        case "check_in":
            $page_title = "Check In Load";
            break;
            
        /* ------ Admin Pages ------ */
        case "track":
            $page_title = "Track Loads";
            break;
            
        case "details":
            $page_title = "Load Details";
            break;
        
        case "rank":
            $page_title = "Rank New Account";
            break;
        
        /* ------ Common Pages ------ */
        case "login":
            $page_title = "Login";
            break;
            
        case "logout":
            $page_title = "Log Out";
            break;
        
        default:
            $page_title = "";
            $_GET["action"] = "home";
            break;
            
    }
    
    # Include the standard Footer
    if(file_exists("model/mdl_".$_GET["action"].".php")) {
        require_once("model/mdl_".$_GET["action"].".php");
    }
    require_once("view/vw_header.php");
    if(file_exists("view/vw_".$_GET["action"].".php")) {
        require_once("view/vw_".$_GET["action"].".php");
    }
    require_once("view/vw_footer.php");
?>