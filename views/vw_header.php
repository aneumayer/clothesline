<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= $config["app"]["title"] . (strlen($page_title) ? " - {$page_title}" : ""); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <nav class="navbar navbar-toggleable-md navbar-inverse navbar-fixed-top">
            <a class="navbar-brand" href="./"><?= $config["app"]["title"] ?></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <?php if ($_GET["action"] != "login") : ?>
                    <ul class="navbar-nav">
                        <?php if(isset($_SESSION["user"]) && $_SESSION["user"]->admin == 1) : ?>
                            <li class="nav-item  <?= ($_GET['action'] == 'rank') ? "active" : "";?>">
                                <a class="nav-link" href="./?action=rank">
                                    <i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> Rank Accounts
                                </a>
                            </li>
                            <li class="nav-item  <?= ($_GET['action'] == 'accounts') ? "active" : "";?>">
                                <a class="nav-link" href="./?action=accounts">
                                    <i class="fa fa-users" aria-hidden="true"></i> Edit Accounts
                                </a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item  <?= ($_GET['action'] == 'create') ? "active" : "";?>">
                                <a class="nav-link" href="./?action=address">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> Delivery Address
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle" aria-hidden="true"></i> <?= $_SESSION['user']->first_name ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item <?= ($_GET['action'] == 'profile') ? "active" : "";?> " href="./?action=profile">
                                    <i class="fa fa-user" aria-hidden="true"></i> Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="./?action=logout">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> Log Out
                                </a>
                            </div>
                        </li>
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
