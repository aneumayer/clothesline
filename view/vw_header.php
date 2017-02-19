<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $config["app"]["title"] . (strlen($page_title) ? " - {$page_title}" : ""); ?></title>
        <link rel="stylesheet" href="css/main.css">
        <script type="text/javascript" src="js/filename.js" ></script>
    </head>
    <body>
        <h1><?php echo strlen($page_title) ? $page_title : $config["app"]["title"]; ?></h1>
        <?php if(strlen($page_title)) echo "<a href=\"./\">Back</a>" ?>
