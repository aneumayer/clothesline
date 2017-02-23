<?php 

class user {
    
    public function login($email, $password) {
        global $db;
        $email = $db->escape_string($email);
        $password = md5($password);
        $result = $db->query("SELECT * FROM user WHERE email = '{$email}' AND password = '{$password}'");
        return $result;
    }
    
    public function create_account($first_name, $last_name, $email, $password, $street, $city, $state, $zip, $instructions, $categories) {
        global $db;
        # Sanitize the user input
        $first_name = $db->escape_string($first_name);
        $last_name = $db->escape_string($last_name);
        $email = $db->escape_string($email);
        $password = md5($password);
        $street = $db->escape_string($street);
        $city = $db->escape_string($city);
        $state = $db->escape_string($state);
        $zip = $db->escape_string($zip);
        $instructions = $db->escape_string($instructions);
        # Create the user record
        $user_result = $db->query("INSERT INTO user (first_name, last_name, email, password, street, city, state, zip, instructions, created)
            VALUES ('{$first_name}','{$last_name}','{$email}','{$password}','{$street}','{$city}','{$state}','{$zip}', '{$instructions}', now())");
        $user_id = $db->conn->insert_id;
        # Add the categories for this user
        foreach($categories as $value) {
            $category_id = $db->escape_string($value);
            $cat_result = $db->query("INSERT INTO user_category (user_id, category_id) VALUES ('{$user_id}','{$category_id}')");
        }
        # Return true if the user was com_create_guid
        if($user_result) {
            return true;
        } else {
            return false;
        }
    }
    
}
?>