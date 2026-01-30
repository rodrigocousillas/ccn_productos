<?php
require '../includes/config/database.php'; // Ajusta la ruta si es necesario
require '../includes/funciones.php'; // Ajusta la ruta si es necesario

$db = conectarDB();

// Consultar todas las novedades desde la base de datos
$query = "SELECT slug, fecha FROM novedades";
$resultado = mysqli_query($db, $query);

// Verificar si hay resultados
if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Iniciar el documento XML del sitemap
    header('Content-Type: application/xml');
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    // Iterar sobre cada novedad y agregarla al sitemap
    while ($novedad = mysqli_fetch_assoc($resultado)) {
        $url = 'https://www.urro.com.ar/novedad/' . $novedad['slug']; // Reemplaza 'https://tu-dominio.com' con tu dominio real
        $fecha_modificacion = date('Y-m-d', strtotime($novedad['fecha']));

        echo '<url>';
        echo '<loc>' . htmlspecialchars($url) . '</loc>';
        echo '<lastmod>' . htmlspecialchars($fecha_modificacion) . '</lastmod>';
        echo '<changefreq>weekly</changefreq>'; // Puedes ajustar la frecuencia según la frecuencia de tus publicaciones
        echo '<priority>0.8</priority>'; // Puedes ajustar la prioridad según la importancia de esta sección
        echo '</url>';
    }

    // Finalizar el documento XML del sitemap
    echo '</urlset>';
} else {
    // Si no hay novedades, puedes mostrar un mensaje o un sitemap vacío
    header('Content-Type: text/plain');
    echo "No se encontraron novedades para incluir en el sitemap.";
}

// Cerrar la conexión a la base de datos
mysqli_close($db);
?>