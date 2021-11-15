<div id='categoria-<?=$idCategoria?>'>

    <h1>Lista de fotos</h1>

    <?php foreach($imagenes as $imagen): ?>

    <img class="img-responsive" src="/images/index/portfolio/<?=$imagen["nombre"]?>" alt="<?=$imagen["alt"]?>">

    <?php endforeach; ?>    

</div>  