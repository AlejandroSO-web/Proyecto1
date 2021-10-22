<?php
    $title = "Contact";
    require_once "./utils/utils.php";

$info = $description = $urlImagen ="";
$descriptionError = $imagenErr = $hayErrores = false;
$errores= [];

if("POST" === $_SERVER["REQUEST_METHOD"]){
    if (empty($_POST)){
        $errores[] = "Se ha producido un error al procesar el formulario";
        $imagenErr = true;
    }
    if(!$imagenErr){
        $description = sanitizeInput(($_POST["description"] ?? ""));

        if(empty($description)){
            $errores[] ="La descripcion es obligatoria";
            $descriptionError = true;
        }
    }

    if(isset($_FILES['imagen']) && ($_FILES['imagen']['error'] == UPLOAD_ERR_OK)){
        if ($_FILES['imagen']['size'] > (2 * 1024 * 1024)){
            $errores[] = "El archivo no puede superar los 2MB";
            $imagenErr = true;
        }
            $extensions = array("image/jpeg","image/jpg","image/png");

            if( false === in_array($_FILES['imagen']['type'], $extensions)){
                $errores[] = "Extension no permitida, solo son validos archivos jpg o png";
                $imagenErr = true;
        }
        if (!$imagenErr){
            if (false === move_uploaded_file($_FILES['imagen']['tmp_name'],'images/index/gallery/'.$_FILES['images']['name'])){
                $errores[] = "Se ha producido un error al mover la imagen";
                $imagenErr = true;
            }
        }
    }else{
        $errores[] = "Se ha producido un error. Codigo de error : " . $_FILES['imagen']['error'];
        $imagenErr = true;
    } 


    if (sizeOf($errores) >0){
        $hayErrores = true;
    }

    if (!$hayErrores){
        $info = "Imagen enviada correctamente";
        $urlImagen = "images/index/gallery/" . $_FILES['images']['name'];
        $description = "";
    }else{
        $info = "Datos erroneos";
    }
    }

include("./views/galeria.view.php");
?>