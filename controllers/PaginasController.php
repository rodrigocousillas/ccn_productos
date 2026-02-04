<?php


namespace Controllers;

use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function index(Router $router)
    {
        $router->render('paginas/index', [
            'inicio' => true,
        ]);
    }

    public static function administrador(Router $router)
    {    
        $router->renderAdmin('paginas/administrador', [
        ]);
    }
}
