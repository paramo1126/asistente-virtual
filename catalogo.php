<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>STREETFLOW — Catálogo Completo</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Space+Grotesk:wght@300;400;500;700&family=Syne:wght@400;700;800&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root {
  --black:      #080C08;
  --black2:     #0F140F;
  --black3:     #161C16;
  --card:       #111711;
  --green:      #14f7ff;
  --green-dark: #0A4A05;
  --white:      #E8F5E4;
  --muted:      #5A7055;
  --border:     #1E2E1E;
  --border2:    #2A3D2A;
}
html { scroll-behavior: smooth; }
body { font-family: 'Space Grotesk', sans-serif; background: var(--black); color: var(--white); overflow-x: hidden; }
::-webkit-scrollbar { width: 4px; }
::-webkit-scrollbar-track { background: var(--black2); }
::-webkit-scrollbar-thumb { background: var(--green-dark); border-radius: 2px; }

/* NAV */
nav { background: rgba(8,12,8,0.96); backdrop-filter: blur(12px); padding: 0 2.5rem; display: flex; align-items: center; justify-content: space-between; height: 62px; position: sticky; top: 0; z-index: 100; border-bottom: 1px solid var(--border); }
.logo { font-family: 'Bebas Neue', sans-serif; font-size: 2rem; letter-spacing: 0.12em; color: var(--green); text-shadow: 0 0 18px rgba(57,255,20,0.55); text-decoration: none; }
.logo span { color: var(--white); }
nav ul { list-style: none; display: flex; gap: 2rem; }
nav ul a { color: var(--muted); text-decoration: none; font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; font-weight: 500; transition: color 0.2s; }
nav ul a:hover, nav ul a.active { color: var(--green); }

/* TICKER */
.ticker { background: var(--green); overflow: hidden; white-space: nowrap; padding: 8px 0; }
.ticker-inner { display: inline-block; animation: ticker 22s linear infinite; font-family: 'Bebas Neue', sans-serif; font-size: 0.95rem; letter-spacing: 0.22em; color: var(--black); }
@keyframes ticker { 0% { transform: translateX(100vw); } 100% { transform: translateX(-100%); } }

/* HERO CATÁLOGO */
.cat-hero { min-height: 220px; background: var(--black2); display: flex; flex-direction: column; justify-content: flex-end; position: relative; overflow: hidden; border-bottom: 1px solid var(--border); padding: 2.5rem 4rem; }
.cat-hero::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse 60% 80% at 90% 50%, rgba(57,255,20,0.07) 0%, transparent 65%); pointer-events: none; }
.cat-hero::after { content: 'CATÁLOGO'; font-family: 'Bebas Neue', sans-serif; font-size: 14rem; color: rgba(57,255,20,0.025); position: absolute; top: 50%; right: -2rem; transform: translateY(-50%); white-space: nowrap; pointer-events: none; user-select: none; }
.breadcrumb { font-size: 0.68rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted); margin-bottom: 0.8rem; position: relative; z-index: 1; }
.breadcrumb a { color: var(--green); text-decoration: none; }
.cat-hero h1 { font-family: 'Bebas Neue', sans-serif; font-size: 4rem; line-height: 0.92; letter-spacing: 0.05em; color: var(--white); position: relative; z-index: 1; }
.cat-hero h1 span { color: var(--green); text-shadow: 0 0 24px rgba(57,255,20,0.5); }
.cat-hero p { color: var(--muted); font-size: 0.85rem; margin-top: 0.8rem; line-height: 1.6; font-weight: 300; position: relative; z-index: 1; }
.hero-hint { display: inline-flex; align-items: center; gap: 8px; margin-top: 1rem; background: rgba(57,255,20,0.06); border: 1px solid var(--green-dark); padding: 8px 16px; font-size: 0.72rem; color: var(--green); letter-spacing: 0.1em; position: relative; z-index: 1; }
.hero-hint::before { content: '🤖'; font-size: 1rem; }

/* FILTROS RÁPIDOS */
.quick-filters { display: flex; align-items: center; gap: 0.7rem; padding: 1rem 2.5rem; background: var(--black2); border-bottom: 1px solid var(--border); overflow-x: auto; flex-wrap: nowrap; }
.qf-label { font-size: 0.62rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted); font-family: 'Syne', sans-serif; font-weight: 700; white-space: nowrap; margin-right: 4px; }
.qf-btn { background: var(--card); border: 1px solid var(--border2); color: var(--muted); font-size: 0.68rem; letter-spacing: 0.12em; text-transform: uppercase; padding: 6px 14px; cursor: pointer; transition: all 0.2s; font-family: 'Syne', sans-serif; white-space: nowrap; clip-path: polygon(0 0, calc(100% - 6px) 0, 100% 6px, 100% 100%, 0 100%); }
.qf-btn:hover, .qf-btn.active { background: var(--green-dark); border-color: var(--green); color: var(--green); }
.qf-sep { width: 1px; height: 18px; background: var(--border); flex-shrink: 0; }

/* ESTADO DE BÚSQUEDA */
#search-status { display: none; padding: 0.8rem 2.5rem; background: rgba(57,255,20,0.04); border-bottom: 1px solid var(--green-dark); align-items: center; justify-content: space-between; }
#search-status.visible { display: flex; }
#search-status .status-text { font-size: 0.75rem; color: var(--green); letter-spacing: 0.1em; display: flex; align-items: center; gap: 8px; }
#search-status .status-text::before { content: '🔍'; }
#clear-btn { background: none; border: 1px solid var(--muted); color: var(--muted); font-size: 0.65rem; letter-spacing: 0.1em; text-transform: uppercase; padding: 5px 12px; cursor: pointer; font-family: 'Syne', sans-serif; transition: all 0.2s; }
#clear-btn:hover { border-color: var(--green); color: var(--green); }

/* CONTENEDOR PRINCIPAL */
.catalog-wrap { max-width: 1200px; margin: 0 auto; padding: 0 2.5rem 5rem; }

/* ENCABEZADO DE SECCIÓN */
.sec-title { font-family: 'Bebas Neue', sans-serif; font-size: 1.8rem; color: var(--white); letter-spacing: 0.08em; padding: 2.5rem 0 1rem; border-bottom: 1px solid var(--border); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 1rem; }
.sec-title span { color: var(--green); }
.sec-title .sec-count { font-size: 0.75rem; color: var(--muted); font-family: 'Syne', sans-serif; font-weight: 400; letter-spacing: 0.12em; text-transform: uppercase; margin-left: auto; }

/* GRILLA PRODUCTOS */
.products-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1px; background: var(--border); margin-bottom: 0.5rem; }

/* CARD DE PRODUCTO */
.product-card {
  background: var(--card);
  cursor: pointer;
  transition: background 0.2s, opacity 0.3s, transform 0.3s;
  position: relative;
}
.product-card:hover { background: var(--black3); }
/* Estado oculto cuando el chat filtra */
.product-card.hidden {
  display: none;
}
/* Estado destacado cuando el chat encuentra ese producto */
.product-card.highlighted {
  outline: 2px solid var(--green);
  outline-offset: -2px;
}

.product-img { height: 240px; display: flex; align-items: center; justify-content: center; background: var(--black3); position: relative; overflow: hidden; border-bottom: 1px solid var(--border); }
/* ========================================================
   IMÁGENES: Para agregar imagen a un producto ve a la
   línea del producto correspondiente y reemplaza el div
   .img-ph por:
   <img src="imagenes/nombre.jpg" alt="..." style="width:100%;height:100%;object-fit:cover;">
   ======================================================== */
.img-ph { width:100%; height:100%; display:flex; flex-direction:column; align-items:center; justify-content:center; gap:0.5rem; border:2px dashed var(--border2); background: repeating-linear-gradient(45deg, var(--black3), var(--black3) 10px, rgba(57,255,20,0.015) 10px, rgba(57,255,20,0.015) 20px); }
.img-ph .ph-ico { font-size:2rem; opacity:0.12; }
.img-ph .ph-txt { font-size:0.55rem; letter-spacing:0.15em; text-transform:uppercase; color:var(--muted); opacity:0.4; font-family:'Syne',sans-serif; text-align:center; line-height:1.5; }

.p-overlay { position:absolute; inset:0; display:flex; align-items:center; justify-content:center; opacity:0; transition:opacity 0.25s; background:rgba(8,12,8,0.4); }
.product-card:hover .p-overlay { opacity:1; }
.p-quick { background:var(--green); color:var(--black); border:none; padding:8px 18px; font-family:'Syne',sans-serif; font-size:0.65rem; letter-spacing:0.16em; text-transform:uppercase; font-weight:700; cursor:pointer; clip-path:polygon(0 0, calc(100% - 8px) 0, 100% 8px, 100% 100%, 0 100%); }

.badge { position:absolute; top:8px; left:8px; font-size:0.55rem; letter-spacing:0.18em; text-transform:uppercase; padding:3px 8px; font-weight:700; z-index:1; font-family:'Syne',sans-serif; }
.badge-new  { background:var(--green); color:var(--black); }
.badge-sale { background:#FF1414; color:#fff; }
.badge-hot  { background:var(--black); color:var(--green); border:1px solid var(--green); }

.product-info { padding:0.9rem 1rem 1.1rem; }
.product-info h4 { font-family:'Syne',sans-serif; font-size:0.88rem; font-weight:700; color:var(--white); margin-bottom:0.2rem; }
.product-sub { font-size:0.64rem; color:var(--muted); letter-spacing:0.12em; text-transform:uppercase; margin-bottom:0.6rem; }
.product-footer { display:flex; align-items:center; justify-content:space-between; }
.price { font-family:'Bebas Neue',sans-serif; font-size:1.2rem; color:var(--green); }
.price-old { font-size:0.72rem; color:var(--muted); text-decoration:line-through; margin-left:5px; }
.btn-add { background:transparent; border:1px solid var(--green-dark); color:var(--green); font-size:0.62rem; letter-spacing:0.1em; text-transform:uppercase; padding:5px 10px; cursor:pointer; transition:all 0.2s; font-family:'Syne',sans-serif; font-weight:700; }
.btn-add:hover { background:var(--green); color:var(--black); border-color:var(--green); }

.tallas { display:flex; gap:4px; margin-bottom:0.5rem; flex-wrap:wrap; }
.talla { font-size:0.58rem; padding:2px 6px; border:1px solid var(--border2); color:var(--muted); cursor:pointer; font-family:'Syne',sans-serif; font-weight:700; transition:all 0.15s; }
.talla:hover { border-color:var(--green); color:var(--green); }
.talla.selected { border-color:var(--green); color:var(--green); background:rgba(57,255,20,0.08); }

/* SECCIÓN VACÍA */
.sec-empty { display:none; padding:2rem; text-align:center; background:var(--card); border:1px dashed var(--border2); font-size:0.8rem; color:var(--muted); margin-bottom:1rem; }
.sec-empty.visible { display:block; }

/* MENSAJE SIN RESULTADOS GLOBAL */
#no-results { display:none; padding:4rem 2rem; text-align:center; }
#no-results.visible { display:block; }
#no-results .nr-icon { font-size:3rem; margin-bottom:1rem; opacity:0.4; }
#no-results h3 { font-family:'Bebas Neue',sans-serif; font-size:2rem; color:var(--muted); letter-spacing:0.08em; margin-bottom:0.5rem; }
#no-results p { font-size:0.8rem; color:var(--muted); }

/* FEATURES */
.feature-band { display:grid; grid-template-columns:repeat(4,1fr); gap:1px; background:var(--border); max-width:1200px; margin:0 auto; padding:0 2.5rem 4rem; }
.feat-item { background:var(--card); padding:1.5rem; display:flex; align-items:flex-start; gap:1rem; }
.feat-icon { font-size:1.4rem; flex-shrink:0; }
.feat-text strong { display:block; font-family:'Syne',sans-serif; font-size:0.78rem; font-weight:700; color:var(--white); margin-bottom:0.25rem; }
.feat-text span { font-size:0.68rem; color:var(--muted); line-height:1.5; }

/* FOOTER */
footer { background:var(--black); padding:3rem 2.5rem 2rem; border-top:1px solid var(--border); }
.footer-grid { display:grid; grid-template-columns:2fr 1fr 1fr 1fr; gap:3rem; max-width:1200px; margin:0 auto 2.5rem; }
.footer-brand p { color:var(--muted); font-size:0.78rem; line-height:1.7; max-width:240px; margin-top:0.8rem; }
.footer-col h5 { color:var(--green); font-size:0.62rem; letter-spacing:0.25em; text-transform:uppercase; margin-bottom:1rem; font-weight:700; font-family:'Syne',sans-serif; }
.footer-col ul { list-style:none; }
.footer-col li { margin-bottom:0.5rem; }
.footer-col a { color:var(--muted); text-decoration:none; font-size:0.8rem; transition:color 0.2s; }
.footer-col a:hover { color:var(--green); }
.footer-bottom { border-top:1px solid var(--border); padding-top:1.2rem; display:flex; align-items:center; justify-content:space-between; max-width:1200px; margin:0 auto; color:#2A402A; font-size:0.7rem; letter-spacing:0.1em; text-transform:uppercase; }

/* ======= CHATBOT ======= */
#chat-toggle { position:fixed; bottom:28px; right:28px; width:60px; height:60px; border-radius:50%; background:var(--black2); border:2px solid var(--green); cursor:pointer; display:flex; align-items:center; justify-content:center; font-size:1.6rem; z-index:9999; box-shadow:0 0 20px rgba(57,255,20,0.35), 0 4px 24px rgba(0,0,0,0.6); transition:transform 0.2s, box-shadow 0.2s; }
#chat-toggle:hover { transform:scale(1.08); box-shadow:0 0 32px rgba(57,255,20,0.55), 0 6px 30px rgba(0,0,0,0.6); }
.chat-ping { position:absolute; top:-2px; right:-2px; width:14px; height:14px; border-radius:50%; background:var(--green); border:2px solid var(--black2); animation:ping 1.8s ease-in-out infinite; }
@keyframes ping { 0%,100% { box-shadow:0 0 0 0 rgba(57,255,20,0.6); } 50% { box-shadow:0 0 0 6px rgba(57,255,20,0); } }

#chat-window { position:fixed; bottom:102px; right:28px; width:390px; height:580px; background:var(--black2); border:1px solid var(--border2); border-radius:4px; box-shadow:0 0 40px rgba(57,255,20,0.12), 0 20px 60px rgba(0,0,0,0.7); z-index:9998; display:flex; flex-direction:column; overflow:hidden; transform:scale(0.88) translateY(16px); opacity:0; pointer-events:none; transition:transform 0.28s cubic-bezier(0.34,1.56,0.64,1), opacity 0.2s; }
#chat-window.open { transform:scale(1) translateY(0); opacity:1; pointer-events:all; }
.chat-topbar { height:2px; background:var(--green); flex-shrink:0; box-shadow:0 0 12px rgba(57,255,20,0.7); }
.chat-header { background:var(--card); padding:12px 15px; display:flex; align-items:center; gap:10px; flex-shrink:0; border-bottom:1px solid var(--border); }
.chat-avatar { width:36px; height:36px; border-radius:4px; background:var(--green-dark); border:1px solid var(--green); display:flex; align-items:center; justify-content:center; font-size:1.1rem; flex-shrink:0; }
.chat-header-info { flex:1; }
.chat-header-info strong { display:block; color:var(--white); font-size:0.84rem; font-weight:700; letter-spacing:0.06em; font-family:'Syne',sans-serif; }
.chat-online { display:flex; align-items:center; gap:5px; font-size:0.63rem; color:var(--green); letter-spacing:0.08em; }
.chat-online::before { content:''; width:5px; height:5px; border-radius:50%; background:var(--green); box-shadow:0 0 6px var(--green); display:inline-block; animation:glow 2s ease-in-out infinite; }
@keyframes glow { 0%,100% { box-shadow:0 0 4px var(--green); } 50% { box-shadow:0 0 10px var(--green), 0 0 20px rgba(57,255,20,0.4); } }
.chat-close { background:none; border:none; color:var(--muted); cursor:pointer; font-size:1rem; padding:4px; display:flex; align-items:center; transition:color 0.2s; }
.chat-close:hover { color:var(--green); }

.chat-messages { flex:1; overflow-y:auto; padding:14px; display:flex; flex-direction:column; gap:10px; scroll-behavior:smooth; }
.chat-messages::-webkit-scrollbar { width:3px; }
.chat-messages::-webkit-scrollbar-thumb { background:var(--green-dark); border-radius:2px; }
.msg { display:flex; gap:8px; align-items:flex-end; }
.msg.bot { justify-content:flex-start; }
.msg.user { justify-content:flex-end; }
.msg-av { width:26px; height:26px; border-radius:3px; background:var(--green-dark); border:1px solid var(--green); display:flex; align-items:center; justify-content:center; font-size:0.8rem; flex-shrink:0; }
.bubble { max-width:82%; padding:10px 13px; font-size:0.82rem; line-height:1.55; }
.msg.bot .bubble { background:var(--card); color:var(--white); border:1px solid var(--border); border-radius:0 8px 8px 8px; }
.msg.user .bubble { background:var(--green-dark); color:var(--white); border:1px solid rgba(57,255,20,0.3); border-radius:8px 0 8px 8px; }
.bubble .kw { color:var(--green); font-weight:700; font-style:italic; }
.msg-time { font-size:0.58rem; color:#2A402A; margin-top:2px; padding:0 3px; }

/* Mini cards de resultado dentro del chat */
.chat-results { display:flex; flex-direction:column; gap:6px; margin-top:6px; }
.chat-result-card { background:var(--black3); border:1px solid var(--border2); padding:8px 10px; display:flex; align-items:center; gap:10px; cursor:pointer; transition:border-color 0.2s; border-radius:3px; }
.chat-result-card:hover { border-color:var(--green); }
.crc-ico { font-size:1.4rem; flex-shrink:0; opacity:0.7; }
.crc-info { flex:1; min-width:0; }
.crc-name { font-family:'Syne',sans-serif; font-size:0.78rem; font-weight:700; color:var(--white); white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
.crc-sub { font-size:0.62rem; color:var(--muted); text-transform:uppercase; letter-spacing:0.08em; }
.crc-price { font-family:'Bebas Neue',sans-serif; font-size:1rem; color:var(--green); flex-shrink:0; }
.chat-result-more { font-size:0.68rem; color:var(--muted); text-align:center; padding-top:4px; letter-spacing:0.08em; }

.typing-indicator { display:flex; gap:5px; padding:12px 15px; background:var(--card); border:1px solid var(--border); border-radius:0 8px 8px 8px; width:fit-content; align-items:center; }
.tdot { width:6px; height:6px; border-radius:50%; background:var(--green); animation:tb 1.2s infinite; box-shadow:0 0 6px rgba(57,255,20,0.5); }
.tdot:nth-child(2) { animation-delay:0.2s; }
.tdot:nth-child(3) { animation-delay:0.4s; }
@keyframes tb { 0%,60%,100% { transform:translateY(0); opacity:0.6; } 30% { transform:translateY(-6px); opacity:1; } }

.sug-wrap { padding:9px 12px 10px; flex-shrink:0; border-top:1px solid var(--border); background:var(--black3); }
.sug-label { font-size:0.6rem; color:var(--muted); letter-spacing:0.15em; text-transform:uppercase; margin-bottom:7px; font-weight:700; font-family:'Syne',sans-serif; }
.suggestions { display:flex; flex-wrap:wrap; gap:5px; }
.sug-chip { background:var(--card); border:1px solid var(--border2); color:var(--white); font-size:0.7rem; padding:5px 10px; border-radius:2px; cursor:pointer; transition:all 0.15s; font-family:'Space Grotesk',sans-serif; white-space:nowrap; clip-path:polygon(0 0, calc(100% - 6px) 0, 100% 6px, 100% 100%, 0 100%); }
.sug-chip:hover { background:var(--green-dark); border-color:var(--green); color:var(--green); }

.chat-input-row { display:flex; gap:8px; padding:10px 12px; border-top:1px solid var(--border); background:var(--card); flex-shrink:0; align-items:center; }
.chat-input-row input { flex:1; border:1px solid var(--border2); border-radius:2px; padding:9px 12px; font-family:'Space Grotesk',sans-serif; font-size:0.82rem; outline:none; color:var(--white); background:var(--black2); transition:border-color 0.2s; }
.chat-input-row input:focus { border-color:var(--green); box-shadow:0 0 8px rgba(57,255,20,0.15); }
.chat-input-row input::placeholder { color:var(--muted); }
.chat-send { width:38px; height:38px; border-radius:2px; background:var(--green); border:none; cursor:pointer; display:flex; align-items:center; justify-content:center; font-size:0.9rem; color:var(--black); font-weight:900; transition:all 0.2s; clip-path:polygon(0 0, calc(100% - 7px) 0, 100% 7px, 100% 100%, 0 100%); }
.chat-send:hover { background:#4fff28; transform:scale(1.04); }

/* RESPONSIVE */
@media (max-width: 960px) {
  .products-grid { grid-template-columns: repeat(2,1fr); }
  .feature-band { grid-template-columns: 1fr 1fr; }
  .footer-grid { grid-template-columns: 1fr 1fr; }
  .cat-hero { padding: 2rem; }
  .cat-hero h1 { font-size: 3rem; }
}
@media (max-width: 580px) {
  .products-grid { grid-template-columns: 1fr; }
  nav ul { display: none; }
  #chat-window { width: calc(100vw - 20px); right: 10px; bottom: 92px; }
  .cat-hero h1 { font-size: 2.4rem; }
  .cat-hero { padding: 1.5rem; }
}
</style>
</head>
<body>

<!-- NAV -->
<nav>
  <a href="index.php" class="logo">STREET<span>FLOW</span></a>
  <ul>
    <li><a href="index.php">Inicio</a></li>
    <li><a href="ropa.php">Busos</a></li>
    <li><a href="pantalon.php">Pantalones</a></li>
    <li><a href="catalogo.php" class="active">Catálogo</a></li>
    <li><a href="#">Sale</a></li>
  </ul>
</nav>

<!-- TICKER -->
<div class="ticker">
  <span class="ticker-inner">CATÁLOGO COMPLETO · BUSOS · CHAQUETAS · CARGOS · JOGGERS · CALZADO · GORRAS · RELOJES · COLLARES · MOCHILAS · ENVÍO GRATIS +$200.000 · DROP SS2026 ·</span>
</div>

<!-- HERO -->
<section class="cat-hero">
  <div class="breadcrumb"><a href="index.php">Inicio</a> &nbsp;/&nbsp; Catálogo completo</div>
  <h1>TODO EL <span>CATÁLOGO</span></h1>
  <p>Busos, chaquetas, pantalones, calzado y accesorios en un solo lugar.</p>
  <div class="hero-hint">Pregúntale al chat: "Muéstrame busos talla M" o "Quiero una gorra"</div>
</section>

<!-- FILTROS RÁPIDOS -->
<div class="quick-filters">
  <span class="qf-label">Ver:</span>
  <button class="qf-btn active" data-filter="all">Todo</button>
  <button class="qf-btn" data-filter="buso">Busos</button>
  <button class="qf-btn" data-filter="chaqueta">Chaquetas</button>
  <button class="qf-btn" data-filter="cargo">Cargos</button>
  <button class="qf-btn" data-filter="jogger">Joggers</button>
  <button class="qf-btn" data-filter="pantaloneta">Pantalonetas</button>
  <div class="qf-sep"></div>
  <button class="qf-btn" data-filter="sneaker">Sneakers</button>
  <button class="qf-btn" data-filter="gorra">Gorras</button>
  <button class="qf-btn" data-filter="reloj">Relojes</button>
  <button class="qf-btn" data-filter="collar">Collares</button>
  <button class="qf-btn" data-filter="mochila">Mochilas</button>
  <div class="qf-sep"></div>
  <button class="qf-btn" data-filter="sale">🔥 Sale</button>
  <button class="qf-btn" data-filter="drop">✨ Drops</button>
</div>

<!-- ESTADO DE BÚSQUEDA -->
<div id="search-status">
  <span class="status-text" id="status-text">Mostrando resultados para: "hoodie"</span>
  <button id="clear-btn" onclick="clearSearch()">✕ Ver todo</button>
</div>

<!-- CATÁLOGO COMPLETO -->
<div class="catalog-wrap">

  <!-- ==================== BUSOS & HOODIES ==================== -->
  <div class="sec-title" id="sec-busos">
    Busos <span>& Hoodies</span>
    <span class="sec-count" id="count-busos"></span>
  </div>
  <div class="products-grid" id="grid-busos">

    <!-- BUSO 1 — línea 298: cambia .img-ph por <img src="imagenes/hoodie-oversized.jpg" ...> -->
    <div class="product-card" data-cat="buso" data-tags="hoodie oversized unisex negro verde gris essentials talla xs s m l xl xxl" data-name="Hoodie Oversized" data-precio="189000" data-tallas="XS S M L XL XXL">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">hoodie-oversized.jpg</span></div>
        <span class="badge badge-new">Drop</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Hoodie Oversized</h4>
        <p class="product-sub">Unisex · Essentials</p>
        <div class="tallas"><span class="talla">XS</span><span class="talla">S</span><span class="talla">M</span><span class="talla">L</span><span class="talla">XL</span><span class="talla">XXL</span></div>
        <div class="product-footer"><div><span class="price">$189.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- BUSO 2 — línea 315: cambia .img-ph por <img src="imagenes/buso-vintage.jpg" ...> -->
    <div class="product-card" data-cat="buso" data-tags="buso vintage washed retro unisex talla xs s m l xl" data-name="Buso Vintage Washed" data-precio="142000" data-tallas="XS S M L XL">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">buso-vintage.jpg</span></div>
        <span class="badge badge-sale">−25%</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Buso Vintage Washed</h4>
        <p class="product-sub">Unisex · Retro</p>
        <div class="tallas"><span class="talla">XS</span><span class="talla">S</span><span class="talla">M</span><span class="talla">L</span><span class="talla">XL</span></div>
        <div class="product-footer"><div><span class="price">$142.000</span><span class="price-old">$190.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- BUSO 3 — línea 329: cambia .img-ph por <img src="imagenes/hoodie-zip.jpg" ...> -->
    <div class="product-card" data-cat="buso" data-tags="hoodie zip cierre full unisex essentials talla xs s m l xl" data-name="Hoodie Full Zip" data-precio="175000" data-tallas="XS S M L XL">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">hoodie-zip.jpg</span></div>
        <span class="badge badge-new">Nuevo</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Hoodie Full Zip</h4>
        <p class="product-sub">Unisex · Essentials</p>
        <div class="tallas"><span class="talla">XS</span><span class="talla">S</span><span class="talla">M</span><span class="talla">L</span><span class="talla">XL</span></div>
        <div class="product-footer"><div><span class="price">$175.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- BUSO 4 — línea 343: cambia .img-ph por <img src="imagenes/buso-crop.jpg" ...> -->
    <div class="product-card" data-cat="buso" data-tags="buso crop corto mujer femenino urban talla xs s m l" data-name="Buso Crop Urban" data-precio="135000" data-tallas="XS S M L">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">buso-crop.jpg</span></div>
        <span class="badge badge-hot">Hot</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Buso Crop Urban</h4>
        <p class="product-sub">Mujer · Urban</p>
        <div class="tallas"><span class="talla">XS</span><span class="talla">S</span><span class="talla">M</span><span class="talla">L</span></div>
        <div class="product-footer"><div><span class="price">$135.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

  </div><!-- /grid-busos -->
  <div class="sec-empty" id="empty-busos">No hay busos que coincidan con tu búsqueda.</div>

  <!-- ==================== CHAQUETAS ==================== -->
  <div class="sec-title" id="sec-chaquetas">
    Chaquetas <span>& Jackets</span>
    <span class="sec-count" id="count-chaquetas"></span>
  </div>
  <div class="products-grid" id="grid-chaquetas">

    <!-- CHAQUETA 1 — línea 372: cambia .img-ph por <img src="imagenes/jacket-coach.jpg" ...> -->
    <div class="product-card" data-cat="chaqueta" data-tags="jacket coach unisex premium talla s m l xl" data-name="Jacket Coach" data-precio="265000" data-tallas="S M L XL">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">jacket-coach.jpg</span></div>
        <span class="badge badge-new">Drop</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Jacket Coach</h4>
        <p class="product-sub">Unisex · Premium</p>
        <div class="tallas"><span class="talla">S</span><span class="talla">M</span><span class="talla">L</span><span class="talla">XL</span></div>
        <div class="product-footer"><div><span class="price">$265.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- CHAQUETA 2 — línea 387: cambia .img-ph por <img src="imagenes/chaqueta-bomber.jpg" ...> -->
    <div class="product-card" data-cat="chaqueta" data-tags="chaqueta bomber unisex street talla s m l xl xxl" data-name="Chaqueta Bomber" data-precio="235000" data-tallas="S M L XL XXL">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">chaqueta-bomber.jpg</span></div>
        <span class="badge badge-hot">Hot</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Chaqueta Bomber</h4>
        <p class="product-sub">Unisex · Street</p>
        <div class="tallas"><span class="talla">S</span><span class="talla">M</span><span class="talla">L</span><span class="talla">XL</span><span class="talla">XXL</span></div>
        <div class="product-footer"><div><span class="price">$235.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- CHAQUETA 3 — línea 402: cambia .img-ph por <img src="imagenes/jacket-denim.jpg" ...> -->
    <div class="product-card" data-cat="chaqueta" data-tags="jacket denim oversize unisex urban talla s m l xl xxl" data-name="Jacket Denim Oversize" data-precio="200000" data-tallas="S M L XL XXL">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">jacket-denim.jpg</span></div>
        <span class="badge badge-sale">−20%</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Jacket Denim Oversize</h4>
        <p class="product-sub">Unisex · Urban</p>
        <div class="tallas"><span class="talla">S</span><span class="talla">M</span><span class="talla">L</span><span class="talla">XL</span><span class="talla">XXL</span></div>
        <div class="product-footer"><div><span class="price">$200.000</span><span class="price-old">$250.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- CHAQUETA 4 — línea 417: cambia .img-ph por <img src="imagenes/cortaviento.jpg" ...> -->
    <div class="product-card" data-cat="chaqueta" data-tags="cortaviento ripstop unisex outdoor talla s m l xl" data-name="Cortaviento Ripstop" data-precio="219000" data-tallas="S M L XL">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">cortaviento.jpg</span></div>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Cortaviento Ripstop</h4>
        <p class="product-sub">Unisex · Outdoor</p>
        <div class="tallas"><span class="talla">S</span><span class="talla">M</span><span class="talla">L</span><span class="talla">XL</span></div>
        <div class="product-footer"><div><span class="price">$219.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

  </div><!-- /grid-chaquetas -->
  <div class="sec-empty" id="empty-chaquetas">No hay chaquetas que coincidan.</div>

  <!-- ==================== CARGOS ==================== -->
  <div class="sec-title" id="sec-cargos">
    Cargo <span>Pants</span>
    <span class="sec-count" id="count-cargos"></span>
  </div>
  <div class="products-grid" id="grid-cargos">

    <!-- CARGO 1 — línea 445: cambia .img-ph por <img src="imagenes/cargo-wide.jpg" ...> -->
    <div class="product-card" data-cat="cargo" data-tags="cargo pantalon wide baggy hombre talla 28 30 32 34 36" data-name="Cargo Pants Wide" data-precio="175000" data-tallas="28 30 32 34 36">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">cargo-wide.jpg</span></div>
        <span class="badge badge-sale">−30%</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Cargo Pants Wide</h4>
        <p class="product-sub">Hombre · Baggy</p>
        <div class="tallas"><span class="talla">28</span><span class="talla">30</span><span class="talla">32</span><span class="talla">34</span><span class="talla">36</span></div>
        <div class="product-footer"><div><span class="price">$175.000</span><span class="price-old">$250.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- CARGO 2 — línea 460: cambia .img-ph por <img src="imagenes/cargo-tactical.jpg" ...> -->
    <div class="product-card" data-cat="cargo" data-tags="cargo pantalon tactical unisex street talla 28 30 32 34 36" data-name="Cargo Tactical" data-precio="210000" data-tallas="28 30 32 34 36">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">cargo-tactical.jpg</span></div>
        <span class="badge badge-hot">Hot</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Cargo Tactical</h4>
        <p class="product-sub">Unisex · Street</p>
        <div class="tallas"><span class="talla">28</span><span class="talla">30</span><span class="talla">32</span><span class="talla">34</span><span class="talla">36</span></div>
        <div class="product-footer"><div><span class="price">$210.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- CARGO 3 — línea 475: cambia .img-ph por <img src="imagenes/cargo-denim.jpg" ...> -->
    <div class="product-card" data-cat="cargo" data-tags="cargo denim washed pantalon unisex urban talla 28 30 32 34" data-name="Cargo Denim Washed" data-precio="229000" data-tallas="28 30 32 34">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">cargo-denim.jpg</span></div>
        <span class="badge badge-new">Nuevo</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Cargo Denim Washed</h4>
        <p class="product-sub">Unisex · Urban</p>
        <div class="tallas"><span class="talla">28</span><span class="talla">30</span><span class="talla">32</span><span class="talla">34</span></div>
        <div class="product-footer"><div><span class="price">$229.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- CARGO 4 — línea 490: cambia .img-ph por <img src="imagenes/cargo-slim.jpg" ...> -->
    <div class="product-card" data-cat="cargo" data-tags="cargo slim fit pantalon hombre essentials talla 28 30 32 34 36" data-name="Cargo Slim Fit" data-precio="185000" data-tallas="28 30 32 34 36">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">cargo-slim.jpg</span></div>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Cargo Slim Fit</h4>
        <p class="product-sub">Hombre · Essentials</p>
        <div class="tallas"><span class="talla">28</span><span class="talla">30</span><span class="talla">32</span><span class="talla">34</span><span class="talla">36</span></div>
        <div class="product-footer"><div><span class="price">$185.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

  </div><!-- /grid-cargos -->
  <div class="sec-empty" id="empty-cargos">No hay cargos que coincidan.</div>

  <!-- ==================== JOGGERS & PANTALONETAS ==================== -->
  <div class="sec-title" id="sec-joggers">
    Joggers <span>& Pantalonetas</span>
    <span class="sec-count" id="count-joggers"></span>
  </div>
  <div class="products-grid" id="grid-joggers">

    <!-- JOGGER 1 — línea 517: cambia .img-ph por <img src="imagenes/jogger-fleece.jpg" ...> -->
    <div class="product-card" data-cat="jogger" data-tags="jogger fleece oversized unisex comfort talla xs s m l xl" data-name="Jogger Fleece Oversized" data-precio="155000" data-tallas="XS S M L XL">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">jogger-fleece.jpg</span></div>
        <span class="badge badge-hot">Hot</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Jogger Fleece Oversized</h4>
        <p class="product-sub">Unisex · Comfort</p>
        <div class="tallas"><span class="talla">XS</span><span class="talla">S</span><span class="talla">M</span><span class="talla">L</span><span class="talla">XL</span></div>
        <div class="product-footer"><div><span class="price">$155.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- JOGGER 2 — línea 531: cambia .img-ph por <img src="imagenes/jogger-tech.jpg" ...> -->
    <div class="product-card" data-cat="jogger" data-tags="jogger tech ripstop unisex sport talla s m l xl xxl" data-name="Jogger Tech Ripstop" data-precio="178000" data-tallas="S M L XL XXL">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">jogger-tech.jpg</span></div>
        <span class="badge badge-new">Drop</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Jogger Tech Ripstop</h4>
        <p class="product-sub">Unisex · Sport</p>
        <div class="tallas"><span class="talla">S</span><span class="talla">M</span><span class="talla">L</span><span class="talla">XL</span><span class="talla">XXL</span></div>
        <div class="product-footer"><div><span class="price">$178.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- PANTALONETA 1 — línea 545: cambia .img-ph por <img src="imagenes/pantaloneta-cargo.jpg" ...> -->
    <div class="product-card" data-cat="pantaloneta" data-tags="pantaloneta cargo short corto hombre summer talla s m l xl" data-name="Pantaloneta Cargo Street" data-precio="89000" data-tallas="S M L XL">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">pantaloneta-cargo.jpg</span></div>
        <span class="badge badge-sale">−15%</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Pantaloneta Cargo Street</h4>
        <p class="product-sub">Hombre · Summer</p>
        <div class="tallas"><span class="talla">S</span><span class="talla">M</span><span class="talla">L</span><span class="talla">XL</span></div>
        <div class="product-footer"><div><span class="price">$89.000</span><span class="price-old">$105.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- PANTALONETA 2 — línea 559: cambia .img-ph por <img src="imagenes/pantaloneta-baggy.jpg" ...> -->
    <div class="product-card" data-cat="pantaloneta" data-tags="pantaloneta baggy mesh short corto unisex urban talla xs s m l xl" data-name="Pantaloneta Baggy Mesh" data-precio="95000" data-tallas="XS S M L XL">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">pantaloneta-baggy.jpg</span></div>
        <span class="badge badge-hot">Hot</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Pantaloneta Baggy Mesh</h4>
        <p class="product-sub">Unisex · Urban</p>
        <div class="tallas"><span class="talla">XS</span><span class="talla">S</span><span class="talla">M</span><span class="talla">L</span><span class="talla">XL</span></div>
        <div class="product-footer"><div><span class="price">$95.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

  </div><!-- /grid-joggers -->
  <div class="sec-empty" id="empty-joggers">No hay joggers ni pantalonetas que coincidan.</div>

  <!-- ==================== CALZADO ==================== -->
  <div class="sec-title" id="sec-sneakers">
    Calzado <span>// Kicks</span>
    <span class="sec-count" id="count-sneakers"></span>
  </div>
  <div class="products-grid" id="grid-sneakers">

    <!-- SNEAKER 1 — línea 587: cambia .img-ph por <img src="imagenes/sneaker-chunky.jpg" ...> -->
    <div class="product-card" data-cat="sneaker" data-tags="sneaker chunky zapatilla tenis calzado urbano talla 36 37 38 39 40 41 42 43 44 45" data-name="Sneaker Chunky" data-precio="320000" data-tallas="36 37 38 39 40 41 42 43 44 45">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">sneaker-chunky.jpg</span></div>
        <span class="badge badge-new">Drop</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Sneaker Chunky</h4>
        <p class="product-sub">Calzado · Urbano</p>
        <div class="tallas"><span class="talla">36</span><span class="talla">38</span><span class="talla">40</span><span class="talla">42</span><span class="talla">44</span></div>
        <div class="product-footer"><div><span class="price">$320.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- SNEAKER 2 — línea 601: cambia .img-ph por <img src="imagenes/sneaker-low.jpg" ...> -->
    <div class="product-card" data-cat="sneaker" data-tags="sneaker low top classic zapatilla tenis calzado talla 36 37 38 39 40 41 42 43" data-name="Sneaker Low Top Classic" data-precio="220000" data-tallas="36 37 38 39 40 41 42 43">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">sneaker-low.jpg</span></div>
        <span class="badge badge-sale">−20%</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Sneaker Low Top Classic</h4>
        <p class="product-sub">Calzado · Essentials</p>
        <div class="tallas"><span class="talla">36</span><span class="talla">38</span><span class="talla">40</span><span class="talla">42</span></div>
        <div class="product-footer"><div><span class="price">$220.000</span><span class="price-old">$275.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- BOTA — línea 615: cambia .img-ph por <img src="imagenes/bota-urbana.jpg" ...> -->
    <div class="product-card" data-cat="sneaker" data-tags="bota urbana combat calzado street talla 38 39 40 41 42 43 44" data-name="Bota Urbana Combat" data-precio="285000" data-tallas="38 39 40 41 42 43 44">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">bota-urbana.jpg</span></div>
        <span class="badge badge-hot">Hot</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Bota Urbana Combat</h4>
        <p class="product-sub">Calzado · Street</p>
        <div class="tallas"><span class="talla">38</span><span class="talla">40</span><span class="talla">42</span><span class="talla">44</span></div>
        <div class="product-footer"><div><span class="price">$285.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- SLIDE — línea 629: cambia .img-ph por <img src="imagenes/slide-urban.jpg" ...> -->
    <div class="product-card" data-cat="sneaker" data-tags="slide sandalias calzado casual talla 36 38 40 42 44" data-name="Slide Urban Premium" data-precio="98000" data-tallas="36 38 40 42 44">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">slide-urban.jpg</span></div>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Slide Urban Premium</h4>
        <p class="product-sub">Calzado · Casual</p>
        <div class="tallas"><span class="talla">36</span><span class="talla">38</span><span class="talla">40</span><span class="talla">42</span><span class="talla">44</span></div>
        <div class="product-footer"><div><span class="price">$98.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

  </div><!-- /grid-sneakers -->
  <div class="sec-empty" id="empty-sneakers">No hay calzado que coincida.</div>

  <!-- ==================== GORRAS ==================== -->
  <div class="sec-title" id="sec-gorras">
    Gorras <span>& Headwear</span>
    <span class="sec-count" id="count-gorras"></span>
  </div>
  <div class="products-grid" id="grid-gorras">

    <!-- GORRA 1 — línea 657: cambia .img-ph por <img src="imagenes/snapback-cap.jpg" ...> -->
    <div class="product-card" data-cat="gorra" data-tags="gorra snapback cap logo urban talla unica" data-name="Snapback Cap Logo" data-precio="65000" data-tallas="Talla única">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">snapback-cap.jpg</span></div>
        <span class="badge badge-hot">Hot</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Snapback Cap Logo</h4>
        <p class="product-sub">Gorras · Urban</p>
        <div class="product-footer"><div><span class="price">$65.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- GORRA 2 — línea 671: cambia .img-ph por <img src="imagenes/bucket-hat.jpg" ...> -->
    <div class="product-card" data-cat="gorra" data-tags="gorra bucket hat reversible street talla unica" data-name="Bucket Hat Reversible" data-precio="72000" data-tallas="Talla única">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">bucket-hat.jpg</span></div>
        <span class="badge badge-new">Nuevo</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Bucket Hat Reversible</h4>
        <p class="product-sub">Gorras · Street</p>
        <div class="product-footer"><div><span class="price">$72.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

  </div><!-- /grid-gorras -->
  <div class="sec-empty" id="empty-gorras">No hay gorras que coincidan.</div>

  <!-- ==================== RELOJES ==================== -->
  <div class="sec-title" id="sec-relojes">
    Relojes <span>& Watches</span>
    <span class="sec-count" id="count-relojes"></span>
  </div>
  <div class="products-grid" id="grid-relojes">

    <!-- RELOJ 1 — línea 695: cambia .img-ph por <img src="imagenes/reloj-street.jpg" ...> -->
    <div class="product-card" data-cat="reloj" data-tags="reloj watch digital street urban accesorios" data-name="Reloj Street Digital" data-precio="185000" data-tallas="Talla única">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">reloj-street.jpg</span></div>
        <span class="badge badge-new">Drop</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Reloj Street Digital</h4>
        <p class="product-sub">Relojes · Urban</p>
        <div class="product-footer"><div><span class="price">$185.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- RELOJ 2 — línea 709: cambia .img-ph por <img src="imagenes/reloj-chain.jpg" ...> -->
    <div class="product-card" data-cat="reloj" data-tags="reloj watch chain oversized premium accesorios" data-name="Reloj Chain Oversized" data-precio="245000" data-tallas="Talla única">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">reloj-chain.jpg</span></div>
        <span class="badge badge-hot">Hot</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Reloj Chain Oversized</h4>
        <p class="product-sub">Relojes · Premium</p>
        <div class="product-footer"><div><span class="price">$245.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

  </div><!-- /grid-relojes -->
  <div class="sec-empty" id="empty-relojes">No hay relojes que coincidan.</div>

  <!-- ==================== COLLARES & JOYERÍA ==================== -->
  <div class="sec-title" id="sec-collares">
    Collares <span>& Joyería</span>
    <span class="sec-count" id="count-collares"></span>
  </div>
  <div class="products-grid" id="grid-collares">

    <!-- COLLAR 1 — línea 733: cambia .img-ph por <img src="imagenes/collar-chain.jpg" ...> -->
    <div class="product-card" data-cat="collar" data-tags="collar chain joya gold dorado accesorios street" data-name="Collar Chain Street" data-precio="45000" data-tallas="Talla única">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">collar-chain.jpg</span></div>
        <span class="badge badge-sale">−15%</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Collar Chain Street</h4>
        <p class="product-sub">Collares · Gold</p>
        <div class="product-footer"><div><span class="price">$45.000</span><span class="price-old">$53.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- COLLAR 2 — línea 747: cambia .img-ph por <img src="imagenes/collar-pendant.jpg" ...> -->
    <div class="product-card" data-cat="collar" data-tags="collar pendant logo joya silver plateado accesorios" data-name="Collar Pendant Logo" data-precio="52000" data-tallas="Talla única">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">collar-pendant.jpg</span></div>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Collar Pendant Logo</h4>
        <p class="product-sub">Collares · Silver</p>
        <div class="product-footer"><div><span class="price">$52.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- MANILLA — línea 761: cambia .img-ph por <img src="imagenes/manilla-street.jpg" ...> -->
    <div class="product-card" data-cat="collar" data-tags="manilla pulsera brazalete accesorio street urban" data-name="Manilla Street Leather" data-precio="38000" data-tallas="Talla única">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">manilla-street.jpg</span></div>
        <span class="badge badge-new">Nuevo</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Manilla Street Leather</h4>
        <p class="product-sub">Pulseras · Urban</p>
        <div class="product-footer"><div><span class="price">$38.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

  </div><!-- /grid-collares -->
  <div class="sec-empty" id="empty-collares">No hay collares ni joyería que coincidan.</div>

  <!-- ==================== MOCHILAS & BOLSOS ==================== -->
  <div class="sec-title" id="sec-mochilas">
    Mochilas <span>& Bolsos</span>
    <span class="sec-count" id="count-mochilas"></span>
  </div>
  <div class="products-grid" id="grid-mochilas">

    <!-- MOCHILA 1 — línea 785: cambia .img-ph por <img src="imagenes/mochila-tactical.jpg" ...> -->
    <div class="product-card" data-cat="mochila" data-tags="mochila bolso bag backpack tactical street" data-name="Mochila Tactical" data-precio="145000" data-tallas="Talla única">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">mochila-tactical.jpg</span></div>
        <span class="badge badge-hot">Hot</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Mochila Tactical</h4>
        <p class="product-sub">Bolsos · Street</p>
        <div class="product-footer"><div><span class="price">$145.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

    <!-- MOCHILA 2 — línea 799: cambia .img-ph por <img src="imagenes/bandana-vintage.jpg" ...> -->
    <div class="product-card" data-cat="mochila" data-tags="bandana pañuelo accesorio retro vintage" data-name="Bandana Vintage" data-precio="32000" data-tallas="Talla única">
      <div class="product-img">
        <div class="img-ph"><span class="ph-ico">📷</span><span class="ph-txt">bandana-vintage.jpg</span></div>
        <span class="badge badge-sale">−20%</span>
        <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
      </div>
      <div class="product-info">
        <h4>Bandana Vintage</h4>
        <p class="product-sub">Accesorios · Retro</p>
        <div class="product-footer"><div><span class="price">$32.000</span><span class="price-old">$40.000</span></div><button class="btn-add">+ Carrito</button></div>
      </div>
    </div>

  </div><!-- /grid-mochilas -->
  <div class="sec-empty" id="empty-mochilas">No hay mochilas ni bolsos que coincidan.</div>

  <!-- Sin resultados global -->
  <div id="no-results">
    <div class="nr-icon">🔍</div>
    <h3>Sin resultados</h3>
    <p>No encontramos productos para esa búsqueda.<br>Escribe en el chat algo como "busos", "gorras talla M" o "ofertas".</p>
  </div>

</div><!-- /catalog-wrap -->

<!-- FEATURES -->
<div class="feature-band">
  <div class="feat-item"><span class="feat-icon">🚀</span><div class="feat-text"><strong>Envío Express</strong><span>24h para Bogotá, Medellín y Cali</span></div></div>
  <div class="feat-item"><span class="feat-icon">🔄</span><div class="feat-text"><strong>30 días de cambios</strong><span>Sin rollos. Si no te queda, lo cambiamos.</span></div></div>
  <div class="feat-item"><span class="feat-icon">🛡️</span><div class="feat-text"><strong>Calidad garantizada</strong><span>Materiales premium seleccionados a mano</span></div></div>
  <div class="feat-item"><span class="feat-icon">💳</span><div class="feat-text"><strong>Pagos flexibles</strong><span>Cuotas sin interés, Nequi, PSE y más</span></div></div>
</div>

<!-- FOOTER -->
<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <span class="logo" style="display:block;margin-bottom:0.2rem;">STREET<span style="color:var(--white)">FLOW</span></span>
      <p>Moda urbana sin filtros. Diseñada para los que viven la calle.</p>
    </div>
    <div class="footer-col"><h5>Tienda</h5><ul><li><a href="ropa.php">Busos</a></li><li><a href="pantalon.php">Pantalones</a></li><li><a href="zapato.php">Calzado</a></li><li><a href="catalogo.php">Catálogo</a></li></ul></div>
    <div class="footer-col"><h5>Ayuda</h5><ul><li><a href="#">Guía de tallas</a></li><li><a href="#">Envíos</a></li><li><a href="#">Devoluciones</a></li><li><a href="#">Contacto</a></li></ul></div>
    <div class="footer-col"><h5>Marca</h5><ul><li><a href="#">Nosotros</a></li><li><a href="#">Instagram</a></li><li><a href="#">TikTok</a></li><li><a href="#">WhatsApp</a></li></ul></div>
  </div>
  <div class="footer-bottom"><span>© 2026 Streetflow. Todos los derechos reservados.</span><span>Hecho con flow 🟢</span></div>
</footer>

<!-- CHATBOT -->
<button id="chat-toggle" title="Buscar productos">🤖<div class="chat-ping"></div></button>
<div id="chat-window">
  <div class="chat-topbar"></div>
  <div class="chat-header">
    <div class="chat-avatar">🤖</div>
    <div class="chat-header-info">
      <strong>BUSCADOR STREETFLOW</strong>
      <span class="chat-online">Listo para ayudarte</span>
    </div>
    <button class="chat-close" id="chat-close">✕</button>
  </div>
  <div class="chat-messages" id="chat-messages"></div>
  <div class="sug-wrap" id="sug-wrap">
    <div class="sug-label">Prueba decirme:</div>
    <div class="suggestions" id="sug-container"></div>
  </div>
  <div class="chat-input-row">
    <input type="text" id="chat-input" placeholder="Ej: busos talla M, gorras, ofertas..." autocomplete="off">
    <button class="chat-send" id="chat-send">➤</button>
  </div>
</div>

<script>
// ============================================================
// BASE DE DATOS DE PRODUCTOS (PHP equivalente en JS)
// Cada producto tiene: id, nombre, categoria, precio, tallas,
// tags (palabras clave para búsqueda), badge, icono
// ============================================================
const PRODUCTOS = Array.from(document.querySelectorAll('.product-card')).map((el, i) => ({
  el,
  id: i,
  nombre: el.dataset.name || '',
  cat: el.dataset.cat || '',
  tags: el.dataset.tags || '',
  precio: parseInt(el.dataset.precio) || 0,
  tallas: (el.dataset.tallas || '').split(' ')
}));

// ============================================================
// MOTOR DE BÚSQUEDA
// Recibe texto libre y devuelve los productos que coinciden
// Soporta: categoría, talla específica, precio, nombre, sale
// ============================================================
function buscarProductos(query) {
  const q = normalizar(query);

  // Detectar talla mencionada (XS, S, M, L, XL, XXL, o números 28-45)
  const tallaMatch = q.match(/\b(xs|s\b|m\b|l\b|xl|xxl|28|30|32|34|36|38|39|40|41|42|43|44|45)\b/i);
  const tallaFiltro = tallaMatch ? tallaMatch[0].toUpperCase() : null;

  // Detectar si pide ofertas / sale / descuento
  const quiereSale = /oferta|descuento|sale|rebaja|promo|barato|economico/.test(q);

  // Palabras clave de categoría y producto
  const keywords = q.split(/\s+/).filter(w => w.length > 1);

  return PRODUCTOS.filter(p => {
    const textoProducto = normalizar(p.nombre + ' ' + p.cat + ' ' + p.tags);

    // Filtro de talla: si pidió talla específica, el producto debe tenerla
    if (tallaFiltro) {
      const tieneTalla = p.tallas.some(t => normalizar(t) === normalizar(tallaFiltro));
      if (!tieneTalla) return false;
    }

    // Filtro de sale
    if (quiereSale) {
      const badge = p.el.querySelector('.badge-sale');
      if (!badge) return false;
    }

    // Al menos una keyword debe coincidir con el producto
    // (excepto si solo filtró por talla o sale)
    const soloTallaOSale = keywords.every(k =>
      /^(talla|talla:|de|en|con|me|una|un|los|las|quiero|mostrar|ver|muestra|hay|tienes|busco|dame|quisiera|para|por|favor|porfavor|que|cual|cuales|xs|s|m|l|xl|xxl|\d+|oferta|descuento|sale|rebaja|promo|barato)$/.test(k)
    );

    if (soloTallaOSale) return true;

    return keywords.some(k => k.length > 2 && textoProducto.includes(k));
  });
}

function normalizar(s) {
  return s.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');
}

function formatPrecio(p) {
  return '$' + p.toLocaleString('es-CO');
}

// ============================================================
// APLICAR FILTRO EN LA PÁGINA
// Muestra/oculta productos y secciones según resultados
// ============================================================
function aplicarFiltro(resultados, query) {
  const todosVisible = resultados === null;

  // IDs de productos encontrados
  const ids = todosVisible ? null : new Set(resultados.map(p => p.id));

  let totalVisible = 0;

  // Para cada sección
  const secciones = [
    { grid: 'grid-busos',     empty: 'empty-busos',     sec: 'sec-busos',     count: 'count-busos' },
    { grid: 'grid-chaquetas', empty: 'empty-chaquetas', sec: 'sec-chaquetas', count: 'count-chaquetas' },
    { grid: 'grid-cargos',    empty: 'empty-cargos',    sec: 'sec-cargos',    count: 'count-cargos' },
    { grid: 'grid-joggers',   empty: 'empty-joggers',   sec: 'sec-joggers',   count: 'count-joggers' },
    { grid: 'grid-sneakers',  empty: 'empty-sneakers',  sec: 'sec-sneakers',  count: 'count-sneakers' },
    { grid: 'grid-gorras',    empty: 'empty-gorras',    sec: 'sec-gorras',    count: 'count-gorras' },
    { grid: 'grid-relojes',   empty: 'empty-relojes',   sec: 'sec-relojes',   count: 'count-relojes' },
    { grid: 'grid-collares',  empty: 'empty-collares',  sec: 'sec-collares',  count: 'count-collares' },
    { grid: 'grid-mochilas',  empty: 'empty-mochilas',  sec: 'sec-mochilas',  count: 'count-mochilas' },
  ];

  secciones.forEach(sec => {
    const grid  = document.getElementById(sec.grid);
    const empty = document.getElementById(sec.empty);
    const title = document.getElementById(sec.sec);
    const count = document.getElementById(sec.count);
    if (!grid) return;

    const cards = grid.querySelectorAll('.product-card');
    let visibles = 0;

    cards.forEach((card, localIdx) => {
      // Encontrar ID global del producto
      const prod = PRODUCTOS.find(p => p.el === card);
      if (!prod) return;

      if (todosVisible || ids.has(prod.id)) {
        card.classList.remove('hidden');
        card.classList.toggle('highlighted', !todosVisible);
        visibles++;
        totalVisible++;
      } else {
        card.classList.add('hidden');
        card.classList.remove('highlighted');
      }
    });

    // Mostrar/ocultar sección completa
    const secVisible = todosVisible || visibles > 0;
    if (title) title.style.display = secVisible ? '' : 'none';
    grid.style.display = secVisible ? '' : 'none';
    if (empty) empty.classList.toggle('visible', !todosVisible && visibles === 0);
    if (count) count.textContent = todosVisible ? '' : `${visibles} resultado${visibles !== 1 ? 's' : ''}`;
  });

  // Mostrar/ocultar mensaje global sin resultados
  const noRes = document.getElementById('no-results');
  if (noRes) noRes.classList.toggle('visible', !todosVisible && totalVisible === 0);

  // Barra de estado
  const status = document.getElementById('search-status');
  const statusText = document.getElementById('status-text');
  if (status && statusText) {
    if (todosVisible) {
      status.classList.remove('visible');
    } else {
      status.classList.add('visible');
      statusText.textContent = `Mostrando ${totalVisible} resultado${totalVisible !== 1 ? 's' : ''} para: "${query}"`;
    }
  }
}

// ============================================================
// FILTROS RÁPIDOS (botones superiores)
// ============================================================
document.querySelectorAll('.qf-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    document.querySelectorAll('.qf-btn').forEach(b => b.classList.remove('active'));
    this.classList.add('active');

    const f = this.dataset.filter;
    if (f === 'all') {
      aplicarFiltro(null, '');
    } else if (f === 'sale') {
      const res = PRODUCTOS.filter(p => p.el.querySelector('.badge-sale'));
      aplicarFiltro(res, 'ofertas');
    } else if (f === 'drop') {
      const res = PRODUCTOS.filter(p => p.el.querySelector('.badge-new'));
      aplicarFiltro(res, 'drops');
    } else {
      const res = PRODUCTOS.filter(p => normalizar(p.tags + ' ' + p.cat).includes(f));
      aplicarFiltro(res, f);
    }

    // Scroll al catálogo
    document.querySelector('.catalog-wrap').scrollIntoView({ behavior: 'smooth', block: 'start' });
  });
});

// ============================================================
// LIMPIAR BÚSQUEDA
// ============================================================
function clearSearch() {
  aplicarFiltro(null, '');
  document.querySelectorAll('.qf-btn').forEach(b => b.classList.remove('active'));
  document.querySelector('[data-filter="all"]').classList.add('active');
}

// ============================================================
// CHIPS DE TALLA
// ============================================================
document.querySelectorAll('.talla').forEach(chip => {
  chip.addEventListener('click', function(e) {
    e.stopPropagation();
    const row = this.closest('.tallas');
    row.querySelectorAll('.talla').forEach(c => c.classList.remove('selected'));
    this.classList.add('selected');
  });
});

// ============================================================
// CHATBOT — MOTOR INTELIGENTE
// El chat recibe texto libre, llama a buscarProductos(),
// muestra los resultados en la página Y en mini-cards dentro
// del propio chat
// ============================================================
const SUGS = [
  { label: "🧥 Busos talla M",             msg: "busos talla M" },
  { label: "👖 Cargo pantalón",             msg: "cargo pantalon" },
  { label: "👟 Sneakers talla 42",          msg: "sneakers talla 42" },
  { label: "🧢 Gorras",                     msg: "gorras" },
  { label: "⌚ Relojes",                    msg: "relojes" },
  { label: "🔥 Ver ofertas",               msg: "ofertas" },
  { label: "✨ Ver drops nuevos",           msg: "drops nuevos" },
  { label: "📿 Collares y manillas",        msg: "collares manillas" },
];

// Respuestas para preguntas NO de producto
const INFO_RULES = [
  { k: ["envio","envío","domicilio","entrega","despacho","shipping"], r: `🚚 Hacemos <span class="kw">envíos a toda Colombia</span>. Envío <span class="kw">GRATIS</span> desde $200.000. Para Bogotá, Medellín y Cali hay entrega <span class="kw">express en 24 horas</span>. Resto del país 2–5 días hábiles.` },
  { k: ["devolucion","cambio","garantia","retorno"], r: `🔄 Tienes <span class="kw">30 días</span> para devolver o cambiar cualquier prenda. Necesita la etiqueta original y estar sin uso. Escribe <span class="kw">contacto</span> para iniciar el proceso.` },
  { k: ["pago","tarjeta","nequi","pse","cuota","banco"], r: `💳 Aceptamos <span class="kw">Visa/Mastercard</span>, PSE, <span class="kw">Nequi</span>, Daviplata y efectivo. Hasta <span class="kw">12 cuotas sin interés</span> con tarjeta de crédito.` },
  { k: ["talla","medida","guia","queda","fit","size"], r: `📏 Para ropa manejamos <span class="kw">XS hasta XXL</span>. Para hoodies recomendamos pedir una talla más para el fit oversized. Para calzado del <span class="kw">36 al 45</span>. ¿De qué producto necesitas la talla?` },
  { k: ["contacto","whatsapp","instagram","hablar","humano","llamar"], r: `📞 Contáctanos por <span class="kw">WhatsApp al 300-000-0000</span> o Instagram <span class="kw">@streetflow.co</span>. Respuesta en menos de 2 horas en horario hábil.` },
  { k: ["hola","hey","buenas","saludos","epale","ola"], r: `¡Ey! 👊 Soy el buscador de <span class="kw">Streetflow</span>. Cuéntame qué estás buscando — puedes decirme algo como <span class="kw">"busos talla M"</span>, <span class="kw">"cargo negro"</span> o <span class="kw">"relojes"</span> y te muestro los productos en pantalla al instante.` },
];

const toggle  = document.getElementById('chat-toggle');
const win     = document.getElementById('chat-window');
const closeBtn= document.getElementById('chat-close');
const msgs    = document.getElementById('chat-messages');
const inp     = document.getElementById('chat-input');
const sendBtn = document.getElementById('chat-send');
const sugWrap = document.getElementById('sug-wrap');
const sugCont = document.getElementById('sug-container');

function time() { const d=new Date(); return String(d.getHours()).padStart(2,'0')+':'+String(d.getMinutes()).padStart(2,'0'); }

function addMsg(html, side, extra) {
  const div = document.createElement('div');
  div.className = 'msg ' + side;
  let inner = side === 'bot'
    ? `<div class="msg-av">🤖</div><div><div class="bubble">${html}</div>${extra||''}<div class="msg-time">${time()}</div></div>`
    : `<div><div class="bubble">${html}</div><div class="msg-time" style="text-align:right">${time()}</div></div>`;
  div.innerHTML = inner;
  msgs.appendChild(div);
  msgs.scrollTop = msgs.scrollHeight;
}

function showTyping() {
  const d=document.createElement('div'); d.className='msg bot'; d.id='typing';
  d.innerHTML=`<div class="msg-av">🤖</div><div class="typing-indicator"><div class="tdot"></div><div class="tdot"></div><div class="tdot"></div></div>`;
  msgs.appendChild(d); msgs.scrollTop=msgs.scrollHeight;
}
function removeTyping() { const t=document.getElementById('typing'); if(t)t.remove(); }

// Construir mini-cards de resultados para mostrar dentro del chat
function buildResultCards(resultados) {
  if (!resultados.length) return '';
  const mostrar = resultados.slice(0, 4); // máximo 4 en el chat
  let html = '<div class="chat-results">';
  mostrar.forEach(p => {
    html += `<div class="chat-result-card" onclick="scrollToProduct(${p.id})">
      <div class="crc-info">
        <div class="crc-name">${p.nombre}</div>
        <div class="crc-sub">${p.cat} · tallas: ${p.tallas.slice(0,4).join(', ')}${p.tallas.length > 4 ? '...' : ''}</div>
      </div>
      <div class="crc-price">${formatPrecio(p.precio)}</div>
    </div>`;
  });
  if (resultados.length > 4) {
    html += `<div class="chat-result-more">+${resultados.length - 4} más en pantalla ↑</div>`;
  }
  html += '</div>';
  return html;
}

// Scroll suave al producto en la página
function scrollToProduct(id) {
  const prod = PRODUCTOS.find(p => p.id === id);
  if (prod) {
    prod.el.scrollIntoView({ behavior: 'smooth', block: 'center' });
    prod.el.style.outline = '2px solid var(--green)';
    setTimeout(() => { prod.el.style.outline = ''; }, 2000);
  }
}

function esPreguntaInfo(q) {
  const n = normalizar(q);
  return INFO_RULES.find(r => r.k.some(k => n.includes(normalizar(k))));
}

function procesarMensaje(texto) {
  const n = normalizar(texto);

  // ¿Es pregunta de info (envío, pago, talla, etc.)?
  const infoRule = esPreguntaInfo(texto);
  if (infoRule) {
    addMsg(infoRule.r, 'bot');
    return;
  }

  // Es una búsqueda de producto
  const resultados = buscarProductos(texto);

  if (resultados.length === 0) {
    // Sin resultados
    aplicarFiltro([], texto);
    addMsg(`No encontré productos para <span class="kw">"${texto}"</span> 🤔<br>Intenta con: <span class="kw">busos</span>, <span class="kw">cargos</span>, <span class="kw">gorras</span>, <span class="kw">relojes</span>, <span class="kw">sneakers</span>...`, 'bot');
    return;
  }

  // Aplicar filtro en la página
  aplicarFiltro(resultados, texto);

  // Respuesta del chat con mini-cards
  const cats = [...new Set(resultados.map(p => p.cat))];
  const catTexto = cats.map(c => `<span class="kw">${c}</span>`).join(', ');
  const cards = buildResultCards(resultados);

  let respuesta = `✅ Encontré <span class="kw">${resultados.length} producto${resultados.length !== 1 ? 's' : ''}</span> de ${catTexto}. Los estoy mostrando en pantalla:`;

  addMsg(respuesta, 'bot', cards);

  // Scroll a la sección de resultados
  setTimeout(() => {
    document.querySelector('.catalog-wrap').scrollIntoView({ behavior: 'smooth', block: 'start' });
  }, 400);
}

function send(text) {
  if (!text.trim()) return;
  addMsg(text, 'user');
  inp.value = '';
  sugWrap.style.display = 'none';
  showTyping();
  setTimeout(() => {
    removeTyping();
    procesarMensaje(text);
  }, 600 + Math.random() * 400);
}

function buildSugs() {
  sugCont.innerHTML = '';
  SUGS.forEach(s => {
    const b = document.createElement('button');
    b.className = 'sug-chip'; b.textContent = s.label;
    b.onclick = () => send(s.msg);
    sugCont.appendChild(b);
  });
}

function openChat() {
  win.classList.add('open');
  document.querySelector('.chat-ping').style.display = 'none';
  if (!msgs.children.length) {
    setTimeout(() => {
      showTyping();
      setTimeout(() => {
        removeTyping();
        addMsg(`¡Ey! 👊 Soy el <span class="kw">buscador de Streetflow</span>. Dime qué buscas y te lo muestro al instante en pantalla.<br><br>Puedes escribir cosas como:<br>• <span class="kw">"busos talla M"</span><br>• <span class="kw">"gorras"</span><br>• <span class="kw">"sneakers talla 42"</span><br>• <span class="kw">"ofertas"</span>`, 'bot');
        buildSugs();
      }, 1000);
    }, 300);
  }
}

toggle.addEventListener('click', () => { win.classList.contains('open') ? win.classList.remove('open') : openChat(); });
closeBtn.addEventListener('click', () => win.classList.remove('open'));
sendBtn.addEventListener('click', () => send(inp.value));
inp.addEventListener('keydown', e => { if (e.key === 'Enter') send(inp.value); });
</script>
</body>
</html>