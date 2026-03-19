<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include_once 'chat_bot.php';
 
// Filtro activo (viene de la URL o del bot)
$filtro = isset($_GET['filtro']) ? strtolower($_GET['filtro']) : '';
 
// Productos de ropa
$productos = [
  [
    'id'       => 'buso',
    'nombre'   => 'Buso Clásico',
    'precio'   => '$52.000',
    'img'      => 'imagenes/busolargohombre.jpg',
    'emoji'    => '👕',
    'colores'  => ['Negro','Gris','Azul'],
    'tallas'   => ['S','M','L','XL'],
    'desc'     => 'Buso de algodón 100%, corte oversize. Perfecto para el día a día.',
    'tags'     => ['buso','buzo','oversize'],
    'nuevo'    => true,
    'oferta'   => false,
  ],
  [
    'id'       => 'pantaloneta',
    'nombre'   => 'Pantaloneta Urbana',
    'precio'   => '$35.000',
    'img'      => 'pantaloneta.jpg',
    'emoji'    => '🩳',
    'colores'  => ['Negro','Azul','Blanco'],
    'tallas'   => ['S','M','L','XL'],
    'desc'     => 'Pantaloneta deportiva con bolsillos laterales. Fresca y cómoda.',
    'tags'     => ['pantaloneta','short'],
    'nuevo'    => false,
    'oferta'   => true,
    'precio_antes' => '$45.000',
  ],
  [
    'id'       => 'camiseta',
    'nombre'   => 'Camiseta Premium',
    'precio'   => '$28.000',
    'img'      => 'camiseta.jpg',
    'emoji'    => '👚',
    'colores'  => ['Blanco','Negro','Rojo','Verde'],
    'tallas'   => ['XS','S','M','L','XL','XXL'],
    'desc'     => 'Camiseta básica de algodón peinado 180g. Ideal para cualquier look.',
    'tags'     => ['camiseta','camisa','remera'],
    'nuevo'    => false,
    'oferta'   => false,
  ],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<title>Ropa — UrbanStyle</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet"/>
<style>
*,*::before,*::after { box-sizing: border-box; margin: 0; padding: 0; }
 
:root {
  --naranja: #ff6b35;
  --oscuro: #1a1a2e;
  --oscuro2: #16213e;
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
  padding: 0 48px;
  height: 66px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: sticky; top: 0; z-index: 500;
  box-shadow: 0 2px 20px rgba(0,0,0,.3);
}
.nav-logo { font-family: var(--dis); font-size: 1.9rem; letter-spacing: .08em; color: #fff; text-decoration: none; }
.nav-logo span { color: var(--naranja); }
.nav-links { display: flex; gap: 28px; list-style: none; }
.nav-links a { color: rgba(255,255,255,.6); text-decoration: none; font-size: .83rem; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; transition: color .2s; }
.nav-links a:hover, .nav-links a.activo { color: var(--naranja); }
.nav-back { color: rgba(255,255,255,.5); text-decoration: none; font-size: .82rem; font-weight: 600; display: flex; align-items: center; gap: 6px; transition: color .2s; }
.nav-back:hover { color: var(--naranja); }
 
/* ── HERO ROPA ── */
.page-hero {
  background: linear-gradient(135deg, var(--oscuro) 60%, #0f3460);
  padding: 52px 48px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 30px;
}
.page-hero-txt {}
.page-hero-tag { display: inline-block; background: rgba(255,107,53,.15); border: 1px solid rgba(255,107,53,.3); color: var(--naranja); font-size: .75rem; font-weight: 800; padding: 5px 14px; border-radius: 20px; letter-spacing: .1em; text-transform: uppercase; margin-bottom: 14px; }
.page-hero-titulo { font-family: var(--dis); font-size: clamp(2.5rem,5vw,4rem); color: #fff; letter-spacing: .05em; line-height: .95; margin-bottom: 12px; }
.page-hero-sub { font-size: .9rem; color: rgba(255,255,255,.5); max-width: 400px; line-height: 1.65; }
.page-hero-emojis { font-size: 5rem; letter-spacing: 10px; opacity: .7; }
 
/* ── BARRA FILTROS ── */
.filtro-bar {
  background: #fff;
  border-bottom: 1px solid var(--gris);
  padding: 14px 48px;
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
  position: sticky; top: 66px; z-index: 400;
}
.filtro-bar-label { font-size: .78rem; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: .08em; margin-right: 4px; }
.fbtn { background: var(--crema); border: 1.5px solid var(--gris); color: var(--muted); padding: 6px 18px; border-radius: 25px; font-family: var(--font); font-size: .78rem; font-weight: 700; cursor: pointer; text-decoration: none; transition: all .18s; display: inline-block; }
.fbtn:hover, .fbtn.on { background: var(--oscuro); border-color: var(--oscuro); color: #fff; }
.fbtn.naranja { background: var(--naranja); border-color: var(--naranja); color: #fff; }
.prod-count { margin-left: auto; font-size: .78rem; color: var(--muted); font-weight: 600; }
 
/* ── GRID PRODUCTOS ── */
.shop { padding: 40px 48px 100px; }
.pgrid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 24px; }
 
/* ── CARD PRODUCTO ── */
.pcard {
  background: #fff;
  border-radius: 18px;
  overflow: hidden;
  box-shadow: 0 2px 14px rgba(0,0,0,.06);
  transition: transform .25s, box-shadow .25s;
  position: relative;
  border: 2px solid transparent;
}
.pcard:hover { transform: translateY(-7px); box-shadow: 0 18px 44px rgba(0,0,0,.1); }
 
<?php if ($filtro): ?>
/* Filtro activo desde el bot */
.pcard.resaltado { border-color: var(--naranja); box-shadow: 0 0 0 4px rgba(255,107,53,.12), 0 18px 44px rgba(255,107,53,.1); transform: translateY(-7px); }
.pcard.opaco { opacity: .25; filter: grayscale(.5); transform: none !important; }
<?php endif ?>
 
/* Badges */
.bw { position: absolute; top: 12px; left: 12px; display: flex; gap: 5px; z-index: 2; }
.bdg { font-size: .63rem; font-weight: 800; padding: 3px 10px; border-radius: 6px; letter-spacing: .06em; text-transform: uppercase; }
.bdg.nuevo { background: #1a3bff; color: #fff; }
.bdg.oferta { background: var(--naranja); color: #fff; }
 
/* Imagen */
.imgw { height: 250px; background: var(--crema); display: flex; align-items: center; justify-content: center; overflow: hidden; }
.pcard-img { width: 100%; height: 100%; object-fit: cover; transition: transform .3s; display: block; }
.pcard:hover .pcard-img { transform: scale(1.06); }
.pcard-emoji { font-size: 7rem; opacity: .5; }
 
/* Cuerpo */
.cbody { padding: 16px; }
.cnombre { font-size: 1.05rem; font-weight: 800; margin-bottom: 5px; }
.cdesc { font-size: .78rem; color: var(--muted); line-height: 1.45; margin-bottom: 12px; }
 
/* Colores */
.ccolores-label { font-size: .7rem; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: .06em; margin-bottom: 5px; }
.ccolores { display: flex; gap: 5px; flex-wrap: wrap; margin-bottom: 12px; }
.ccol { font-size: .68rem; background: var(--crema); border: 1px solid var(--gris); padding: 2px 8px; border-radius: 5px; color: var(--texto); font-weight: 600; }
 
/* Tallas */
.ctallas-label { font-size: .7rem; font-weight: 800; color: var(--muted); text-transform: uppercase; letter-spacing: .06em; margin-bottom: 5px; }
.ctallas { display: flex; gap: 5px; flex-wrap: wrap; margin-bottom: 14px; }
.ctalla { font-size: .72rem; border: 1.5px solid var(--gris); padding: 3px 9px; border-radius: 6px; font-weight: 700; color: var(--texto); }
 
/* Precio */
.cmeta { display: flex; align-items: center; justify-content: space-between; margin-bottom: 13px; }
.cprecio { font-family: var(--dis); font-size: 1.3rem; color: var(--naranja); letter-spacing: .04em; }
.cprecio-old { font-size: .78rem; color: var(--muted); text-decoration: line-through; margin-left: 6px; }
 
/* Botón agregar */
.btn-agregar { width: 100%; padding: 11px; background: var(--oscuro); color: #fff; border: none; border-radius: 10px; font-family: var(--font); font-size: .85rem; font-weight: 700; cursor: pointer; letter-spacing: .02em; transition: background .18s, transform .14s; }
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
    <li><a href="ropa.php" class="activo">Ropa</a></li>
    <li><a href="zapato.php">Zapatos</a></li>
  </ul>
  <a href="presentacion2.php" class="nav-back">← Volver al inicio</a>
</nav>
 
<!-- HERO -->
<div class="page-hero">
  <div class="page-hero-txt">
    <div class="page-hero-tag">Colección Ropa</div>
    <h1 class="page-hero-titulo">NUESTRA<br>ROPA</h1>
    <p class="page-hero-sub">Busos, camisetas y pantalonetas de la mejor calidad. Estilo urbano para todos los días.</p>
  </div>
  <div class="page-hero-emojis">👕🩳👚</div>
</div>
 
<!-- FILTROS -->
<div class="filtro-bar">
  <span class="filtro-bar-label">Filtrar:</span>
  <a href="ropa.php" class="fbtn <?= !$filtro ? 'on' : '' ?>">Todos</a>
  <a href="ropa.php?filtro=buso" class="fbtn <?= $filtro==='buso' ? 'naranja' : '' ?>">👕 Busos</a>
  <a href="ropa.php?filtro=camiseta" class="fbtn <?= $filtro==='camiseta' ? 'naranja' : '' ?>">👚 Camisetas</a>
  <a href="ropa.php?filtro=pantaloneta" class="fbtn <?= $filtro==='pantaloneta' ? 'naranja' : '' ?>">🩳 Pantalonetas</a>
  <span class="prod-count">
    <?php
    if ($filtro) {
      $visible = count(array_filter($productos, fn($p) => in_array($filtro, $p['tags'])));
      echo $visible.' producto'.($visible!==1?'s':'').' encontrado'.($visible!==1?'s':'');
    } else {
      echo count($productos).' productos';
    }
    ?>
  </span>
</div>
 
<!-- GRID -->
<section class="shop">
  <?php
  $con_filtro = array_filter($productos, fn($p) => !$filtro || in_array($filtro, $p['tags']));
  if (empty($con_filtro) && $filtro):
  ?>
  <div class="sin-res">
    <h3>Sin resultados 🔍</h3>
    <p>No encontramos "<?= htmlspecialchars($filtro) ?>" en ropa. <a href="ropa.php">Ver todo</a></p>
  </div>
  <?php else: ?>
  <div class="pgrid">
    <?php foreach ($productos as $p):
      $mostrar   = !$filtro || in_array($filtro, $p['tags']);
      $clase_extra = '';
      if ($filtro) $clase_extra = $mostrar ? 'resaltado' : 'opaco';
    ?>
    <div class="pcard <?= $clase_extra ?>" id="prod-<?= $p['id'] ?>">
      <!-- Badges -->
      <div class="bw">
        <?php if ($p['nuevo']): ?><span class="bdg nuevo">Nuevo</span><?php endif ?>
        <?php if ($p['oferta']): ?><span class="bdg oferta">Oferta</span><?php endif ?>
      </div>
      <!-- Imagen -->
      <div class="imgw">
        <img class="pcard-img" src="<?= $p['img'] ?>" alt="<?= $p['nombre'] ?>"
          onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
        <div class="pcard-emoji" style="display:none"><?= $p['emoji'] ?></div>
      </div>
      <!-- Info -->
      <div class="cbody">
        <div class="cnombre"><?= $p['nombre'] ?></div>
        <div class="cdesc"><?= $p['desc'] ?></div>
        <!-- Colores -->
        <div class="ccolores-label">Colores disponibles</div>
        <div class="ccolores">
          <?php foreach ($p['colores'] as $c): ?>
          <span class="ccol"><?= $c ?></span>
          <?php endforeach ?>
        </div>
        <!-- Tallas -->
        <div class="ctallas-label">Tallas</div>
        <div class="ctallas">
          <?php foreach ($p['tallas'] as $t): ?>
          <span class="ctalla"><?= $t ?></span>
          <?php endforeach ?>
        </div>
        <!-- Precio -->
        <div class="cmeta">
          <div>
            <span class="cprecio"><?= $p['precio'] ?></span>
            <?php if (isset($p['precio_antes'])): ?>
            <span class="cprecio-old"><?= $p['precio_antes'] ?></span>
            <?php endif ?>
          </div>
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
 