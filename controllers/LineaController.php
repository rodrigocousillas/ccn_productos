<?php

namespace Controllers;

use MVC\Router;
use Model\Linea;

class LineaController {

    public static function index(Router $router) {
        $lineas = Linea::all();
        $resultado = $_GET['resultado'] ?? null;
        
        $router->renderAdmin('lineas/admin', [
            'lineas' => $lineas,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router){
        $linea = new Linea;
        $errores = Linea::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $linea = new Linea($_POST['linea']);
            $errores = $linea->validar();

            if(empty($errores)) {
                $resultado = $linea->guardar();
                if($resultado) {
                    header('Location: /ccn_productos/public_html/lineas/admin?resultado=1');
                    exit;
                }
            }     
        }
        
        $router->renderAdmin('lineas/crear', [
            'linea' => $linea,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /ccn_productos/public_html/lineas/admin');
            exit;
        }

        $linea = Linea::find($id);
        $errores = Linea::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['linea'];
            $linea->sincronizar($args);
            $errores = $linea->validar();
            
            if(empty($errores)) {
                $resultado = $linea->guardar();
                if($resultado) {
                    header('Location: /ccn_productos/public_html/lineas/admin?resultado=2');
                    exit;
                }
            }
        }    

        $router->renderAdmin('lineas/actualizar', [
            'linea' => $linea,
            'errores' => $errores
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {
                $tipo = $_POST['tipo'];     
                if($tipo === 'linea') {
                    $linea = Linea::find($id);
                    $resultado = $linea->eliminar();
                    if($resultado) {
                        header('Location: /ccn_productos/public_html/lineas/admin?resultado=3');
                        exit;
                    }
                } 
            }
        }
    }
}
