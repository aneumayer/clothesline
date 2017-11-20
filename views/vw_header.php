<!DOCTYPE html>
<html>
    <head>
        <title><?= $config["app"]["title"] . (strlen($page_title) ? " - {$page_title}" : ""); ?></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script type="text/javascript" src="js/jquery-3.1.1.min.js" ></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><?= $config["app"]["title"] ?></a>
                </div>
                <?php if ($_GET["action"] != "login") : ?>
                    <ul class="nav navbar-nav">
                        <li <?= ($_GET['action'] == 'register') ? "class=\"active\"" : "";?>>
                            <a href="./?action=register">Register New Load</a>
                        </li>
                        <li <?= ($_GET['action'] == 'check_in') ? "class=\"active\"" : "";?>>
                            <a href="./?action=check_in">Check in Load</a>
                        </li>
                        <?php if(isset($_SESSION['admin']) && $_SESSION["admin"] == 1) { ?>
                            <li <?= ($_GET['action'] == 'track') ? "class=\"active\"" : "";?>>
                                <a href="./?action=track">Track Loads</a>
                            </li>
                            <li <?= ($_GET['action'] == 'details') ? "class=\"active\"" : "";?>>
                                <a href="./?action=details">Load Details</a>
                            </li>
                            <li <?= ($_GET['action'] == 'rank') ? "class=\"active\"" : "";?>>
                                <a href="./?action=rank">Rank Accounts</a>
                            </li>
                        <?php } ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li <?= ($_GET['action'] == 'account') ? "class=\"active\"" : "";?>>
                            <a href="./?action=account"><span class="glyphicon glyphicon-user"></span> Account</a>
                        </li>
                        <li><a href="./?action=logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </nav>
        <?php if (isset($success_message)) : ?>
            <div class="alert alert-success">
                <?= $success_message ?>
            </div>
        <?php endif; ?>
        <?php if (isset($info_message)) : ?>
            <div class="alert alert-info">
                <?= $info_message ?>
            </div>
        <?php endif; ?>
        <?php if (isset($warning_message)) : ?>
            <div class="alert alert-warning">
                <?= $warning_message ?>
            </div>
        <?php endif; ?>
        <?php if (isset($error_message)) : ?>
            <div class="alert alert-danger">
                <?= $error_message ?>
            </div>
        <?php endif; ?>
