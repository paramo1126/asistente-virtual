<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include_once 'chat_bot.php';

// Filtro por marca (viene de URL o del bot)
$filtro = isset($_GET['filtro']) ? strtolower($_GET['filtro']) : '';

// Catálogo de zapatos
$zapatos = [
  [
    'id'      => 'adidas1',
    'nombre'  => 'Adidas Stan Smith',
    'marca'   => 'adidas',
    'precio'  => '$280.000',
    'img'     => 'imagenes/adidas.jpg',
    'emoji'   => '👟',
    'tallas'  => ['38','39','40','41','42','43','44'],
    'colores' => ['Blanco/Verde','Blanco/Negro','Blanco/Azul'],
    'desc'    => 'El clásico atemporal de Adidas. Cuero genuino, comodidad total.',
    'nuevo'   => false,
    'oferta'  => false,
  ],
  [
    'id'      => 'adidas2',
    'nombre'  => 'Adidas Ultraboost 24',
    'marca'   => 'adidas',
    'precio'  => '$420.000',
    'img'     => 'imagenes/adidas.jpg',
    'emoji'   => '👟',
    'tallas'  => ['39','40','41','42','43','44','45'],
    'colores' => ['Negro/Blanco','Azul/Blanco','Rojo/Negro'],
    'desc'    => 'Máximo rendimiento con tecnología Boost. Para correr y para la calle.',
    'nuevo'   => true,
    'oferta'  => false,
  ],
  [
    'id'      => 'fila1',
    'nombre'  => 'Fila Disruptor II',
    'marca'   => 'fila',
    'precio'  => '$195.000',
    'img'     => 'imagenes/fila.jpg',
    'emoji'   => '👟',
    'tallas'  => ['36','37','38','39','40','41','42'],
    'colores' => ['Blanco','Negro','Rosa/Blanco'],
    'desc'    => 'La chunky sneaker más popular del momento. Suela voluminosa y look retro.',
    'nuevo'   => false,
    'oferta'  => true,
    'precio_antes' => '$240.000',
  ],
  [
    'id'      => 'fila2',
    'nombre'  => 'Fila Ray Tracer',
    'marca'   => 'fila',
    'precio'  => '$165.000',
    'img'     => 'imagenes/fila.jpg',
    'emoji'   => '👟',
    'tallas'  => ['37','38','39','40','41','42','43'],
    'colores' => ['Blanco/Azul','Negro/Gris','Blanco/Rojo'],
    'desc'    => 'Running style con suela amortiguadora. Cómodo para el día a día.',
    'nuevo'   => true,
    'oferta'  => false,
  ],
  [
    'id'      => 'nike1',
    'nombre'  => 'Nike Air Force 1',
    'marca'   => 'nike',
    'precio'  => '$350.000',
    'img'     => 'camiseta.jpg',   // Cambia por la imagen real de Nike
    'emoji'   => '👟',
    'tallas'  => ['38','39','40','41','42','43','44','45'],
    'colores' => ['Blanco','Negro','Blanco/Negro'],
    'desc'    => 'El sneaker más icónico del mundo. Piel suave y comodidad legendaria.',
    'nuevo'   => false,
    'oferta'  => false,
  ],
  [
    'id'      => 'nike2',
    'nombre'  => 'Nike Air Max 270',
    'marca'   => 'nike',
    'precio'  => '$390.000',
    'img'     => 'camiseta.jpg',   // Cambia por la imagen real de Nike
    'emoji'   => '👟',
    'tallas'  => ['40','41','42','43','44'],
    'colores' => ['Negro/Rojo','Blanco/Azul','Gris/Naranja'],
    'desc'    => 'Cámara de aire de 270° para amortiguación máxima. El futuro del confort.',
    'nuevo'   => true,
    'oferta'  => true,
    'precio_antes' => '$450.000',
  ],
];

$marcas = ['adidas','fila','nike'];
$marca_labels = ['adidas'=>'Adidas','fila'=>'Fila','nike'=>'Nike'];

// Filtrar
$zapatos_filtrados = $filtro
  ? array_filter($zapatos, fn($z) => $z['marca'] === $filtro)
  : $zapatos;
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<title>Zapatos — UrbanStyle</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet"/>
<style>
*,*::before,*::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --naranja: #ff6b35;
  --oscuro: #1a1a2e;
  --crema: #f8f6f2;
  --gris: #e8e5e0;
  --texto: #2c2c2c;
  --muted: #888;
  --r: 14px;
  --font: 'Nunito', sans-serif;
  --dis: 'Bebas Neue', cursive;
}

body { font-family: var(--font); background: var(--crema); color: var(--texto); min-height: 100vh; }

/* ── NAV ── */
nav {
  background: var(--oscuro);
  padding: 0 48px; height: 66px;
  display: flex; align-items: center; justify-content: space-between;
  position: sticky; top: 0; z-index: 500;
  box-shadow: 0 2px 20px rgba(0,0,0,.3);
}
.nav-logo { font-family: var(--dis); font-size: 1.9rem; letter-spacing: .08em; color: #fff; text-decoration: none; }
.nav-logo span { color: var(--naranja); }
.nav-links { display: flex; gap: 28px; list-style: none; }
.nav-links a { color: rgba(255,255,255,.6); text-decoration: none; font-size: .83rem; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; transition: color .2s; }
.nav-links a:hover,.nav-links a.activo { color: var(--naranja); }
.nav-back { color: rgba(255,255,255,.5); text-decoration: none; font-size: .82rem; font-weight: 600; display: flex; align-items: center; gap: 6px; transition: color .2s; }
.nav-back:hover { color: var(--naranja); }

/* ── HERO ── */
.page-hero {
  background: linear-gradient(135deg, #2d1b00 0%, #8b3a00 60%, #1a1a2e 100%);
  padding: 52px 48px;
  display: flex; align-items: center; justify-content: space-between; gap: 30px;
  position: relative; overflow: hidden;
}
.page-hero::before {
  content: ''; position: absolute; width: 500px; height: 500px; border-radius: 50%;
  background: radial-gradient(circle, rgba(255,107,53,.15) 0%, transparent 70%);
  top: -150px; right: -50px; pointer-events: none;
}
.page-hero-tag { display: inline-block; background: rgba(255,107,53,.15); border: 1px solid rgba(255,107,53,.3); color: #ff9a6c; font-size: .75rem; font-weight: 800; padding: 5px 14px; border-radius: 20px; letter-spacing: .1em; text-transform: uppercase; margin-bottom: 14px; }
.page-hero-titulo { font-family: var(--dis); font-size: clamp(2.5rem,5vw,4rem); color: #fff; letter-spacing: .05em; line-height: .95; margin-bottom: 12px; }
.page-hero-sub { font-size: .9rem; color: rgba(255,255,255,.5); max-width: 400px; line-height: 1.65; }
.page-hero-emojis { font-size: 5rem; letter-spacing: 10px; opacity: .7; flex-shrink: 0; }

/* Marcas en el hero */
.hero-marcas { display: flex; gap: 14px; margin-top: 24px; flex-wrap: wrap; }
.marca-chip {
  border: 1.5px solid rgba(255,255,255,.15); border-radius: 10px; padding: 8px 18px;
  color: rgba(255,255,255,.7); font-size: .8rem; font-weight: 700;
  text-decoration: none; transition: all .2s; letter-spacing: .04em;
}
.marca-chip:hover { border-color: var(--naranja); color: var(--naranja); }
.marca-chip.activa { background: var(--naranja); border-color: var(--naranja); color: #fff; }

/* ── FILTRO BAR ── */
.filtro-bar {
  background: #fff; border-bottom: 1px solid var(--gris);
  padding: 14px 48px; display: flex; align-items: center; gap: 10px; flex-wrap: wrap;
  position: sticky; top: 66px; z-index: 400;
}
.filtro-label { font-size: .78rem; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: .08em; margin-right: 4px; }
.fbtn { background: var(--crema); border: 1.5px solid var(--gris); color: var(--muted); padding: 6px 18px; border-radius: 25px; font-family: var(--font); font-size: .78rem; font-weight: 700; cursor: pointer; text-decoration: none; transition: all .18s; display: inline-block; }
.fbtn:hover,.fbtn.on { background: var(--oscuro); border-color: var(--oscuro); color: #fff; }
.fbtn.adidas { }.fbtn.adidas.on { background: #000; border-color: #000; }
.fbtn.fila.on { background: #cc0000; border-color: #cc0000; }
.fbtn.nike.on { background: #ff5500; border-color: #ff5500; }
.prod-count { margin-left: auto; font-size: .78rem; color: var(--muted); font-weight: 600; }

/* ── GRID ── */
.shop { padding: 40px 48px 100px; }
.pgrid { display: grid; grid-template-columns: repeat(auto-fill, minmax(270px, 1fr)); gap: 24px; }

/* ── CARD ── */
.pcard {
  background: #fff; border-radius: 18px; overflow: hidden;
  box-shadow: 0 2px 14px rgba(0,0,0,.06);
  transition: transform .25s, box-shadow .25s;
  position: relative; border: 2px solid transparent;
}
.pcard:hover { transform: translateY(-7px); box-shadow: 0 18px 44px rgba(0,0,0,.1); }
.pcard.resaltado { border-color: var(--naranja); box-shadow: 0 0 0 4px rgba(255,107,53,.12), 0 18px 44px rgba(255,107,53,.12); transform: translateY(-7px); }
.pcard.opaco { opacity: .22; filter: grayscale(.6); transform: none !important; }

/* Marca banner */
.marca-banner {
  padding: 6px 14px; font-size: .68rem; font-weight: 800; letter-spacing: .1em;
  text-transform: uppercase; text-align: center;
}
.marca-banner.adidas { background: #000; color: #fff; }
.marca-banner.fila { background: #cc0000; color: #fff; }
.marca-banner.nike { background: #ff5500; color: #fff; }

/* Badges */
.bw { position: absolute; top: 36px; left: 12px; display: flex; gap: 5px; z-index: 2; }
.bdg { font-size: .63rem; font-weight: 800; padding: 3px 10px; border-radius: 6px; letter-spacing: .06em; text-transform: uppercase; }
.bdg.nuevo { background: #1a3bff; color: #fff; }
.bdg.oferta { background: var(--naranja); color: #fff; }

/* Imagen */
.imgw { height: 240px; background: var(--crema); display: flex; align-items: center; justify-content: center; overflow: hidden; }
.pcard-img { width: 100%; height: 100%; object-fit: cover; transition: transform .3s; display: block; }
.pcard:hover .pcard-img { transform: scale(1.06); }
.pcard-emoji { font-size: 7rem; opacity: .4; }

/* Cuerpo */
.cbody { padding: 15px 15px 14px; }
.cmarca-txt { font-size: .68rem; font-weight: 800; color: var(--muted); letter-spacing: .1em; text-transform: uppercase; margin-bottom: 3px; }
.cnombre { font-size: 1rem; font-weight: 800; margin-bottom: 5px; line-height: 1.2; }
.cdesc { font-size: .76rem; color: var(--muted); line-height: 1.45; margin-bottom: 11px; }
.ctallas-label { font-size: .68rem; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: .06em; margin-bottom: 5px; }
.ctallas { display: flex; gap: 4px; flex-wrap: wrap; margin-bottom: 11px; }
.ctalla { font-size: .7rem; border: 1.5px solid var(--gris); padding: 3px 8px; border-radius: 5px; font-weight: 700; }
.ccolores-label { font-size: .68rem; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: .06em; margin-bottom: 5px; }
.ccolores { display: flex; gap: 4px; flex-wrap: wrap; margin-bottom: 13px; }
.ccol { font-size: .67rem; background: var(--crema); border: 1px solid var(--gris); padding: 2px 8px; border-radius: 5px; font-weight: 600; }
.cmeta { display: flex; align-items: baseline; gap: 8px; margin-bottom: 13px; }
.cprecio { font-family: var(--dis); font-size: 1.3rem; color: var(--naranja); letter-spacing: .04em; }
.cprecio-old { font-size: .78rem; color: var(--muted); text-decoration: line-through; }
.btn-agregar { width: 100%; padding: 11px; background: var(--oscuro); color: #fff; border: none; border-radius: 10px; font-family: var(--font); font-size: .85rem; font-weight: 700; cursor: pointer; transition: background .18s, transform .14s; }
.btn-agregar:hover { background: #333; transform: scale(1.02); }

/* Sin resultados */
.sin-res { text-align: center; padding: 80px 20px; color: var(--muted); }
.sin-res h3 { font-family: var(--dis); font-size: 1.5rem; color: var(--oscuro); margin-bottom: 8px; }

/* ── FOOTER ── */
footer { background: var(--oscuro); color: rgba(255,255,255,.35); text-align: center; padding: 26px; font-size: .8rem; }
footer strong { color: var(--naranja); }

/* ── RESPONSIVE ── */
@media (max-width: 768px) {
  nav { padding: 0 16px; }.nav-links { display: none; }
  .page-hero { flex-direction: column; padding: 36px 16px; }
  .filtro-bar { padding: 12px 16px; }
  .shop { padding: 20px 14px 90px; }
}
</style>
</head>
<body>

<nav>
  <a class="nav-logo" href="presentacion2.php">URBAN<span>STYLE</span></a>
  <ul class="nav-links">
    <li><a href="presentacion2.php">Inicio</a></li>
    <li><a href="ropa.php">Ropa</a></li>
    <li><a href="zapato.php" class="activo">Zapatos</a></li>
  </ul>
  <a href="presentacion2.php" class="nav-back">← Volver al inicio</a>
</nav>

<!-- HERO ZAPATOS -->
<div class="page-hero">
  <div>
    <div class="page-hero-tag">
      <?= $filtro ? '👟 '.strtoupper($filtro).' — Filtrado por el asistente IA' : 'Catálogo Calzado' ?>
    </div>
    <h1 class="page-hero-titulo">NUESTROS<br>ZAPATOS</h1>
    <p class="page-hero-sub">Las mejores marcas de calzado deportivo y casual. Adidas, Nike y Fila al mejor precio.</p>
    <div class="hero-marcas">
      <a href="zapato.php" class="marca-chip <?= !$filtro ? 'activa' : '' ?>">Todas las marcas</a>
      <a href="zapato.php?filtro=adidas" class="marca-chip <?= $filtro==='adidas' ? 'activa' : '' ?>">Adidas</a>
      <a href="zapato.php?filtro=nike" class="marca-chip <?= $filtro==='nike' ? 'activa' : '' ?>">Nike</a>
      <a href="zapato.php?filtro=fila" class="marca-chip <?= $filtro==='fila' ? 'activa' : '' ?>">Fila</a>
    </div>
  </div>
  <div class="page-hero-emojis">👟👟</div>
</div>

<!-- BARRA FILTROS -->
<div class="filtro-bar">
  <span class="filtro-label">Marca:</span>
  <a href="zapato.php" class="fbtn <?= !$filtro ? 'on' : '' ?>">Todos</a>
  <a href="zapato.php?filtro=adidas" class="fbtn adidas <?= $filtro==='adidas' ? 'on' : '' ?>">Adidas</a>
  <a href="zapato.php?filtro=nike" class="fbtn nike <?= $filtro==='nike' ? 'on' : '' ?>">Nike</a>
  <a href="zapato.php?filtro=fila" class="fbtn fila <?= $filtro==='fila' ? 'on' : '' ?>">Fila</a>
  <span class="prod-count">
    <?php
    $n = count($zapatos_filtrados);
    echo $n.' referencia'.($n!==1?'s':'').($filtro ? ' de '.ucfirst($filtro) : '');
    ?>
  </span>
</div>

<!-- GRID -->
<section class="shop">
  <?php if (empty($zapatos_filtrados)): ?>
  <div class="sin-res">
    <h3>Sin resultados 🔍</h3>
    <p>No encontramos zapatos de "<?= htmlspecialchars($filtro) ?>". <a href="zapato.php">Ver todos</a></p>
  </div>
  <?php else: ?>
  <div class="pgrid">
    <?php foreach ($zapatos as $z):
      $resaltado = $filtro && $z['marca'] === $filtro;
      $opaco     = $filtro && $z['marca'] !== $filtro;
      $clase     = $resaltado ? 'resaltado' : ($opaco ? 'opaco' : '');
    ?>
    <div class="pcard <?= $clase ?>" id="zap-<?= $z['id'] ?>">
      <!-- Banner marca -->
      <div class="marca-banner <?= $z['marca'] ?>"><?= strtoupper($z['marca']) ?></div>
      <!-- Badges -->
      <div class="bw">
        <?php if ($z['nuevo']): ?><span class="bdg nuevo">Nuevo</span><?php endif ?>
        <?php if ($z['oferta']): ?><span class="bdg oferta">Oferta</span><?php endif ?>
      </div>
      <!-- Imagen -->
      <div class="imgw">
        <img class="pcard-img" src="<?= $z['img'] ?>" alt="<?= $z['nombre'] ?>"
          onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
        <div class="pcard-emoji" style="display:none"><?= $z['emoji'] ?></div>
      </div>
      <!-- Info -->
      <div class="cbody">
        <div class="cmarca-txt"><?= strtoupper($z['marca']) ?></div>
        <div class="cnombre"><?= $z['nombre'] ?></div>
        <div class="cdesc"><?= $z['desc'] ?></div>
        <!-- Tallas -->
        <div class="ctallas-label">Tallas disponibles</div>
        <div class="ctallas">
          <?php foreach ($z['tallas'] as $t): ?><span class="ctalla"><?= $t ?></span><?php endforeach ?>
        </div>
        <!-- Colores -->
        <div class="ccolores-label">Colores</div>
        <div class="ccolores">
          <?php foreach ($z['colores'] as $c): ?><span class="ccol"><?= $c ?></span><?php endforeach ?>
        </div>
        <!-- Precio -->
        <div class="cmeta">
          <span class="cprecio"><?= $z['precio'] ?></span>
          <?php if (isset($z['precio_antes'])): ?><span class="cprecio-old"><?= $z['precio_antes'] ?></span><?php endif ?>
        </div>
        <button class="btn-agregar">+ Agregar al carrito</button>
      </div>
    </div>
    <?php endforeach ?>
  </div>
  <?php endif ?>
</section>

<footer>
  <p>© 2025 <strong>UrbanStyle</strong> — Hecho con ❤️ en Colombia</p>
</footer>

</body>
</html>