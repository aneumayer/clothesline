<?php 
    # Admin check
    if(isset($_SESSION['admin']) && !$_SESSION["admin"]) {
        header('Location: '.$_SERVER["PHP_SELF"].'?action=home');
    }

?>