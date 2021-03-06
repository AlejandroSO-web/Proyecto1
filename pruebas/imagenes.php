<?php

require_once "../entity/ImagenGaleria.php";
require_once "../database/Connection.php";
require_once "../database/QueryBuilder.php";
        $config = require_once("../app/config.php");
        $connection = Connection::make($config['database']);
        $queryBuilder = new QueryBuilder($connection);

        try {

                $imagenes = $queryBuilder->findAll('imagenes' , 'imagenGaleria');
                foreach ($imagenes as $imagen){
                        echo 'id: ' . $imagen->getId() . '<br>';
                        echo 'Imagen: ' . $imagen->getUrlGallery() . '<br>';
                        echo 'Descripcion: ' . $imagen->getDescripcion() . '<br>'; 
                }
        }catch(QueryException $qe){
                die($qe->getMessage());
        }
    include __DIR__ . "/imagenes.view.php";

