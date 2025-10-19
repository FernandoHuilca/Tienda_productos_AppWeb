<?php
    if (isset($_GET['lang'])){
        setcookie('lang', $_GET['lang'], 0);
    } 
    header("Location: panelprincipal.php");

?>