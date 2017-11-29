<?php
    $user = $_SESSION['user'];
    # Get all the categories for this user with a position
    $categories = UserCategory::find('all', [
        'select'     => '*',
        'conditions' => ['user_id = ? AND position > 0', $user->id],
        'joins'      => 'LEFT JOIN category as c ON c.id = user_category.category_id'
    ]);

    // Display variables
    $only      = false;
    $next_user = false;

    if (isset($_POST['category'])) {
        // Get the next address for this category
        $me = UserCategory::find('first', [
            'conditions' => [
                'user_id = ? AND category_id = ?',
                $user->id, $_POST['category']
            ]
        ]);
        $my_pos = $me->position;

        $next = UserCategory::find('first', [
            'conditions' => [
                'category_id = ? AND position > ?',
                $_POST['category'], $my_pos
            ]
        ]);

        if ($next instanceOf UserCategory) {
            $next_user = User::find_by_id($next->user_id);
        } else {
            if ($my_pos > 1) {
                $next = UserCategory::find('first', [
                    'conditions' => [
                        'category_id = ? AND position = 1',
                        $_POST['category']
                    ]
                ]);
                $next_user = User::find_by_id($next->user_id);
            } else {
                $only = true;
            }
        }


    }
?>
