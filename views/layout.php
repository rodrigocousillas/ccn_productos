<?php
$urlActual = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
$path = explode('?', $urlActual)[0]; // Obtenemos solo la ruta antes de los parámetros

if (!isset($_SESSION)) {
  session_start();
}

$auth = $_SESSION['login'] ?? false;

if (!isset($inicio)) {
  $inicio = false;
}
    $title = isset($metaTitle) 
        ? $metaTitle
        : "Obras Literarias | Urro";

    $description = isset($metaDescription)    
      ? $metaDescription
      : "Urro es un sitio web dedicado a la difusión de obras literarias, ofreciendo una selección de poemas y escritos de reconocidos autores y autores amateurs. Explorar y lee estas obras en línea, sumergiéndote en la riqueza de la literatura clásica y contemporánea.";
    
    $ogImage = isset($metaImage) 
      ? $metaImage 
      : "https://www.urro.com.ar/img/og_urro.jpg";
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-5KSNKQJYES"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-5KSNKQJYES');
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><? echo $title ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
  <link rel="preload" href="https://urro.com.ar/css/normalize.css" as="style">
  <link rel="stylesheet" href="https://urro.com.ar/css/normalize.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="preload" href="https://urro.com.ar/css/main.css" as="style" onload="this.rel='stylesheet'">
  <link rel="stylesheet" href="https://urro.com.ar/css/main.css">
  <link rel="stylesheet" href="https://urro.com.ar/css/media_queries.css">
  <link rel="canonical" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
  <link rel="shortcut icon" href="https://urro.com.ar/ico/favicon.png">
  <link rel="preload" fetchpriority="high" as="image" href="<?= htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8') ?>" type="image/webp">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
  
  <meta property="og:title" content="<? echo $title ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
  <meta property="og:image" content="<?= htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8') ?>">
  <meta property="og:image:alt" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">

  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@RodrigoCou40204">
  <meta name="twitter:creator" content="@RodrigoCou40204">
  <meta name="twitter:title" content="<? echo $title ?>" />
  <meta name="twitter:description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>" />
  <meta name="twitter:image" content="<?= htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8') ?>">
  
  <link rel="manifest" href="manifest.json">
  <meta name="theme-color" content="#0B8F97">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <link rel="apple-touch-icon" href="img/pwa-icon-512.png">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6191751815046278"
  crossorigin="anonymous"></script>
  <?php if(isset($newsSchema)): ?>
  <script type="application/ld+json">
    <?= json_encode($newsSchema) ?>
  </script>
  <?php endif; ?>
  
  <script async type="application/javascript"
        src="https://news.google.com/swg/js/v1/swg-basic.js"></script>
<script>
  (self.SWG_BASIC = self.SWG_BASIC || []).push( basicSubscriptions => {
    basicSubscriptions.init({
      type: "NewsArticle",
      isPartOfType: ["Product"],
      isPartOfProductId: "CAowrZTbCw:openaccess",
      clientOptions: { theme: "light", lang: "es" },
    });
  });
</script>







</head>
 
<body> 
<div class="container-fluid d-flex justify-content-center py-3" style="background-color: #F0F0F0;">
  <a href="https://www.urro.com.ar/caminoadublin/index.html?utm_source=urro_web&utm_medium=banner_interno&utm_campaign=camino_a_dublin" 
     target="_blank" 
     rel="sponsored noopener noreferrer" 
     title="Descargar Camino a Dublín">
    <img src="https://www.urro.com.ar/img/banner_cad.jpg" 
         alt="Banner publicitario: Libro Camino a Dublín - 7 cuentos" 
         style="width: 100%; max-width: 930px; height: auto; border: none; display: block;">
  </a>
</div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Urro | Obras literarias</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <form class="d-flex ms-lg-4 mt-3 mt-lg-0 order-2 order-lg-1" action="/buscar" method="GET">
          <div class="input-group" style="border: 1px solid #0B8F97; border-radius: 5px;">
            <input class="form-control border-0" type="search" name="q" placeholder="Buscar en Urro..." aria-label="Search" required minlength="3" style="box-shadow: none;">
            <button class="btn border-0" type="submit" style="background-color: white; box-shadow: none;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#666" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
              </svg>
            </button>
          </div>
        </form>
        <ul class="navbar-nav ms-auto order-1 order-lg-2">
          <li class="nav-item">
            <a class="nav-link <?php echo $path === '/' ? 'active' : ''; ?>" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (strpos($path, '/novedades') === 0 || strpos($path, '/novedad/') === 0) ? 'active' : ''; ?>" href="/novedades">Novedades</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (strpos($path, '/autores') === 0 || strpos($path, '/autor/') === 0) ? 'active' : ''; ?>" href="/autores">Autores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (strpos($path, '/obras_literarias') === 0 || strpos($path, '/obra_literaria') === 0 || strpos($path, '/obra/') === 0) ? 'active' : ''; ?>" href="/obras_literarias">Obras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (strpos($path, '/libros') === 0 || strpos($path, '/libro/') === 0) ? 'active' : ''; ?>" href="/libros">Libros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $path === '/contacto' ? 'active' : ''; ?>" href="/contacto">Contacto</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php echo $contenido; ?>

  <div class="container-fluid footer">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-10">
          <span>Urro | Obras Literarias</span>
        </div>
        <div class="col-12 col-md-2">
          <ul class="links_footer">
            <li><a href="/autores">Autores</a></li>
            <li><a href="/obras_literarias">Obras</a></li>
            <li><a href="/novedades">Novedades</a></li>
            <li><a href="/libros">Libros</a></li>
            <li><a href="/contacto">Contacto</a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <p>
            Todos los derechos reservados 2025, Buenos Aires, Argentina. | <a href="/politicas-de-privacidad">Politicas de privacidad</a>
          </p>  
        </div>
      </div>
    </div>
  </div>


  <script defer src="https://urro.com.ar/js/vendor/modernizr-3.6.0.min.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <script type="module" src="https://urro.com.ar/js/plugins.js"></script>
  <script type="module" src="https://urro.com.ar/js/main.js"></script>
  <!--<script src="js/slick.js" type="text/javascript" charset="utf-8"></script>-->
  
<script>
  document.getElementById('banner-amazon-dublin').addEventListener('click', function() {
    gtag('event', 'click_banner_amazon', {
      'event_category': 'Engagement',
      'event_label': 'Camino a Dublin',
      'page_location': window.location.href
    });
  });

  if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
      navigator.serviceWorker.register('sw.js')
        .then(reg => console.log('Service Worker registrado', reg))
        .catch(err => console.log('Error al registrar Service Worker', err));
    });
  }
</script>


</body>

</html>

