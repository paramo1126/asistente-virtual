<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>STREETFLOW — Moda Urbana</title>
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

/* NAV */
nav {
  background:rgba(50, 56, 55, 0.8); 
  backdrop-filter: blur(12px);
  padding: 0 2.5rem;
  display: flex; align-items: center; justify-content: space-between;
  height: 62px; position: sticky; top: 0; z-index: 100;
  border-bottom: 1px solid var(--border);
}
.logo { font-family: 'Bebas Neue', sans-serif; font-size: 2rem; letter-spacing: 0.12em; color: var(--white); text-shadow: none; user-select: none; }
.logo span { color: #a0a0a0; }
nav ul { list-style: none; display: flex; gap: 2rem; }
nav ul a { color: var(--muted); text-decoration: none; font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; font-weight: 500; transition: color 0.2s; }
nav ul a:hover { color: var(--green); }
.nav-icons { display: flex; gap: 1rem; align-items: center; }
.nav-icons button { background: none; border: none; color: var(--muted); cursor: pointer; font-size: 1.1rem; padding: 4px; transition: color 0.2s, text-shadow 0.2s; }
.nav-icons button:hover { color: var(--green); text-shadow: 0 0 8px rgba(206, 189, 154, 0.6); }

/* TICKER */
.ticker { background: var(--green); overflow: hidden; white-space: nowrap; padding: 8px 0; }
.ticker-inner { display: inline-block; animation: ticker 22s linear infinite; font-family: 'Bebas Neue', sans-serif; font-size: 0.95rem; letter-spacing: 0.22em; color: var(--black); }
@keyframes ticker { 0% { transform: translateX(100vw); } 100% { transform: translateX(-100%); } }

/* HERO */
.hero-img {  width: 100%;max-width: 800px; height: 200px;font-size: 1.2rem }
.hero { min-height: 560px; background: var(--black2); display: grid; grid-template-columns: 1fr 1fr; position: relative; overflow: hidden; border-bottom: 1px solid var(--border); }
.hero::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse 60% 70% at 80% 50%, rgba(57,255,20,0.07) 0%, transparent 65%); pointer-events: none; }
.hero::after { content: ''; position: absolute; inset: 0; background-image: repeating-linear-gradient(0deg, rgba(57,255,20,0.025) 0px, transparent 1px, transparent 60px, rgba(57,255,20,0.025) 60px), repeating-linear-gradient(90deg, rgba(57,255,20,0.025) 0px, transparent 1px, transparent 60px, rgba(57,255,20,0.025) 60px); pointer-events: none; }
.hero-text { padding: 5rem 3.5rem 5rem 4rem; display: flex; flex-direction: column; justify-content: center; position: relative; z-index: 1; }
.hero-eyebrow { display: inline-flex; align-items: center; gap: 8px; font-size: 0.68rem; letter-spacing: 0.28em; text-transform: uppercase; color: var(--green); font-weight: 700; margin-bottom: 1.5rem; }
.hero-eyebrow::before { content: ''; display: inline-block; width: 28px; height: 2px; background: var(--green); }
.hero h1 { font-family: 'Bebas Neue', sans-serif; font-size: 6.5rem; line-height: 0.92; color: var(--white); letter-spacing: 0.04em; margin-bottom: 1.6rem; }
.hero h1 .green { color: var(--green); text-shadow: 0 0 24px rgba(0, 0, 0, 0.5); display: block; }
.hero p { color: var(--muted); font-size: 0.92rem; line-height: 1.7; max-width: 360px; margin-bottom: 2.5rem; font-weight: 300; }
.hero-btns { display: flex; gap: 1rem; flex-wrap: wrap; }
.btn-primary { display: inline-block; background: var(--green); color: var(--black); border: none; padding: 13px 32px; font-family: 'Syne', sans-serif; font-size: 0.75rem; letter-spacing: 0.18em; text-transform: uppercase; cursor: pointer; transition: background 0.2s, box-shadow 0.2s, transform 0.15s; text-decoration: none; font-weight: 700; clip-path: polygon(0 0, calc(100% - 10px) 0, 100% 10px, 100% 100%, 0 100%); }
.btn-primary:hover { background: #000000; box-shadow: 0 0 24px rgba(0, 0, 0, 0.5); transform: translateY(-2px); }
.btn-outline { display: inline-block; background: transparent; color: var(--green); border: 1px solid var(--green); padding: 13px 32px; font-family: 'Syne', sans-serif; font-size: 0.75rem; letter-spacing: 0.18em; text-transform: uppercase; cursor: pointer; transition: all 0.2s; text-decoration: none; font-weight: 700; clip-path: polygon(0 0, calc(100% - 10px) 0, 100% 10px, 100% 100%, 0 100%); }
.btn-outline:hover { background: var(--green-dark); }
.hero-visual { position: relative; display: flex; align-items: center; justify-content: center; z-index: 1; }
.hero-gfx { font-size: 13rem; opacity: 0.08; user-select: none; filter: grayscale(1) brightness(2); animation: float 6s ease-in-out infinite; }
@keyframes float { 0%, 100% { transform: translateY(0) rotate(-3deg); } 50% { transform: translateY(-18px) rotate(3deg); } }
.hero-tag-box { position: absolute; bottom: 2.5rem; right: 2.5rem; border: 1px solid var(--green); padding: 12px 18px; text-align: center; background: rgba(57,255,20,0.04); }
.hero-tag-box .big { font-family: 'Bebas Neue', sans-serif; font-size: 2rem; color: var(--green); line-height: 1; }
.hero-tag-box .sm  { font-size: 0.62rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--muted); }
.hero-stats { position: absolute; top: 2.5rem; right: 2.5rem; display: flex; flex-direction: column; gap: 0.5rem; }
.stat-item .num { font-family: 'Bebas Neue', sans-serif; font-size: 1.5rem; color: var(--green); line-height: 1; text-align: right; }
.stat-item .lbl { font-size: 0.62rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--muted); text-align: right; }

/* SECTION HEADER */
.sec-hd { padding: 4rem 2.5rem 2rem; display: flex; align-items: flex-end; justify-content: space-between; max-width: 1200px; margin: 0 auto; }
.sec-hd h2 { font-family: 'Bebas Neue', sans-serif; font-size: 3rem; color: var(--white); letter-spacing: 0.06em; line-height: 1; }
.sec-hd h2 span { color: var(--green); }
.sec-hd a { color: var(--green); text-decoration: none; font-size: 0.72rem; letter-spacing: 0.15em; text-transform: uppercase; font-weight: 700; border-bottom: 1px solid var(--green); padding-bottom: 2px; transition: opacity 0.2s; }
.sec-hd a:hover { opacity: 0.7; }

/* CATEGORIES */
.categories { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1px; background: var(--border); max-width: 1200px; margin: 0 auto; padding: 0 2.5rem 4rem; }
.cat-card { background: var(--card); position: relative; height: 300px; overflow: hidden; cursor: pointer; transition: background 0.2s; }
.cat-card:hover { background: var(--black3); }
.cat-card a { display: block; height: 100%; position: relative; }
.cat-card img.cat-img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center top; opacity: 0.7; transition: opacity 0.4s, transform 0.5s; }
.cat-card:hover img.cat-img { opacity: 0.75; transform: scale(1.06); }
.cat-info { position: absolute; bottom: 0; left: 0; right: 0; padding: 1.5rem; background: linear-gradient(to top, rgba(8,12,8,0.95) 0%, transparent 100%); }
.cat-num { font-family: 'Bebas Neue', sans-serif; font-size: 5rem; color: rgba(57,255,20,0.06); position: absolute; top: 0.5rem; right: 1rem; line-height: 1; }
.cat-label { display: inline-block; background: var(--green); color: var(--black); font-size: 0.6rem; letter-spacing: 0.22em; text-transform: uppercase; padding: 3px 9px; font-weight: 700; margin-bottom: 0.5rem; }
.cat-info h3 { font-family: 'Bebas Neue', sans-serif; font-size: 2rem; color: var(--white); letter-spacing: 0.06em; line-height: 1.1; }
.cat-count { font-size: 0.72rem; color: var(--muted); margin-top: 0.3rem; letter-spacing: 0.08em; }

/* PRODUCTS */
.products-section { background: var(--black2); padding-bottom: 4rem; border-top: 1px solid var(--border); }
.products-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1px; background: var(--border); max-width: 1200px; margin: 0 auto; padding: 0 2.5rem; }
.product-card { background: var(--card); cursor: pointer; transition: background 0.2s; position: relative; }
.product-card:hover { background: var(--black3); }
.product-img { height: 260px; display: flex; align-items: center; justify-content: center; background: var(--black3); position: relative; overflow: hidden; border-bottom: 1px solid var(--border); }
.product-img img.prod-img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center top; opacity: 0.9; transition: opacity 0.3s, transform 0.4s; }
.product-card:hover .prod-img { opacity: 1; transform: scale(1.04); }
.p-icon { font-size: 6rem; opacity: 0.08; filter: grayscale(1); transition: opacity 0.3s, transform 0.4s; user-select: none; }
.product-card:hover .p-icon { opacity: 0.14; transform: scale(1.06); }
.p-overlay { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; opacity: 0; transition: opacity 0.25s; }
.product-card:hover .p-overlay { opacity: 1; }
.p-quick { background: var(--green); color: var(--black); border: none; padding: 9px 20px; font-family: 'Syne', sans-serif; font-size: 0.68rem; letter-spacing: 0.16em; text-transform: uppercase; font-weight: 700; cursor: pointer; clip-path: polygon(0 0, calc(100% - 8px) 0, 100% 8px, 100% 100%, 0 100%); }
.p-quick:hover { background: #4fff28; }
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
.btn-add:hover { background: var(--green); color: var(--black); border-color: var(--green); box-shadow: 0 0 12px rgba(57,255,20,0.3); }

/* FEATURES */
.feature-band { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1px; background: var(--border); max-width: 1200px; margin: 0 auto; padding: 0 2.5rem 4rem; }
.feat-item { background: var(--card); padding: 1.8rem 1.5rem; display: flex; align-items: flex-start; gap: 1rem; }
.feat-icon { font-size: 1.5rem; flex-shrink: 0; line-height: 1; }
.feat-text strong { display: block; font-family: 'Syne', sans-serif; font-size: 0.82rem; font-weight: 700; color: var(--white); letter-spacing: 0.04em; margin-bottom: 0.3rem; }
.feat-text span { font-size: 0.72rem; color: var(--muted); line-height: 1.5; }

/* TESTIMONIALS */
.testimonials { background: var(--black); padding: 5rem 2.5rem; border-top: 1px solid var(--border); }
.testi-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1px; background: var(--border); max-width: 1200px; margin: 0 auto; }
.testi-card { background: var(--card); padding: 2rem; }
.stars { color: var(--green); font-size: 0.85rem; letter-spacing: 3px; margin-bottom: 1.1rem; }
.testi-card p { color: var(--muted); font-size: 0.86rem; line-height: 1.75; margin-bottom: 1.2rem; font-weight: 300; }
.testi-author { font-size: 0.7rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--green); font-weight: 700; }

/* NEWSLETTER */
.newsletter { background: var(--black2); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); padding: 5rem 2.5rem; text-align: center; position: relative; overflow: hidden; }
.newsletter::before { content: 'STREETFLOW'; font-family: 'Bebas Neue', sans-serif; font-size: 12rem; color: rgba(57,255,20,0.025); position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); white-space: nowrap; pointer-events: none; user-select: none; }
.newsletter h2 { font-family: 'Bebas Neue', sans-serif; font-size: 3.5rem; color: var(--white); letter-spacing: 0.08em; margin-bottom: 0.5rem; position: relative; }
.newsletter h2 span { color: var(--green); }
.newsletter p { color: var(--muted); margin-bottom: 2rem; font-size: 0.88rem; position: relative; }
.nl-form { display: flex; max-width: 460px; margin: 0 auto; position: relative; }
.nl-form input { flex: 1; padding: 14px 18px; background: var(--black3); border: 1px solid var(--border2); border-right: none; font-family: 'Space Grotesk', sans-serif; font-size: 0.85rem; outline: none; color: var(--white); transition: border-color 0.2s; }
.nl-form input:focus { border-color: var(--green); }
.nl-form input::placeholder { color: var(--muted); }

/* FOOTER */
footer { background: var(--black); padding: 3.5rem 2.5rem 2rem; border-top: 1px solid var(--border); }
.footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 3rem; max-width: 1200px; margin: 0 auto 3rem; }
.footer-brand p { color: var(--muted); font-size: 0.8rem; line-height: 1.7; max-width: 240px; margin-top: 0.8rem; font-weight: 300; }
.footer-col h5 { color: var(--green); font-size: 0.65rem; letter-spacing: 0.25em; text-transform: uppercase; margin-bottom: 1.2rem; font-weight: 700; font-family: 'Syne', sans-serif; }
.footer-col ul { list-style: none; }
.footer-col li { margin-bottom: 0.6rem; }
.footer-col a { color: var(--muted); text-decoration: none; font-size: 0.82rem; transition: color 0.2s; }
.footer-col a:hover { color: var(--green); }
.footer-bottom { border-top: 1px solid var(--border); padding-top: 1.5rem; display: flex; align-items: center; justify-content: space-between; max-width: 1200px; margin: 0 auto; color: #2A402A; font-size: 0.72rem; letter-spacing: 0.1em; text-transform: uppercase; }

/* ======= CHATBOT ======= */
#chat-toggle {
  position: fixed; bottom: 28px; right: 28px;
  width: 60px; height: 60px; border-radius: 50%;
  background: var(--black2); border: 2px solid var(--green); cursor: pointer;
  display: flex; align-items: center; justify-content: center; font-size: 1.6rem;
  z-index: 9999; line-height: 1;
  box-shadow: 0 0 20px rgba(57,255,20,0.35), 0 4px 24px rgba(0,0,0,0.6);
  transition: transform 0.2s, box-shadow 0.2s;
}
#chat-toggle:hover { transform: scale(1.08); box-shadow: 0 0 32px rgba(57,255,20,0.55), 0 6px 30px rgba(0,0,0,0.6); }
.chat-ping { position: absolute; top: -2px; right: -2px; width: 14px; height: 14px; border-radius: 50%; background: var(--green); border: 2px solid var(--black2); animation: ping 1.8s ease-in-out infinite; }
@keyframes ping { 0%, 100% { box-shadow: 0 0 0 0 rgba(57,255,20,0.6); } 50% { box-shadow: 0 0 0 6px rgba(57,255,20,0); } }

#chat-window {
  position: fixed; bottom: 102px; right: 28px;
  width: 370px; height: 540px;
  background: var(--black2); border: 1px solid var(--border2); border-radius: 4px;
  box-shadow: 0 0 40px rgba(57,255,20,0.12), 0 20px 60px rgba(0,0,0,0.7);
  z-index: 9998; display: flex; flex-direction: column; overflow: hidden;
  transform: scale(0.88) translateY(16px); opacity: 0; pointer-events: none;
  transition: transform 0.28s cubic-bezier(0.34,1.56,0.64,1), opacity 0.2s;
}
#chat-window.open { transform: scale(1) translateY(0); opacity: 1; pointer-events: all; }
.chat-topbar { height: 2px; background: var(--green); flex-shrink: 0; box-shadow: 0 0 12px rgba(255, 255, 255, 0.7); }
.chat-header { background: var(--card); padding: 12px 15px; display: flex; align-items: center; gap: 10px; flex-shrink: 0; border-bottom: 1px solid var(--border); }
.chat-avatar { width: 36px; height: 36px; border-radius: 4px; background: var(--green-dark); border: 1px solid var(--green); display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0; }
.chat-header-info { flex: 1; }
.chat-header-info strong { display: block; color: var(--white); font-size: 0.84rem; font-weight: 700; letter-spacing: 0.06em; font-family: 'Syne', sans-serif; }
.chat-online { display: flex; align-items: center; gap: 5px; font-size: 0.66rem; color: var(--green); letter-spacing: 0.08em; font-weight: 500; }
.chat-online::before { content: ''; width: 5px; height: 5px; border-radius: 50%; background: var(--green); box-shadow: 0 0 6px var(--green); display: inline-block; animation: glow 2s ease-in-out infinite; }
@keyframes glow { 0%, 100% { box-shadow: 0 0 4px var(--green); } 50% { box-shadow: 0 0 10px var(--green), 0 0 20px rgba(57,255,20,0.4); } }
.chat-close { background: none; border: none; color: var(--muted); cursor: pointer; font-size: 1rem; padding: 4px; display: flex; align-items: center; justify-content: center; transition: color 0.2s; line-height: 1; }
.chat-close:hover { color: var(--green); }

.chat-messages { flex: 1; overflow-y: auto; padding: 14px; display: flex; flex-direction: column; gap: 10px; scroll-behavior: smooth; background: var(--black2); }
.chat-messages::-webkit-scrollbar { width: 3px; }
.chat-messages::-webkit-scrollbar-thumb { background: var(--green-dark); border-radius: 2px; }
.msg { display: flex; gap: 8px; align-items: flex-end; }
.msg.bot  { justify-content: flex-start; }
.msg.user { justify-content: flex-end; }
.msg-av { width: 26px; height: 26px; border-radius: 3px; background: var(--green-dark); border: 1px solid var(--green); display: flex; align-items: center; justify-content: center; font-size: 0.8rem; flex-shrink: 0; }
.bubble { max-width: 78%; padding: 10px 13px; font-size: 0.82rem; line-height: 1.55; }
.msg.bot  .bubble { background: var(--card); color: var(--white); border: 1px solid var(--border); border-radius: 0 8px 8px 8px; }
.msg.user .bubble { background: var(--green-dark); color: var(--white); border: 1px solid rgba(57,255,20,0.3); border-radius: 8px 0 8px 8px; }
.bubble .kw { color: var(--green); font-weight: 700; font-style: italic; }
.msg-time { font-size: 0.6rem; color: #2A402A; margin-top: 2px; padding: 0 3px; align-self: flex-end; }

.typing-indicator { display: flex; gap: 5px; padding: 12px 15px; background: var(--card); border: 1px solid var(--border); border-radius: 0 8px 8px 8px; width: fit-content; align-items: center; }
.tdot { width: 6px; height: 6px; border-radius: 50%; background: var(--green); animation: tb 1.2s infinite; box-shadow: 0 0 6px rgba(57,255,20,0.5); }
.tdot:nth-child(2) { animation-delay: 0.2s; }
.tdot:nth-child(3) { animation-delay: 0.4s; }
@keyframes tb { 0%, 60%, 100% { transform: translateY(0); opacity: 0.6; } 30% { transform: translateY(-6px); opacity: 1; } }

.sug-wrap { padding: 10px 14px 12px; flex-shrink: 0; border-top: 1px solid var(--border); background: var(--black3); }
.sug-label { font-size: 0.62rem; color: var(--muted); letter-spacing: 0.15em; text-transform: uppercase; margin-bottom: 8px; font-weight: 700; font-family: 'Syne', sans-serif; }
.suggestions { display: flex; flex-wrap: wrap; gap: 6px; }
.sug-chip { background: var(--card); border: 1px solid var(--border2); color: var(--white); font-size: 0.72rem; padding: 6px 12px; border-radius: 2px; cursor: pointer; transition: all 0.15s; font-family: 'Space Grotesk', sans-serif; white-space: nowrap; clip-path: polygon(0 0, calc(100% - 6px) 0, 100% 6px, 100% 100%, 0 100%); }
.sug-chip:hover { background: var(--green-dark); border-color: var(--green); color: var(--green); transform: translateY(-1px); }

.chat-input-row { display: flex; gap: 8px; padding: 11px 14px; border-top: 1px solid var(--border); background: var(--card); flex-shrink: 0; align-items: center; }
.chat-input-row input { flex: 1; border: 1px solid var(--border2); border-radius: 2px; padding: 9px 13px; font-family: 'Space Grotesk', sans-serif; font-size: 0.82rem; outline: none; color: var(--white); background: var(--black2); transition: border-color 0.2s, box-shadow 0.2s; }
.chat-input-row input:focus { border-color: var(--green); box-shadow: 0 0 8px rgba(57,255,20,0.15); }
.chat-input-row input::placeholder { color: var(--muted); }
.chat-send { width: 38px; height: 38px; border-radius: 2px; background: var(--green); border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 0.9rem; color: var(--black); font-weight: 900; transition: background 0.2s, box-shadow 0.2s, transform 0.15s; clip-path: polygon(0 0, calc(100% - 7px) 0, 100% 7px, 100% 100%, 0 100%); }
.chat-send:hover { background: #4fff28; box-shadow: 0 0 16px rgba(57,255,20,0.5); transform: scale(1.04); }

/* RESPONSIVE */
@media (max-width: 960px) {
  .hero { grid-template-columns: 1fr; }
  .hero-visual { display: none; }
  .categories { grid-template-columns: 1fr 1fr; }
  .products-grid { grid-template-columns: 1fr 1fr; }
  .feature-band { grid-template-columns: 1fr 1fr; }
  .footer-grid { grid-template-columns: 1fr 1fr; }
  .testi-grid { grid-template-columns: 1fr; }
}
@media (max-width: 580px) {
  .categories { grid-template-columns: 1fr; }
  .products-grid { grid-template-columns: 1fr; }
  nav ul { display: none; }
  #chat-window { width: calc(100vw - 20px); right: 10px; bottom: 92px; }
}
</style>
</head>
<body>

<nav>
  <span class="logo">STREET<span>FLOW</span></span>
  <ul>
    <li><a href="https://wa.me/573102916140" target="_blank">Whatsapp</a></li>
    <li><a href="#">Urbano</a></li>
    <li><a href="#">Accesorios</a></li>
    <li><a href="#">Drops</a></li>
    <li><a href="#">Sale</a></li>
  </ul>
  <div class="nav-icons">
  </div>
</nav>


<section class="hero">
  <div class="hero-text">
    <span class="hero-eyebrow">Drop Primavera 2026</span>
    <h1>VISTE<span class="green">LA CALLE</span>A TU MODO</h1>
    <p>Piezas diseñadas para los que mandan en el asfalto. Streetwear de nivel, sin límites, sin excusas. La moda urbana que realmente representa.</p>
    <div class="hero-img">
      <img src="imagenes/presentacion.jpg" alt="">
      <img src="imagenes/presentacion2.jpg" alt="">
    </div>
    <div class="hero-btns">
      <a href="#" class="btn-primary">Explorar drop</a>
      <a href="#" class="btn-outline">Ver lookbook</a>
    </div>
  </div>
  <div class="hero-visual">
    <div class="hero-gfx">🥷</div>
    <div class="hero-tag-box"><div class="big">SS</div><div class="sm">2026</div></div>
    <div class="hero-stats">
      <div class="stat-item"><div class="num">4.9★</div><div class="lbl">Rating</div></div>
      <div class="stat-item"><div class="num">12K+</div><div class="lbl">Clientes</div></div>
      <div class="stat-item"><div class="num">200+</div><div class="lbl">Prendas</div></div>
    </div>
  </div>
</section>

<div class="sec-hd"><h2>CATEGORÍAS <span>// ESTILOS</span></h2><a href="catalogo.php">Catalogo →</a></div>
<div class="categories">
  <div class="cat-card">
    <a href="buso.php">
      <img src="imagenes/busolargohombre.jpg" alt="Hoodies" class="cat-img">
    <div class="cat-info"><span class="cat-label">Urban</span><h3>BUSOS &<br>CHAQUETAS</h3><p class="cat-count">42 prendas disponibles</p></div>
    </a>
  </div>
  <div class="cat-card">
    <a href="pantalon.php">
      <img src="imagenes/pantalon.jpg" alt="Pantalones" class="cat-img">
      <div class="cat-info"><span class="cat-label">FIRE</span><h3>PANTALON &<br>JOGGERS</h3><p class="cat-count">38 prendas disponibles</p></div>
    </a>
  </div>
  <div class="cat-card">
    <a href="zapato.php">
      <img src="imagenes/zapatos.webp" alt="Calzado" class="cat-img">
      <div class="cat-info"><span class="cat-label">FULL MODEL</span><h3>CALZADO &<br>ACCESORIOS</h3><p class="cat-count">65 estilos disponibles</p></div>
    </a>
  </div>
</div>

<section class="products-section">
  <div class="sec-hd" style="padding-top:4rem;"><h2>MÁS <span>// VENDIDOS</span></h2><a href="#">Ver catálogo →</a></div>
  <div class="products-grid">
    <div class="product-card">
      <div class="product-img"><img src="imagenes/buso1.jpg" alt="Hoodie" class="prod-img"><span class="badge badge-new">Drop</span><div class="p-overlay"><button class="p-quick">+ Carrito</button></div></div>
      <div class="product-info"><h4>Hoodie Oversized</h4><p class="product-sub">Unisex · Essentials</p><div class="product-footer"><div><span class="price">$189.000</span></div><button class="btn-add">+ Carrito</button></div></div>
    </div>
    <div class="product-card">
      <div class="product-img"><img src="imagenes/pantalon1.jpg" alt="pantalon" class="prod-img"><span class="badge badge-sale">−30%</span><div class="p-overlay"><button class="p-quick">+ Carrito</button></div></div>
      <div class="product-info"><h4>Cargo Pants Wide</h4><p class="product-sub">Hombre · Baggy</p><div class="product-footer"><div><span class="price">$175.000</span><span class="price-old">$250.000</span></div><button class="btn-add">+ Carrito</button></div></div>
    </div>
    <div class="product-card">
      <div class="product-img"><img src="imagenes/zapatos1.jpg" alt="zapatos" class="prod-img"><span class="badge badge-hot">Hot</span><div class="p-overlay"><button class="p-quick">+ Carrito</button></div></div>
      <div class="product-info"><h4>Snapback Cap</h4><p class="product-sub">Accesorios · Logo</p><div class="product-footer"><div><span class="price">$65.000</span></div><button class="btn-add">+ Carrito</button></div></div>
    </div>
    <div class="product-card">
      <div class="product-img"><img src="imagenes/buso2.jpg" alt="Hoodie" class="prod-img"><span class="badge badge-new">Drop</span><div class="p-overlay"><button class="p-quick">+ Carrito</button></div></div>
      <div class="product-info"><h4>Hoodie oversized</h4><p class="product-sub">Moda · Urbano</p><div class="product-footer"><div><span class="price">$320.000</span></div><button class="btn-add">+ Carrito</button></div></div>
    </div>
    <div class="product-card">
      <div class="product-img"><img src="imagenes/buso3.jpg" alt="buso3" class="prod-img"><div class="p-overlay"><button class="p-quick">+ Carrito</button></div></div>
      <div class="product-info"><h4>Hoodie buso</h4><p class="product-sub">Accesorios · Street</p><div class="product-footer"><div><span class="price">$55.000</span></div><button class="btn-add">+ Carrito</button></div></div>
    </div>
    <div class="product-card">
      <div class="product-img"><img src="imagenes/gorras2.jpg" alt="gorras" class="prod-img"><span class="badge badge-sale">−20%</span><div class="p-overlay"><button class="p-quick">+ Carrito</button></div></div>
      <div class="product-info"><h4>Gorras Moda</h4><p class="product-sub">Accesorios · Retro</p><div class="product-footer"><div><span class="price">$32.000</span><span class="price-old">$40.000</span></div><button class="btn-add">+ Carrito</button></div></div>
    </div>
    <div class="product-card">
      <div class="product-img"> <img src="imagenes/mochila1.webp" alt="mochila" class="prod-img"> <span class="badge badge-hot">Hot</span><div class="p-overlay"><button class="p-quick">+ Carrito</button></div></div>
      <div class="product-info"><h4>Mochila </h4><p class="product-sub">Accesorios · Bag</p><div class="product-footer"><div><span class="price">$145.000</span></div><button class="btn-add">+ Carrito</button></div></div>
    </div>
    <div class="product-card">
      <div class="product-img"> <img src="imagenes/jacket1.jpg" alt="" class="prod-img"><span class="badge badge-new">Drop</span><div class="p-overlay"><button class="p-quick">+ Carrito</button></div></div>
      <div class="product-info"><h4>Jacket Coach</h4><p class="product-sub">Unisex · Premium</p><div class="product-footer"><div><span class="price">$265.000</span></div><button class="btn-add">+ Carrito</button></div></div>
    </div>
  </div>
</section>

<div class="sec-hd" style="padding-top:4rem;"><h2>POR QUÉ <span>// STREETFLOW</span></h2></div>
<div class="feature-band">
  <div class="feat-item"><span class="feat-icon">🚀</span><div class="feat-text"><strong>Envío Express</strong><span>24h para Bogotá, Medellín y Cali</span></div></div>
  <div class="feat-item"><span class="feat-icon">🔄</span><div class="feat-text"><strong>30 días de cambios</strong><span>Sin rollos. Si no te queda, lo cambiamos.</span></div></div>
  <div class="feat-item"><span class="feat-icon">🛡️</span><div class="feat-text"><strong>Calidad garantizada</strong><span>Materiales premium seleccionados a mano</span></div></div>
  <div class="feat-item"><span class="feat-icon">💳</span><div class="feat-text"><strong>Pagos flexibles</strong><span>Cuotas sin interés, Nequi, PSE y más</span></div></div>
</div>

<section class="testimonials">
  <div style="max-width:1200px;margin:0 auto;">
    <div class="sec-hd" style="padding:0 0 2.5rem;"><h2>LA CALLE <span>// HABLA</span></h2></div>
    <div class="testi-grid">
      <div class="testi-card"><div class="stars">★★★★★</div><p>"La hoodie oversized llegó en 2 días. La calidad es brutal, material grueso y con buena caída. Definitivamente compro de nuevo."</p><span class="testi-author">— Yeison M. · Medellín</span></div>
      <div class="testi-card"><div class="stars">★★★★★</div><p>"Los cargos son exactamente lo que buscaba. El fit es perfecto para el estilo urbano que manejo. El empaque también muy pro."</p><span class="testi-author">— Daniela R. · Bogotá</span></div>
      <div class="testi-card"><div class="stars">★★★★★</div><p>"El chatbot me ayudó a elegir la talla y me explicó todo sobre el envío. Se nota que la marca cuida los detalles."</p><span class="testi-author">— Camilo S. · Cali</span></div>
    </div>
  </div>
</section>

<section class="newsletter">
  <h2>ÚNETE AL <span>FLOW</span></h2>
  <p>Suscríbete y recibe los drops exclusivos antes que nadie, ofertas y contenido urbano.</p>
  <div class="nl-form">
    <input type="email" placeholder="tu@correo.com">
    <button class="btn-primary" style="clip-path:none;">Entrar</button>
  </div>
</section>

<footer>
  <div class="footer-grid">
    <div class="footer-brand">
      <span class="logo" style="display:block;margin-bottom:0.2rem;">STREET<span style="color:#a0a0a0">FLOW</span></span>
      <p>Moda urbana sin filtros. Diseñada para los que viven la calle, la crean y la representan.</p>
    </div>
    <div class="footer-col"><h5>Tienda</h5><ul><li><a href="#">Hoodies</a></li><li><a href="#">Cargos</a></li><li><a href="#">Calzado</a></li><li><a href="#">Accesorios</a></li><li><a href="#">Sale</a></li></ul></div>
    <div class="footer-col"><h5>Ayuda</h5><ul><li><a href="#">Guía de tallas</a></li><li><a href="#">Envíos</a></li><li><a href="#">Devoluciones</a></li><li><a href="#">Contacto</a></li></ul></div>
    <div class="footer-col"><h5>Marca</h5><ul><li><a href="#">Nosotros</a></li><li><a href="#">Lookbook</a></li><li><a href="#">Instagram</a></li><li><a href="#">TikTok</a></li></ul></div>
  </div>
  <div class="footer-bottom"><span>© 2025 Streetflow. Todos los derechos reservados.</span><span>Hecho con flow 🟢</span></div>
</footer>

<!-- CHAT TOGGLE -->
<button id="chat-toggle" title="Abrir asistente">🤖<div class="chat-ping"></div></button>

<!-- CHAT WINDOW -->
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
    <a href="wha"></a>
    <input type="text" id="chat-input" placeholder="Escribe tu pregunta..." autocomplete="off">
    <button class="chat-send" id="chat-send">➤</button>
  </div>
</div>

<script>
const SUGS = [
  { label: "🆕 Novedades del drop",   msg: "novedades" },
  { label: "📏 Guía de tallas",       msg: "talla" },
  { label: "🚚 Info de envíos",       msg: "envio" },
  { label: "🔄 Devoluciones",         msg: "devolucion" },
  { label: "💳 Formas de pago",       msg: "pago" },
  { label: "🔥 Ver ofertas",          msg: "oferta" },
  { label: "🤳 contacto",             msg: "contacto" },
  { label: "🗾 ubicación",            msg: "ubicacion" },
];

const RULES = [
  {
    k: ["hola","hey","buenas","saludos","que mas","ola","epale", "ey"],
    r: `¡Ey, qué más! 👊 Bienvenid@ al chat de <span class="kw">Streetflow</span>. Estoy aquí para ayudarte con lo que necesites.`
  },
  {
    k: ["novedades","nuevo","nueva","drop","coleccion","temporada","lanzamiento", "novedad"],
    r: ` El <span class="kw">Drop SS2026</span> ya está disponible. Tenemos <span class="kw">Hoodie Oversized</span> ($189.000), <span class="kw">Cargo Pants Wide</span> (con 30% off ahorita) y la nueva <span class="kw">Jacket Coach</span> ($265.000). ¿Quieres saber de alguna prenda específica? Y si necesitas info de <span class="kw">envio</span>, con gusto te explico.`
  },
  {
    k: ["talla","medida","tamaño","queda","fit","size"],
    r: ` Manejamos tallas <span class="kw">XS hasta XXL</span>. Tambien manejamos tallas de zapato <span class="kw">36 a 45</span>. ¿Tienes dudas de una prenda? Dime cuál es y te ayudo. Si ya tienes la tuya lista, escribe <span class="kw">comprar</span> para continuar.`
  },
  {
    k: ["envio","envío","domicilio","entrega","llegar","despacho","shipping"],
    r: `🚚 Hacemos <span class="kw">envíos a toda Colombia</span>. Envío <span class="kw">GRATIS</span> en compras desde $200.000. Para Bogotá, Medellín y Cali hay entrega <span class="kw">express en 24 horas</span>. El resto del país: 2 a 5 días hábiles. Tambien hacemos <span class="kw">devoluciones</span>. Solo escribe <span class="kw">cambio</span>, para darte mas informacion`
  },
  {
    k: ["devolucion","devolución","cambio","cambiar","garantia","retorno"],
    r: ` Tienes <span class="kw">30 días</span> para devolver o cambiar cualquier prenda. Solo necesita la etiqueta original y estar sin uso. ¿Necesitas iniciar uno? Escribe <span class="kw">contacto</span> y te conectamos con el equipo.`
  },
  {
    k: ["pago","pagar","cuota","tarjeta","efectivo","nequi","pse","banco"],
    r: `💳 Aceptamos <span class="kw">tarjetas</span> Visa/Mastercard, <span class="kw">PSE</span>, <span class="kw">Nequi</span>, Daviplata y efectivo por Efecty o Baloto. Con tarjetas de crédito tienes <span class="kw">hasta 12 cuotas sin interés</span>. ¿Ya tienes algo en el carrito? Escribe <span class="kw">comprar</span> para continuar.`
  },
  {
    k: ["oferta","descuento","sale","rebaja","promo","precio","barato"],
    r: `🏷️ ¡Hay ofertas activas! Los <span class="kw">Cargo Pants Wide</span> están al <span class="kw">−30%</span> (ahora $175.000) y la <span class="kw">Bandana Vintage</span> al −20%. En la sección <span class="kw">Sale</span> hay más piezas con hasta 40% off. ¿Cuál te interesa? Dime y te doy más detalles.`
  }, 
  {
    k: ["hoodie","sudadera","buzo","sweatshirt","poleron", "buso deportivo", "camisa", "chaqueta", ],
    r: ` La <span class="kw">Hoodie Oversized</span> es nuestro bestseller: $189.000, material 380gsm, tiro largo y cuello amplio. Disponible en negro, verde militar y gris. ¿Necesitas saber tu <span class="kw">talla</span> ideal? Escribe <span class="kw">talla</span> y te oriento. ¿Ya vas a pedir? Escribe <span class="kw">comprar</span>.`
  },
  {
    k: ["cargo","pantalon","pantalón","jogger","jean","pant"],
    r: `👖 Los <span class="kw">Cargo Pants Wide</span> están a $175.000 (antes $250.000). Fit baggy, bolssillos laterales y cintura ajustable. ¿Dudas con la <span class="kw">talla</span>? Cuéntame tu medida de cintura y te recomiendo la ideal. También puedes ver las otras <span class="kw">ofertas</span> activas si quieres.`
  },
  {
    k: ["zapatilla","sneaker","calzado","zapato","tenis","shoe","kicks", "juan pablo"],
    r: ` Se encuentra en la categoria de <span class="kw"> Calzado y Accesorios</span>. Aqui solo se envia informacion  general de muestra tienda <span class="kw">streetflow </span> como <span class="kw"> ubicación, contacto, horario, pago, devolución </span>`
  },
  {
    k: ["comprar","agregar","carrito","Angulo es gay", "pedido","quiero"],
    r: `🛒 ¡Vamos! Agrega los productos al carrito desde la tienda y elige tu método de <span class="kw">pago</span>. Si tienes dudas sobre alguna prenda, dime cuál es y te ayudo. ¿Ya sabes cómo llega tu pedido? Escribe <span class="kw">envio</span> para todos los detalles.`
  },
  {
    k: ["horario", "atencion", "antiende"],
    r: `⏰ Nuestro horario de atención es de lunes a viernes de 9am a 6pm. Fuera de ese horario, puedes escribirnos y te responderemos lo antes posible en el siguiente día hábil. Si quieres contacto directo, solo escribe <span class="kw">contacto</span> y te doy las opciones.`
  },
  {
    k: ["ubicación, dirección","donde estan","sede","tienda","local","oficina","dónde están", "ubicacion","direccion"],
    r: `Nos encontramos en <span class="kw">Neiva-huila, san pedro plaza-local 101</span>, pero hacemos envíos a toda Colombia. Si quieres el horario de atencion, solo escribe <span class="kw">horario</span> y te doy las opciones.`
  },
  {
    k: ["contacto","whatsapp","llamar","hablar","persona","humano", "usuario"],
    r: `📞 Puedes contactarnos por <a href="https://wa.me/573102916140" target="_blank"><span class="kw">WhatsApp</span></a> o por <span class="kw">Instagram</span> @streetflow.co. Respuesta en menos de 2 horas en horario hábil. ¿Hay algo más que pueda ayudarte? Escribe lo que necesitas.`
  },
];

const DEFAULT = `Mmmh, no caché bien esa 🤔 Pero puedo ayudarte con: <span class="kw">talla</span>, <span class="kw">envio</span>, <span class="kw">pago</span>, <span class="kw">devolucion</span>, <span class="kw">oferta</span>, <span class="kw">hoodie</span>, <span class="kw">cargo</span> o <span class="kw">comprar</span>. Escribe alguna y te respondo.`;

const toggle   = document.getElementById('chat-toggle');
const win      = document.getElementById('chat-window');
const closeBtn = document.getElementById('chat-close');
const msgs     = document.getElementById('chat-messages');
const input    = document.getElementById('chat-input');
const sendBtn  = document.getElementById('chat-send');
const sugWrap  = document.getElementById('sug-wrap');
const sugCont  = document.getElementById('sug-container');

function time() {
  const d = new Date();
  return String(d.getHours()).padStart(2,'0') + ':' + String(d.getMinutes()).padStart(2,'0');
}

function addMsg(html, side) {
  const div = document.createElement('div');
  div.className = 'msg ' + side;
  if (side === 'bot') {
    div.innerHTML = `<div class="msg-av">🤖</div><div><div class="bubble">${html}</div><div class="msg-time">${time()}</div></div>`;
  } else {
    div.innerHTML = `<div><div class="bubble">${html}</div><div class="msg-time" style="text-align:right">${time()}</div></div>`;
  }
  msgs.appendChild(div);
  msgs.scrollTop = msgs.scrollHeight;
}

function showTyping() {
  const d = document.createElement('div');
  d.className = 'msg bot'; d.id = 'typing';
  d.innerHTML = `<div class="msg-av">🤖</div><div class="typing-indicator"><div class="tdot"></div><div class="tdot"></div><div class="tdot"></div></div>`;
  msgs.appendChild(d);
  msgs.scrollTop = msgs.scrollHeight;
}

function removeTyping() { const t = document.getElementById('typing'); if (t) t.remove(); }

function normalize(s) { return s.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g,''); }

function getReply(text) {
  const n = normalize(text);
  for (const rule of RULES) {
    if (rule.k.some(k => n.includes(normalize(k)))) return rule.r;
  }
  return DEFAULT;
}

function send(text) {
  if (!text.trim()) return;
  addMsg(text, 'user');
  input.value = '';
  sugWrap.style.display = 'none';
  showTyping();
  setTimeout(() => { removeTyping(); addMsg(getReply(text), 'bot'); }, 700 + Math.random()*600);
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
        addMsg(`¡Ey! 👊 Soy el asistente virtual de <span class="kw">Streetflow</span>. Estoy aquí para ayudarte con lo que necesites. Cuéntame, ¿qué andas buscando hoy?`, 'bot');
        buildSugs();
      }, 1100);
    }, 300);
  }
}

toggle.addEventListener('click', () => { win.classList.contains('open') ? win.classList.remove('open') : openChat(); });
closeBtn.addEventListener('click', () => win.classList.remove('open'));
sendBtn.addEventListener('click', () => send(input.value));
input.addEventListener('keydown', e => { if (e.key === 'Enter') send(input.value); });
</script>
</body>
</html>