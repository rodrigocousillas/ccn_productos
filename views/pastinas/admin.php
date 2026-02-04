
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
                <h4> <i class="fa-solid fa-layer-group"></i> Listar Pastinas</h4>  
            </div>
            <div class="col-md-6">
            <a class="btn btn-success" style="float: right;" href="/ccn_productos/public_html/pastinas/crear">Agregar Pastina</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped" style="width:100%; float: left;">
                <thead>
                    <tr>
                        <th>Nombre Color</th>
                        <th>Hex</th>
                        <th>Webber</th>
                        <th>Mapei</th>
                        <th>Klaukol</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
            <tbody>
            <?php foreach( $pastinas as $pastina ): ?>
                <tr>
                    <td><?php echo $pastina->color_ccn; ?></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div style="width: 30px; height: 30px; background-color: #<?php echo $pastina->color_pantone; ?>; border: 1px solid #000; margin-right: 10px;"></div>
                            <?php echo $pastina->color_pantone; ?>
                        </div>
                    </td>
                    <td><?php echo $pastina->webber; ?></td>
                    <td><?php echo $pastina->mapei; ?></td>
    
                    <td><?php echo $pastina->klaukol; ?></td>
                    <td><a class="btn btn-primary" href="/ccn_productos/public_html/pastinas/actualizar?id=<?php echo $pastina->id; ?>">Modificar</a></td>
                    <td>
                        <form method="POST" class="w-100" action="/ccn_productos/public_html/pastinas/eliminar">
                            <input type="hidden" name="id" value="<?php echo $pastina->id; ?>">
                            <input type="hidden" name="tipo" value="pastina">
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>    
            </tbody>
        </table>
    </div>        
</div>
