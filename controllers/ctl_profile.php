<?php
    $user = $_SESSION['user'];

    $categories = Category::find('all');
    $user_categories = UserCategory::find('all', ['conditions' => ['user_id = ?', $user->id]]);

?>
