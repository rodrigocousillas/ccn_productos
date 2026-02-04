<?php

namespace Model;

class Linea extends ActiveRecord {
    protected static $tabla = 'lineas'; // Using plural to follow convention often used, or singular? Pastina was 'pastina'. Productos is 'productos'. I'll use 'lineas'.
    protected static $primaryKey = 'id';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$errores[] = "El Nombre de la Línea es obligatorio";
        }
        return self::$errores;
    }
}
