<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $config["app"]["title"] . (strlen($page_title) ? " - {$page_title}" : ""); ?></title>
        <link rel="stylesheet" href="css/main.css">
        <script type="text/javascript" src="js/filename.js" ></script>
    </head>
    <body>
        <table id="header">
            <tr>
                <td id="l_side"><?php if(strlen($page_title)) echo "<a href=\"./\">Back</a>" ?></td>
                <td id="title"><?php echo strlen($page_title) ? $page_title : $config["app"]["title"]; ?></td>
                <td id="r_side">
                    <?php 
                        if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
                            echo("<a href=\"./?action=logout\">Log Out</a>");
                        } else {
                            echo("<a href=\"./?action=login\">Login</a>");
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
        