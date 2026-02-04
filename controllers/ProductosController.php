<?php

namespace Controllers;
use MVC\Router;
use Model\Productos;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductosController {

    public static function index(Router $router) {
        
        $productos = Productos::all();
        $resultado = $_GET['resultado'] ?? null;
        $router->renderAdmin('productos/admin', [
            'productos' => $productos,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router){
        
        $producto = new Productos;
        $errores = Productos::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $producto = new Productos($_POST['producto']);
            
            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg"; // Agrego extensión dummy por ahora
            $nombrePdf = md5( uniqid( rand(), true ) );

            // PARCHE TEMPORAL: Subida simple sin Intervention Image (por versión PHP)
            if($_FILES['producto']['tmp_name']['imagen']) {
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg"; 
                $producto->setImagen($nombreImagen);
                move_uploaded_file($_FILES['producto']['tmp_name']['imagen'], CARPETA_IMAGENES . $nombreImagen);
            }

            // Subida de PDF
            if($_FILES['producto']['tmp_name']['pdf']) {
               // $producto->setPdf($nombrePdf . ".pdf");
                // Mover el archivo PDF y guardar propiedad manual (o crear setPdf en modelo)
                $producto->pdf = $nombrePdf . ".pdf";
                move_uploaded_file($_FILES['producto']['tmp_name']['pdf'], CARPETA_PRODUCTOS_PDF . $nombrePdf . ".pdf");
            }

            $errores = $producto->validar();

            if(empty($errores)) {
                $resultado = $producto->guardar();
                if($resultado) {
                    header('Location: /ccn_productos/public_html/productos/admin?resultado=1');
                    exit;
                }
            }     
        }
        
        $router->renderAdmin('productos/crear', [
            'producto' => $producto,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /ccn_productos/public_html/productos/admin');
            exit;
        }

        $producto = Productos::find($id);
        $errores = Productos::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['producto'];
            $producto->sincronizar($args);

            // Validación de subida de archivos
            $nombreImagen = md5( uniqid( rand(), true ) );
            $nombrePdf = md5( uniqid( rand(), true ) );

             // PARCHE TEMPORAL: Subida simple sin Intervention Image (por versión PHP)
             if($_FILES['producto']['tmp_name']['imagen']) {
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
                $producto->setImagen($nombreImagen);
                move_uploaded_file($_FILES['producto']['tmp_name']['imagen'], CARPETA_IMAGENES . $nombreImagen);
            }


            if($_FILES['producto']['tmp_name']['pdf']) {
               // Borrar PDF previo si existe (lógica manual por ahora o agregar setPdf)
               if($producto->pdf) {
                   $archivoPdfPrevio = CARPETA_PRODUCTOS_PDF . $producto->pdf;
                   if(file_exists($archivoPdfPrevio)) {
                       unlink($archivoPdfPrevio);
                   }
               }
               $producto->pdf = $nombrePdf . ".pdf";
               move_uploaded_file($_FILES['producto']['tmp_name']['pdf'], CARPETA_PRODUCTOS_PDF . $nombrePdf . ".pdf");
            }

            $errores = $producto->validar();
            
            if(empty($errores)) {
                $resultado = $producto->guardar();
                if($resultado) {
                    header('Location: /ccn_productos/public_html/productos/admin?resultado=2');
                    exit;
                }
            }
        }    

        $router->renderAdmin('productos/actualizar', [
            'producto' => $producto,
            'errores' => $errores
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {
                $tipo = $_POST['tipo'];     
                if($tipo === 'producto') {
                    $producto = Productos::find($id);
                    $resultado = $producto->eliminar();
                    if($resultado) {
                        header('Location: /ccn_productos/public_html/productos/admin?resultado=3');
                        exit;
                    }
                } 
            }
        }
    }
}