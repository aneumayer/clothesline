<?php
    $user = User::find('first', ['id' => $_SESSION['user_id']]);
    # Get all the categories for this user with a position
    $categories = UserCategory::find('all', [
        'select'     => '*',
        'conditions' => ['user_id = ? AND position IS NOT NULL', $user->id],
        'joins'      => 'LEFT JOIN category as c ON c.id = user_category.category_id'
    ]);
?>
