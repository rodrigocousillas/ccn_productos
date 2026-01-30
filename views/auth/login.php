<div class="container">
    <div class="m-0 vh-100 row justify-content-center align-items-center">
    <div class="col-4 p-5 text-left">
    <h3>Iniciar Sesión</h3>

<?php foreach($errores as $error): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
<?php endforeach; ?>

<form method="POST" class="formulario" action="/login" novalidate>
       
        <div class="mb-3">
            <label class="form-label" for="email">E-mail</label>
            <input class="form-control" type="email" name="email" placeholder="Tu Email" id="email"> 
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input class="form-control" type="password" name="password" placeholder="Tu Password" id="password">
        </div>    
   
    <input type="submit" value="Iniciar Sesión" class="btn btn-primary">
   
</form>
</div>

</div>
</div>