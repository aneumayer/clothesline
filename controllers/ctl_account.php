<?php
    $user = User::find('first', ['id' => $_SESSION['user_id']]);

    if (isset($_POST['update'])) {
        # If the create account form was submitted
        $user->first_name   = $_POST['first_name'];
        $user->instructions = $_POST['instructions'];

        $post_categories = (isset($_POST['categories'])) ? $_POST['categories'] : [];

        # Remove unchecked categories
        if (isset($_POST['categories'])) {
            $removed = UserCategory::find('all', [
                'conditions' => [
                    'user_id = ? and category_id NOT IN (?)',
                    $user->id,
                    $_POST['categories']
                ]
            ]);

             # Add new categories
            foreach ($_POST['categories'] as $category_id) {
                # Get the user's category if it already exists
                $user_category = UserCategory::find('first', [
                    'conditions' => [
                        'user_id = ? and category_id = ?',
                        $user->id,
                        $category_id
                ]]);
                # If there is no entry add it
                if (!($user_category instanceOf UserCategory)) {
                    $user_category = new UserCategory([
                        'user_id'     => $user->id,
                        'category_id' => $category_id
                    ]);
                    $user_category->save();
                }
            }
        } else {
            $removed = UserCategory::find('all', [
                'conditions' => ['user_id = ?', $user->id,]
            ]);
        }
        foreach($removed as $user_cat) {
            if ($user_cat instanceOf UserCategory) {
                $user_cat->delete();
            }
        }

        if ($user->save()) {
            $success_message = 'Account updated.';
        } else {
            $error_message = 'Unable to update accout.';
        }
    }

    if (isset($_POST['reset'])) {
        $current = $user->password;
        if ($current == md5($_POST['old_password'])) {
            if ($_POST['password'] == $_POST['password2']) {
                $user->password = md5($_POST['password']);
                if ($user->save()) {
                    $success_message = 'Password updated.';
                } else {
                    $error_message = 'Unable to update accout.';
                }
            } else {
                $error_message = "Password fields did not match.";
            }
        } else {
            $error_message = 'Old password incorrect.';
        }
    }

    $categories = Category::find('all');
    $user_categories = UserCategory::find('all', ['conditions' => ['user_id = ?', $user->id]]);

?>
