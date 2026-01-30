<?php
    $seccion = "";
?>
<section class="container-fluid fondo_seccion">
    <div class="container">
            <h1>Novedades</h1>
            <p>Actualidad del mundo de la cultura</p>
        </div>
    </div>    
</section>
<div class="container-fluid">
    <div class="container">
        <div class="row">
        <?php foreach($novedades as $novedad) { ?>
            <div class="col-md-4 card_obras_home">
                <div class="card">
                    <div class="card-body">
                        <div class="novedades_sub_home">
                            <p><?php echo $novedad->fecha ?></p>
                            <img src="prensa/<?php echo $novedad->imagen;?>" class="card-img-top" alt="<?php echo $novedad->titulo_novedad ?>">
                            <h2><?php echo $novedad->titulo_novedad ?></h2>
                            <h3><?php echo $novedad->bajada_novedad ?></h3>
                            <a href="obra_literaria?id=<?php echo $novedad->id;?>" class="leerMas">-> Leer</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>   
        <?php
            echo $paginacion;
        ?>  
    </div>
</div>