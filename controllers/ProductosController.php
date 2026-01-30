<?php

namespace Controllers;
use MVC\Router;
use Model\Novedades;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class NovedadesController {

    public static function index(Router $router) {
        
        $novedades = Novedades::all();
        $resultado = $_GET['resultado'] ?? null;
        $router->renderAdmin('novedades/admin', [
            'novedades' => $novedades,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router){
        
        $novedades = new Novedades;
        
        $errores = Novedades::getErrores();

        // Ejecutar el código después de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $novedades = new Novedades($_POST['novedades']);

            // --- CAMBIO 1: Cambiar la extensión a .webp para el nombre del archivo ---
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".webp"; // Aquí se cambió de .jpg a .webp
            
            //resize a la imagen
            if($_FILES['novedades']['tmp_name']['imagen']){
                $manager = new ImageManager(new Driver());
                $image = $manager->read($_FILES['novedades']['tmp_name']['imagen'])->cover(800,600);
                $novedades->setImagen($nombreImagen); 
            }     
    

        $errores = $novedades->validar();

        if(empty($errores)) {
            
            if(!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
            }
    
            // --- CAMBIO 2: Guardar la imagen como WebP con calidad (opcional) ---
            if(isset($image)){
                $image->save(CARPETA_IMAGENES . $nombreImagen, 80); // Guarda como .webp con calidad 80
            }

            $resultado = $novedades->guardar();
            if($resultado) {
                header('Location: /novedades/admin?resultado=1');
                exit;
            }
        }     

    }
        
        $router->renderAdmin('novedades/crear', [
            'novedades' => $novedades,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {

        $id = validarORedireccionar('/admin');

        // Obtener los datos de la nota
        $novedades = Novedades::find($id);

        // Arreglo con mensajes de errores
        $errores = Novedades::getErrores();

    
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['novedades'];
        
            $novedades->sincronizar($args);
    
            $errores = $novedades->validar();
            
            
            // --- CAMBIO 3: Cambiar la extensión a .webp para el nombre del archivo ---
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".webp"; // Aquí se cambió de .jpg a .webp
    
            // Verificar si hay una nueva imagen cargada
            if($_FILES['novedades']['tmp_name']['imagen']){
                $manager = new ImageManager(new Driver());
                $image = $manager->read($_FILES['novedades']['tmp_name']['imagen'])->cover(800,600);
                
                // Si hay una imagen previa, podrías eliminarla aquí para evitar archivos huérfanos
                // if (!empty($novedades->imagen) && file_exists(CARPETA_IMAGENES . $novedades->imagen)) {
                //     unlink(CARPETA_IMAGENES . $novedades->imagen);
                // }
                $novedades->setImagen($nombreImagen); 
            }    
    
            if(empty($errores)) {

                // Guardar la nueva imagen si se cargó una
                if(isset($image)){ 
                    // --- CAMBIO 4: Guardar la imagen como WebP con calidad (opcional) ---
                    $image->save(CARPETA_IMAGENES . $nombreImagen, 80); // Guarda como .webp con calidad 80
                }
    
                $resultado = $novedades->guardar();
                if($resultado) {
                    header('Location: /novedades/admin?resultado=2');
                    exit;
                }
            }
            
        }    

        $router->renderAdmin('novedades/actualizar', [
            'novedades' => $novedades,
            'errores' => $errores
        ]);

    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);


            if($id) {

                $tipo = $_POST['tipo'];     
                
                
                if(validarTipoContenido($tipo)) {
                    $novedades = Novedades::find($id);
                    $resultado = $novedades->eliminar();
                    if($resultado) {
                        header('Location: /novedades/admin?resultado=3');
                        exit;
                    }
                } 
            }
        }
    }

}

?>