<?php
    if (isset($_POST["login"])){
        // If the login form was submitted
        $user = User::find('first', [
            'conditions' => ['email = ?', strtolower($_POST["email"])]
        ]);

        if ($user instanceOf User) {
            // Start a session and set the users session variables
            $_SESSION['user']      = $user;
            header('Location: '.$_SERVER["PHP_SELF"]);
        } else {
            $error_message = "Unable to login.";
        }

    } elseif (isset($_POST["create"])) {
        $email = strtolower($_POST['email']);
        $user_check = User::find_by_email($email);
        if ($user_check instanceOf User) {
            $error_message = "Email address already in use.";
        } elseif (!(isset($_POST['first_name']) || $_POST['first_name'] == '')) {
            $error_message = "Missing first name.";
        } elseif (!(isset($_POST['email']) || $_POST['email'] == '')) {
            $error_message = "Missing email address.";
        } elseif (!(isset($_POST['street']) || $_POST['street'] == '')) {
            $error_message = "Missing street.";
        } elseif (!(isset($_POST['city']) || $_POST['city'] == '')) {
            $error_message = "Missing city.";
        } elseif (!(isset($_POST['state']) || $_POST['state'] == '')) {
            $error_message = "Missing state.";
        } elseif (!(isset($_POST['zip']) || $_POST['zip'] == '')) {
            $error_message = "Missing zip code.";
        } else {
            $user = new User([
                'first_name'   => $_POST['first_name'],
                'email'        => $email,
                'street'       => $_POST['street'],
                'city'         => $_POST['city'],
                'state'        => $_POST['state'],
                'zip'          => $_POST['zip'],
                'instructions' => $_POST['instructions'],
            ]);
            $user->save();

            // Save the user categories
            foreach ($_POST['categories'] as $cat_id) {
                $user_category = new UserCategory([
                    'user_id'     => $user->id,
                    'category_id' => $cat_id
                ]);
                $user_category->save();
            }

            if ($user instanceOf User) {
                // Send an email to


                $_SESSION['user']      = $user;
                header('Location: '.$_SERVER["PHP_SELF"]);
            } else {
                $error_message = "Unable to create accout.";
            }
        }
    }

    // Get the list of categories to chose from
    $categories = Category::find('all');

?>
