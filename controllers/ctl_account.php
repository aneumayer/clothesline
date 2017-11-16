<?php
    $user = User::find('first', ['id' => $_SESSION['user_id']]);

    if(isset($_POST['update'])) {
        # If the create account form was submitted
        $user->first_name   = $_POST['first_name'];
        $user->last_name    = $_POST['last_name'];
        $user->email        = $_POST['email'];
        $user->street       = $_POST['street'];
        $user->city         = $_POST['city'];
        $user->state        = $_POST['state'];
        $user->zip          = $_POST['zip'];
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

        if($user->save()) {
            $success_message = 'Account updated.';
        } else {
            $error_message = 'Unable to update accout.';
        }
    }
    $categories = Category::find('all');
    $user_categories = UserCategory::find('all', ['conditions' => ['user_id = ?', $user->id]]);

?>
