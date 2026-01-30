<fieldset>
    <legend>Novedades</legend>    
    <div class="row">
        <div class="col-md-4">   
            <label for="titulo" class="form-label">Titulo</label>
            <input class="form-control" name="novedades[titulo_novedad]" type="text" id="titulo_novedad" value="<?php echo s( $novedades->titulo_novedad) ; ?>">
        </div>
        <div class="col-md-4">      
            <label for="bajada" class="form-label">Bajada</label>
            <input class="form-control" name="novedades[bajada_novedad]" type="text" id="bajada_novedad" value="<?php echo s( $novedades->bajada_novedad) ; ?>">
        </div>
        <div class="col-md-4">
        <label for="tipo_novedad" class="form-label">Tipo de novedad</label>
        <select class="form-control" name="novedades[tipo_novedad]" id="tipo_novedad">
        <option value="Muestra" <?php echo $novedades->tipo_novedad === 'Muestra' ? 'selected' : ''; ?>>Muestra</option>
        <option value="Blog" <?php echo $novedades->tipo_novedad === 'Blog' ? 'selected' : ''; ?>>Blog</option>
        <option value="Exposición" <?php echo $novedades->tipo_novedad === 'Exposición' ? 'selected' : ''; ?>>Exposición</option>
        <option value="Noticias" <?php echo $novedades->tipo_novedad === 'Noticias' ? 'selected' : ''; ?>>Noticias</option>
    </select>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-12">   
            <label for="cuerpo" class="form-label">Cuerpo de la novedad</label>
            <textarea id="cuerpo_novedad" name="novedades[cuerpo_novedad]" class="form-control"><?php echo s($novedades->cuerpo_novedad); ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4 mt-4">   
            <label for="imagen">Imagen novedad:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="novedades[imagen]">
            <?php if($novedades->imagen) { ?>
                <img src="https://urro.com.ar/imagenes/<?php echo $novedades->imagen ?>" width="30%">
            <?php } ?>
        </div>
    </div>   
</fieldset>
<br>
<br>