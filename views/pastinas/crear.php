<div class="card mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4> <i class="fa-solid fa-newspaper"></i> Cargar Pastina</h4>  
            </div>
            <div class="col-md-6">
            <a class="btn btn-success" style="float: right;" href="/ccn_productos/public_html/pastinas/admin">Volver</a>
            </div>
        </div>
    </div>
    <div class="card-body"> 

    <?php foreach($errores as $error): ?>
    <div class="alert alert-warning">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Guardar Pastina" class="btn btn-success">
    </form>
    </div>        
</div>
