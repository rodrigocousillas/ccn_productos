<?php

namespace Model;

class Novedades extends ActiveRecord {

    protected static $tabla = 'novedades';
    protected static $columnasDB = ['id', 'titulo_novedad', 'bajada_novedad', 'cuerpo_novedad', 'tipo_novedad', 'imagen', 'fecha', 'fecha_edicion', 'slug', 'visitas'];

    public $id;
    public $titulo_novedad;
    public $bajada_novedad;
    public $cuerpo_novedad;
    public $tipo_novedad;
    public $imagen;
    public $fecha;
    public $fecha_edicion; 
    public $slug;
    public $visitas;

    public function __construct($args = []) 
    {
        $this->id = $args['id'] ?? null;
        $this->titulo_novedad = $args['titulo_novedad'] ?? '';
        $this->bajada_novedad = $args['bajada_novedad'] ?? '';
        $this->cuerpo_novedad = $args['cuerpo_novedad'] ?? '';
        $this->tipo_novedad = $args['tipo_novedad'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->fecha = $args['fecha'] ?? date('Y-m-d H:i:s'); 
        $this->fecha_edicion = $args['fecha_edicion'] ?? null; 
        $this->slug = $args['slug'] ?? '';
        $this->visitas = $args['visitas'] ?? 0;

        if (empty($this->slug) && !empty($this->titulo_novedad)) {
            $this->slug = $this->generarSlugUnico($this->titulo_novedad);
        }
    }

    // SOBREESCRITURA DE CREAR: Evita enviar fecha_edicion si está vacía
    public function crear() {
        // Guardamos las columnas originales
        $columnasOriginales = static::$columnasDB;

        // Si no hay fecha de edición (es una nota nueva), la quitamos de las columnas para el INSERT
        if (empty($this->fecha_edicion)) {
            static::$columnasDB = array_diff(static::$columnasDB, ['fecha_edicion']);
        }

        // Ejecutamos el crear del padre
        $resultado = parent::crear();

        // Restauramos las columnas originales para que el modelo siga funcionando bien en memoria
        static::$columnasDB = $columnasOriginales;

        return $resultado;
    }

    public function actualizar() {
        // Al actualizar manualmente, sí disparamos la fecha de edición
        $this->fecha_edicion = date('Y-m-d H:i:s');
        return parent::actualizar();
    }

    public function validar() {
        if(!$this->titulo_novedad) self::$errores[] = "Falta el titulo de la novedad.";
        if(!$this->imagen) self::$errores[] = "Falta la imagen.";
        if(!$this->cuerpo_novedad) self::$errores[] = "Falta el cuerpo de la novedad.";
        if(!$this->tipo_novedad) self::$errores[] = "Falta el tipo de novedad.";
        if(!$this->bajada_novedad) self::$errores[] = "Falta la bajada de la novedad.";
        return self::$errores;
    }

    protected function generarSlugUnico($titulo) {
        $caracteres_especiales = [
            'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u',
            'Á' => 'A', 'É' => 'E', 'Í' => 'I', 'Ó' => 'O', 'Ú' => 'U',
            'ñ' => 'n', 'Ñ' => 'N', 'ü' => 'u', 'Ü' => 'U', 'ç' => 'c', 'Ç' => 'C'
        ];
        $titulo_limpio = strtr($titulo, $caracteres_especiales);
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $titulo_limpio), '-'));

        $query = "SELECT COUNT(*) as total FROM " . static::$tabla . " WHERE slug = '" . self::$db->escape_string($slug) . "'";
        $resultado = self::$db->query($query);
        $datos = $resultado->fetch_assoc();

        $contador = 1;
        $slugOriginal = $slug;
        while ($datos['total'] > 0) {
            $slug = $slugOriginal . '-' . $contador++;
            $query = "SELECT COUNT(*) as total FROM " . static::$tabla . " WHERE slug = '" . self::$db->escape_string($slug) . "'";
            $resultado = self::$db->query($query);
            $datos = $resultado->fetch_assoc();
        }
        return $slug;
    }

    public static function findBySlug($slug) {
        $slug = self::$db->escape_string($slug);
        $query = "SELECT * FROM " . static::$tabla . " WHERE slug = '" . $slug . "' LIMIT 1";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public function incrementarVisitas() {
        // Query directo a la DB: No activa 'actualizar()' ni cambia 'fecha_edicion'
        $query = "UPDATE " . static::$tabla . " SET visitas = visitas + 1 WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        return self::$db->query($query);
    }

    public static function getMasLeidas($cantidad = 5) {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY visitas DESC LIMIT " . (int)$cantidad;
        return self::consultarSQL($query);
    }
}