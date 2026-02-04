<fieldset>
    <legend>Identificación</legend>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="codigo_ean" class="form-label">Código EAN</label>
            <input type="text" class="form-control" id="codigo_ean" name="producto[codigo_ean]" value="<?php echo s($producto->codigo_ean); ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="codigo_sap" class="form-label">Código SAP</label>
            <input type="text" class="form-control" id="codigo_sap" name="producto[codigo_sap]" value="<?php echo s($producto->codigo_sap); ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="producto[nombre]" value="<?php echo s($producto->nombre); ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="linea" class="form-label">Línea</label>
            <input type="text" class="form-control" id="linea" name="producto[linea]" value="<?php echo s($producto->linea); ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="tipo_de_producto" class="form-label">Tipo de Producto</label>
            <input type="text" class="form-control" id="tipo_de_producto" name="producto[tipo_de_producto]" value="<?php echo s($producto->tipo_de_producto); ?>">
        </div>
         <div class="col-md-4 mb-3">
            <label for="ancho" class="form-label">Ancho</label>
            <input type="text" class="form-control" id="ancho" name="producto[ancho]" value="<?php echo s($producto->ancho); ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="largo" class="form-label">Largo</label>
            <input type="text" class="form-control" id="largo" name="producto[largo]" value="<?php echo s($producto->largo); ?>">
        </div>
    </div>
</fieldset>

<fieldset class="mt-4">
    <legend>Packing</legend>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="espesor" class="form-label">Espesor</label>
            <input type="text" class="form-control" id="espesor" name="producto[espesor]" value="<?php echo s($producto->espesor); ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="piezas_por_caja" class="form-label">Piezas por caja</label>
            <input type="text" class="form-control" id="piezas_por_caja" name="producto[piezas_por_caja]" value="<?php echo s($producto->piezas_por_caja); ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="peso_por_caja" class="form-label">Peso por caja</label>
            <input type="text" class="form-control" id="peso_por_caja" name="producto[peso_por_caja]" value="<?php echo s($producto->peso_por_caja); ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="m2_x_caja" class="form-label">m2 x caja</label>
            <input type="text" class="form-control" id="m2_x_caja" name="producto[m2_x_caja]" value="<?php echo s($producto->m2_x_caja); ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="m2_por_pallet" class="form-label">m2 por pallet</label>
            <input type="text" class="form-control" id="m2_por_pallet" name="producto[m2_por_pallet]" value="<?php echo s($producto->m2_por_pallet); ?>">
        </div>
    </div>
</fieldset>

<fieldset class="mt-4">
    <legend>Ficha técnica</legend>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="absorcion" class="form-label">Absorción [%]</label>
            <input type="text" class="form-control" id="absorcion" name="producto[absorcion_]" value="<?php echo s($producto->absorcion_); ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="resistencia_quimica" class="form-label">Resistencia química</label>
            <input type="text" class="form-control" id="resistencia_quimica" name="producto[resistencia_quimica]" value="<?php echo s($producto->resistencia_quimica); ?>">
        </div>
         <div class="col-md-4 mb-3">
            <label for="resistencia_manchas" class="form-label">Resistencia a las manchas</label>
            <input type="text" class="form-control" id="resistencia_manchas" name="producto[resistencia_a_las_manchas]" value="<?php echo s($producto->resistencia_a_las_manchas); ?>">
        </div>
         <div class="col-md-4 mb-3">
            <label for="resistencia_abrasion" class="form-label">Resistencia a la Abrasión (PEI)</label>
            <input type="text" class="form-control" id="resistencia_abrasion" name="producto[resitencia_a_la_abrasion_pei]" value="<?php echo s($producto->resitencia_a_la_abrasion_pei); ?>">
        </div>
         <div class="col-md-4 mb-3">
            <label for="dureza" class="form-label">Dureza de superficie Moh´s Scale</label>
            <input type="text" class="form-control" id="dureza" name="producto[dureza_de_superficie_mohs_scale]" value="<?php echo s($producto->dureza_de_superficie_mohs_scale); ?>">
        </div>
         <div class="col-md-4 mb-3">
            <label for="resistencia_heladas" class="form-label">Resistencia a las heladas (ciclos)</label>
            <input type="text" class="form-control" id="resistencia_heladas" name="producto[resistencia_a_las_heladas_ciclos]" value="<?php echo s($producto->resistencia_a_las_heladas_ciclos); ?>">
        </div>
         <div class="col-md-4 mb-3">
            <label for="expansion_humedad" class="form-label">Expansion por humedad</label>
            <input type="text" class="form-control" id="expansion_humedad" name="producto[expansion_por_humedad]" value="<?php echo s($producto->expansion_por_humedad); ?>">
        </div>
         <div class="col-md-4 mb-3">
            <label for="dilatacion_termica" class="form-label">Dilatación térmica lineal</label>
            <input type="text" class="form-control" id="dilatacion_termica" name="producto[dilatacion_termica_lineal]" value="<?php echo s($producto->dilatacion_termica_lineal); ?>">
        </div>
         <div class="col-md-4 mb-3">
            <label for="choque_termico" class="form-label">Expansion por choque térmico</label>
            <input type="text" class="form-control" id="choque_termico" name="producto[expansion_por_choque_termico]" value="<?php echo s($producto->expansion_por_choque_termico); ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="resistencia_flexion" class="form-label">Resistencia a la flexión N/mm²</label>
            <input type="text" class="form-control" id="resistencia_flexion" name="producto[resistencia_a_la_flexion_nmm2]" value="<?php echo s($producto->resistencia_a_la_flexion_nmm2); ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="resistencia_impacto" class="form-label">Resistencia al impacto</label>
            <input type="text" class="form-control" id="resistencia_impacto" name="producto[resistencia_al_impacto]" value="<?php echo s($producto->resistencia_al_impacto); ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="resistencia_cuarteo" class="form-label">Resistencia al cuarteo</label>
            <input type="text" class="form-control" id="resistencia_cuarteo" name="producto[resistencia_al_cuarteo]" value="<?php echo s($producto->resistencia_al_cuarteo); ?>">
        </div>
         <div class="col-md-4 mb-3">
            <label for="coeficiente_deslizamiento" class="form-label">Coeficiente estático de deslizamiento</label>
            <input type="text" class="form-control" id="coeficiente_deslizamiento" name="producto[coheficiente_estatico_de_deslizamiento]" value="<?php echo s($producto->coheficiente_estatico_de_deslizamiento); ?>">
        </div>
         <div class="col-md-4 mb-3">
            <label for="planaridad" class="form-label">Planaridad (% de la longitud del lado - Máximo)</label>
            <input type="text" class="form-control" id="planaridad" name="producto[planaridad_de_la_longitud_del_lado_maximo]" value="<?php echo s($producto->planaridad_de_la_longitud_del_lado_maximo); ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="rectitud" class="form-label">Rectitud de lados (% de la longitud del lado - Máximo)</label>
            <input type="text" class="form-control" id="rectitud" name="producto[rectitud_de_lados_de_la_longitud_del_lado_maximo]" value="<?php echo s($producto->rectitud_de_lados_de_la_longitud_del_lado_maximo); ?>">
        </div>
    </div>
</fieldset>

<fieldset class="mt-4">
    <legend>Info plantas</legend>
    <div class="row">
         <div class="col-md-6 mb-3">
            <label for="horno" class="form-label">Horno</label>
            <input type="text" class="form-control" id="horno" name="producto[horno]" value="<?php echo s($producto->horno); ?>">
        </div>
         <div class="col-md-6 mb-3">
            <label for="nombre_punzon" class="form-label">Nombre punzón</label>
            <input type="text" class="form-control" id="nombre_punzon" name="producto[nombre_punzon]" value="<?php echo s($producto->nombre_punzon); ?>">
        </div>
         <div class="col-md-6 mb-3">
            <label for="rodillo" class="form-label">Rodillo / jet /vela/sin protección</label>
            <input type="text" class="form-control" id="rodillo" name="producto[rodillo_jet_velasin_proteccion]" value="<?php echo s($producto->rodillo_jet_velasin_proteccion); ?>">
        </div>
         <div class="col-md-6 mb-3">
            <label for="diseno_rodillo" class="form-label">Diseño del rodillo</label>
            <input type="text" class="form-control" id="diseno_rodillo" name="producto[diseno_del_rodillo]" value="<?php echo s($producto->diseno_del_rodillo); ?>">
        </div>
    </div>
</fieldset>

<fieldset class="mt-4">
    <legend>Uso</legend>
    <div class="row">
        <div class="col-md-3 mb-3">
             <label for="intext" class="form-label">Int/ext</label>
            <input type="text" class="form-control" id="intext" name="producto[intext]" value="<?php echo s($producto->intext); ?>">
        </div>
         <div class="col-md-3 mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="ubicacion" name="producto[ubicacion]" value="<?php echo s($producto->ubicacion); ?>">
        </div>
         <div class="col-md-3 mb-3">
            <label for="transito" class="form-label">Transito</label>
            <input type="text" class="form-control" id="transito" name="producto[transito]" value="<?php echo s($producto->transito); ?>">
        </div>
        <div class="col-md-3 mb-3">
            <label for="serie" class="form-label">Serie</label>
            <input type="text" class="form-control" id="serie" name="producto[serie]" value="<?php echo s($producto->serie); ?>">
        </div>
         <div class="col-md-3 mb-3">
             <label for="piscinas" class="form-label">Piscinas</label>
            <input type="text" class="form-control" id="piscinas" name="producto[piscinas]" value="<?php echo s($producto->piscinas); ?>">
        </div>
         <div class="col-md-3 mb-3">
             <label for="garages" class="form-label">Garages</label>
            <input type="text" class="form-control" id="garages" name="producto[garages]" value="<?php echo s($producto->garages); ?>">
        </div>
         <div class="col-md-3 mb-3">
             <label for="exteriores" class="form-label">Exteriores</label>
            <input type="text" class="form-control" id="exteriores" name="producto[exteriores]" value="<?php echo s($producto->exteriores); ?>">
        </div>
         <div class="col-md-3 mb-3">
             <label for="nanotec" class="form-label">Nanotec</label>
            <input type="text" class="form-control" id="nanotec" name="producto[nanotec]" value="<?php echo s($producto->nanotec); ?>">
        </div>
    </div>
</fieldset>

<fieldset class="mt-4">
    <legend>Diseño</legend>
    <div class="row">
        <div class="col-md-3 mb-3">
            <label for="diseno" class="form-label">DISEÑO</label>
            <input type="text" class="form-control" id="diseno" name="producto[diseno]" value="<?php echo s($producto->diseno); ?>">
        </div>
        <div class="col-md-3 mb-3">
            <label for="terminacion" class="form-label">TERMINACION</label>
            <input type="text" class="form-control" id="terminacion" name="producto[terminacion]" value="<?php echo s($producto->terminacion); ?>">
        </div>
         <div class="col-md-3 mb-3">
             <label for="pulidos_brillantes" class="form-label">PULIDOS BRILLANTES</label>
            <input type="text" class="form-control" id="pulidos_brillantes" name="producto[pulidos_brillantes]" value="<?php echo s($producto->pulidos_brillantes); ?>">
        </div>
         <div class="col-md-3 mb-3">
             <label for="taad" class="form-label">TAAd: TRANSITO ALTA ADHERENCIA</label>
            <input type="text" class="form-control" id="taad" name="producto[taad_transito_alta_adherencia]" value="<?php echo s($producto->taad_transito_alta_adherencia); ?>">
        </div>
        <div class="col-md-3 mb-3">
            <label for="variacion_de_tono" class="form-label">Variación de tono</label>
            <input type="text" class="form-control" id="variacion_de_tono" name="producto[variacion_de_tono]" value="<?php echo s($producto->variacion_de_tono); ?>">
        </div>
        <div class="col-md-3 mb-3">
            <label for="superficie" class="form-label">superficie</label>
            <input type="text" class="form-control" id="superficie" name="producto[superficie]" value="<?php echo s($producto->superficie); ?>">
        </div>
         <div class="col-md-3 mb-3">
            <label for="terminacion_bordes" class="form-label">Terminación bordes</label>
            <input type="text" class="form-control" id="terminacion_bordes" name="producto[terminacion_bordes]" value="<?php echo s($producto->terminacion_bordes); ?>">
        </div>
         <div class="col-md-3 mb-3">
             <label for="microbisel" class="form-label">MICROBISEL</label>
            <input type="text" class="form-control" id="microbisel" name="producto[microbisel]" value="<?php echo s($producto->microbisel); ?>">
        </div>
    </div>
</fieldset>

<fieldset class="mt-4">
    <legend>Servicios</legend>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="como_se_limpia" class="form-label">Como se limpia</label>
            <textarea class="form-control" id="como_se_limpia" name="producto[como_se_limpia]" rows="3"><?php echo s($producto->como_se_limpia); ?></textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label for="color_pastina" class="form-label">color pastina</label>
            <input type="text" class="form-control" id="color_pastina" name="producto[color_pastina]" value="<?php echo s($producto->color_pastina); ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="como_se_corta" class="form-label">Como se corta</label>
            <input type="text" class="form-control" id="como_se_corta" name="producto[como_se_corta]" value="<?php echo s($producto->como_se_corta); ?>">
        </div>
         <div class="col-md-6 mb-3">
            <label for="como_se_pega" class="form-label">Como se pega</label>
            <input type="text" class="form-control" id="como_se_pega" name="producto[como_se_pega]" value="<?php echo s($producto->como_se_pega); ?>">
        </div>
         <div class="col-md-6 mb-3">
            <label for="descargar_imagen" class="form-label">Descargar imagen para renders</label>
            <input type="text" class="form-control" id="descargar_imagen" name="producto[descargar_imagen_para_renders]" value="<?php echo s($producto->descargar_imagen_para_renders); ?>">
        </div>
        <div class="col-md-12 mb-3">
            <label for="descargar_ficha_tecnica" class="form-label">Descargar ficha técnica</label>
            <input type="text" class="form-control" id="descargar_ficha_tecnica" name="producto[descargar_ficha_tecnica]" value="<?php echo s($producto->descargar_ficha_tecnica); ?>">
        </div>
         <div class="col-md-12 mb-3">
            <label for="descripcion_corta" class="form-label">Descripción corta</label>
            <textarea class="form-control" id="descripcion_corta" name="producto[descripcion_corta]" rows="2"><?php echo s($producto->descripcion_corta); ?></textarea>
        </div>
        <div class="col-md-12 mb-3">
            <label for="descripcion_larga" class="form-label">Descripción larga, inspiracional y/o emotiva</label>
            <textarea class="form-control" id="descripcion_larga" name="producto[descripcion_larga_inspiracional_yo_emotiva]" rows="4"><?php echo s($producto->descripcion_larga_inspiracional_yo_emotiva); ?></textarea>
        </div>
         <div class="col-md-12 mb-3">
            <label for="espacio_recomendado" class="form-label">Espacio recomendado</label>
            <input type="text" class="form-control" id="espacio_recomendado" name="producto[espacio_recomendado]" value="<?php echo s($producto->espacio_recomendado); ?>">
        </div>
         <div class="col-md-6 mb-3">
            <label for="mas_informacion" class="form-label">Mas información</label>
            <textarea class="form-control" id="mas_informacion" name="producto[mas_informacion]" rows="3"><?php echo s($producto->mas_informacion); ?></textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label for="recomendaciones" class="form-label">Recomendaciones</label>
            <textarea class="form-control" id="recomendaciones" name="producto[recomendaciones]" rows="3"><?php echo s($producto->recomendaciones); ?></textarea>
        </div>
    </div>
</fieldset>

<fieldset class="mt-4">
    <legend>Posición en la web</legend>
    <div class="row">
         <div class="col-md-6 mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" class="form-control" id="precio" name="producto[precio]" value="<?php echo s($producto->precio); ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="rango_precio" class="form-label">Rango precio</label>
            <input type="text" class="form-control" id="rango_precio" name="producto[rango_precio_grupo_1_porcellanato_11_12_13_y_14_grupo_2_porcella]" value="<?php echo s($producto->rango_precio_grupo_1_porcellanato_11_12_13_y_14_grupo_2_porcella); ?>">
        </div>
    </div>
</fieldset>

<fieldset class="mt-4">
    <legend>Archivos</legend>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="producto[imagen]" accept="image/*">
            <?php if($producto->imagen) { ?>
                <div class="mt-2">
                    <small>Adjunto act: <?php echo $producto->imagen; ?></small>
                </div>
            <?php } ?>
        </div>
        <div class="col-md-6 mb-3">
            <label for="pdf" class="form-label">PDF</label>
            <input type="file" class="form-control" id="pdf" name="producto[pdf]" accept="application/pdf">
             <?php if($producto->pdf) { ?>
                <div class="mt-2">
                    <small>Adjunto act: <?php echo $producto->pdf; ?></small>
                </div>
            <?php } ?>
        </div>
    </div>
</fieldset>
<br>
<br>