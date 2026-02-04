<fieldset>
    <legend>Información de Pastina</legend>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="color_ccn" class="form-label">Nombre Color CCN</label>
            <input type="text" class="form-control" id="color_ccn" name="pastina[color_ccn]" value="<?php echo s($pastina->color_ccn); ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="color_pantone" class="form-label">Color Hex (sin #)</label>
            <div class="input-group">
                <input type="text" class="form-control" id="color_pantone" name="pastina[color_pantone]" value="<?php echo s($pastina->color_pantone); ?>" placeholder="Ej: FFFFFF" oninput="updateColorPreview(this.value)">
                <span class="input-group-text p-1">
                    <div id="color_preview" style="width: 40px; height: 100%; border: 1px solid #ccc; background-color: #<?php echo s($pastina->color_pantone ?? 'FFFFFF'); ?>;"></div>
                </span>
            </div>
        </div>
        <script>
            function updateColorPreview(color) {
                // Ensure proper hex format for preview
                if(color && !color.startsWith('#')) {
                    color = '#' + color;
                }
                document.getElementById('color_preview').style.backgroundColor = color;
            }
        </script>
        <div class="col-md-6 mb-3">
            <label for="webber" class="form-label">Webber</label>
            <input type="text" class="form-control" id="webber" name="pastina[webber]" value="<?php echo s($pastina->webber); ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="mapei" class="form-label">Mapei</label>
            <input type="text" class="form-control" id="mapei" name="pastina[mapei]" value="<?php echo s($pastina->mapei); ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="klaukol" class="form-label">Klaukol</label>
            <input type="text" class="form-control" id="klaukol" name="pastina[klaukol]" value="<?php echo s($pastina->klaukol); ?>">
        </div>
    </div>
</fieldset>
