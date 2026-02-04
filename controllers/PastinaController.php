<?php

namespace Controllers;

use MVC\Router;
use Model\Pastina;

class PastinaController {

    public static function index(Router $router) {
        $pastinas = Pastina::all();
        $resultado = $_GET['resultado'] ?? null;
        
        $router->renderAdmin('pastinas/admin', [
            'pastinas' => $pastinas,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router){
        $pastina = new Pastina;
        $errores = Pastina::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize color code: remove # if present
            if(isset($_POST['pastina']['color_pantone'])) {
                $_POST['pastina']['color_pantone'] = str_replace('#', '', $_POST['pastina']['color_pantone']);
            }

            $pastina = new Pastina($_POST['pastina']);
            $errores = $pastina->validar();

            if(empty($errores)) {
                $resultado = $pastina->guardar();
                if($resultado) {
                    header('Location: /ccn_productos/public_html/pastinas/admin?resultado=1');
                    exit;
                }
            }     
        }
        
        $router->renderAdmin('pastinas/crear', [
            'pastina' => $pastina,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /ccn_productos/public_html/pastinas/admin');
            exit;
        }

        $pastina = Pastina::find($id);
        $errores = Pastina::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize color code: remove # if present
            if(isset($_POST['pastina']['color_pantone'])) {
                $_POST['pastina']['color_pantone'] = str_replace('#', '', $_POST['pastina']['color_pantone']);
            }
            
            $args = $_POST['pastina'];
            $pastina->sincronizar($args);
            $errores = $pastina->validar();
            
            if(empty($errores)) {
                $resultado = $pastina->guardar();
                if($resultado) {
                    header('Location: /ccn_productos/public_html/pastinas/admin?resultado=2');
                    exit;
                }
            }
        }    

        $router->renderAdmin('pastinas/actualizar', [
            'pastina' => $pastina,
            'errores' => $errores
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {
                $tipo = $_POST['tipo'];     
                if($tipo === 'pastina') {
                    $pastina = Pastina::find($id);
                    $resultado = $pastina->eliminar();
                    if($resultado) {
                        header('Location: /ccn_productos/public_html/pastinas/admin?resultado=3');
                        exit;
                    }
                } 
            }
        }
    }
}
