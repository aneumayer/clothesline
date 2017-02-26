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
        $this->set_user_categories($user_id, $categories);
        # Return true if the user was com_create_guid
        if($user_result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function set_user_categories($user_id, $categories) {
        global $db;
        # Remove old categories
        $db->query("DELETE FROM user_category WHERE user_id = {$user_id}");
        # Add the categories for this user
        foreach($categories as $value) {
            $category_id = $db->escape_string($value);
            $cat_result = $db->query("INSERT INTO user_category (user_id, category_id) VALUES ('{$user_id}','{$category_id}')");
        }
        
    }
    
    public function get_user($user_id) {
        global $db;
        $user_id = $db->escape_string($user_id);
        $result = $db->query("SELECT * FROM user WHERE user_id = {$user_id}");
        if(is_array($result)) {
            $user_info = $result[0];
            # Get the categories for the user
            $categories = $this->get_user_categories($user_id);
            $user_info["categories"] = $categories;
            return $user_info;
        } else {
            return false;
        }
    }
    
    public function get_user_categories($user_id) {
        global $db;
        $user_id = $db->escape_string($user_id);
        $result = $db->query("SELECT * FROM user_category WHERE user_id = {$user_id}");
        # Create an array of the category ids
        $categories = array();
        if(is_array($result)) {
            foreach($result as $value) {
                $categories[] = $value["category_id"];
            }
        }
        return $categories;
    }
    
    public function update_account($first_name, $last_name, $password, $street, $city, $state, $zip, $instructions, $categories) {
        global $db;
        # Sanitize the user input
        $first_name = $db->escape_string($first_name);
        $last_name = $db->escape_string($last_name);
        $password = md5($password);
        $street = $db->escape_string($street);
        $city = $db->escape_string($city);
        $state = $db->escape_string($state);
        $zip = $db->escape_string($zip);
        $instructions = $db->escape_string($instructions);
        # Create the user record
        $user_result = $db->query("");
        $user_id = $db->conn->insert_id;
        $this->set_user_categories($user_id, $categories);
        # Return true if the user was com_create_guid
        if($user_result) {
            return true;
        } else {
            return false;
        }
    }
    
}
?>