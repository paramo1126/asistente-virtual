<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>STREETFLOW — Calzado & Accesorios</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Space+Grotesk:wght@300;400;500;700&family=Syne:wght@400;700;800&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
:root {
  --black:      #69696986;
  --black2:     #746b6b;
  --black3:     #5c5c5c;
  --card:       #5e5858de;
  --green:      #161616;
  --green-dim:  #1f60ec;
  --green-dark: #000000;
  --white:      #ffffff;
  --muted:      #ffffff;
  --border:     #030303;
  --border2:    #070707;
}
html { scroll-behavior: smooth; }
body { font-family: 'Space Grotesk', sans-serif; background: var(--black); color: var(--white); min-height: 100vh; overflow-x: hidden; }
::-webkit-scrollbar { width: 4px; }
::-webkit-scrollbar-track { background: var(--black2); }
::-webkit-scrollbar-thumb { background: var(--green-dark); border-radius: 2px; }

nav { background:rgba(50, 56, 55, 0.8); ; backdrop-filter: blur(12px); padding: 0 2.5rem; display: flex; align-items: center; justify-content: space-between; height: 62px; position: sticky; top: 0; z-index: 100; border-bottom: 1px solid var(--border); }
.logo { font-family: 'Bebas Neue', sans-serif; font-size: 2rem; letter-spacing: 0.12em; color: var(--white); text-shadow: none; user-select: none; text-decoration: none; }
.logo span { color: #a0a0a0; }
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
.cat-hero h1 span { color: var(--white); text-shadow: none; }
.cat-hero p { color: var(--muted); font-size: 0.9rem; max-width: 500px; margin-top: 1rem; line-height: 1.7; font-weight: 300; position: relative; z-index: 1; }
.cat-hero-gfx { position: absolute; right: 6rem; top: 50%; transform: translateY(-50%); font-size: 14rem; opacity: 0.05; filter: grayscale(1); user-select: none; animation: float 6s ease-in-out infinite; }
@keyframes float { 0%, 100% { transform: translateY(-50%) rotate(-3deg); } 50% { transform: translateY(calc(-50% - 18px)) rotate(3deg); } }
.cat-stats { display: flex; gap: 2.5rem; margin-top: 2rem; position: relative; z-index: 1; }
.cat-stat .num { font-family: 'Bebas Neue', sans-serif; font-size: 1.8rem; color: var(--green); line-height: 1; }
.cat-stat .lbl { font-size: 0.62rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--muted); }

.filter-bar { display: flex; align-items: center; gap: 1rem; padding: 1.2rem 2.5rem; background: var(--black2); border-bottom: 1px solid var(--border); overflow-x: auto; }
.filter-label { font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted); font-weight: 700; white-space: nowrap; font-family: 'Syne', sans-serif; }
.filter-btn { background: #5e5858; border: 1px solid #333333; color: #b0b0b0; font-size: 0.7rem; letter-spacing: 0.12em; text-transform: uppercase; padding: 7px 16px; cursor: pointer; transition: all 0.2s; font-family: 'Syne', sans-serif; white-space: nowrap; clip-path: polygon(0 0, calc(100% - 6px) 0, 100% 6px, 100% 100%, 0 100%); }
.filter-btn:hover, .filter-btn.active { background: #0a2a06; border-color: #39ff14; color: #39ff14; }
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

/* GRID DE ACCESORIOS — 4 col también */
.accesorios-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1px; background: var(--border); max-width: 1200px; margin: 0 auto; padding: 0 2.5rem 4rem; }
.acc-card { background: var(--card); cursor: pointer; transition: background 0.2s; position: relative; }
.acc-card:hover { background: var(--black3); }
.acc-img { height: 220px; display: flex; align-items: center; justify-content: center; background: var(--black3); position: relative; overflow: hidden; border-bottom: 1px solid var(--border); }

.feature-band { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1px; background: var(--border); max-width: 1200px; margin: 0 auto; padding: 0 2.5rem 4rem; }
.feat-item { background: var(--card); padding: 1.8rem 1.5rem; display: flex; align-items: flex-start; gap: 1rem; }
.feat-icon { font-size: 1.5rem; flex-shrink: 0; line-height: 1; }
.feat-text strong { display: block; font-family: 'Syne', sans-serif; font-size: 0.82rem; font-weight: 700; color: var(--white); margin-bottom: 0.3rem; }
.feat-text span { font-size: 0.72rem; color: var(--muted); line-height: 1.5; }

footer { background: var(--black); padding: 3.5rem 2.5rem 2rem; border-top: 1px solid var(--border); }
.footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 3rem; max-width: 1200px; margin: 0 auto 3rem; }
.footer-brand p { color: var(--muted); font-size: 0.8rem; line-height: 1.7; max-width: 240px; margin-top: 0.8rem; }
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
.bubble .kw { color: #ffe600f5; font-weight: 700; font-style: italic; }
.msg-time { font-size: 0.6rem; color: #ffffff; margin-top: 2px; padding: 0 3px; align-self: flex-end; }


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
.chat-send:hover { background: #a6aca4; transform: scale(1.04); }

@media (max-width: 960px) {
  .products-grid, .accesorios-grid { grid-template-columns: 1fr 1fr; }
  .feature-band { grid-template-columns: 1fr 1fr; }
  .footer-grid { grid-template-columns: 1fr 1fr; }
  .cat-hero { padding: 2rem; }
  .cat-hero h1 { font-size: 3.5rem; }
}
@media (max-width: 580px) {
  .products-grid, .accesorios-grid { grid-template-columns: 1fr; }
  nav ul { display: none; }
  #chat-window { width: calc(100vw - 20px); right: 10px; bottom: 92px; }
  .cat-hero h1 { font-size: 2.8rem; }
}
</style>
</head>
<body>

<nav>
  <a href="streetflow.php" class="logo">STREET<span>FLOW</span></a>
  <ul>
    <li><a href="streetflow.php">Inicio</a></li>
    <li><a href="ropa.php">Busos & Chaquetas</a></li>
    <li><a href="pantalon.php">Cargos & Joggers</a></li>
    <li><a href="zapato.php" class="active">Calzado & Accesorios</a></li>
    <li><a href="#">Sale</a></li>
  </ul>
</nav>

<section class="cat-hero">
  <div class="breadcrumb"><a href="index.php">Inicio</a> &nbsp;/&nbsp; Calzado & Accesorios</div>
  <h1>CALZADO &<br><span>ACCESORIOS</span></h1>
  <p>Completa tu look. Sneakers chunky, relojes urbanos, gorras de colección, collares y más para los que no se pierden un detalle.</p>
  <div class="cat-stats">
    <div class="cat-stat"><div class="num">65</div><div class="lbl">Estilos</div></div>
    <div class="cat-stat"><div class="num">12</div><div class="lbl">Categorías</div></div>
    <div class="cat-stat"><div class="num">36–45</div><div class="lbl">Tallas calzado</div></div>
  </div>
</section>

<div class="filter-bar">
  <span class="filter-label">Filtrar:</span>
  <button class="filter-btn active">Todo</button>
  <button class="filter-btn">Calzado</button>
  <button class="filter-btn">Gorras</button>
  <button class="filter-btn">Relojes</button>
  <button class="filter-btn">Collares</button>
  <button class="filter-btn">Mochilas</button>
  <div class="filter-sep"></div>
  <button class="filter-btn">Ofertas</button>
  <button class="filter-btn">Nuevo</button>
  <span class="results-count">12 productos encontrados</span>
</div>

<!-- CALZADO -->
<div class="sec-hd"><h2>CALZADO <span>// KICKS</span></h2></div>
<div class="products-grid" style="padding-bottom:0;">

  <!-- PRODUCTO 1 -->
  <div class="product-card" data-cat="calzado" data-badge="nuevo">
    <div class="product-img">
      <div class="img-placeholder">
      </div>
      <span class="badge badge-new">Drop</span>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Sneaker Chunky</h4>
      <p class="product-sub">Calzado · Urbano</p>
      <div class="tallas-row">
        <span class="talla-chip">36</span><span class="talla-chip">37</span><span class="talla-chip">38</span><span class="talla-chip">39</span><span class="talla-chip">40</span><span class="talla-chip">41</span><span class="talla-chip">42</span><span class="talla-chip">43</span><span class="talla-chip">44</span><span class="talla-chip">45</span>
      </div>
      <div class="product-footer">
        <div><span class="price">$320.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

  <!-- PRODUCTO 2 -->
  <div class="product-card" data-cat="calzado" data-badge="ofertas">
    <div class="product-img">
      <img src="imagenes/zapatos2.jpg" alt="Sneaker Low Top" style="width:100%;height:100%;object-fit:cover;object-position:center;">
      <span class="badge badge-sale">−20%</span>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Sneaker Low Top Classic</h4>
      <p class="product-sub">Calzado · Essentials</p>
      <div class="tallas-row">
        <span class="talla-chip">36</span><span class="talla-chip">37</span><span class="talla-chip">38</span><span class="talla-chip">39</span><span class="talla-chip">40</span><span class="talla-chip">41</span><span class="talla-chip">42</span><span class="talla-chip">43</span>
      </div>
      <div class="product-footer">
        <div><span class="price">$220.000</span><span class="price-old">$275.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

  <!-- PRODUCTO 3 -->
  <div class="product-card" data-cat="calzado" data-badge="">
    <div class="product-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/bota-urbana.jpg" alt="Bota Urbana" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <span class="ph-icon">📷</span>
        <span class="ph-text">Bota Urbana<br>Agrega tu imagen aquí</span>
        <span class="ph-tag">imagenes/bota-urbana.jpg</span>
      </div>
      <span class="badge badge-hot">Hot</span>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Bota Urbana Combat</h4>
      <p class="product-sub">Calzado · Street</p>
      <div class="tallas-row">
        <span class="talla-chip">38</span><span class="talla-chip">39</span><span class="talla-chip">40</span><span class="talla-chip">41</span><span class="talla-chip">42</span><span class="talla-chip">43</span><span class="talla-chip">44</span>
      </div>
      <div class="product-footer">
        <div><span class="price">$285.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

  <!-- PRODUCTO 4 -->
  <div class="product-card" data-cat="calzado" data-badge="">
    <div class="product-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/slide-urban.jpg" alt="Slide Urban" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <span class="ph-icon">📷</span>
        <span class="ph-text">Slide Urban<br>Agrega tu imagen aquí</span>
        <span class="ph-tag">imagenes/slide-urban.jpg</span>
      </div>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Slide Urban Premium</h4>
      <p class="product-sub">Calzado · Casual</p>
      <div class="tallas-row">
        <span class="talla-chip">36</span><span class="talla-chip">38</span><span class="talla-chip">40</span><span class="talla-chip">42</span><span class="talla-chip">44</span>
      </div>
      <div class="product-footer">
        <div><span class="price">$98.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

</div>

<!-- ACCESORIOS: RELOJES, GORRAS, COLLARES -->
<div class="sec-hd"><h2>ACCESORIOS <span>// DRIP</span></h2></div>
<div class="accesorios-grid">

  <!-- GORRA 1 -->
  <div class="acc-card product-card" data-cat="gorras" data-badge="">
    <div class="product-img acc-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/snapback-cap.jpg" alt="Snapback Cap" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <span class="ph-icon">📷</span>
        <span class="ph-text">Snapback Cap<br>Agrega tu imagen aquí</span>
        <span class="ph-tag">imagenes/snapback-cap.jpg</span>
      </div>
      <span class="badge badge-hot">Hot</span>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Snapback Cap Logo</h4>
      <p class="product-sub">Gorras · Urban</p>
      <div class="product-footer">
        <div><span class="price">$65.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

  <!-- GORRA 2 -->
  <div class="acc-card product-card" data-cat="gorras" data-badge="nuevo">
    <div class="product-img acc-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/bucket-hat.jpg" alt="Bucket Hat" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <span class="ph-icon">📷</span>
        <span class="ph-text">Bucket Hat<br>Agrega tu imagen aquí</span>
        <span class="ph-tag">imagenes/bucket-hat.jpg</span>
      </div>
      <span class="badge badge-new">Nuevo</span>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Bucket Hat Reversible</h4>
      <p class="product-sub">Gorras · Street</p>
      <div class="product-footer">
        <div><span class="price">$72.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

  <!-- RELOJ 1 -->
  <div class="acc-card product-card" data-cat="relojes" data-badge="nuevo">
    <div class="product-img acc-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/reloj-street.jpg" alt="Reloj Street" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <span class="ph-icon">📷</span>
        <span class="ph-text">Reloj Street<br>Agrega tu imagen aquí</span>
        <span class="ph-tag">imagenes/reloj-street.jpg</span>
      </div>
      <span class="badge badge-new">Drop</span>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Reloj Street Digital</h4>
      <p class="product-sub">Relojes · Urban</p>
      <div class="product-footer">
        <div><span class="price">$185.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

  <!-- RELOJ 2 -->
  <div class="acc-card product-card" data-cat="relojes" data-badge="">
    <div class="product-img acc-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/reloj-chain.jpg" alt="Reloj Chain" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <span class="ph-icon">📷</span>
        <span class="ph-text">Reloj Chain<br>Agrega tu imagen aquí</span>
        <span class="ph-tag">imagenes/reloj-chain.jpg</span>
      </div>
      <span class="badge badge-hot">Hot</span>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Reloj Chain Oversized</h4>
      <p class="product-sub">Relojes · Premium</p>
      <div class="product-footer">
        <div><span class="price">$245.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

  <!-- COLLAR 1 -->
  <div class="acc-card product-card" data-cat="collares" data-badge="ofertas">
    <div class="product-img acc-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/collar-chain.jpg" alt="Collar Chain" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <img src="imagenes/adidas.jpg" alt="">
      </div>
      <span class="badge badge-sale">−15%</span>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Collar Chain Street</h4>
      <p class="product-sub">Collares · Gold</p>
      <div class="product-footer">
        <div><span class="price">$45.000</span><span class="price-old">$53.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

  <!-- COLLAR 2 -->
  <div class="acc-card product-card" data-cat="collares" data-badge="">
    <div class="product-img acc-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/collar-pendant.jpg" alt="Collar Pendant" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <span class="ph-icon">📷</span>
        <span class="ph-text">Collar Pendant<br>Agrega tu imagen aquí</span>
        <span class="ph-tag">imagenes/collar-pendant.jpg</span>
      </div>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Collar Pendant Logo</h4>
      <p class="product-sub">Collares · Silver</p>
      <div class="product-footer">
        <div><span class="price">$52.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

  <!-- MOCHILA -->
  <div class="acc-card product-card" data-cat="mochilas" data-badge="">
    <div class="product-img acc-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/mochila-tactical.jpg" alt="Mochila Tactical" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <span class="ph-icon">📷</span>
        <span class="ph-text">Mochila Tactical<br>Agrega tu imagen aquí</span>
        <span class="ph-tag">imagenes/mochila-tactical.jpg</span>
      </div>
      <span class="badge badge-hot">Hot</span>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Mochila Tactical</h4>
      <p class="product-sub">Bolsos · Street</p>
      <div class="product-footer">
        <div><span class="price">$145.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

  <!-- BANDANA -->
  <div class="acc-card product-card" data-cat="mochilas" data-badge="ofertas">
    <div class="product-img acc-img">
      <!--
        ===== ESPACIO PARA IMAGEN =====
        Reemplaza el div .img-placeholder por:
        <img src="imagenes/bandana-vintage.jpg" alt="Bandana Vintage" style="width:100%;height:100%;object-fit:cover;">
        ==============================
      -->
      <div class="img-placeholder">
        <span class="ph-icon">📷</span>
        <span class="ph-text">Bandana Vintage<br>Agrega tu imagen aquí</span>
        <span class="ph-tag">imagenes/bandana-vintage.jpg</span>
      </div>
      <span class="badge badge-sale">−20%</span>
      <div class="p-overlay"><button class="p-quick">+ Carrito</button></div>
    </div>
    <div class="product-info">
      <h4>Bandana Vintage</h4>
      <p class="product-sub">Accesorios · Retro</p>
      <div class="product-footer">
        <div><span class="price">$32.000</span><span class="price-old">$40.000</span></div>
        <button class="btn-add">+ Carrito</button>
      </div>
    </div>
  </div>

</div>

<div class="sec-hd" style="padding-top:3rem;"><h2>POR QUÉ <span>// STREETFLOW</span></h2></div>
<div class="feature-band">
  <div class="feat-item"><span class="feat-icon"></span><div class="feat-text"><strong>Envío Express</strong><span>24h para Bogotá, Medellín y Cali</span></div></div>
  <div class="feat-item"><span class="feat-icon"></span><div class="feat-text"><strong>30 días de cambios</strong><span>Sin rollos. Si no te queda, lo cambiamos.</span></div></div>
  <div class="feat-item"><span class="feat-icon"></span><div class="feat-text"><strong>Calidad garantizada</strong><span>Materiales premium seleccionados a mano</span></div></div>
  <div class="feat-item"><span class="feat-icon"></span><div class="feat-text"><strong>Pagos flexibles</strong><span>Cuotas sin interés, Nequi, PSE y más</span></div></div>
</div>

<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <span class="logo" style="display:block;margin-bottom:0.2rem;">STREET<span style="color:#a0a0a0">FLOW</span></span>
      <p>Moda urbana sin filtros. Diseñada para los que viven la calle, la crean y la representan.</p>
    </div>
    <div class="footer-col"><h5>Tienda</h5><ul><li><a href="ropa.php">Hoodies</a></li><li><a href="pantalon.php">Cargos</a></li><li><a href="zapato.php">Calzado</a></li><li><a href="zapato.php">Accesorios</a></li></ul></div>
    <div class="footer-col"><h5>Ayuda</h5><ul><li><a href="#">Guía de tallas</a></li><li><a href="#">Envíos</a></li><li><a href="#">Devoluciones</a></li><li><a href="#">Contacto</a></li></ul></div>
    <div class="footer-col"><h5>Marca</h5><ul><li><a href="#">Nosotros</a></li><li><a href="#">Lookbook</a></li><li><a href="#">Instagram</a></li><li><a href="#">TikTok</a></li></ul></div>
  </div>
  <div class="footer-bottom"><span>© 2026 Streetflow. Todos los derechos reservados.</span><span>Hecho con flow </span></div>
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
// ===== FILTROS — FUNCIONA REAL =====
const filterBtns = document.querySelectorAll('.filter-btn');
const allCards   = document.querySelectorAll('.product-card');
const countEl    = document.querySelector('.results-count');

function updateCount(visible) {
  if (countEl) countEl.textContent = visible + ' producto' + (visible !== 1 ? 's' : '') + ' encontrado' + (visible !== 1 ? 's' : '');
}

filterBtns.forEach(btn => {
  btn.addEventListener('click', function () {
    filterBtns.forEach(b => b.classList.remove('active'));
    this.classList.add('active');

    const filtro = this.textContent.trim().toLowerCase();
    let visible = 0;

    allCards.forEach(card => {
      const cat   = (card.dataset.cat   || '').toLowerCase();
      const badge = (card.dataset.badge || '').toLowerCase();

      let mostrar = false;
      if (filtro === 'todo') {
        mostrar = true;
      } else if (filtro === 'ofertas') {
        mostrar = badge.includes('oferta') || badge.includes('sale');
      } else if (filtro === 'nuevo') {
        mostrar = badge.includes('nuevo') || badge.includes('drop');
      } else {
        mostrar = cat.includes(filtro);
      }

      card.style.display = mostrar ? '' : 'none';
      if (mostrar) visible++;
    });

    updateCount(visible);
  });
});

updateCount(allCards.length);
document.querySelectorAll('.talla-chip').forEach(chip => {
  chip.addEventListener('click', function() {
    const row = this.closest('.tallas-row');
    row.querySelectorAll('.talla-chip').forEach(c => { c.style.borderColor=''; c.style.color=''; });
    this.style.borderColor = 'var(--green)';
    this.style.color = 'var(--green)';
  });
});

const SUGS = [
  { label: "👟 Ver sneakers",          msg: "sneaker" },
  { label: "🧢 Ver gorras",            msg: "gorra" },
  { label: "⌚ Relojes",               msg: "reloj" },
  { label: "📏 Tallas de calzado",     msg: "talla" },
  { label: "🚚 Info de envíos",        msg: "envio" },
  { label: "🔥 Ver ofertas",           msg: "oferta" },
];

const RULES = [
  { k: ["hola","hey","buenas","saludos","que mas","ola"], r: `¡Ey! Estás en <span class="kw">Calzado & Accesorios</span>. ¿Buscas <span class="kw">sneakers</span>, una <span class="kw">gorra</span>, <span class="kw">reloj</span> o <span class="kw">collar</span>? Cuéntame y te ayudo a armar el look completo.` },
   { k: ["zapatilla deportiva", "tenis deportivo", "zapatos para jugar"], r: `Tenemos estos zapatos que estan disponibles por ahora ` },
  { k: ["novedad","nuevo","drop","coleccion"], r: ` Nuevos en la tienda: <span class="kw">Sneaker Chunky</span> ($320K), <span class="kw">Reloj Chain Oversized</span> ($245K) y el <span class="kw">Bucket Hat Reversible</span> ($72K). ¿Cuál te interesa?` },
  { k: ["talla","medida","numero","size","pie"], r: ` Para calzado manejamos del <span class="kw">36 al 45</span>. Para gorras es <span class="kw">talla única</span> ajustable. Relojes tienen pulsera ajustable. ¿De qué producto necesitas info?` },
  { k: ["envio","envío","domicilio","entrega"], r: ` Envíos a toda Colombia. <span class="kw">GRATIS</span> desde $200.000. Express en <span class="kw">24h</span> para Bogotá, Medellín y Cali.` },
  { k: ["devolucion","cambio","garantia"], r: ` <span class="kw">30 días</span> para cambiar sin rollos. Etiqueta original y sin uso. Escribe <span class="kw">contacto</span> para iniciar.` },
  { k: ["pago","tarjeta","nequi","pse","cuota"], r: ` Aceptamos <span class="kw">Visa/Mastercard</span>, PSE, <span class="kw">Nequi</span>, Daviplata y efectivo. Hasta <span class="kw">12 cuotas sin interés</span>.` },
  { k: ["oferta","descuento","sale","promo"], r: ` Ofertas: <span class="kw">Sneaker Low Top</span> al −20% ($220K), <span class="kw">Collar Chain</span> al −15% ($45K) y <span class="kw">Bandana Vintage</span> al −20% ($32K).` },
  { k: ["sneaker","zapatilla","tenis","zapato","kicks","calzado"], r: `👟 Tenemos la <span class="kw">Sneaker Chunky</span> ($320K), <span class="kw">Low Top Classic</span> ($220K con 20% off), <span class="kw">Bota Combat</span> ($285K) y <span class="kw">Slide Urban</span> ($98K). ¿Cuál es tu número?` },
  { k: ["gorra","cap","snapback","hat","bucket"], r: ` La <span class="kw">Snapback Cap Logo</span> ($65K) es la más pedida. El <span class="kw">Bucket Hat Reversible</span> ($72K) es el nuevo drop. ¿Cuál te llama?` },
  { k: ["reloj","watch","hora","tiempo"], r: ` El <span class="kw">Reloj Street Digital</span> ($185K) es perfecto para el estilo urbano. Si buscas algo más premium, el <span class="kw">Reloj Chain Oversized</span> ($245K) es el must-have de la temporada.` },
  { k: ["collar","chain","joya","accesorio","colgante","pendant"], r: `📿 El <span class="kw">Collar Chain Street</span> ($45K con 15% off) y el <span class="kw">Collar Pendant Logo</span> ($52K) son los favoritos. Perfectos para completar el look.` },
  { k: ["mochila","bolso","bag","backpack"], r: ` La <span class="kw">Mochila Tactical</span> ($145K) es nuestra más vendida: compartimentos múltiples, resistente al agua y con el estilo street que necesitas.` },
  { k: ["comprar","agregar","carrito","quiero"], r: ` Selecciona tu talla o color, haz clic en <span class="kw">+ Carrito</span> y elige tu <span class="kw">pago</span>. ¿Tienes dudas? Cuéntame.` },
  { k: ["contacto","whatsapp","hablar"], r: ` <span class="kw">WhatsApp: 300-000-0000</span> o Instagram <span class="kw">@streetflow.co</span>. Respuesta en menos de 2h hábiles.` },
];

const DEFAULT = `Mmmh, Puedo ayudarte con: <span class="kw">sneaker</span>, <span class="kw">gorra</span>, <span class="kw">reloj</span>, <span class="kw">collar</span>, <span class="kw">talla</span>, <span class="kw">envio</span> u <span class="kw">oferta</span>. Escribe alguna.`;

const toggle=document.getElementById('chat-toggle'),win=document.getElementById('chat-window'),closeBtn=document.getElementById('chat-close'),msgs=document.getElementById('chat-messages'),input=document.getElementById('chat-input'),sendBtn=document.getElementById('chat-send'),sugWrap=document.getElementById('sug-wrap'),sugCont=document.getElementById('sug-container');
function time(){const d=new Date();return String(d.getHours()).padStart(2,'0')+':'+String(d.getMinutes()).padStart(2,'0');}
function addMsg(html,side){const div=document.createElement('div');div.className='msg '+side;div.innerHTML=side==='bot'?`<div class="msg-av">🤖</div><div><div class="bubble">${html}</div><div class="msg-time">${time()}</div></div>`:`<div><div class="bubble">${html}</div><div class="msg-time" style="text-align:right">${time()}</div></div>`;msgs.appendChild(div);msgs.scrollTop=msgs.scrollHeight;}
function showTyping(){const d=document.createElement('div');d.className='msg bot';d.id='typing';d.innerHTML=`<div class="msg-av">🤖</div><div class="typing-indicator"><div class="tdot"></div><div class="tdot"></div><div class="tdot"></div></div>`;msgs.appendChild(d);msgs.scrollTop=msgs.scrollHeight;}
function removeTyping(){const t=document.getElementById('typing');if(t)t.remove();}
function normalize(s){return s.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g,'');}
function getReply(text){const n=normalize(text);for(const r of RULES){if(r.k.some(k=>n.includes(normalize(k))))return r.r;}return DEFAULT;}
function send(text){if(!text.trim())return;addMsg(text,'user');input.value='';sugWrap.style.display='none';showTyping();setTimeout(()=>{removeTyping();addMsg(getReply(text),'bot');},700+Math.random()*600);}
function buildSugs(){sugCont.innerHTML='';SUGS.forEach(s=>{const b=document.createElement('button');b.className='sug-chip';b.textContent=s.label;b.onclick=()=>send(s.msg);sugCont.appendChild(b);});}
function openChat(){win.classList.add('open');document.querySelector('.chat-ping').style.display='none';if(!msgs.children.length){setTimeout(()=>{showTyping();setTimeout(()=>{removeTyping();addMsg(`¡Ey! Estás en <span class="kw">Calzado & Accesorios</span>. ¿Buscas <span class="kw">sneakers</span>, <span class="kw">gorras</span>, <span class="kw">relojes</span> o <span class="kw">collares</span>? ¡Te ayudo a armar el look completo!`,'bot');buildSugs();},1100);},300);}}
toggle.addEventListener('click',()=>{win.classList.contains('open')?win.classList.remove('open'):openChat();});
closeBtn.addEventListener('click',()=>win.classList.remove('open'));
sendBtn.addEventListener('click',()=>send(input.value));
input.addEventListener('keydown',e=>{if(e.key==='Enter')send(input.value);});
</script>
</body>
</html>