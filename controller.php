<?php
    
    # If there is no action set then set it to home
    if(!isset($_GET["action"])) $_GET["action"] = "home";
    
    
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
        
        default:
            $page_title = "";
            $_GET["action"] = "home";
            break;
            
    }
    
    # Include the standard Footer
    require_once("view/vw_header.php");
    if(file_exists("model/mdl_".$_GET["action"].".php")) {
        require_once("model/mdl_".$_GET["action"].".php");
    }
    if(file_exists("view/vw_".$_GET["action"].".php")) {
        require_once("view/vw_".$_GET["action"].".php");
    }
    require_once("view/vw_footer.php");
?>