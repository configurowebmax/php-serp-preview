<?php
/**
 * Simulador de Snippets de Google (SERP Preview)
 * Muestra cómo se verá un resultado en Google.
 */
header('Content-Type: text/html; charset=utf-8');

$titulo    = trim($_POST['titulo'] ?? '');
$url       = trim($_POST['url'] ?? '');
$desc      = trim($_POST['desc'] ?? '');
$mostrar   = !empty($titulo);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simulador de Snippets de Google SERP Preview | ConfiguroWeb</title>
<meta name="description" content="Simula cómo se verá tu página en los resultados de Google (SERP). Optimiza títulos y meta descripciones para más clics. Herramienta SEO de ConfiguroWeb.">
<meta name="keywords" content="serp preview, snippet google, simulador resultados google, seo preview, meta description checker">
<meta property="og:type" content="website">
<meta property="og:title" content="Simulador de Snippets de Google (SERP Preview)">
<meta property="og:description" content="Visualiza cómo se verá tu página en Google antes de publicar.">
<link rel="canonical" href="https://demoscweb.com/github/php-serp-preview/">
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"WebApplication","name":"Simulador SERP","applicationCategory":"DeveloperApplication","operatingSystem":"Any","offers":{"@type":"Offer","price":"0","priceCurrency":"USD"},"author":{"@type":"Person","name":"ConfiguroWeb","url":"https://configuroweb.com"}}
</script>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header>
  <h1>🔍 Simulador de Snippets de Google</h1>
  <p class="subtitle">Visualiza cómo se verá tu página en los resultados de búsqueda.</p>
</header>
<main>
  <form method="POST" id="form">
    <label for="titulo">Título (Title Tag) <small id="c-titulo">0/60</small></label>
    <input type="text" name="titulo" id="titulo" maxlength="70" value="<?php echo htmlspecialchars($titulo); ?>" placeholder="Título de tu página - Mi Sitio">

    <label for="url">URL visible</label>
    <input type="text" name="url" id="url" value="<?php echo htmlspecialchars($url); ?>" placeholder="https://misitio.com/pagina">

    <label for="desc">Meta Descripción <small id="c-desc">0/160</small></label>
    <textarea name="desc" id="desc" rows="3" maxlength="180" placeholder="Descripción atractiva que incentive el clic..."><?php echo htmlspecialchars($desc); ?></textarea>

    <button type="submit" class="btn-primary">🔄 Generar Preview</button>
  </form>

  <?php if ($mostrar): ?>
  <h2 style="margin-top:2rem">Vista previa en Google:</h2>
  <div class="serp-preview">
    <div class="serp-url"><?php echo htmlspecialchars($url ?: 'https://tu-sitio.com'); ?></div>
    <div class="serp-title" id="serp-title"><?php echo htmlspecialchars($titulo); ?></div>
    <div class="serp-desc" id="serp-desc"><?php echo htmlspecialchars($desc ?: 'Sin descripción.'); ?></div>
  </div>

  <div class="alertas">
    <?php
    if (strlen($titulo) > 60) echo '<p class="warn">⚠️ El título supera 60 caracteres (' . strlen($titulo) . '). Google puede cortarlo.</p>';
    elseif (strlen($titulo) < 30) echo '<p class="warn">⚠️ El título es muy corto. Aprovecha para añadir keywords.</p>';
    else echo '<p class="ok">✅ Longitud de título óptima.</p>';

    if (strlen($desc) > 160) echo '<p class="warn">⚠️ La descripción supera 160 caracteres (' . strlen($desc) . '). Se truncará.</p>';
    elseif (strlen($desc) < 70 && strlen($desc) > 0) echo '<p class="warn">⚠️ Descripción corta. Añade más contexto.</p>';
    elseif (strlen($desc) > 0) echo '<p class="ok">✅ Longitud de descripción óptima.</p>';
    ?>
  </div>
  <?php endif; ?>

  <section class="info">
    <h2>¿Por qué importa el SERP Preview?</h2>
    <p>El <strong>CTR (Click-Through Rate)</strong> depende de cómo se ve tu resultado en Google. Un título y descripción optimizados pueden aumentar tus clics hasta un 30% sin subir posiciones.</p>
    <ul>
      <li><strong>Título:</strong> 50-60 caracteres ideal.</li>
      <li><strong>Meta descripción:</strong> 120-160 caracteres ideal.</li>
      <li>Usa <strong>números</strong>, <strong>preguntas</strong> y <strong>palabras clave</strong> al inicio.</li>
    </ul>
  </section>
</main>
<footer>
  <p>Desarrollado por <a href="https://configuroweb.com" target="_blank">ConfiguroWeb</a> ·
     <a href="https://appscweb.com/citas/" target="_blank">Sistema de Citas</a> ·
     <a href="https://appscweb.com/negocios/" target="_blank">Gestión de Negocios</a></p>
  <p>&copy; <?php echo date('Y'); ?> ConfiguroWeb</p>
</footer>
<script src="assets/script.js"></script>
</body>
</html>