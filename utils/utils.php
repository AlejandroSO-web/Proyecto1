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





?>