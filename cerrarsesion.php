<?php
    #Voy a manejar las sessiones entonces : 
    session_start(); # lo levanto como Jesus a Lázaro xd  

    if(isset($_COOKIE["c_recordarme"]) && !$_COOKIE["c_recordarme"]){ #si existe una cookie para recordarme y esta es false entonces borro todo
        foreach($_COOKIE as $name => $value){
            setcookie($name, "", 1);
        }
        
    }

    session_destroy(); // coge las sesiones creadas y las desaparece como a los Restrepo. 

    header("Location:index.php");
?>