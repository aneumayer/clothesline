<?php
    
    # For each action include the corresponding model and controller
    switch($_GET["action"]){
        /* ------ General Pages ------ */
        case "create_account":
            $page_title = "Create Account";
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
        
        /* ------ Default to the Home Page ------ */
        default:
            $page_title = "";
            $_GET["action"] = "home";
            break;
            
    }
    
    # Include the standard Footer
    require_once("model/mdl_create_account.php");
    require_once("view/vw_header.php");
    require_once("view/vw_".$_GET["action"].".php");
    require_once("view/vw_footer.php");
?>