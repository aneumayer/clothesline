<?php
    require_once('objects/package.php');
    require_once('objects/user.php');

    $package = new package();
    $user = new user();

    if(isset($_POST['update'])) {
        # If the create account form was submitted
        $user = new User([
            'fist_name'    => $_POST['first_name'],
            'last_name'    => $_POST['last_name'],
            'password'     => md5($_POST['password']),
            'street'       => $_POST['street'],
            'city'         => $_POST['city'],
            'state'        => $_POST['state'],
            'zip'          => $_POST['zip'],
            'instructions' => $_POST['instructions'],
            'categories'   => $_POST['categories']
        ]);
        $user->save();

        if($user->save()) {
            $success_message = 'Account updated.';
        } else {
            $error_message = 'Unable to update accout.';
        }
    }

    $account_data = $user->get_user($_SESSION['user_id']);
    $categories = $package->getCategories();

?>
