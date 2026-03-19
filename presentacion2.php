<?php
// Iniciar sesión antes de cualquier output
if (session_status() === PHP_SESSION_NONE) session_start();

// Procesar chat antes del HTML
include_once 'chat_bot.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<title>UrbanStyle — Tienda de Ropa y Zapatos</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet"/>
<style>
*,*::before,*::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --naranja: #ff6b35;
  --naranja2: #f7931e;
  --oscuro: #1a1a2e;
  --oscuro2: #16213e;
  --crema: #f8f6f2;
  --gris: #e8e5e0;
  --texto: #2c2c2c;
  --muted: #888;
  --r: 16px;
  --font: 'Nunito', sans-serif;
  --dis: 'Bebas Neue', cursive;
}

html { scroll-behavior: smooth; }
body {
  font-family: var(--font);
  background: var(--crema);
  color: var(--texto);
  min-height: 100vh;
}

/* ── NAV ── */
nav {
  background: var(--oscuro);
  padding: 0 48px;
  height: 68px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: sticky;
  top: 0;
  z-index: 500;
  box-shadow: 0 2px 20px rgba(0,0,0,.3);
}

.nav-logo {
  font-family: var(--dis);
  font-size: 2rem;
  letter-spacing: .08em;
  color: #fff;
}

.nav-logo span { color: var(--naranja); }

.nav-links {
  display: flex;
  gap: 32px;
  list-style: none;
}

.nav-links a {
  color: rgba(255,255,255,.65);
  text-decoration: none;
  font-size: .85rem;
  font-weight: 700;
  letter-spacing: .06em;
  text-transform: uppercase;
  transition: color .2s;
}

.nav-links a:hover { color: var(--naranja); }

.nav-cta {
  background: var(--naranja);
  color: #fff;
  border: none;
  padding: 10px 22px;
  border-radius: 30px;
  font-family: var(--font);
  font-size: .82rem;
  font-weight: 700;
  cursor: pointer;
  letter-spacing: .04em;
  transition: background .2s, transform .15s;
  text-decoration: none;
  display: inline-block;
}

.nav-cta:hover { background: #e55a25; transform: scale(1.04); }

/* ── HERO ── */
.hero {
  background: var(--oscuro);
  min-height: 88vh;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 60px 48px;
  gap: 40px;
  position: relative;
  overflow: hidden;
}

/* Fondo decorativo */
.hero::before {
  content: '';
  position: absolute;
  width: 600px; height: 600px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(255,107,53,.18) 0%, transparent 70%);
  top: -150px; right: -100px;
  pointer-events: none;
}

.hero::after {
  content: '';
  position: absolute;
  width: 400px; height: 400px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(247,147,30,.1) 0%, transparent 70%);
  bottom: -100px; left: 200px;
  pointer-events: none;
}

.hero-content {
  flex: 1;
  z-index: 1;
}

.hero-tag {
  display: inline-block;
  background: rgba(255,107,53,.15);
  border: 1px solid rgba(255,107,53,.3);
  color: var(--naranja);
  font-size: .78rem;
  font-weight: 700;
  padding: 6px 16px;
  border-radius: 30px;
  letter-spacing: .1em;
  text-transform: uppercase;
  margin-bottom: 22px;
}

.hero-titulo {
  font-family: var(--dis);
  font-size: clamp(3.5rem, 8vw, 7rem);
  line-height: .9;
  color: #fff;
  margin-bottom: 20px;
}

.hero-titulo em {
  color: var(--naranja);
  font-style: normal;
}

.hero-subtitulo {
  font-size: 1.05rem;
  color: rgba(255,255,255,.55);
  max-width: 440px;
  line-height: 1.7;
  margin-bottom: 36px;
}

.hero-btns {
  display: flex;
  gap: 14px;
  flex-wrap: wrap;
}

.btn-primario {
  background: var(--naranja);
  color: #fff;
  border: none;
  padding: 14px 34px;
  border-radius: 30px;
  font-family: var(--font);
  font-size: .95rem;
  font-weight: 700;
  cursor: pointer;
  text-decoration: none;
  letter-spacing: .03em;
  transition: background .2s, transform .15s;
  display: inline-block;
}

.btn-primario:hover { background: #e55a25; transform: scale(1.04); }

.btn-secundario {
  background: transparent;
  color: rgba(255,255,255,.7);
  border: 1.5px solid rgba(255,255,255,.2);
  padding: 14px 34px;
  border-radius: 30px;
  font-family: var(--font);
  font-size: .95rem;
  font-weight: 700;
  cursor: pointer;
  text-decoration: none;
  transition: all .2s;
  display: inline-block;
}

.btn-secundario:hover {
  border-color: var(--naranja);
  color: var(--naranja);
}

/* Stats del hero */
.hero-stats {
  display: flex;
  gap: 40px;
  margin-top: 48px;
  padding-top: 32px;
  border-top: 1px solid rgba(255,255,255,.08);
}

.stat-item {}

.stat-numero {
  font-family: var(--dis);
  font-size: 2rem;
  color: var(--naranja);
  line-height: 1;
}

.stat-label {
  font-size: .75rem;
  color: rgba(255,255,255,.4);
  font-weight: 600;
  letter-spacing: .06em;
  text-transform: uppercase;
  margin-top: 4px;
}

/* Imágenes del hero */
.hero-visual {
  flex-shrink: 0;
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 1fr 1fr;
  gap: 12px;
  width: 360px;
  z-index: 1;
}

.hero-img-card {
  border-radius: 14px;
  overflow: hidden;
  background: rgba(255,255,255,.05);
  border: 1px solid rgba(255,255,255,.08);
  aspect-ratio: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 3.5rem;
}

.hero-img-card.grande {
  grid-row: 1 / 3;
  aspect-ratio: auto;
  font-size: 5rem;
  background: rgba(255,107,53,.08);
  border-color: rgba(255,107,53,.2);
}

.hero-img-card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* ── CATEGORÍAS ── */
.categorias {
  padding: 80px 48px;
}

.section-tag {
  font-size: .75rem;
  font-weight: 800;
  letter-spacing: .12em;
  text-transform: uppercase;
  color: var(--naranja);
  margin-bottom: 10px;
}

.section-titulo {
  font-family: var(--dis);
  font-size: clamp(2rem, 4vw, 3rem);
  letter-spacing: .04em;
  margin-bottom: 8px;
  color: var(--oscuro);
}

.section-sub {
  font-size: .9rem;
  color: var(--muted);
  margin-bottom: 48px;
  max-width: 500px;
  line-height: 1.6;
}

.cat-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 24px;
  max-width: 900px;
}

.cat-card {
  border-radius: 20px;
  overflow: hidden;
  position: relative;
  text-decoration: none;
  display: block;
  transition: transform .3s, box-shadow .3s;
  box-shadow: 0 4px 20px rgba(0,0,0,.08);
}

.cat-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 20px 50px rgba(0,0,0,.14);
}

.cat-card-inner {
  padding: 44px 32px;
  min-height: 260px;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  position: relative;
  overflow: hidden;
}

.cat-card.ropa .cat-card-inner {
  background: linear-gradient(145deg, #1a1a2e, #0f3460);
}

.cat-card.zapatos .cat-card-inner {
  background: linear-gradient(145deg, #2d1b00, #8b3a00);
}

/* Emoji decorativo en fondo */
.cat-bg-emoji {
  position: absolute;
  top: 50%;
  right: 20px;
  transform: translateY(-50%);
  font-size: 8rem;
  opacity: .12;
  pointer-events: none;
  line-height: 1;
}

.cat-badge {
  display: inline-block;
  background: rgba(255,107,53,.2);
  border: 1px solid rgba(255,107,53,.35);
  color: #ff9a6c;
  font-size: .68rem;
  font-weight: 800;
  padding: 4px 12px;
  border-radius: 20px;
  letter-spacing: .08em;
  text-transform: uppercase;
  margin-bottom: 12px;
  width: fit-content;
}

.cat-nombre {
  font-family: var(--dis);
  font-size: 2.6rem;
  color: #fff;
  letter-spacing: .05em;
  line-height: 1;
  margin-bottom: 8px;
}

.cat-desc {
  font-size: .82rem;
  color: rgba(255,255,255,.55);
  line-height: 1.5;
  margin-bottom: 20px;
  max-width: 260px;
}

.cat-link {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: var(--naranja);
  color: #fff;
  padding: 10px 22px;
  border-radius: 25px;
  font-size: .82rem;
  font-weight: 700;
  width: fit-content;
  transition: background .2s;
}

.cat-card:hover .cat-link { background: #e55a25; }

/* ── FEATURES ── */
.features {
  background: var(--oscuro);
  padding: 64px 48px;
}

.features-titulo {
  font-family: var(--dis);
  font-size: 2rem;
  color: #fff;
  letter-spacing: .05em;
  text-align: center;
  margin-bottom: 40px;
}

.features-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
}

.feature-item {
  background: rgba(255,255,255,.04);
  border: 1px solid rgba(255,255,255,.07);
  border-radius: 14px;
  padding: 26px 20px;
  text-align: center;
  transition: background .2s;
}

.feature-item:hover { background: rgba(255,107,53,.07); }

.feature-ico { font-size: 2rem; margin-bottom: 12px; display: block; }
.feature-nombre { font-weight: 700; color: #fff; font-size: .9rem; margin-bottom: 6px; }
.feature-desc { font-size: .75rem; color: rgba(255,255,255,.4); line-height: 1.5; }

/* ── FOOTER ── */
footer {
  background: #0d0d1a;
  color: rgba(255,255,255,.35);
  text-align: center;
  padding: 28px;
  font-size: .8rem;
}

footer strong { color: var(--naranja); }

/* ── RESPONSIVE ── */
@media (max-width: 768px) {
  nav { padding: 0 18px; }
  .nav-links { display: none; }
  .hero { flex-direction: column; padding: 40px 18px; min-height: auto; }
  .hero-visual { width: 100%; grid-template-columns: repeat(3,1fr); grid-template-rows: 1fr; }
  .hero-img-card.grande { grid-row: auto; }
  .categorias { padding: 48px 18px; }
  .cat-grid { grid-template-columns: 1fr; }
  .features { padding: 48px 18px; }
  .features-grid { grid-template-columns: 1fr 1fr; }
}
</style>
</head>
<body>

<!-- NAV -->
<nav>
  <div class="nav-logo">URBAN<span>STYLE</span></div>
  <ul class="nav-links">
    <li><a href="presentacion2.php">Inicio</a></li>
    <li><a href="ropa.php">Ropa</a></li>
    <li><a href="zapato.php">Zapatos</a></li>
  </ul>
  <a href="ropa.php" class="nav-cta">Ver Catálogo →</a>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="hero-content">
    <div class="hero-tag">✦ Nueva Colección 2025</div>
    <h1 class="hero-titulo">
      TU ESTILO,<br>TU <em>ESENCIA</em>
    </h1>
    <p class="hero-subtitulo">
      Ropa y calzado de moda para hombres y mujeres. Busos, camisetas, pantalonetas, Adidas, Nike, Fila y mucho más.
    </p>
    <div class="hero-btns">
      <a href="ropa.php" class="btn-primario">👕 Ver Ropa</a>
      <a href="zapato.php" class="btn-secundario">👟 Ver Zapatos</a>
    </div>
    <div class="hero-stats">
      <div class="stat-item">
        <div class="stat-numero">200+</div>
        <div class="stat-label">Productos</div>
      </div>
      <div class="stat-item">
        <div class="stat-numero">3</div>
        <div class="stat-label">Marcas de calzado</div>
      </div>
      <div class="stat-item">
        <div class="stat-numero">5★</div>
        <div class="stat-label">Calificación</div>
      </div>
    </div>
  </div>

  <div class="hero-visual">
    <div class="hero-img-card grande">👟</div>
    <div class="hero-img-card">👕</div>
    <div class="hero-img-card">🩳</div>
  </div>
</section>

<!-- CATEGORÍAS -->
<section class="categorias">
  <div class="section-tag">Nuestras categorías</div>
  <h2 class="section-titulo">¿QUÉ BUSCAS HOY?</h2>
  <p class="section-sub">Explora nuestro catálogo completo. Usa el asistente virtual 💬 para encontrar exactamente lo que necesitas.</p>

  <div class="cat-grid">

    <!-- ROPA -->
    <a href="ropa.php" class="cat-card ropa">
      <div class="cat-card-inner">
        <span class="cat-bg-emoji">👕</span>
        <div class="cat-badge">3 productos</div>
        <div class="cat-nombre">ROPA</div>
        <p class="cat-desc">Busos, camisetas y pantalonetas de la mejor calidad. Estilo urbano para el día a día.</p>
        <span class="cat-link">Explorar ropa →</span>
      </div>
    </a>

    <!-- ZAPATOS -->
    <a href="zapato.php" class="cat-card zapatos">
      <div class="cat-card-inner">
        <span class="cat-bg-emoji">👟</span>
        <div class="cat-badge">3 referencias</div>
        <div class="cat-nombre">ZAPATOS</div>
        <p class="cat-desc">Adidas, Nike y Fila. Las mejores marcas de calzado deportivo y casual para tu look.</p>
        <span class="cat-link">Explorar zapatos →</span>
      </div>
    </a>

  </div>
</section>

<!-- FEATURES -->
<section class="features">
  <div class="features-titulo">¿POR QUÉ ELEGIRNOS?</div>
  <div class="features-grid">
    <div class="feature-item">
      <span class="feature-ico">🚚</span>
      <div class="feature-nombre">Envío rápido</div>
      <div class="feature-desc">A todo el país en 2-5 días hábiles. Gratis en compras +$150K</div>
    </div>
    <div class="feature-item">
      <span class="feature-ico">💳</span>
      <div class="feature-nombre">Pagos seguros</div>
      <div class="feature-desc">Nequi, Daviplata, tarjetas, efectivo y PSE</div>
    </div>
    <div class="feature-item">
      <span class="feature-ico">🔄</span>
      <div class="feature-nombre">30 días cambio</div>
      <div class="feature-desc">Cambios y devoluciones sin complicaciones</div>
    </div>
    <div class="feature-item">
      <span class="feature-ico">⭐</span>
      <div class="feature-nombre">Calidad garantizada</div>
      <div class="feature-desc">Productos originales y certificados de marcas reconocidas</div>
    </div>
  </div>
</section>

<footer>
  <p>© 2025 <strong>UrbanStyle</strong> — Todos los derechos reservados. Hecho con ❤️ en Colombia</p>
</footer>

<!-- CHATBOT FLOTANTE -->
<?php // El chat_bot.php ya fue incluido arriba y generó su HTML ?>

</body>
</html>