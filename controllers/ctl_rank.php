<?php
    // Admin check
    if ($_SESSION["user"]->admin != 1) {
        header('Location: '.$_SERVER["PHP_SELF"].'?action=home');
    }

    $categories = Category::find('all');

    if (isset($_POST['save'])) {
        // Get all the existing users
        $category_users = UserCategory::find_all_by_category_id($_POST['category']);
        // Clear all the existing positions
        foreach ($category_users as $cat_user) {
            $cat_user->position = 0;
            $cat_user->save();
        }
        // Add the new users to the category
        $position = 1;
        foreach ($_POST['ranked'] as $user_id) {
            if ($user_id > 0) {
                $category_user = UserCategory::find('first', [
                    'conditions' => ['user_id = ? AND category_id = ?', $user_id, $_POST['category']]
                ]);
                if($category_user instanceOf UserCategory) {
                    $category_user->position = $position;
                    $category_user->save();
                }
                $position++;
            }
        }
        $success_message = 'New order has been saved.';
    }

    $ranked_users = [];
    $unranked_users = [];
    if (isset($_POST['category'])) {
        $ranked_users = User::find('all', [
            'select'     => '*',
            'conditions' => ['category_id = ? AND position > 0', $_POST['category']],
            'joins'      => 'LEFT JOIN user_category as uc ON user.id = uc.user_id',
            'order'      => 'position ASC'
        ]);
        $unranked_users = User::find('all', [
            'select'     => '*',
            'conditions' => ['category_id = ? AND position = 0', $_POST['category']],
            'joins'      => 'LEFT JOIN user_category as uc ON user.id = uc.user_id',
            'order'      => 'first_name ASC'
        ]);
    }
?>
