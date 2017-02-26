<?php 
    require_once("objects/package.php");
    require_once("objects/user.php");
    
    $package = new package();
    $user = new user();
    
    if(isset($_POST["update"])) {
        # If the create account form was submitted
        $user = new user();
        $result = $user->update_account($_POST["first_name"], $_POST["last_name"], $_POST["password"], 
            $_POST["street"], $_POST["city"], $_POST["state"], $_POST["zip"], $_POST["instructions"], $_POST["categories"]);
        if($result) {
            $success_message = "Account updated.";
        } else {
            $error_message = "Unable to update accout.";
        }
    } 
    
    $account_data = $user->get_user($_SESSION["user_id"]);
    $categories = $package->getCategories();
    
?>