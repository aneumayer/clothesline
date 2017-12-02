<?php
    // Admin check
    if($_SESSION["user"]->admin != 1) {
        header('Location: '.$_SERVER["PHP_SELF"].'?action=home');
    }

    $users = User::find('all',[
        'conditions' => ['admin != 1'],
        'order'      => 'created_at DESC'
    ]);

?>
