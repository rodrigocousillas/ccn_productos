<?php

namespace Model;

class Productos extends ActiveRecord {
    protected static $tabla = 'productos';
    protected static $primaryKey = 'id';
    protected static $columnasDB = ['id', 'codigo_ean', 'codigo_sap', 'nombre', 'linea', 'tipo_de_producto', 'ancho', 'largo', 'espesor', 'piezas_por_caja', 'peso_por_caja', 'm2_x_caja', 'm2_por_pallet', 'absorcion_', 'resistencia_quimica', 'resistencia_a_las_manchas', 'resitencia_a_la_abrasion_pei', 'dureza_de_superficie_mohs_scale', 'resistencia_a_las_heladas_ciclos', 'expansion_por_humedad', 'dilatacion_termica_lineal', 'expansion_por_choque_termico', 'resistencia_a_la_flexion_nmm2', 'resistencia_al_impacto', 'resistencia_al_cuarteo', 'coheficiente_estatico_de_deslizamiento', 'planaridad_de_la_longitud_del_lado_maximo', 'rectitud_de_lados_de_la_longitud_del_lado_maximo', 'horno', 'nombre_punzon', 'rodillo_jet_velasin_proteccion', 'diseno_del_rodillo', 'intext', 'ubicacion', 'transito', 'serie', 'piscinas', 'garages', 'exteriores', 'nanotec', 'diseno', 'terminacion', 'pulidos_brillantes', 'taad_transito_alta_adherencia', 'variacion_de_tono', 'superficie', 'terminacion_bordes', 'microbisel', 'como_se_limpia', 'color_pastina', 'como_se_corta', 'como_se_pega', 'descargar_imagen_para_renders', 'descargar_ficha_tecnica', 'descripcion_corta', 'descripcion_larga_inspiracional_yo_emotiva', 'espacio_recomendado', 'mas_informacion', 'recomendaciones', 'precio', 'rango_precio_grupo_1_porcellanato_11_12_13_y_14_grupo_2_porcella', 'imagen', 'pdf'];

    public $id;
    public $codigo_ean;
    public $codigo_sap;
    public $nombre;
    public $linea;
    public $tipo_de_producto;
    public $ancho;
    public $largo;
    public $espesor;
    public $piezas_por_caja;
    public $peso_por_caja;
    public $m2_x_caja;
    public $m2_por_pallet;
    public $absorcion_;
    public $resistencia_quimica;
    public $resistencia_a_las_manchas;
    public $resitencia_a_la_abrasion_pei;
    public $dureza_de_superficie_mohs_scale;
    public $resistencia_a_las_heladas_ciclos;
    public $expansion_por_humedad;
    public $dilatacion_termica_lineal;
    public $expansion_por_choque_termico;
    public $resistencia_a_la_flexion_nmm2;
    public $resistencia_al_impacto;
    public $resistencia_al_cuarteo;
    public $coheficiente_estatico_de_deslizamiento;
    public $planaridad_de_la_longitud_del_lado_maximo;
    public $rectitud_de_lados_de_la_longitud_del_lado_maximo;
    public $horno;
    public $nombre_punzon;
    public $rodillo_jet_velasin_proteccion;
    public $diseno_del_rodillo;
    public $intext;
    public $ubicacion;
    public $transito;
    public $serie;
    public $piscinas;
    public $garages;
    public $exteriores;
    public $nanotec;
    public $diseno;
    public $terminacion;
    public $pulidos_brillantes;
    public $taad_transito_alta_adherencia;
    public $variacion_de_tono;
    public $superficie;
    public $terminacion_bordes;
    public $microbisel;
    public $como_se_limpia;
    public $color_pastina;
    public $como_se_corta;
    public $como_se_pega;
    public $descargar_imagen_para_renders;
    public $descargar_ficha_tecnica;
    public $descripcion_corta;
    public $descripcion_larga_inspiracional_yo_emotiva;
    public $espacio_recomendado;
    public $mas_informacion;
    public $recomendaciones;
    public $precio;
    public $rango_precio_grupo_1_porcellanato_11_12_13_y_14_grupo_2_porcella;
    public $imagen;
    public $pdf;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->codigo_ean = $args['codigo_ean'] ?? '';
        $this->codigo_sap = $args['codigo_sap'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->linea = $args['linea'] ?? '';
        $this->tipo_de_producto = $args['tipo_de_producto'] ?? '';
        $this->ancho = $args['ancho'] ?? '';
        $this->largo = $args['largo'] ?? '';
        $this->espesor = $args['espesor'] ?? '';
        $this->piezas_por_caja = $args['piezas_por_caja'] ?? '';
        $this->peso_por_caja = $args['peso_por_caja'] ?? '';
        $this->m2_x_caja = $args['m2_x_caja'] ?? '';
        $this->m2_por_pallet = $args['m2_por_pallet'] ?? '';
        $this->absorcion_ = $args['absorcion_'] ?? '';
        $this->resistencia_quimica = $args['resistencia_quimica'] ?? '';
        $this->resistencia_a_las_manchas = $args['resistencia_a_las_manchas'] ?? '';
        $this->resitencia_a_la_abrasion_pei = $args['resitencia_a_la_abrasion_pei'] ?? '';
        $this->dureza_de_superficie_mohs_scale = $args['dureza_de_superficie_mohs_scale'] ?? '';
        $this->resistencia_a_las_heladas_ciclos = $args['resistencia_a_las_heladas_ciclos'] ?? '';
        $this->expansion_por_humedad = $args['expansion_por_humedad'] ?? '';
        $this->dilatacion_termica_lineal = $args['dilatacion_termica_lineal'] ?? '';
        $this->expansion_por_choque_termico = $args['expansion_por_choque_termico'] ?? '';
        $this->resistencia_a_la_flexion_nmm2 = $args['resistencia_a_la_flexion_nmm2'] ?? '';
        $this->resistencia_al_impacto = $args['resistencia_al_impacto'] ?? '';
        $this->resistencia_al_cuarteo = $args['resistencia_al_cuarteo'] ?? '';
        $this->coheficiente_estatico_de_deslizamiento = $args['coheficiente_estatico_de_deslizamiento'] ?? '';
        $this->planaridad_de_la_longitud_del_lado_maximo = $args['planaridad_de_la_longitud_del_lado_maximo'] ?? '';
        $this->rectitud_de_lados_de_la_longitud_del_lado_maximo = $args['rectitud_de_lados_de_la_longitud_del_lado_maximo'] ?? '';
        $this->horno = $args['horno'] ?? '';
        $this->nombre_punzon = $args['nombre_punzon'] ?? '';
        $this->rodillo_jet_velasin_proteccion = $args['rodillo_jet_velasin_proteccion'] ?? '';
        $this->diseno_del_rodillo = $args['diseno_del_rodillo'] ?? '';
        $this->intext = $args['intext'] ?? '';
        $this->ubicacion = $args['ubicacion'] ?? '';
        $this->transito = $args['transito'] ?? '';
        $this->serie = $args['serie'] ?? '';
        $this->piscinas = $args['piscinas'] ?? '';
        $this->garages = $args['garages'] ?? '';
        $this->exteriores = $args['exteriores'] ?? '';
        $this->nanotec = $args['nanotec'] ?? '';
        $this->diseno = $args['diseno'] ?? '';
        $this->terminacion = $args['terminacion'] ?? '';
        $this->pulidos_brillantes = $args['pulidos_brillantes'] ?? '';
        $this->taad_transito_alta_adherencia = $args['taad_transito_alta_adherencia'] ?? '';
        $this->variacion_de_tono = $args['variacion_de_tono'] ?? '';
        $this->superficie = $args['superficie'] ?? '';
        $this->terminacion_bordes = $args['terminacion_bordes'] ?? '';
        $this->microbisel = $args['microbisel'] ?? '';
        $this->como_se_limpia = $args['como_se_limpia'] ?? '';
        $this->color_pastina = $args['color_pastina'] ?? '';
        $this->como_se_corta = $args['como_se_corta'] ?? '';
        $this->como_se_pega = $args['como_se_pega'] ?? '';
        $this->descargar_imagen_para_renders = $args['descargar_imagen_para_renders'] ?? '';
        $this->descargar_ficha_tecnica = $args['descargar_ficha_tecnica'] ?? '';
        $this->descripcion_corta = $args['descripcion_corta'] ?? '';
        $this->descripcion_larga_inspiracional_yo_emotiva = $args['descripcion_larga_inspiracional_yo_emotiva'] ?? '';
        $this->espacio_recomendado = $args['espacio_recomendado'] ?? '';
        $this->mas_informacion = $args['mas_informacion'] ?? '';
        $this->recomendaciones = $args['recomendaciones'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->rango_precio_grupo_1_porcellanato_11_12_13_y_14_grupo_2_porcella = $args['rango_precio_grupo_1_porcellanato_11_12_13_y_14_grupo_2_porcella'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->pdf = $args['pdf'] ?? '';
    }

    public function validar() {
        if(!$this->codigo_sap) {
            self::$errores[] = "El Código SAP es obligatorio";
        }
        if(!$this->nombre) {
            self::$errores[] = "El Nombre del producto es obligatorio";
        }
        return self::$errores;
    }
}