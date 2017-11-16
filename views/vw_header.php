<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $config["app"]["title"] . (strlen($page_title) ? " - {$page_title}" : ""); ?></title>
        <link rel="stylesheet" href="css/main.css">
        <script type="text/javascript" src="js/jquery-3.1.1.min.js" ></script>
    </head>
    <body>
        <table id="header">
            <tr>
                <td id="l_side">
                    <?php 
                        if(strlen($page_title) && !$_GET["action"] != "login") {
                            echo("<a href=\"./\">Back</a>");
                        } 
                    ?>
                </td>
                <td id="title">
                        <?php 
                            echo strlen($page_title) ? $page_title : $config["app"]["title"]; 
                        ?>
                </td>
                <td id="r_side">
                    <?php 
                        if($_GET["action"] != "login") {
                            echo("<a href=\"./?action=logout\">Log Out</a>");
                        }
                    ?>
                </td>
            </tr>
        </table>
        <?php 
            if(isset($success_message)) {
                echo("<div class=\"success_message\">{$success_message}</div>");
            }
            if(isset($error_message)) {
                echo("<div class=\"error_message\">{$error_message}</div>");
            }
        ?>
        