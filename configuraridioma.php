<?php
    if (isset($_GET['lang'])){
        setcookie('lang', $_GET['lang'], time() + (86400 * 30), "/"); // 86400 = 1 day
    } 
    header("Location: panelprincipal.php");

?>