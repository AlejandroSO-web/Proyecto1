<?php
    $title = "Home";
    require_once "./utils/utils.php";
    require_once "./entity/ImagenGaleria.php";
    require_once "./entity/Asociado.php";
    $galeria[] = new ImagenGaleria("1.jpg", "Descripcion imagen 1", 1,5,6);
    $galeria[] = new ImagenGaleria("2.jpg", "Descripcion imagen 2", 3,4,5);
    $galeria[] = new ImagenGaleria("3.jpg", "Descripcion imagen 3", 4,6,1);
    $galeria[] = new ImagenGaleria("4.jpg", "Descripcion imagen 4", 3,5,8);
    $galeria[] = new ImagenGaleria("5.jpg", "Descripcion imagen 5", 4,8,2);
    $galeria[] = new ImagenGaleria("6.jpg", "Descripcion imagen 6", 6,9,8);
    $galeria[] = new ImagenGaleria("7.jpg", "Descripcion imagen 7", 9,10,16);
    $galeria[] = new ImagenGaleria("8.jpg", "Descripcion imagen 8", 10,1,56);
    $galeria[] = new ImagenGaleria("9.jpg", "Descripcion imagen 9", 11,3,66);
    $galeria[] = new ImagenGaleria("10.jpg", "Descripcion imagen 10", 14,5,3);
    $galeria[] = new ImagenGaleria("11.jpg", "Descripcion imagen 11", 13,4,0);
    $galeria[] = new ImagenGaleria("12.jpg", "Descripcion imagen 12", 15,1,1);

    $asociados[] = new Asociado("Asociados","./images/index/log1.jpg", "Descripcion");
    $asociados[] = new Asociado("Asociados","./images/index/log2.jpg", "Descripcion");
    $asociados[] = new Asociado("Asociados","./images/index/log3.jpg", "Descripcion");
    $asociados[] = new Asociado("Asociados","./images/index/log4.jpg", "Descripcion");
    include("./views/index.view.php");