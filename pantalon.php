<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>STREETFLOW — Cargo & Joggers</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Space+Grotesk:wght@300;400;500;700&family=Syne:wght@400;700;800&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root {
  --black:      #080C08;
  --black2:     #0F140F;
  --black3:     #161C16;
  --card:       #111711;
  --green:      #14fff3;
  --green-dim:  #1DB80D;
  --green-dark: #0A4A05;
  --white:      #E8F5E4;
  --muted:      #5A7055;
  --border:     #1E2E1E;
  --border2:    #2A3D2A;
}
html { scroll-behavior: smooth; }
body { font-family: 'Space Grotesk', sans-serif; background: var(--black); color: var(--white); min-height: 100vh; overflow-x: hidden; }
::-webkit-scrollbar { width: 4px; }
::-webkit-scrollbar-track { background: var(--black2); }
::-webkit-scrollbar-thumb { background: var(--green-dark); border-radius: 2px; }

nav { background: rgba(8,12,8,0.96); backdrop-filter: blur(12px); padding: 0 2.5rem; display: flex; align-items: center; justify-content: space-between; height: 62px; position: sticky; top: 0; z-index: 100; border-bottom: 1px solid var(--border); }
.logo { font-family: 'Bebas Neue', sans-serif; font-size: 2rem; letter-spacing: 0.12em; color: var(--green); text-shadow: 0 0 18px rgba(57,255,20,0.55); user-select: none; text-decoration: none; }
.logo span { color: var(--white); }
nav ul { list-style: none; display: flex; gap: 2rem; }
nav ul a { color: var(--muted); text-decoration: none; font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; font-weight: 500; transition: color 0.2s; }
nav ul a:hover, nav ul a.active { color: var(--green); }

.ticker { background: var(--green); overflow: hidden; white-space: nowrap; padding: 8px 0; }
.ticker-inner { display: inline-block; animation: ticker 22s linear infinite; font-family: 'Bebas Neue', sans-serif; font-size: 0.95rem; letter-spacing: 0.22em; color: var(--black); }
@keyframes ticker { 0% { transform: translateX(100vw); } 100% { transform: translateX(-100%); } }

.cat-hero { min-height: 320px; background: var(--black2); display: flex; flex-direction: column; justify-content: flex-end; position: relative; overflow: hidden; border-bottom: 1px solid var(--border); padding: 3rem 4rem; }
.cat-hero::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse 60% 80% at 90% 50%, rgba(57,255,20,0.07) 0%, transparent 65%); pointer-events: none; }
.cat-hero::after { content: ''; position: absolute; inset: 0; background-image: repeating-linear-gradient(0deg, rgba(57,255,20,0.025) 0px, transparent 1px, transparent 60px, rgba(57,255,20,0.025) 60px), repeating-linear-gradient(90deg, rgba(57,255,20,0.025) 0px, transparent 1px, transparent 60px, rgba(57,255,20,0.025) 60px); pointer-events: none; }
.breadcrumb { font-size: 0.68rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted); margin-bottom: 1rem; position: relative; z-index: 1; }
.breadcrumb a { color: var(--green); text-decoration: none; }
.cat-hero h1 { font-family: 'Bebas Neue', sans-serif; font-size: 5rem; line-height: 0.92; letter-spacing: 0.05em; color: var(--white); position: relative; z-index: 1; }
.cat-hero h1 span { color: var(--green); text-shadow: 0 0 24px rgba(57,255,20,0.5); }
.cat-hero p { color: var(--muted); font-size: 0.9rem; max-width: 500px; margin-top: 1rem; line-height: 1.7; font-weight: 300; position: relative; z-index: 1; }
.cat-hero-gfx { position: absolute; right: 6rem; top: 50%; transform: translateY(-50%); font-size: 14rem; opacity: 0.05; filter: grayscale(1); user-select: none; animation: float 6s ease-in-out infinite; }
@keyframes float { 0%, 100% { transform: translateY(-50%) rotate(-3deg); } 50% { transform: translateY(calc(-50% - 18px)) rotate(3deg); } }
.cat-stats { display: flex; gap: 2.5rem; margin-top: 2rem; position: relative; z-index: 1; }
.cat-stat .num { font-family: 'Bebas Neue', sans-serif; font-size: 1.8rem; color: var(--green); line-height: 1; }
.cat-stat .lbl { font-size: 0.62rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--muted); }

.filter-bar { display: flex; align-items: center; gap: 1rem; padding: 1.2rem 2.5rem; background: var(--black2); border-bottom: 1px solid var(--border); overflow-x: auto; }
.filter-label { font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted); font-weight: 700; white-space: nowrap; font-family: 'Syne', sans-serif; }
.filter-btn { background: var(--card); border: 1px solid var(--border2); color: var(--muted); font-size: 0.7rem; letter-spacing: 0.12em; text-transform: uppercase; padding: 7px 16px; cursor: pointer; transition: all 0.2s; font-family: 'Syne', sans-serif; white-space: nowrap; clip-path: polygon(0 0, calc(100% - 6px) 0, 100% 6px, 100% 100%, 0 100%); }
.filter-btn:hover, .filter-btn.active { background: var(--green-dark); border-color: var(--green); color: var(--green); }
.filter-sep { width: 1px; height: 20px; background: var(--border); flex-shrink: 0; }
.results-count { margin-left: auto; font-size: 0.68rem; color: var(--muted); white-space: nowrap; }

.sec-hd { padding: 3.5rem 2.5rem 2rem; display: flex; align-items: flex-end; justify-content: space-between; max-width: 1200px; margin: 0 auto; }
.sec-hd h2 { font-family: 'Bebas Neue', sans-serif; font-size: 2.5rem; color: var(--white); letter-spacing: 0.06em; line-height: 1; }
.sec-hd h2 span { color: var(--green); }

.products-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1px; background: var(--border); max-width: 1200px; margin: 0 auto; padding: 0 2.5rem 4rem; }
.product-card { background: var(--card); cursor: pointer; transition: background 0.2s; position: relative; }
.product-card:hover { background: var(--black3); }
.product-img { height: 280px; display: flex; align-items: center; justify-content: center; background: var(--black3); position: relative; overflow: hidden; border-bottom: 1px solid var(--border); }
.img-placeholder { width: 100%; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 0.7rem; border: 2px dashed var(--border2); background: repeating-linear-gradient(45deg, var(--black3), var(--black3) 10px, rgba(57,255,20,0.015) 10px, rgba(57,255,20,0.015) 20px); }
/* CUANDO AGREGUES IMAGEN: reemplaza .img-placeholder por <img src="tu-imagen.jpg" alt="..." style="width:100%;height:100%;object-fit:cover;"> */
.img-placeholder .ph-icon { font-size: 2.5rem; opacity: 0.15; }
.img-placeholder .ph-text { font-size: 0.6rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted); opacity: 0.5; font-family: 'Syne', sans-serif; text-align: center; line-height: 1.5; }
.img-placeholder .ph-tag { font-size: 0.58rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--green); opacity: 0.4; font-family: 'Syne', sans-serif; border: 1px dashed var(--green-dark); padding: 3px 8px; }
.p-overlay { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; opacity: 0; transition: opacity 0.25s; background: rgba(8,12,8,0.4); }
.product-card:hover .p-overlay { opacity: 1; }
.p-quick { background: var(--green); color: var(--black); border: none; padding: 9px 20px; font-family: 'Syne', sans-serif; font-size: 0.68rem; letter-spacing: 0.16em; text-transform: uppercase; font-weight: 700; cursor: pointer; clip-path: polygon(0 0, calc(100% - 8px) 0, 100% 8px, 100% 100%, 0 100%); }
.badge { position: absolute; top: 10px; left: 10px; font-size: 0.58rem; letter-spacing: 0.18em; text-transform: uppercase; padding: 4px 9px; font-weight: 700; z-index: 1; font-family: 'Syne', sans-serif; }
.badge-new  { background: var(--green); color: var(--black); }
.badge-sale { background: #FF1414; color: #fff; }
.badge-hot  { background: var(--black); color: var(--green); border: 1px solid var(--green); }
.product-info { padding: 1rem 1.1rem 1.2rem; }
.product-info h4 { font-family: 'Syne', sans-serif; font-size: 0.92rem; font-weight: 700; color: var(--white); margin-bottom: 0.25rem; }
.product-sub { font-size: 0.68rem; color: var(--muted); letter-spacing: 0.12em; text-transform: uppercase; margin-bottom: 0.75rem; }
.product-footer { display: flex; align-items: center; justify-content: space-between; }
.price { font-family: 'Bebas Neue', sans-serif; font-size: 1.3rem; color: var(--green); letter-spacing: 0.04em; }
.price-old { font-size: 0.75rem; color: var(--muted); text-decoration: line-through; margin-left: 6px; }
.btn-add { background: transparent; border: 1px solid var(--green-dark); color: var(--green); font-size: 0.65rem; letter-spacing: 0.1em; text-transform: uppercase; padding: 6px 12px; cursor: pointer; transition: all 0.2s; font-family: 'Syne', sans-serif; font-weight: 700; }
.btn-add:hover { background: var(--green); color: var(--black); border-color: var(--green); }
.tallas-row { display: flex; gap: 5px; margin-bottom: 0.6rem; flex-wrap: wrap; }
.talla-chip { font-size: 0.6rem; padding: 3px 7px; border: 1px solid var(--border2); color: var(--muted); cursor: pointer; font-family: 'Syne', sans-serif; font-weight: 700; letter-spacing: 0.08em; transition: all 0.15s; }
.talla-chip:hover { border-color: var(--green); color: var(--green); }

.feature-band { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1px; background: var(--border); max-width: 1200px; margin: 0 auto; padding: 0 2.5rem 4rem; }
.feat-item { background: var(--card); padding: 1.8rem 1.5rem; display: flex; align-items: flex-start; gap: 1rem; }
.feat-icon { font-size: 1.5rem; flex-shrink: 0; line-height: 1; }
.feat-text strong { display: block; font-family: 'Syne', sans-serif; font-size: 0.82rem; font-weight: 700; color: var(--white); letter-spacing: 0.04em; margin-bottom: 0.3rem; }
.feat-text span { font-size: 0.72rem; color: var(--muted); line-height: 1.5; }

footer { background: var(--black); padding: 3.5rem 2.5rem 2rem; border-top: 1px solid var(--border); }
.footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 3rem; max-width: 1200px; margin: 0 auto 3rem; }
.footer-brand p { color: var(--muted); font-size: 0.8rem; line-height: 1.7; max-width: 240px; margin-top: 0.8rem; font-weight: 300; }
.footer-col h5 { color: var(--green); font-size: 0.65rem; letter-spacing: 0.25em; text-transform: uppercase; margin-bottom: 1.2rem; font-weight: 700; font-family: 'Syne', sans-serif; }
.footer-col ul { list-style: none; }
.footer-col li { margin-bottom: 0.6rem; }
.footer-col a { color: var(--muted); text-decoration: none; font-size: 0.82rem; transition: color 0.2s; }
.footer-col a:hover { color: var(--green); }
.footer-bottom { border-top: 1px solid var(--border); padding-top: 1.5rem; display: flex; align-items: center; justify-content: space-between; max-width: 1200px; margin: 0 auto; color: #2A402A; font-size: 0.72rem; letter-spacing: 0.1em; text-transform: uppercase; }

#chat-toggle { position: fixed; bottom: 28px; right: 28px; width: 60px; height: 60px; border-radius: 50%; background: var(--black2); border: 2px solid var(--green); cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 1.6rem; z-index: 9999; line-height: 1; box-shadow: 0 0 20px rgba(57,255,20,0.35), 0 4px 24px rgba(0,0,0,0.6); transition: transform 0.2s, box-shadow 0.2s; }
#chat-toggle:hover { transform: scale(1.08); box-shadow: 0 0 32px rgba(57,255,20,0.55), 0 6px 30px rgba(0,0,0,0.6); }
.chat-ping { position: absolute; top: -2px; right: -2px; width: 14px; height: 14px; border-radius: 50%; background: var(--green); border: 2px solid var(--black2); animation: ping 1.8s ease-in-out infinite; }
@keyframes ping { 0%, 100% { box-shadow: 0 0 0 0 rgba(57,255,20,0.6); } 50% { box-shadow: 0 0 0 6px rgba(57,255,20,0); } }
#chat-window { position: fixed; bottom: 102px; right: 28px; width: 370px; height: 540px; background: var(--black2); border: 1px solid var(--border2); border-radius: 4px; box-shadow: 0 0 40px rgba(57,255,20,0.12), 0 20px 60px rgba(0,0,0,0.7); z-index: 9998; display: flex; flex-direction: column; overflow: hidden; transform: scale(0.88) translateY(16px); opacity: 0; pointer-events: none; transition: transform 0.28s cubic-bezier(0.34,1.56,0.64,1), opacity 0.2s; }
#chat-window.open { transform: scale(1) translateY(0); opacity: 1; pointer-events: all; }
.chat-topbar { height: 2px; background: var(--green); flex-shrink: 0; box-shadow: 0 0 12px rgba(57,255,20,0.7); }
.chat-header { background: var(--card); padding: 12px 15px; display: flex; align-items: center; gap: 10px; flex-shrink: 0; border-bottom: 1px solid var(--border); }
.chat-avatar { width: 36px; height: 36px; border-radius: 4px; background: var(--green-dark); border: 1px solid var(--green); display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0; }
.chat-header-info { flex: 1; }
.chat-header-info strong { display: block; color: var(--white); font-size: 0.84rem; font-weight: 700; letter-spacing: 0.06em; font-family: 'Syne', sans-serif; }
.chat-online { display: flex; align-items: center; gap: 5px; font-size: 0.66rem; color: var(--green); letter-spacing: 0.08em; font-weight: 500; }
.chat-online::before { content: ''; width: 5px; height: 5px; border-radius: 50%; background: var(--green); box-shadow: 0 0 6px var(--green); display: inline-block; animation: glow 2s ease-in-out infinite; }
@keyframes glow { 0%, 100% { box-shadow: 0 0 4px var(--green); } 50% { box-shadow: 0 0 10px var(--green), 0 0 20px rgba(57,255,20,0.4); } }
.chat-close { background: none; border: none; color: var(--muted); cursor: pointer; font-size: 1rem; padding: 4px; display: flex; align-items: center; justify-content: center; transition: color 0.2s; line-height: 1; }
.chat-close:hover { color: var(--green); }
.chat-messages { flex: 1; overflow-y: auto; padding: 14px; display: flex; flex-direction: column; gap: 10px; scroll-behavior: smooth; }
.chat-messages::-webkit-scrollbar { width: 3px; }
.chat-messages::-webkit-scrollbar-thumb { background: var(--green-dark); border-radius: 2px; }
.msg { display: flex; gap: 8px; align-items: flex-end; }
.msg.bot { justify-content: flex-start; }
.msg.user { justify-content: flex-end; }
.msg-av { width: 26px; height: 26px; border-radius: 3px; background: var(--green-dark); border: 1px solid var(--green); display: flex; align-items: center; justify-content: center; font-size: 0.8rem; flex-shrink: 0; }
.bubble { max-width: 78%; padding: 10px 13px; font-size: 0.82rem; line-height: 1.55; }
.msg.bot .bubble { background: var(--card); color: var(--white); border: 1px solid var(--border); border-radius: 0 8px 8px 8px; }
.msg.user .bubble { background: var(--green-dark); color: var(--white); border: 1px solid rgba(57,255,20,0.3); border-radius: 8px 0 8px 8px; }
.bubble .kw { color: var(--green); font-weight: 700; font-style: italic; }
.msg-time { font-size: 0.6rem; color: #2A402A; margin-top: 2px; padding: 0 3px; }
.typing-indicator { display: flex; gap: 5px; padding: 12px 15px; background: var(--card); border: 1px solid var(--border); border-radius: 0 8px 8px 8px; width: fit-content; align-items: center; }
.tdot { width: 6px; height: 6px; border-radius: 50%; background: var(--green); animation: tb 1.2s infinite; }
.tdot:nth-child(2) { animation-delay: 0.2s; }
.tdot:nth-child(3) { animation-delay: 0.4s; }
@keyframes tb { 0%, 60%, 100% { transform: translateY(0); opacity: 0.6; } 30% { transform: translateY(-6px); opacity: 1; } }
.sug-wrap { padding: 10px 14px 12px; flex-shrink: 0; border-top: 1px solid var(--border); background: var(--black3); }
.sug-label { font-size: 0.62rem; color: var(--muted); letter-spacing: 0.15em; text-transform: uppercase; margin-bottom: 8px; font-weight: 700; font-family: 'Syne', sans-serif; }
.suggestions { display: flex; flex-wrap: wrap; gap: 6px; }
.sug-chip { background: var(--card); border: 1px solid var(--border2); color: var(--white); font-size: 0.72rem; padding: 6px 12px; border-radius: 2px; cursor: pointer; transition: all 0.15s; font-family: 'Space Grotesk', sans-serif; white-space: nowrap; clip-path: polygon(0 0, calc(100% - 6px) 0, 100% 6px, 100% 100%, 0 100%); }
.sug-chip:hover { background: var(--green-dark); border-color: var(--green); color: var(--green); transform: translateY(-1px); }
.chat-input-row { display: flex; gap: 8px; padding: 11px 14px; border-top: 1px solid var(--border); background: var(--card); flex-shrink: 0; align-items: center; }
.chat-input-row input { flex: 1; border: 1px solid var(--border2); border-radius: 2px; padding: 9px 13px; font-family: 'Space Grotesk', sans-serif; font-size: 0.82rem; outline: none; color: var(--white); background: var(--black2); transition: border-color 0.2s; }
.chat-input-row input:focus { border-color: var(--green); }
.chat-input-row input::placeholder { color: var(--muted); }
.chat-send { width: 38px; height: 38px; border-radius: 2px; background: var(--green); border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 0.9rem; color: var(--black); font-weight: 900; transition: all 0.2s; clip-path: polygon(0 0, calc(100% - 7px) 0, 100% 7px, 100% 100%, 0 100%); }
.chat-send:hover { background: #4fff28; transform: scale(1.04); }

@media (max-width: 960px) {
  .products-grid { grid-template-columns: 1fr 1fr; }
  .feature-band { grid-template-columns: 1fr 1fr; }
  .footer-grid { grid-template-columns: 1fr 1fr; }
  .cat-hero { padding: 2rem; }
  .cat-hero h1 { font-size: 3.5rem; }
}
@media (max-width: 580px) {
  .products-grid { grid-template-columns: 1fr; }
  nav ul { display: none; }
  #chat-window { width: calc(100vw - 20px); right: 10px; bottom: 92px; }
  .cat-hero h1 { font-size: 2.8rem; }
}
</style>
</head>
<body>

<nav>
  <a href="index.php" class="logo">STREET<span>FLOW</span></a>
  <ul>
    <li><a href="index.php">Inicio</a></li>
    <li><a href="ropa.php">Busos & Chaquetas</a></li>
    <li><a href="pantalon.php" class="active">Cargos & Joggers</a></li>
    <li><a href="zapato.php">Calzado & Accesorios</a></li>
    <li><a href="#">Sale</a></li>
  </ul>
</nav>

<div class="ticker">
  <span class="ticker-inner">CARGO PANTS · JOGGERS · BAGGY · PANTALONETAS · WIDE LEG · STREETWEAR · DROP SS2026 · ENVÍO GRATIS +$200.000 · CARGO PANTS · JOGGERS · BAGGY · WIDE LEG ·</span>
</div>

<section class="cat-hero">
  <div class="cat-hero-gfx">👖</div>
  <div class="breadcrumb"><a href="index.php">Inicio</a> &nbsp;/&nbsp; Cargo & Joggers</div>
  <h1>CARGO &<br><span>JOGGERS</span></h1>
  <p>Pantalones para dominar la calle. Cargos baggy, joggers de corte amplio y pantalonetas urbanas con el mejor fit del mercado.</p>
  <div class="cat-stats">
    <div class="cat-stat"><div class="num">38</div><div class="lbl">Prendas</div></div>
    <div class="cat-stat"><div class="num">6</div><div class="lbl">Estilos</div></div>
    <div class="cat-stat"><div class="num">XS–XXL</div><div class="lbl">Tallas</div></div>
  </div>
</section>

<div class="filter-bar">
  <span class="filter-label">Filtrar:</span>
  <button class="filter-btn active">Todos</button>
  <button class="filter-btn">Cargos</button>
  <button class="filter-btn">Joggers</button>
  <button class="filter-btn">Pantalonetas</button>
  <button class="filter-btn">Baggy</button>
  <div class="filter-sep"></div>
  <button class="filter-btn">Ofertas</button>
  <button class="filter-btn">Nuevo</button>
  <span class="results-count">8 productos encontrados</span>
</div>

<!-- CARGOS -->
<div class="sec-hd"><h2>CARGO <span>// PANTS</span></h2></div>
<div class="products-grid" style="padding-bottom:0;">

  <!-- PRODUCTO 1 -->
  <div class="product-card">
    <div class="product-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/cargo-wide.jpg" alt="Cargo Pants Wide" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <span class="ph-icon">📷</span>
        <span class="ph-text">Cargo Pants Wide<br>Agrega tu imagen aquí</span>
        <span class="ph-tag">imagenes/cargo-wide.jpg</span>
      </div>
      <span class="badge badge-sale">−30%</span>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Cargo Pants Wide</h4>
      <p class="product-sub">Hombre · Baggy</p>
      <div class="tallas-row">
        <span class="talla-chip">28</span><span class="talla-chip">30</span><span class="talla-chip">32</span><span class="talla-chip">34</span><span class="talla-chip">36</span>
      </div>
      <div class="product-footer">
        <div><span class="price">$175.000</span><span class="price-old">$250.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

  <!-- PRODUCTO 2 -->
  <div class="product-card">
    <div class="product-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/cargo-tactical.jpg" alt="Cargo Tactical" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <span class="ph-icon">📷</span>
        <span class="ph-text">Cargo Tactical<br>Agrega tu imagen aquí</span>
        <span class="ph-tag">imagenes/cargo-tactical.jpg</span>
      </div>
      <span class="badge badge-hot">Hot</span>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Cargo Tactical</h4>
      <p class="product-sub">Unisex · Street</p>
      <div class="tallas-row">
        <span class="talla-chip">28</span><span class="talla-chip">30</span><span class="talla-chip">32</span><span class="talla-chip">34</span><span class="talla-chip">36</span>
      </div>
      <div class="product-footer">
        <div><span class="price">$210.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

  <!-- PRODUCTO 3 -->
  <div class="product-card">
    <div class="product-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/cargo-denim.jpg" alt="Cargo Denim" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <span class="ph-icon">📷</span>
        <span class="ph-text">Cargo Denim<br>Agrega tu imagen aquí</span>
        <span class="ph-tag">imagenes/cargo-denim.jpg</span>
      </div>
      <span class="badge badge-new">Nuevo</span>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Cargo Denim Washed</h4>
      <p class="product-sub">Unisex · Urban</p>
      <div class="tallas-row">
        <span class="talla-chip">28</span><span class="talla-chip">30</span><span class="talla-chip">32</span><span class="talla-chip">34</span>
      </div>
      <div class="product-footer">
        <div><span class="price">$229.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

  <!-- PRODUCTO 4 -->
  <div class="product-card">
    <div class="product-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/cargo-slim.jpg" alt="Cargo Slim" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <span class="ph-icon">📷</span>
        <span class="ph-text">Cargo Slim<br>Agrega tu imagen aquí</span>
        <span class="ph-tag">imagenes/cargo-slim.jpg</span>
      </div>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Cargo Slim Fit</h4>
      <p class="product-sub">Hombre · Essentials</p>
      <div class="tallas-row">
        <span class="talla-chip">28</span><span class="talla-chip">30</span><span class="talla-chip">32</span><span class="talla-chip">34</span><span class="talla-chip">36</span>
      </div>
      <div class="product-footer">
        <div><span class="price">$185.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

</div>

<!-- JOGGERS Y PANTALONETAS -->
<div class="sec-hd"><h2>JOGGERS <span>// PANTALONETAS</span></h2></div>
<div class="products-grid">

  <!-- PRODUCTO 5 -->
  <div class="product-card">
    <div class="product-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/jogger-fleece.jpg" alt="Jogger Fleece" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <span class="ph-icon">📷</span>
        <span class="ph-text">Jogger Fleece<br>Agrega tu imagen aquí</span>
        <span class="ph-tag">imagenes/jogger-fleece.jpg</span>
      </div>
      <span class="badge badge-hot">Hot</span>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Jogger Fleece Oversized</h4>
      <p class="product-sub">Unisex · Comfort</p>
      <div class="tallas-row">
        <span class="talla-chip">XS</span><span class="talla-chip">S</span><span class="talla-chip">M</span><span class="talla-chip">L</span><span class="talla-chip">XL</span>
      </div>
      <div class="product-footer">
        <div><span class="price">$155.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

  <!-- PRODUCTO 6 -->
  <div class="product-card">
    <div class="product-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/jogger-tech.jpg" alt="Jogger Tech" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <span class="ph-icon">📷</span>
        <span class="ph-text">Jogger Tech<br>Agrega tu imagen aquí</span>
        <span class="ph-tag">imagenes/jogger-tech.jpg</span>
      </div>
      <span class="badge badge-new">Drop</span>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Jogger Tech Ripstop</h4>
      <p class="product-sub">Unisex · Sport</p>
      <div class="tallas-row">
        <span class="talla-chip">S</span><span class="talla-chip">M</span><span class="talla-chip">L</span><span class="talla-chip">XL</span><span class="talla-chip">XXL</span>
      </div>
      <div class="product-footer">
        <div><span class="price">$178.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

  <!-- PRODUCTO 7 — PANTALONETA -->
  <div class="product-card">
    <div class="product-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/pantaloneta-cargo.jpg" alt="Pantaloneta Cargo" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <span class="ph-icon">📷</span>
        <span class="ph-text">Pantaloneta Cargo<br>Agrega tu imagen aquí</span>
        <span class="ph-tag">imagenes/pantaloneta-cargo.jpg</span>
      </div>
      <span class="badge badge-sale">−15%</span>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Pantaloneta Cargo Street</h4>
      <p class="product-sub">Hombre · Summer</p>
      <div class="tallas-row">
        <span class="talla-chip">S</span><span class="talla-chip">M</span><span class="talla-chip">L</span><span class="talla-chip">XL</span>
      </div>
      <div class="product-footer">
        <div><span class="price">$89.000</span><span class="price-old">$105.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

  <!-- PRODUCTO 8 — PANTALONETA -->
  <div class="product-card">
    <div class="product-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/pantaloneta-baggy.jpg" alt="Pantaloneta Baggy" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <span class="ph-icon">📷</span>
        <span class="ph-text">Pantaloneta Baggy<br>Agrega tu imagen aquí</span>
        <span class="ph-tag">imagenes/pantaloneta-baggy.jpg</span>
      </div>
      <span class="badge badge-hot">Hot</span>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Pantaloneta Baggy Mesh</h4>
      <p class="product-sub">Unisex · Urban</p>
      <div class="tallas-row">
        <span class="talla-chip">XS</span><span class="talla-chip">S</span><span class="talla-chip">M</span><span class="talla-chip">L</span><span class="talla-chip">XL</span>
      </div>
      <div class="product-footer">
        <div><span class="price">$95.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

</div>

<div class="sec-hd" style="padding-top:3rem;"><h2>POR QUÉ <span>// STREETFLOW</span></h2></div>
<div class="feature-band">
  <div class="feat-item"><span class="feat-icon">🚀</span><div class="feat-text"><strong>Envío Express</strong><span>24h para Bogotá, Medellín y Cali</span></div></div>
  <div class="feat-item"><span class="feat-icon">🔄</span><div class="feat-text"><strong>30 días de cambios</strong><span>Sin rollos. Si no te queda, lo cambiamos.</span></div></div>
  <div class="feat-item"><span class="feat-icon">🛡️</span><div class="feat-text"><strong>Calidad garantizada</strong><span>Materiales premium seleccionados a mano</span></div></div>
  <div class="feat-item"><span class="feat-icon">💳</span><div class="feat-text"><strong>Pagos flexibles</strong><span>Cuotas sin interés, Nequi, PSE y más</span></div></div>
</div>

<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <span class="logo" style="display:block;margin-bottom:0.2rem;">STREET<span style="color:var(--white)">FLOW</span></span>
      <p>Moda urbana sin filtros. Diseñada para los que viven la calle, la crean y la representan.</p>
    </div>
    <div class="footer-col"><h5>Tienda</h5><ul><li><a href="ropa.php">Hoodies</a></li><li><a href="pantalon.php">Cargos</a></li><li><a href="zapato.php">Calzado</a></li><li><a href="zapato.php">Accesorios</a></li></ul></div>
    <div class="footer-col"><h5>Ayuda</h5><ul><li><a href="#">Guía de tallas</a></li><li><a href="#">Envíos</a></li><li><a href="#">Devoluciones</a></li><li><a href="#">Contacto</a></li></ul></div>
    <div class="footer-col"><h5>Marca</h5><ul><li><a href="#">Nosotros</a></li><li><a href="#">Lookbook</a></li><li><a href="#">Instagram</a></li><li><a href="#">TikTok</a></li></ul></div>
  </div>
  <div class="footer-bottom"><span>© 2026 Streetflow. Todos los derechos reservados.</span><span>Hecho con flow 🟢</span></div>
</footer>

<button id="chat-toggle" title="Abrir asistente">🤖<div class="chat-ping"></div></button>
<div id="chat-window">
  <div class="chat-topbar"></div>
  <div class="chat-header">
    <div class="chat-avatar">🤖</div>
    <div class="chat-header-info">
      <strong>ASISTENTE VIRTUAL</strong>
      <span class="chat-online">En línea ahora</span>
    </div>
    <button class="chat-close" id="chat-close">✕</button>
  </div>
  <div class="chat-messages" id="chat-messages"></div>
  <div class="sug-wrap" id="sug-wrap">
    <div class="sug-label">Preguntas rápidas</div>
    <div class="suggestions" id="sug-container"></div>
  </div>
  <div class="chat-input-row">
    <input type="text" id="chat-input" placeholder="Escribe tu pregunta..." autocomplete="off">
    <button class="chat-send" id="chat-send">➤</button>
  </div>
</div>

<script>
document.querySelectorAll('.filter-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    this.classList.add('active');
  });
});
document.querySelectorAll('.talla-chip').forEach(chip => {
  chip.addEventListener('click', function() {
    const row = this.closest('.tallas-row');
    row.querySelectorAll('.talla-chip').forEach(c => { c.style.borderColor=''; c.style.color=''; });
    this.style.borderColor = 'var(--green)';
    this.style.color = 'var(--green)';
  });
});

const SUGS = [
  { label: "👖 Ver cargos",           msg: "cargo" },
  { label: "🩳 Pantalonetas",         msg: "pantaloneta" },
  { label: "📏 Guía de tallas",       msg: "talla" },
  { label: "🚚 Info de envíos",       msg: "envio" },
  { label: "💳 Formas de pago",       msg: "pago" },
  { label: "🔥 Ver ofertas",          msg: "oferta" },
];

const RULES = [
  { k: ["hola","hey","buenas","saludos","que mas","ola"], r: `¡Ey! 👊 Estás en <span class="kw">Cargo & Joggers</span>. ¿Buscas un pantalón <span class="kw">cargo</span>, un <span class="kw">jogger</span> o una <span class="kw">pantaloneta</span>? Cuéntame y te ayudo a elegir.` },
  { k: ["novedad","nuevo","drop","coleccion"], r: `🔥 Lo nuevo: <span class="kw">Cargo Denim Washed</span> ($229K) y el <span class="kw">Jogger Tech Ripstop</span> ($178K). El <span class="kw">Cargo Wide</span> también sigue disponible con el 30% off.` },
  { k: ["talla","medida","queda","fit","size","cintura"], r: `📏 Para los cargos manejamos tallas de cintura <span class="kw">28 al 36</span>. Para joggers usamos <span class="kw">XS al XXL</span>. ¿De qué prenda necesitas la medida? Te oriento.` },
  { k: ["envio","envío","domicilio","entrega","despacho"], r: `🚚 Envíos a toda Colombia. <span class="kw">GRATIS</span> desde $200.000. Express en <span class="kw">24h</span> para Bogotá, Medellín y Cali.` },
  { k: ["devolucion","cambio","garantia"], r: `🔄 <span class="kw">30 días</span> para cambiar sin rollos. Etiqueta original y sin uso. Escribe <span class="kw">contacto</span> para iniciar.` },
  { k: ["pago","tarjeta","nequi","pse","cuota"], r: `💳 Aceptamos <span class="kw">Visa/Mastercard</span>, PSE, <span class="kw">Nequi</span>, Daviplata y efectivo. Hasta <span class="kw">12 cuotas sin interés</span>.` },
  { k: ["oferta","descuento","sale","promo","rebaja"], r: `🏷️ Ofertas activas: <span class="kw">Cargo Pants Wide</span> al −30% ($175K) y <span class="kw">Pantaloneta Cargo Street</span> al −15% ($89K).` },
  { k: ["cargo","pantalon","pantalón","baggy"], r: `👖 Tenemos <span class="kw">Cargo Wide</span> ($175K con 30% off), <span class="kw">Cargo Tactical</span> ($210K), <span class="kw">Cargo Denim</span> ($229K) y <span class="kw">Cargo Slim</span> ($185K). ¿Cuál te llama?` },
  { k: ["jogger","jogging","sport"], r: `🏃 El <span class="kw">Jogger Fleece Oversized</span> a $155K es el más popular. El <span class="kw">Jogger Tech Ripstop</span> ($178K) es ideal si buscas algo más técnico. ¿Necesitas la talla?` },
  { k: ["pantaloneta","short","corto","bermuda"], r: `🩳 Tenemos la <span class="kw">Pantaloneta Cargo Street</span> al −15% ($89K) y la <span class="kw">Pantaloneta Baggy Mesh</span> ($95K). Perfectas para el verano urbano.` },
  { k: ["comprar","agregar","carrito","quiero"], r: `🛒 Selecciona tu talla, haz clic en <span class="kw">+ Carrito</span> y elige tu <span class="kw">pago</span>. ¿Dudas con el envío? Escribe <span class="kw">envio</span>.` },
  { k: ["contacto","whatsapp","hablar","humano"], r: `📞 <span class="kw">WhatsApp: 300-000-0000</span> o Instagram <span class="kw">@streetflow.co</span>. Respuesta en menos de 2h hábiles.` },
];

const DEFAULT = `Mmmh 🤔 Puedo ayudarte con: <span class="kw">cargo</span>, <span class="kw">jogger</span>, <span class="kw">pantaloneta</span>, <span class="kw">talla</span>, <span class="kw">envio</span>, <span class="kw">pago</span> u <span class="kw">oferta</span>. Escribe alguna y te cuento.`;

const toggle=document.getElementById('chat-toggle'), win=document.getElementById('chat-window'), closeBtn=document.getElementById('chat-close'), msgs=document.getElementById('chat-messages'), input=document.getElementById('chat-input'), sendBtn=document.getElementById('chat-send'), sugWrap=document.getElementById('sug-wrap'), sugCont=document.getElementById('sug-container');
function time(){const d=new Date();return String(d.getHours()).padStart(2,'0')+':'+String(d.getMinutes()).padStart(2,'0');}
function addMsg(html,side){const div=document.createElement('div');div.className='msg '+side;div.innerHTML=side==='bot'?`<div class="msg-av">🤖</div><div><div class="bubble">${html}</div><div class="msg-time">${time()}</div></div>`:`<div><div class="bubble">${html}</div><div class="msg-time" style="text-align:right">${time()}</div></div>`;msgs.appendChild(div);msgs.scrollTop=msgs.scrollHeight;}
function showTyping(){const d=document.createElement('div');d.className='msg bot';d.id='typing';d.innerHTML=`<div class="msg-av">🤖</div><div class="typing-indicator"><div class="tdot"></div><div class="tdot"></div><div class="tdot"></div></div>`;msgs.appendChild(d);msgs.scrollTop=msgs.scrollHeight;}
function removeTyping(){const t=document.getElementById('typing');if(t)t.remove();}
function normalize(s){return s.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g,'');}
function getReply(text){const n=normalize(text);for(const r of RULES){if(r.k.some(k=>n.includes(normalize(k))))return r.r;}return DEFAULT;}
function send(text){if(!text.trim())return;addMsg(text,'user');input.value='';sugWrap.style.display='none';showTyping();setTimeout(()=>{removeTyping();addMsg(getReply(text),'bot');},700+Math.random()*600);}
function buildSugs(){sugCont.innerHTML='';SUGS.forEach(s=>{const b=document.createElement('button');b.className='sug-chip';b.textContent=s.label;b.onclick=()=>send(s.msg);sugCont.appendChild(b);});}
function openChat(){win.classList.add('open');document.querySelector('.chat-ping').style.display='none';if(!msgs.children.length){setTimeout(()=>{showTyping();setTimeout(()=>{removeTyping();addMsg(`¡Ey! 👊 Estás en <span class="kw">Cargo & Joggers</span>. Te ayudo a encontrar el pantalón perfecto. ¿Buscas un <span class="kw">cargo</span>, <span class="kw">jogger</span> o <span class="kw">pantaloneta</span>?`,'bot');buildSugs();},1100);},300);}}
toggle.addEventListener('click',()=>{win.classList.contains('open')?win.classList.remove('open'):openChat();});
closeBtn.addEventListener('click',()=>win.classList.remove('open'));
sendBtn.addEventListener('click',()=>send(input.value));
input.addEventListener('keydown',e=>{if(e.key==='Enter')send(input.value);});
</script>
</body>
</html>