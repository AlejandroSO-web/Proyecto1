<?php
function esOpcionMenuActiva(string $option): bool {

   if(strpos($_SERVER["REQUEST_URI"],"/". $option)){
       return true;
   }else
       return false;
}

function existeOpcionMenuActivaEnArray(array $options): bool{

    foreach( $options as $option){
        if(esOpcionMenuActiva($option)){
            return true;
        }else
        return false;
    }
}

function sanitizeInput(string $data): string{

    $date = trim($data);
    //Quitar las comillas / \ y ""
    $date = stripslashes($data);
    //Prevenir la introduccion de scripts
    $date = htmlspecialchars($data);
    return $data;
}



?>