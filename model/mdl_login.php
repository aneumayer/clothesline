<?php 
    require_once("objects/package.php");
    
    # Get the list of categories to chose from
    $package = new package();
    $categories = $package->getCategories();
?>