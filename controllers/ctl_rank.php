<?php
    # Admin check
    if ($_SESSION["user"]->admin != 1) {
        header('Location: '.$_SERVER["PHP_SELF"].'?action=home');
    }

    $categories = Category::find('all');

    if (isset($_POST['save'])) {
        # Get all the existing users
        /*$category_users = UserCategory::find('all', [
            'select'     => '*',
            'conditions' => ['category_id = ?', $_POST['category']],
            'joins'      => 'LEFT JOIN user as u ON u.id = user_category.user_id',
        ]);*/
        # Delte all the users currently in the category
        /*foreach ($category_users as $cat_user) {
            $cat_user->delete();
        }*/
        # Add the new users to the category
        /*foreach ($_POST['ranking'] as $user_id => $position) {
            if ($position > 0) {
                $new_pos = UserCategory([
                    'user_id'     => $user_id,
                    'category_id' => $_POST['category'],
                    'position'    => $position
                ]);
                $new_pos->save();
            }
        }*/
    }

    $ranked_users = [];
    $unranked_users = [];
    if (isset($_POST['category'])) {
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
