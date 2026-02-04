<?php

namespace Model;

class Pastina extends ActiveRecord {
    protected static $tabla = 'pastina';
    protected static $primaryKey = 'id';
    protected static $columnasDB = ['id', 'color_ccn', 'color_pantone', 'webber', 'mapei', 'klaukol'];

    public $id;
    public $color_ccn;
    public $color_pantone;
    public $webber;
    public $mapei;
    public $klaukol;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->color_ccn = $args['color_ccn'] ?? '';
        $this->color_pantone = $args['color_pantone'] ?? '';
        $this->webber = $args['webber'] ?? '';
        $this->mapei = $args['mapei'] ?? '';
        $this->klaukol = $args['klaukol'] ?? '';
    }

    public function validar() {
        if(!$this->color_ccn) {
            self::$errores[] = "El Color CCN es obligatorio";
        }
        return self::$errores;
    }
}
