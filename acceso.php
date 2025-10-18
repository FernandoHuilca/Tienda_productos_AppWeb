<?php
#Imprimo para ver si todo correcto todo bien:
echo "<pre>" . print_r($_POST , true) . "</pre>";

#declaro mis variables simulando una BD
$usuario = "Fernando";
$clave = "123";


#Guardo lo que me envia el formulario 
$f_usuario = $_POST["usuario"];
$f_clave = $_POST["clave"];
$f_recordarme = isset($_POST["recordarme"]); 


#Si el usuario y contrasenia coincide le doy acceso 
if($usuario == $f_usuario && $clave == $f_clave){

    #Si el usuario tiene acceso le creo una sesion


    #si el usuario quiere que le recuerden le doy una galletita 
    if($f_recordarme){
        #sercookie(nombreVariable, valor, tiempo) si el tiempo es cero se espera a que cierres el navegador
        setcookie("c_usuario", $f_usuario, 0);
        setcookie("c_clave", $f_clave, 0);
        setcookie("c_recordarme", $f_recordarme, 0);# en el doc se especifica que solo el usuario y clave deben volverse a llenar  
    }else{
        //borrar las cookies existentes: 
        if(isset($_COOKIE)){
            foreach($_COOKIE as $name => $value){
                setcookie($name, "", 1);
            }

        }
    }



    #si quiere o no ser recordado igual le mando al panel principal porque si tiene acceso 
    header("Location:panelprincipal.php");

}else{
    #no coinciden ni clave ni usuario
    header("Location:index.php");

}




?> 