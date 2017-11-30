<?php
    if(!isset($_SESSION["user"])) {
        # If the user is not logged in send them to the login page
        $_GET["action"] = "login";
    } elseif (!isset($_GET["action"]))  {
        # If the action is not set default to home
        $_GET["action"] = "home";
    }


    # For each action include the corresponding model and controller
    switch($_GET["action"]){
        /* ------ General Pages ------ */
        case "profile":
            $page_title = "View Profile";
            break;

        case "address":
            $page_title = "<i class=\"fa fa-map-signs\" aria-hidden=\"true\"></i> Delivery Address";
            break;

        /* ------ Admin Pages ------ */
        case "rank":
            $page_title = "Rank Accounts";
            break;

            case "accounts":
            $page_title = "Edit Accounts";
            break;

            case "account":
            $page_title = "Edit Account";
            break;

        /* ------ Common Pages ------ */
        case "login":
            $page_title = "";
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
    if(file_exists("controllers/ctl_".$_GET["action"].".php")) {
        require_once("controllers/ctl_".$_GET["action"].".php");
    }
    require_once("views/vw_header.php");
    if(file_exists("views/vw_".$_GET["action"].".php")) {
        require_once("views/vw_".$_GET["action"].".php");
    }
    require_once("views/vw_footer.php");
?>
