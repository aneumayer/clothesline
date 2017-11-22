<!DOCTYPE html>
<html>
    <head>
        <title><?= $config["app"]["title"] . (strlen($page_title) ? " - {$page_title}" : ""); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script type="text/javascript" src="js/jquery-3.1.1.min.js" ></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary navbar-fixed-top">
            <a class="navbar-brand" href="./"><?= $config["app"]["title"] ?></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <?php if ($_GET["action"] != "login") : ?>
                    <ul class="navbar-nav">
                        <li class="nav-item  <?= ($_GET['action'] == 'create') ? "active" : "";?>">
                            <a class="nav-link" href="./?action=create">Create a Load</a>
                        </li>
                        <li class="nav-item  <?= ($_GET['action'] == 'check_in') ? "active" : "";?>">
                            <a class="nav-link" href="./?action=check_in">Check in Load</a>
                        </li>
                        <?php if(isset($_SESSION['admin']) && $_SESSION["admin"] == 1) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Admin
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item <?= ($_GET['action'] == 'track') ? "active" : "";?>" href="./?action=track">Track Loads</a>
                                    <a class="dropdown-item <?= ($_GET['action'] == 'details') ? "active" : "";?>" href="./?action=details">Load Details</a>
                                    <a class="dropdown-item <?= ($_GET['action'] == 'rank') ? "active" : "";?>" href="./?action=rank">Rank Accounts</a>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item  <?= ($_GET['action'] == 'account') ? "active" : "";?>">
                            <a class="nav-link" href="./?action=account"><i class="fa fa-user" aria-hidden="true"></i> Account</a>
                        </li>
                        <li><a class="nav-link" href="./?action=logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
                    </ul>
                <?php endif; ?>
            </div>
        </nav>
        <div class="container">
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
