<?php
    $user = $_SESSION['user'];
    // Get all the categories for this user with a position
    $categories = UserCategory::find('all', [
        'select'     => '*',
        'conditions' => ['user_id = ? AND position > 0', $user->id],
        'joins'      => 'LEFT JOIN category as c ON c.id = user_category.category_id'
    ]);

    // Display variables
    $only      = false;
    $next_user = false;

    if (isset($_GET['category'])) {
        // Get my current position in this category
        $me = UserCategory::find('first', [
            'conditions' => [
                'user_id = ? AND category_id = ?',
                $user->id, $_GET['category']
            ],
            'order'      => 'position ASC'
        ]);
        $my_pos = $me->position;

        // Get the first position in this category
        $top = UserCategory::find('first', [
            'conditions' => [
                'category_id = ? AND position > 0',
                $_GET['category']
            ],
            'order'      => 'position ASC'
        ]);
        $top_pos = $top->position;

        // Get the next position in the category
        $next = UserCategory::find('first', [
            'conditions' => [
                'category_id = ? AND position > ?',
                $_GET['category'], $my_pos
            ],
            'order'      => 'position ASC'
        ]);

        if ($next instanceOf UserCategory) {
            $next_user = User::find_by_id($next->user_id);
        } else {
            if ($my_pos > $top_pos) {
                $next = UserCategory::find('first', [
                    'conditions' => [
                        'category_id = ? AND position = ?',
                        $_GET['category'], $top_pos
                    ]
                ]);
                $next_user = User::find_by_id($next->user_id);
            } else {
                $only = true;
            }
        }


    }
?>
