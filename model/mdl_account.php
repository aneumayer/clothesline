<?php
    $user = User::find('first', ['id' => $_SESSION['user_id']]);

    if(isset($_POST['update'])) {
        # If the create account form was submitted
        $user->first_name   = $_POST['first_name'];
        $user->last_name    = $_POST['last_name'];
        $user->email        = $_POST['email'];
        $user->password     = md5($_POST['password']);
        $user->street       = $_POST['street'];
        $user->city         = $_POST['city'];
        $user->state        = $_POST['state'];
        $user->zip          = $_POST['zip'];
        $user->instructions = $_POST['instructions'];

        # Save the user categories
        foreach($_POST['categories'] as $cat_id) {
            $user_category = new UserCategory([
                'user_id'     => $user->id,
                'category_id' => $cat_id
            ]);
            $user_category->save();
        }

        $user->save();

        if($user->save()) {
            $success_message = 'Account updated.';
        } else {
            $error_message = 'Unable to update accout.';
        }
    }

    $categories = Category::find('all');

?>
