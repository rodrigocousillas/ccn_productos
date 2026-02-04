<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\LoginController;
use Controllers\PrensaController;
use Controllers\PaginasController;
use Controllers\NovedadesController;
use Controllers\AutoresController;
use Controllers\BusquedaController;
use Controllers\LibrosController;
use Controllers\MensajeController;
use Controllers\ComentariosController;
use Controllers\ProductosController;
use Controllers\PastinaController;
use Controllers\LineaController;
// use Controllers\UploadPdfController;


$router = new Router();

$router->get('/notas/admin', [PrensaController::class, 'index']);
$router->get('/notas/crear', [PrensaController::class, 'crear']);
$router->post('/notas/crear', [PrensaController::class, 'crear']);
$router->get('/notas/actualizar', [PrensaController::class, 'actualizar']);
$router->post('/notas/actualizar', [PrensaController::class, 'actualizar']);
$router->post('/notas/eliminar', [PrensaController::class, 'eliminar']);

$router->get('/productos/admin', [ProductosController::class, 'index']);
$router->get('/productos/crear', [ProductosController::class, 'crear']);
$router->post('/productos/crear', [ProductosController::class, 'crear']);
$router->get('/productos/actualizar', [ProductosController::class, 'actualizar']);
$router->post('/productos/actualizar', [ProductosController::class, 'actualizar']);
$router->post('/productos/eliminar', [ProductosController::class, 'eliminar']);

$router->get('/pastinas/admin', [PastinaController::class, 'index']);
$router->get('/pastinas/crear', [PastinaController::class, 'crear']);
$router->post('/pastinas/crear', [PastinaController::class, 'crear']);
$router->get('/pastinas/actualizar', [PastinaController::class, 'actualizar']);
$router->post('/pastinas/actualizar', [PastinaController::class, 'actualizar']);
$router->post('/pastinas/eliminar', [PastinaController::class, 'eliminar']);

$router->get('/lineas/admin', [LineaController::class, 'index']);
$router->get('/lineas/crear', [LineaController::class, 'crear']);
$router->post('/lineas/crear', [LineaController::class, 'crear']);
$router->get('/lineas/actualizar', [LineaController::class, 'actualizar']);
$router->post('/lineas/actualizar', [LineaController::class, 'actualizar']);
$router->post('/lineas/eliminar', [LineaController::class, 'eliminar']);

$router->get('/novedades/admin', [NovedadesController::class, 'index']);
$router->get('/novedades/crear', [NovedadesController::class, 'crear']);
$router->post('/novedades/crear', [NovedadesController::class, 'crear']);
$router->get('/novedades/actualizar', [NovedadesController::class, 'actualizar']);
$router->post('/novedades/actualizar', [NovedadesController::class, 'actualizar']);
$router->post('/novedades/eliminar', [NovedadesController::class, 'eliminar']);

$router->get('/autores/admin', [AutoresController::class, 'index']);
$router->get('/autores/crear', [AutoresController::class, 'crear']);
$router->post('/autores/crear', [AutoresController::class, 'crear']);
$router->get('/autores/actualizar', [AutoresController::class, 'actualizar']);
$router->post('/autores/actualizar', [AutoresController::class, 'actualizar']);
$router->post('/autores/eliminar', [AutoresController::class, 'eliminar']);

$router->get('/index', [PaginasController::class, 'index']);
$router->get('/', [PaginasController::class, 'index']);
$router->get('/obras_literarias', [PaginasController::class, 'notasprensa']);
$router->get('/obra_literaria', [PaginasController::class, 'notaprensa']);
$router->get('/obra/{slug}', [PaginasController::class, 'notaprensa']);
$router->get('/novedades', [PaginasController::class, 'novedades']);
$router->get('/novedad/{slug}', [PaginasController::class, 'novedad']);
$router->post('/novedad/{slug}', [PaginasController::class, 'novedad']);
$router->get('/autores', [PaginasController::class, 'autores']);
$router->get('/autor/{slug}', [PaginasController::class, 'autor']);

$router->get('/politicas-de-privacidad', [PaginasController::class, 'politicas']);

// $router->get('/empresas', [PaginasController::class, 'todas_empresas']);

$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

$router->get('/administrador', [PaginasController::class, 'administrador']);

$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->get('/buscar', [BusquedaController::class, 'buscar']);
$router->get('/libros', [LibrosController::class, 'index']);
$router->get('/libro/{id}', [LibrosController::class, 'show']);

$router->get('/mensaje/admin', [MensajeController::class, 'index']);
$router->get('/mensaje/actualizar', [MensajeController::class, 'actualizar']);
$router->post('/mensaje/actualizar', [MensajeController::class, 'actualizar']);
$router->post('/mensaje/eliminar', [MensajeController::class, 'eliminar']);

$router->get('/comentarios/admin', [ComentariosController::class, 'index']);
$router->post('/comentarios/activo', [ComentariosController::class, 'setActivo']);
$router->post('/comentarios/eliminar', [ComentariosController::class, 'eliminar']);

$router->comprobarRutas();

?>