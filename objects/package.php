<?php 

class package {
    
    # Get the list of categories in use
    public function getCategories() {
        global $db;
        $result = $db->query("SELECT * FROM category");
        return $result;
    }
}

?>