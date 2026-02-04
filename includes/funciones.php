<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../public_html/imagenes/');
define('CARPETA_SLIDERSHOME', $_SERVER['DOCUMENT_ROOT'] . '/sliderhome/');
define('CARPETA_PRESENTACIONES', $_SERVER['DOCUMENT_ROOT'] . '/downloads/');
define('CARPETA_PDF', $_SERVER['DOCUMENT_ROOT'] . '/pdf/');
define('CARPETA_IMG', $_SERVER['DOCUMENT_ROOT'] . '/img/');
define('CARPETA_PRODUCTOS_PDF', __DIR__ . '/../public_html/productos/pdf/');

function incluirTemplate( string  $nombre, bool $inicio = false ) {
    include TEMPLATES_URL . "/{$nombre}.php"; 
}

function estaAutenticado() {
    session_start();

    if(!$_SESSION['login']) {
        header('Location: ../../login.php');
    }
}

function debugear($variable) {

    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;

}

function s($html) {
    return htmlspecialchars($html ?? '', ENT_QUOTES, 'UTF-8');
}


// Valida tipo de petición
function validarTipoContenido($tipo){
    $tipos = ['empresa', 'press', 'gobiernos', 'ratio', 'mensajesContacto', 'producto'];
    return in_array($tipo, $tipos);
}

// Muestra los mensajes
function mostrarNotificacion($codigo) {
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $mensaje = 'Item creado correctamente';
            break;
        case 2:
            $mensaje = 'Item actualizado correctamente';
            break;
        case 3:
            $mensaje = 'Item eliminado correctamente';
            break;
        case 4:
            $mensaje = 'Empresa registrada correctamente';
            break;
        case 5:
            $mensaje = 'Empresa actualizada correctamente';
            break;
        case 6:
            $mensaje = 'Empresa eliminada correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarORedireccionar(string $url) {
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header("Location: {$url} " );
    }

    return $id;
}

function urls_amigables($url) {

// Tranformamos todo a minusculas

$url = strtolower($url);

//Rememplazamos caracteres especiales latinos

$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');

$repl = array('a', 'e', 'i', 'o', 'u', 'n');

$url = str_replace ($find, $repl, $url);

// Añaadimos los guiones

$find = array(' ', '&', '\r\n', '\n', '+');
$url = str_replace ($find, '-', $url);

// Eliminamos y Reemplazamos demás caracteres especiales

$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');

$repl = array('', '-', '');

$url = preg_replace ($find, $repl, $url);

return $url;

}
