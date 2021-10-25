<?php
require_once __DIR__ . "/../exception/FileException.php";
require_once __DIR__ . "/utils.php";

class File{

    private $file;



    private $fileName;



    public function __construct(string $fileInput,
    array $mimeTypes = [], 
    int $maxSize = 0)
    {
        $this->file = ($_FILES[$fileInput] ?? "");

        if (empty($this->file)){
            throw new FileException(("Se ha producido un error al procesar el formulario"));
        }
        if($this->file["error"] !== UPLOAD_ERR_OK){
            switch ($this->file["error"]){
                case UPLOAD_ERR_NO_FILE:
                        throw new FileException('Debes seleccionar un fichero');
                        break;
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                        throw new FileException('El fichero es demasiado grande');
                        break;
                case UPLOAD_ERR_PARTIAL:
                        throw new FileException('No se ha podido subir el fichero completo');
                        break;
                default:
                        throw new FileException('No se ha podido subir el fichero');
            }
        }
        if (false === in_array($this->file["type"], $mimeTypes)){
            throw new FileException('El tipo de fichero no esta soportado');
        }
        if (($maxSize >0) && ($this->file['size'] > $maxSize)){
            throw new FileException("El fichero no puede superar $maxSize bytes");
        }
        $this->fileName = sanitizeInput($this->file["name"]);
    }
    public function getFileName(): string{
        return $this->fileName;
    }

    public function saveUploadedFile(string $destPath){


        if( false === is_uploaded_file($this->file["tmp_name"])){
            throw new FileException("El archivo no se ha subido mediante un formulario");
        }

        $ruta = $destPath . $this->getFileName();

        if(true === is_file($ruta)){
            $idUnico = time();
            $this->fileName = $idUnico . "_" . $this->getFileName();
        }
        if(false === move_uploaded_file($this->file["tmp_name"], $ruta)){
            throw new FileException("No se puede mover el fichero a su destino");
        }
    }
}