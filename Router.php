<?php

namespace MVC;

class Router
{
    public $rutasGET = [];
    public $rutasPOST = [];
    protected $params = [];

    public function get($url, $fn)
    {
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas()
    {
        session_start();
        $auth = $_SESSION['login'] ?? null;

        $rutasProtegidas = ['/administrador', '/novedades/admin', '/novedades/actualizar', '/novedades/crear', '/novedades/eliminar', '/autores/admin', '/autores/actualizar', '/autores/crear', '/autores/eliminar', '/notas/admin', '/notas/actualizar', '/notas/crear', '/notas/eliminar', '/comentarios/admin', '/comentarios/activo', '/comentarios/eliminar'];

        $urlActual = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
        $metodo = $_SERVER['REQUEST_METHOD'];

        $splitURL = explode('?', $urlActual);
        $path = $splitURL[0]; // Obtenemos solo la parte de la ruta antes del '?'

        $fn = null;
        $this->params = [];

        $rutas = ($metodo === 'GET') ? $this->rutasGET : $this->rutasPOST;

        foreach ($rutas as $url => $callback) {
            // Comprobar si la ruta actual coincide con la ruta definida con parámetro
            $pattern = preg_replace('/\/\{([a-zA-Z0-9_-]+)\}/', '/([a-zA-Z0-9_-]+)', $url);
            $pattern = '#^' . $pattern . '$#';

            if (preg_match($pattern, $path, $matches)) {
                $fn = $callback;
                // Extraer los parámetros de la URL
                array_shift($matches); // Eliminar la coincidencia completa
                $keys = [];
                preg_match_all('/\{([a-zA-Z0-9_-]+)\}/', $url, $keyMatches);
                if (!empty($keyMatches[1])) {
                    $keys = $keyMatches[1];
                }
                if(count($keys) === count($matches)) {
                    $this->params = array_combine($keys, $matches);
                }
                break;
            } elseif ($url === $path) {
                $fn = $callback;
                break;
            }
        }

        if (in_array($urlActual, $rutasProtegidas) && !$auth) {
            header('Location: /');
        }

        if ($fn) {
            call_user_func($fn, $this); // Pasar $this (el router) al controlador
        } else {
            header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
            $this->render('404');
        }
    }

    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();
        include_once __DIR__ . '/views/layout.php';
    }

    public function renderBlank($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();
        include_once __DIR__ . '/views/blank.php';
    }

    public function renderAdmin($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();
        include_once __DIR__ . '/views/admin.php';
    }

    public function renderLogin($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();
        include_once __DIR__ . '/views/login.php';
    }

    public function getParams()
    {
        return $this->params;
    }
}