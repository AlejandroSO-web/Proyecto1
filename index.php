<?php
    $title = "Home";
    require_once "./utils/utils.php";
    require_once "./entity/ImagenGaleria.php";
    $galeria[] = new ImagenGaleria("1.jpg", "Descripcion imagen 1", 1,5,6);
    $galeria[] = new ImagenGaleria("1.jpg", "Descripcion imagen 2", 3,4,5);
    $galeria[] = new ImagenGaleria("1.jpg", "Descripcion imagen 3", 4,6,1);
    $galeria[] = new ImagenGaleria("1.jpg", "Descripcion imagen 4", 3,5,8);
    $galeria[] = new ImagenGaleria("1.jpg", "Descripcion imagen 5", 4,8,2);
    $galeria[] = new ImagenGaleria("1.jpg", "Descripcion imagen 6", 6,9,8);
    $galeria[] = new ImagenGaleria("1.jpg", "Descripcion imagen 7", 9,10,16);
    $galeria[] = new ImagenGaleria("1.jpg", "Descripcion imagen 8", 10,1,56);
    $galeria[] = new ImagenGaleria("1.jpg", "Descripcion imagen 9", 11,3,66);
    $galeria[] = new ImagenGaleria("1.jpg", "Descripcion imagen 10", 14,5,3);
    $galeria[] = new ImagenGaleria("1.jpg", "Descripcion imagen 11", 13,4,0);
    $galeria[] = new ImagenGaleria("1.jpg", "Descripcion imagen 12", 15,1,1);
    include("./views/index.view.php");