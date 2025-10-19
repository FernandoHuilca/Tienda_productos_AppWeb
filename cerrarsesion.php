<?php
    #Voy a manejar las sessiones entonces : 
    session_start(); # lo levanto como Jesus a Lázaro xd  

    if(!isset($_COOKIE["c_recordarme"])){ #si no existe una cookie para recordarme quiere decir que el usuario no quiere guardar nada
        foreach($_COOKIE as $name => $value){
            setcookie($name, "", 1);
        }
        
    }

    session_destroy(); // coge las sesiones creadas y las desaparece como a los Restrepo. 

    header("Location:index.php");
?>