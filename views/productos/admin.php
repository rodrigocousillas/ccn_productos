
    <?php 
        if($resultado) {
            $mensaje = mostrarNotificacion( intval( $resultado) );
            if($mensaje) { ?>
                <p class="alert alert-primary"><?php echo s($mensaje); ?></p>
    <?php  
            } 
        }
    ?>

<div class="card mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4> <i class="fa-solid fa-newspaper"></i> Listar novedades</h4>  
            </div>
            <div class="col-md-6">
            <a class="btn btn-success" style="float: right;" href="/novedades/crear">Agregar novedad</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped" style="width:100%; float: left;">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Título</th>
                        <th>Bajada</th>
                        <th>Visitas</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
            <tbody>
            <?php foreach( $novedades as $novedad ): ?>
                <tr>
                    <td><?php echo $novedad->fecha; ?></td>
                    <td><?php echo $novedad->titulo_novedad; ?></td>
                    <td><?php echo $novedad->bajada_novedad; ?></td>
                    <td><?php echo $novedad->visitas; ?></td>
                    <td><a class="btn btn-primary" href="actualizar?id=<?php echo $novedad->id; ?>">Modificar</a></td>
                    <td>
                        <form method="POST" class="w-100" action="eliminar">
                            <input type="hidden" name="id" value="<?php echo $novedad->id; ?>">
                            <input type="hidden" name="tipo" value="novedad">
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>    
            </tbody>
        </table>
    </div>        
</div>