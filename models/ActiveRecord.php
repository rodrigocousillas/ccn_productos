<?php

namespace Model;

class ActiveRecord {

    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    protected static $errores = [];

    public static function setDB($database) {
        self::$db = $database;
    }

    public function guardar(){
        if(!is_null($this->id)){
            return $this->actualizar();
        } else {
            return $this->crear();
        }
    }

   // crea un nuevo registro
   public function crear() {
    // Sanitizar los datos
    $atributos = $this->sanitizarDatos();

    // Insertar en la base de datos
    $query = "INSERT INTO " . static::$tabla . " ( ";
    $query .= join(', ', array_keys($atributos));
    $query .= " ) VALUES ('"; 
    $query .= join("', '", array_values($atributos));
    $query .= "') ";
    
    // Resultado de la consulta
    $resultado = self::$db->query($query);

    

    // Mensaje de exito
    if($resultado) {
        return true;
    }
    return false;
}

    public function actualizar(){

        $atributos = $this->sanitizarDatos();
 
        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }
        
        $query = "UPDATE " . static::$tabla ." SET ";
        $query .= join(', ', $valores );
        $query .= "WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";
       
        $resultado = self::$db->query($query);

        
        if($resultado) {
        return true;
    }
    return false;
}

    public function eliminar(){
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        
        if($resultado) {
            $this->borrarImagen();
            return true;
        }
        return false;
    }

    // Identificar y unir los atributos de la BD
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
       
        return $atributos;

    }

    public function sanitizarDatos() {
       $atributos = $this->atributos();
       $sanitizado = [];
       foreach($atributos as $key => $value ) {
           $sanitizado[$key] = self::$db->escape_string($value);   
       }
       return($sanitizado);
    }


    public function setPdfIng($pdfing) {
       
        if($pdfing){
            $this->pdfing = $pdfing;
        }
    }

    public function setPdfEsp($pdfesp) {
       
        if($pdfesp){
            $this->pdfesp = $pdfesp;
        }
    }

    public function setarchivopdf($archivopdf) {
       
        if($archivopdf){
            $this->archivopdf = $archivopdf;
        }
    }


    public function setImagen($imagen) {
        //Elimina la imagen previa
        if(!is_null($this->id)){
          $this->borrarImagen();
        }

        if($imagen){
            $this->imagen = $imagen;
        }
    }

    public function setImagenDos($imagen_dos) {

        //Elimina la imagen previa
        if(!is_null($this->id)){
          $this->borrarImagen();
        }

        if($imagen_dos){
            $this->imagen_dos = $imagen_dos;
        }
    }

    public function setImagenMarcas($imagen_marcas) {

        //Elimina la imagen previa
        if(!is_null($this->id)){
          $this->borrarImagen();
        }

        if($imagen_marcas){
            $this->imagen_marcas = $imagen_marcas;
        }
    }

    public function setImagenHeader($imagen_header) {

        //Elimina la imagen previa
        if(!is_null($this->id)){
          $this->borrarImagenHeader();
        }

        if($imagen_header){
            $this->imagen_header = $imagen_header;
        }
    }

    public function setImagenIcono1($icono1) {

        //Elimina la imagen previa
        if(!is_null($this->id)){
          $this->borrarImagen();
        }

        if($icono1){
            $this->icono1 = $icono1;
        }
    }

    public function setImagenIcono2($icono2) {

        //Elimina la imagen previa
        if(!is_null($this->id)){
          $this->borrarImagen();
        }

        if($icono2){
            $this->icono2 = $icono2;
        }
    }

    public function setImagenIcono3($icono3) {

        //Elimina la imagen previa
        if(!is_null($this->id)){
          $this->borrarImagen();
        }

        if($icono3){
            $this->icono3 = $icono3;
        }
    }


    public function borrarImagen() {
        if (!property_exists($this, 'imagen') || empty($this->imagen)) {
            return;
        }
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    public function borrarImagenHeader() {
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen_header);
        if($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen_header);
        }
    }

    public static function getErrores() {
        return self::$errores;
    }

    public function validar() {

        return static::$errores;
    }

    //Listo todos los registros
    public static function all() {

        $query = "SELECT * from " . static::$tabla;

        $resultado = self::consultarSQL($query);
       
        return($resultado);
      
    } 

    public static function allAnio() {

        $query = "SELECT * from " . static::$tabla. " ORDER BY anio ASC";
        
        $resultado = self::consultarSQL($query);
       
        return($resultado);
      
    }
 
    
     //Listo todos los registros
     public static function allFecha() {

        $query = "SELECT * from " . static::$tabla. " ORDER BY fecha DESC";
        
        $resultado = self::consultarSQL($query);

        return($resultado);
      
    } 

    public static function allOrdenHabilitado() {

        $query = "SELECT * from " . static::$tabla. " WHERE habilitado = 1 ORDER BY id ASC";
        
        $resultado = self::consultarSQL($query);

        return($resultado);
      
    } 

    public static function getAleatorio($cantidad) {
        // 1. Obtener el número total de registros en la tabla
        $totalRegistrosQuery = "SELECT COUNT(*) as total FROM " . static::$tabla;
        $totalRegistrosResultado = self::consultarSQL($totalRegistrosQuery);
    
        if ($totalRegistrosResultado && !empty($totalRegistrosResultado)) {
            $totalRegistros = $totalRegistrosResultado[0]->total ?? 0;
    
            // Construir la consulta con ORDER BY RAND() y LIMIT
            $query = "SELECT * FROM " . static::$tabla . " ORDER BY RAND() LIMIT " . $cantidad;
            $resultado = self::consultarSQL($query);
            return $resultado;
    
        } else {
            return []; // Si no hay registros
        }
    }

    //Obtiene determinado numero de registros
    public static function get($cantidad) {
        $query = "SELECT * from " . static::$tabla . " ORDER BY id DESC LIMIT " . $cantidad ;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //Obtiene determinado numero de registros habilitados
    public static function getHabilitados($cantidad) {
        $query = "SELECT * from " . static::$tabla . " WHERE habilitado = 1 ORDER BY id DESC LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //Paginar los registros
    public static function paginar($por_pagina, $offset) {
        $query = "SELECT * from " . static::$tabla . "  ORDER BY id DESC LIMIT {$por_pagina} OFFSET {$offset}";
        $resultado = self::consultarSQL($query);
        return $resultado;    
    }

    public static function paginarHabilitados($por_pagina, $offset) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE habilitado = 1 ORDER BY id DESC LIMIT {$por_pagina} OFFSET {$offset}";
        $resultado = self::consultarSQL($query);
        return $resultado;    
    }

    public static function paginarObras($por_pagina, $offset) {
    // Agregamos la cláusula WHERE para filtrar solo por registros 'habilitados'
    $query = "SELECT * FROM " . static::$tabla . " WHERE habilitado = 1 ORDER BY id DESC LIMIT {$por_pagina} OFFSET {$offset}";
    $resultado = self::consultarSQL($query);
    return $resultado;    
}


    public static function buscarEntreFechas($desde, $hasta) {

        $query = "SELECT * FROM infofinanciera WHERE fecha BETWEEN '{$desde}' AND '{$hasta}'";
        $resultado = self::consultarSQL($query);
        return($resultado);

    } 

    //Busca un registro por su id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = {$id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);

    }

    public static function findRelacionadas($relacionado) {

        $query = "SELECT * FROM " . static::$tabla . " WHERE empresaId = {$relacionado}";

        $resultado = self::consultarSQL($query);

        return array_shift($resultado);

    }
    
    public static function consultarSQL($query) {

        $resultado = self::$db->query($query);
        $array = [];
        while($registro = $resultado->fetch_assoc() ){
           $array[] = self::crearObjeto($registro);
           
        }

        $resultado->free();
        return $array;

    }

    protected static function crearObjeto($registro) {

        $objeto = new static;

        foreach($registro as $key => $value) {
            if(property_exists( $objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;

    }

    public function sincronizar( $args = []) {
        foreach($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value) ) {
                $this->$key = $value;
            }
        }
    }

    

    //Traer un total de registros
    public static function total() {
        $query = "SELECT COUNT(*) FROM " . static::$tabla;
        $resultado = self::$db->query($query);
        $total = $resultado->fetch_array();

        return array_shift($total);
    }

    public static function totalHabilitados() {
        $query = "SELECT COUNT(*) FROM " . static::$tabla . " WHERE habilitado = 1";
        $resultado = self::$db->query($query);
        $total = $resultado->fetch_array();

        return array_shift($total);
    }
   


    


}