<?php 
    require_once("objects/package.php");
    require_once("objects/user.php");

    if(isset($_POST["login"])){
        # If the login form was submitted
        $user = new user();
        $result = $user->login($_POST["email"], $_POST["password"]);
        if($result) {
            #Start a session and set the users session variables
            session_start();
            $_SESSION["logged_id"] = true;
            $_SESSION["user_id"] = $result['user_id'];
            $_SESSION["admin"] = $result['admin'];
            header('Location: '.$_SERVER["PHP_SELF"]);
        } else {
            $error_message = "Unable to login.";
        }
    } elseif(isset($_POST["create"])) {
        # If the create account form was submitted
        $user = new user();
        $result = $user->create_account($_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["password"], 
            $_POST["street"], $_POST["city"], $_POST["state"], $_POST["zip"], $_POST["instructions"], $_POST["categories"]);
        if($result) {
            $success_message = "Account created.";
        } else {
            $error_message = "Unable to create accout.";
        }
    } 
    
    # Get the list of categories to chose from
    $package = new package();
    $categories = $package->getCategories();
    
?>