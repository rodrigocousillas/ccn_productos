
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
                <h4> <i class="fa-solid fa-newspaper"></i> Listar productos</h4>  
            </div>
            <div class="col-md-6">
            <a class="btn btn-success" style="float: right;" href="/ccn_productos/public_html/productos/crear">Agregar producto</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped" style="width:100%; float: left;">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Linea</th>
                        <th>Tipo de producto</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
            <tbody>
            <?php foreach( $productos as $producto ): ?>
                <tr>
                    <td><?php echo $producto->nombre; ?></td>
                    <td><?php echo $producto->linea; ?></td>
                    <td><?php echo $producto->tipo_de_producto; ?></td>
                    <td><a class="btn btn-primary" href="/ccn_productos/public_html/productos/actualizar?id=<?php echo $producto->id; ?>">Modificar</a></td>
                    <td>
                        <form method="POST" class="w-100" action="/ccn_productos/public_html/productos/eliminar">
                            <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                            <input type="hidden" name="tipo" value="producto">
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>    
            </tbody>
        </table>
    </div>        
</div>