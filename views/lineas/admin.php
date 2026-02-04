
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
                <h4> <i class="fa-solid fa-list"></i> Listar Líneas</h4>  
            </div>
            <div class="col-md-6">
            <a class="btn btn-success" style="float: right;" href="/ccn_productos/public_html/lineas/crear">Agregar Línea</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped" style="width:100%; float: left;">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
            <tbody>
            <?php foreach( $lineas as $linea ): ?>
                <tr>
                    <td><?php echo $linea->nombre; ?></td>
                    <td><a class="btn btn-primary" href="/ccn_productos/public_html/lineas/actualizar?id=<?php echo $linea->id; ?>">Modificar</a></td>
                    <td>
                        <form method="POST" class="w-100" action="/ccn_productos/public_html/lineas/eliminar">
                            <input type="hidden" name="id" value="<?php echo $linea->id; ?>">
                            <input type="hidden" name="tipo" value="linea">
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>    
            </tbody>
        </table>
    </div>        
</div>
