<?php
    # Admin check
    if($_SESSION["user"]->admin != 1) {
        header('Location: '.$_SERVER["PHP_SELF"].'?action=home');
    }

    $categories = Category::find('all');

    $ranked_users = [];
    $unranked_users = [];
    if(isset($_POST['category'])) {
        $ranked_users = User::find('all', [
            'select'     => '*',
            'conditions' => ['category_id = ? AND position IS NOT NULL', $_POST['category']],
            'joins'      => 'LEFT JOIN user_category as uc ON user.id = uc.user_id',
            'order'      => 'position ASC'
        ]);
        $unranked_users = User::find('all', [
            'select'     => '*',
            'conditions' => ['category_id = ? AND position IS NULL', $_POST['category']],
            'joins'      => 'LEFT JOIN user_category as uc ON user.id = uc.user_id',
            'order'      => 'first_name ASC'
        ]);
    }
?>
