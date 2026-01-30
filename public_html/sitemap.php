<?php
// Importar el modelo y dependencias
require_once '../vendor/autoload.php';
require_once '../models/Novedades.php';
require_once '../models/ActiveRecord.php';

use Model\Novedades;
use mysqli; // Añadir para clarificar el uso de mysqli

// Configuración de la base de datos
$host = 'localhost:3306';
$user = 'mlhnjrte_rodrigo';
$password = 'Gabriela1976!!';
$dbname = 'mlhnjrte_urro';

// Crear conexión a la base de datos
$db = new mysqli($host, $user, $password, $dbname);

// Manejo de errores de conexión de forma más robusta
if ($db->connect_error) {
    // Podrías registrar el error en un log en lugar de solo morir
    error_log("Error en la conexión a la base de datos para sitemap: " . $db->connect_error);
    // Y luego quizás enviar un XML de error o simplemente salir sin contenido si no quieres exponer errores
    // header("HTTP/1.1 500 Internal Server Error");
    die("Error al generar el sitemap. Por favor, inténtelo de nuevo más tarde.");
}

// Pasar la conexión al modelo ActiveRecord
// Esto es crucial para que tus modelos puedan interactuar con la DB
Model\ActiveRecord::setDB($db);

// Obtener todas las novedades
$query = "SELECT * FROM novedades ORDER BY fecha DESC"; // 'novedades' es el nombre de tu tabla
$novedades = Novedades::consultarSQL($query); // R

// --- Generación del XML ---

// Cabecera XML
header("Content-Type: application/xml; charset=UTF-8");

// Inicio del XML con declaración de namespaces
echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . PHP_EOL;
echo '          xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . PHP_EOL;

// Página principal
echo '  <url>' . PHP_EOL;
echo '    <loc>https://urro.com.ar/</loc>' . PHP_EOL;
echo '    <priority>1.0</priority>' . PHP_EOL;
echo '    <changefreq>daily</changefreq>' . PHP_EOL;
echo '  </url>' . PHP_EOL;

// Agregar las novedades dinámicamente
foreach ($novedades as $novedad) {
    // Asegurarse de que el slug no esté vacío para evitar URLs mal formadas
    if (empty($novedad->slug)) {
        continue; // Saltar esta novedad si no tiene un slug válido
    }

    $url = "https://urro.com.ar/novedad/" . htmlspecialchars($novedad->slug); // Escapar el slug por si acaso
    $fecha = '';
    if (!empty($novedad->fecha)) {
        $fecha = date('Y-m-d', strtotime($novedad->fecha));
    } else {
        // Si no hay fecha, puedes usar la fecha actual o una fecha por defecto,
        // o simplemente omitir <lastmod> si no es un campo obligatorio en tu BD.
        $fecha = date('Y-m-d'); // Usar fecha actual si la fecha de novedad está vacía
    }

    echo '  <url>' . PHP_EOL;
    echo '    <loc>' . $url . '</loc>' . PHP_EOL;
    echo '    <lastmod>' . $fecha . '</lastmod>' . PHP_EOL;
    echo '    <priority>0.8</priority>' . PHP_EOL;
    echo '    <changefreq>weekly</changefreq>' . PHP_EOL;
    
    // Solo incluir la imagen si el campo 'imagen' no está vacío
    if (!empty($novedad->imagen)) {
        $imageUrl = "https://urro.com.ar/imagenes/" . htmlspecialchars($novedad->imagen);
        echo '    <image:image>' . PHP_EOL;
        echo '      <image:loc>' . $imageUrl . '</image:loc>' . PHP_EOL;
        echo '      <image:caption><![CDATA[' . $novedad->titulo_novedad . ']]></image:caption>' . PHP_EOL;
        echo '      <image:title><![CDATA[' . $novedad->titulo_novedad . ']]></image:title>' . PHP_EOL;
        echo '    </image:image>' . PHP_EOL;
    }
    echo '  </url>' . PHP_EOL;
}

// Cerrar el XML
echo '</urlset>' . PHP_EOL;

// Cerrar la conexión a la base de datos
$db->close();
?>