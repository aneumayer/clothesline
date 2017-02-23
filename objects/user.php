<?php 

class user {
    
    public function login($email, $password) {
        global $db;
        $email = $db->escape_string($email);
        $password = md5($password);
        
        $result = $db->query("SELECT * FROM user WHERE email = '{$email}' AND password = '{$password}'");
        
    }
    
    public function create_account($first_name, $last_name, $email, $password, $street, $city, $state, $zip, $categories) {
        global $db;
        # Sanitize the user input
        $first_name = $db->escape_string($first_name);
        $last_name = $db->escape_string($last_name);
        $email = $db->escape_string($email);
        $password = md5($password);
        $street = $db->escape_string($street);
        $city = $db->escape_string($city);
        $state = $db->escape_string();
        $zip = $db->escape_string();
        for each($categories as $key => $value) {
            $categories[$key] = $db->escape_string($value);
        }
        # Create the user record
        $result = $db->query("INSERT INTO user (first_name, last_name, email, password, street, city, state, zip, created)
            VALUES ('{$first_name}','{$last_name}','{$email}','{$password}','{$street}','{$city}','{$state}','{$zip}', now())");
        
    }
    
}
?>