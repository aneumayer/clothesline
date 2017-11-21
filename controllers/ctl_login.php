<?php
    if (isset($_POST["login"])){
        # If the login form was submitted
        $user = User::find('first', [
            'conditions' => [
                'email = ? and password = ?',
                $_POST["email"],
                md5($_POST["password"])
            ]
        ]);

        if ($user instanceOf User) {
            # Start a session and set the users session variables
            $_SESSION["logged_in"] = true;
            $_SESSION["user_id"]   = $user->id;
            $_SESSION["admin"]     = $user->admin;
            header('Location: '.$_SERVER["PHP_SELF"]);
        } else {
            $error_message = "Unable to login.";
        }

    } elseif (isset($_POST["create"])) {
        if ($_POST['password'] == $_POST['password2']) {
            $user = new User([
                'first_name'   => $_POST['first_name'],
                'email'        => $_POST['email'],
                'password'     => md5($_POST['password']),
                'street'       => $_POST['street'],
                'city'         => $_POST['city'],
                'state'        => $_POST['state'],
                'zip'          => $_POST['zip'],
                'instructions' => $_POST['instructions'],
            ]);
            $user->save();

            # Save the user categories
            foreach ($_POST['categories'] as $cat_id) {
                $user_category = new UserCategory([
                    'user_id'     => $user->id,
                    'category_id' => $cat_id
                ]);
                $user_category->save();
            }

            if ($user instanceOf User) {
                $_SESSION["logged_in"] = true;
                $_SESSION["user_id"]   = $user->id;
                $_SESSION["admin"]     = $user->admin;
                header('Location: '.$_SERVER["PHP_SELF"]);
            } else {
                $error_message = "Unable to create accout.";
            }

        } else {
            $error_message = "Password fields did not match.";
        }

    }

    # Get the list of categories to chose from
    $categories = Category::find('all');

?>
