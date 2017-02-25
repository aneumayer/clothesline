<?php 
    session_destroy();
    setcookie(session_name(), '', time() -3600);
    $_SESSION = array();
    header('Location: '.$_SERVER["PHP_SELF"].'?action=login');
?>