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
                    <a href="./?action=login">Login</a>
                </td>
            </tr>
        </table>
        