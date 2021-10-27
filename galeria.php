<?php
    $title = "Galeria";
    require_once "./utils/utils.php";
    require_once "./entity/ImagenGaleria.php";
    require_once "./utils/File.php";
    require_once "./exceptions/FileException.php";
    require_once "./utils/SimpleImage.php";

$info = $description = $urlImagen ="";
$descriptionError = $imagenErr = $hayErrores = false;
$errores= [];

if("POST" === $_SERVER["REQUEST_METHOD"]){
    
    try{

    if (empty($_POST)){
        throw new FileException('Se ha producido un error al procesar el formulario');
    }
        $imageFile = new File("imagen", 
        array("image/jpeg","image/jpg","image/png") ,
         (2 * 1024 * 1024));
        $imageFile->saveUploadedFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);

    try {
        $simpleImage = new \claviska\SimpleImage();

        $simpleImage
        ->fromFile(ImagenGaleria::RUTA_IMAGENES_GALLERY . $imageFile->getFileName())
        ->resize(975,525)
        ->toFile(ImagenGaleria::RUTA_IMAGENES_PORTFOLIO . $imageFile->getFileName())
        ->resize(650,350)
        ->toFile(ImagenGaleria::RUTA_IMAGENES_GALLERY . $imageFile->getFileName());
    }catch(Exception $err){
        $errores[]= $err->getMessage();
        $imagenErr = true;
    }

    }catch(FileException $fe){
            $errores[] = $fe->getMessage();
            $imagenErr = true;
    }
    $description = sanitizeInput(($_POST["description"] ?? ""));
        
        if(empty($description)){
            $errores[] ="La descripcion es obligatoria";
            $descriptionError = true;
        }

        if (0 == count($errores)){
            $info = 'Imagen enviada correctamente';
            $urlImagen = ImagenGaleria::RUTA_IMAGENES_GALLERY . $imageFile->getFileName();
            $description = "";
        }else{
            $info ="Datos erroneos";
        }
    }
include("./views/galeria.view.php");
?>