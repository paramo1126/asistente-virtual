<?php
// ══════════════════════════════════════════════
//  CONFIGURACIÓN
// ══════════════════════════════════════════════
define('API_KEY',  'sk-ant-TU_API_KEY_AQUI');   // ← PON TU KEY AQUÍ
define('API_URL',  'https://api.anthropic.com/v1/messages');

// ══════════════════════════════════════════════
//  CATÁLOGO DE PRODUCTOS
// ══════════════════════════════════════════════
$catalogo = [
  // ─── BUSOS ───
  ['id'=>1,'nombre'=>'Buso Clásico Oversize','categoria'=>'busos','marca'=>'UrbanCo','talla'=>'S','color'=>'Negro','precio'=>52000,'imagen'=>'https://images.unsplash.com/photo-1556821840-3a63f15732ce?w=500&h=600&fit=crop','desc'=>'Algodón 100%, corte holgado moderno','stock'=>14,'nuevo'=>true,'oferta'=>false],
  ['id'=>2,'nombre'=>'Buso Hoodie Básico','categoria'=>'busos','marca'=>'UrbanCo','talla'=>'S','color'=>'Blanco','precio'=>48000,'imagen'=>'https://images.unsplash.com/photo-1618354691373-d851c5c3a990?w=500&h=600&fit=crop','desc'=>'Hoodie con capucha y bolsillo canguro','stock'=>9,'nuevo'=>false,'oferta'=>true,'precio_antes'=>62000],
  ['id'=>3,'nombre'=>'Buso Deportivo Pro','categoria'=>'busos','marca'=>'SportFit','talla'=>'M','color'=>'Gris','precio'=>38000,'imagen'=>'https://images.unsplash.com/photo-1509942774463-acf339cf87d5?w=500&h=600&fit=crop','desc'=>'Tejido técnico transpirable','stock'=>22,'nuevo'=>false,'oferta'=>false],
  ['id'=>4,'nombre'=>'Buso Slim Urban','categoria'=>'busos','marca'=>'UrbanCo','talla'=>'M','color'=>'Azul','precio'=>55000,'imagen'=>'https://images.unsplash.com/photo-1503341504253-dff4815485f1?w=500&h=600&fit=crop','desc'=>'Corte slim para look urbano','stock'=>11,'nuevo'=>true,'oferta'=>false],
  ['id'=>5,'nombre'=>'Buso Premium Lana','categoria'=>'busos','marca'=>'Luxe','talla'=>'L','color'=>'Verde','precio'=>89000,'imagen'=>'https://images.unsplash.com/photo-1562157873-818bc0726f68?w=500&h=600&fit=crop','desc'=>'Lana merino premium, ultra suave','stock'=>4,'nuevo'=>false,'oferta'=>false],
  ['id'=>6,'nombre'=>'Buso Crop Mujer','categoria'=>'busos','marca'=>'FemStyle','talla'=>'S','color'=>'Rosa','precio'=>44000,'imagen'=>'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=500&h=600&fit=crop','desc'=>'Buso crop tendencia actual','stock'=>17,'nuevo'=>true,'oferta'=>false],
  // ─── CAMISETAS ───
  ['id'=>7,'nombre'=>'Camiseta Básica Essential','categoria'=>'camisetas','marca'=>'BasicWear','talla'=>'S','color'=>'Blanco','precio'=>25000,'imagen'=>'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=500&h=600&fit=crop','desc'=>'Algodón peinado 180g, corte recto','stock'=>40,'nuevo'=>false,'oferta'=>false],
  ['id'=>8,'nombre'=>'Camiseta Gráfica Street','categoria'=>'camisetas','marca'=>'StreetLab','talla'=>'M','color'=>'Negro','precio'=>35000,'imagen'=>'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=500&h=600&fit=crop','desc'=>'Estampado urbano edición limitada','stock'=>8,'nuevo'=>true,'oferta'=>false],
  ['id'=>9,'nombre'=>'Camiseta Polo Clásica','categoria'=>'camisetas','marca'=>'ClassicCo','talla'=>'L','color'=>'Azul marino','precio'=>42000,'imagen'=>'https://images.unsplash.com/photo-1586790170083-2f9ceadc732d?w=500&h=600&fit=crop','desc'=>'Polo piqué de algodón premium','stock'=>15,'nuevo'=>false,'oferta'=>true,'precio_antes'=>55000],
  // ─── PANTALONES ───
  ['id'=>10,'nombre'=>'Jean Skinny Stretch','categoria'=>'pantalones','marca'=>'DenimLab','talla'=>'S','color'=>'Azul','precio'=>85000,'imagen'=>'https://images.unsplash.com/photo-1542272454315-4c01d7abdf4a?w=500&h=600&fit=crop','desc'=>'Jean skinny con 2% elastano','stock'=>12,'nuevo'=>false,'oferta'=>false],
  ['id'=>11,'nombre'=>'Cargo Tactical','categoria'=>'pantalones','marca'=>'UrbanCo','talla'=>'M','color'=>'Negro','precio'=>78000,'imagen'=>'https://images.unsplash.com/photo-1473966968600-fa801b869a1a?w=500&h=600&fit=crop','desc'=>'Cargo con 6 bolsillos funcionales','stock'=>7,'nuevo'=>true,'oferta'=>false],
  ['id'=>12,'nombre'=>'Jean Wide Leg','categoria'=>'pantalones','marca'=>'DenimLab','talla'=>'M','color'=>'Gris','precio'=>92000,'imagen'=>'https://images.unsplash.com/photo-1548690312-e3b507d8c110?w=500&h=600&fit=crop','desc'=>'Pierna ancha, tendencia 2025','stock'=>9,'nuevo'=>true,'oferta'=>false],
  // ─── CHAQUETAS ───
  ['id'=>13,'nombre'=>'Chaqueta Cuero Moto','categoria'=>'chaquetas','marca'=>'Luxe','talla'=>'M','color'=>'Negro','precio'=>185000,'imagen'=>'https://images.unsplash.com/photo-1551028719-00167b16eac5?w=500&h=600&fit=crop','desc'=>'Cuero sintético premium, estilo biker','stock'=>3,'nuevo'=>false,'oferta'=>false],
  ['id'=>14,'nombre'=>'Chaqueta Denim Vintage','categoria'=>'chaquetas','marca'=>'DenimLab','talla'=>'L','color'=>'Azul','precio'=>95000,'imagen'=>'https://images.unsplash.com/photo-1576871337632-b9aef4c17ab9?w=500&h=600&fit=crop','desc'=>'Jean lavado efecto vintage','stock'=>6,'nuevo'=>false,'oferta'=>true,'precio_antes'=>120000],
  ['id'=>15,'nombre'=>'Bomber Universitaria','categoria'=>'chaquetas','marca'=>'CollegeWear','talla'=>'S','color'=>'Verde','precio'=>115000,'imagen'=>'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=500&h=600&fit=crop','desc'=>'Bomber estilo universitario americano','stock'=>5,'nuevo'=>true,'oferta'=>false],
  // ─── ZAPATOS ───
  ['id'=>16,'nombre'=>'Adidas Stan Smith OG','categoria'=>'zapatos','marca'=>'Adidas','talla'=>'42','color'=>'Blanco','precio'=>280000,'imagen'=>'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=500&h=600&fit=crop','desc'=>'Clásico de clásicos, cuero genuino','stock'=>5,'nuevo'=>false,'oferta'=>false],
  ['id'=>17,'nombre'=>'Adidas Ultraboost 24','categoria'=>'zapatos','marca'=>'Adidas','talla'=>'43','color'=>'Negro','precio'=>420000,'imagen'=>'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=500&h=600&fit=crop','desc'=>'Tecnología Boost para máximo confort','stock'=>3,'nuevo'=>true,'oferta'=>false],
  ['id'=>18,'nombre'=>'Adidas Forum Low','categoria'=>'zapatos','marca'=>'Adidas','talla'=>'41','color'=>'Blanco/Azul','precio'=>320000,'imagen'=>'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?w=500&h=600&fit=crop','desc'=>'Retro basketball icónico de los 80s','stock'=>7,'nuevo'=>false,'oferta'=>true,'precio_antes'=>380000],
  ['id'=>19,'nombre'=>'Nike Air Force 1','categoria'=>'zapatos','marca'=>'Nike','talla'=>'42','color'=>'Blanco','precio'=>350000,'imagen'=>'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=500&h=600&fit=crop','desc'=>'El sneaker más icónico de todos los tiempos','stock'=>8,'nuevo'=>false,'oferta'=>false],
  ['id'=>20,'nombre'=>'Nike Air Max 270','categoria'=>'zapatos','marca'=>'Nike','talla'=>'44','color'=>'Negro/Rojo','precio'=>390000,'imagen'=>'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=500&h=600&fit=crop','desc'=>'Amortiguación Air Max de 270°','stock'=>4,'nuevo'=>true,'oferta'=>false],
];

// ══════════════════════════════════════════════
//  AJAX — responde JSON cuando es POST
// ══════════════════════════════════════════════
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  header('Content-Type: application/json; charset=utf-8');
  $body    = json_decode(file_get_contents('php://input'), true);
  $msg     = trim($body['mensaje'] ?? '');
  $history = $body['historial'] ?? [];
  if (!$msg) { echo json_encode(['error'=>'Mensaje vacío']); exit; }

  $catalogoJson = json_encode($catalogo, JSON_UNESCAPED_UNICODE);
  $system = "Eres el asistente virtual de UrbanStore, tienda de ropa y calzado colombiana.
Usa lenguaje amigable, joven y en español colombiano.

CATÁLOGO (JSON):
$catalogoJson

REGLAS:
1. Si el cliente quiere VER/BUSCAR/ENCONTRAR productos → responde SOLO con este JSON:
{\"mensaje\":\"texto corto y amigable\",\"accion\":\"filtrar\",\"filtros\":{\"categoria\":\"\",\"marca\":\"\",\"talla\":\"\",\"color\":\"\",\"precio_max\":null}}

2. Para conversación normal → SOLO este JSON:
{\"mensaje\":\"texto amigable\",\"accion\":\"chat\",\"filtros\":null}

3. SOLO JSON puro, sin texto adicional.
4. Detecta: ver/mostrar/buscar/tienen/hay/quiero/dame/cuáles = quiere filtrar.
5. 'zapatos adidas' → categoria:zapatos, marca:Adidas
6. 'menos de 100 mil' → precio_max:100000
7. 'todo / todos' → filtros todos vacíos con accion:filtrar";

  $msgs = array_map(fn($m)=>['role'=>$m['role'],'content'=>$m['content']], $history);
  $msgs[] = ['role'=>'user','content'=>$msg];

  try {
    $ch = curl_init(API_URL);
    curl_setopt_array($ch,[
      CURLOPT_RETURNTRANSFER=>true, CURLOPT_POST=>true,
      CURLOPT_POSTFIELDS=>json_encode(['model'=>'claude-sonnet-4-20250514','max_tokens'=>600,'system'=>$system,'messages'=>$msgs]),
      CURLOPT_HTTPHEADER=>['Content-Type: application/json','x-api-key: '.API_KEY,'anthropic-version: 2023-06-01'],
      CURLOPT_TIMEOUT=>30, CURLOPT_SSL_VERIFYPEER=>false,
    ]);
    $raw = curl_exec($ch); $err = curl_error($ch); curl_close($ch);
    if($err) throw new Exception($err);
    $resp = json_decode($raw, true);
    if(isset($resp['error'])) throw new Exception($resp['error']['message']);
    $txt = trim($resp['content'][0]['text'] ?? '');
    $txt = preg_replace('/^```json\s*/i','',$txt);
    $txt = preg_replace('/```$/','',$txt);
    $parsed = json_decode(trim($txt), true);
    if(!$parsed) $parsed = ['mensaje'=>$txt,'accion'=>'chat','filtros'=>null];

    $ids = [];
    if($parsed['accion']==='filtrar' && !empty($parsed['filtros'])){
      $f = $parsed['filtros'];
      foreach($catalogo as $p){
        $ok=true;
        if(!empty($f['categoria']) && stripos($p['categoria'],$f['categoria'])===false) $ok=false;
        if(!empty($f['marca'])     && stripos($p['marca'],    $f['marca'])    ===false) $ok=false;
        if(!empty($f['talla'])     && strtoupper($p['talla'])!==strtoupper(trim($f['talla']))) $ok=false;
        if(!empty($f['color'])     && stripos($p['color'],    $f['color'])    ===false) $ok=false;
        if(!empty($f['precio_max'])&& $p['precio']>$f['precio_max']) $ok=false;
        if($ok) $ids[]=$p['id'];
      }
      // Si filtros vacíos = mostrar todos
      if(empty($f['categoria'])&&empty($f['marca'])&&empty($f['talla'])&&empty($f['color'])&&empty($f['precio_max'])){
        $ids = array_column($catalogo,'id');
      }
    }
    echo json_encode(['mensaje'=>$parsed['mensaje'],'accion'=>$parsed['accion'],'ids'=>$ids], JSON_UNESCAPED_UNICODE);
  } catch(Exception $e){
    http_response_code(500);
    echo json_encode(['error'=>$e->getMessage()]);
  }
  exit;
}

$catalogoJS  = json_encode($catalogo, JSON_UNESCAPED_UNICODE|JSON_HEX_TAG);
$totalProds  = count($catalogo);
$categorias  = array_unique(array_column($catalogo,'categoria'));
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<title>UrbanStore — Tienda de Ropa</title>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --bg:#f5f3ef; --white:#fff; --dark:#111110;
  --accent:#e8441a; --accent2:#1a3bff;
  --gray:#e0ddd8; --gray2:#c5c2bc; --muted:#8a8780;
  --r:12px; --font:'Outfit',sans-serif; --dis:'Bebas Neue',cursive;
}
html{scroll-behavior:smooth}
body{font-family:var(--font);background:var(--bg);color:var(--dark);min-height:100vh}

/* ── HEADER ── */
header{
  background:var(--dark);color:var(--white);
  display:flex;align-items:center;justify-content:space-between;
  padding:0 40px;height:66px;position:sticky;top:0;z-index:300;
}
.logo{font-family:var(--dis);font-size:2rem;letter-spacing:.06em}
.logo span{color:var(--accent)}
.nav-links{display:flex;gap:28px}
.nav-links a{color:rgba(255,255,255,.65);text-decoration:none;font-size:.82rem;font-weight:600;
  letter-spacing:.06em;text-transform:uppercase;transition:color .2s}
.nav-links a:hover{color:#fff}
.hd-right{display:flex;align-items:center;gap:14px}
.cart-ico{
  background:var(--accent);color:#fff;border:none;padding:9px 20px;
  border-radius:8px;font-family:var(--font);font-size:.82rem;font-weight:600;
  cursor:pointer;letter-spacing:.04em;transition:background .2s,transform .15s;
}
.cart-ico:hover{background:#c83515;transform:scale(1.04)}

/* ── HERO ── */
.hero{
  background:var(--dark);color:#fff;padding:72px 40px;
  display:flex;align-items:center;justify-content:space-between;gap:40px;
  overflow:hidden;position:relative;
}
.hero::after{
  content:'';position:absolute;inset:0;
  background:radial-gradient(ellipse 55% 80% at 72% 55%,rgba(232,68,26,.18),transparent);
  pointer-events:none;
}
.hero-txt h1{font-family:var(--dis);font-size:clamp(3.2rem,7vw,6.5rem);line-height:.92;margin-bottom:18px}
.hero-txt h1 em{color:var(--accent);font-style:normal}
.hero-txt p{font-size:.98rem;color:rgba(255,255,255,.6);max-width:420px;line-height:1.65;margin-bottom:28px}
.hero-cta{
  background:var(--accent);color:#fff;border:none;padding:14px 38px;
  border-radius:10px;font-family:var(--font);font-size:.98rem;font-weight:600;
  cursor:pointer;letter-spacing:.03em;transition:background .2s,transform .15s;
}
.hero-cta:hover{background:#c83515;transform:scale(1.05)}
.hero-img{width:340px;height:330px;border-radius:18px;object-fit:cover;flex-shrink:0;
  position:relative;z-index:1;opacity:.88}

/* ── BARRA FILTROS ── */
.shopbar{
  background:var(--white);border-bottom:1px solid var(--gray);
  padding:16px 40px;display:flex;align-items:center;gap:10px;flex-wrap:wrap;
  position:sticky;top:66px;z-index:200;
}
.shopbar-title{font-family:var(--dis);font-size:1.05rem;letter-spacing:.06em;margin-right:6px}
.fbtn{
  background:var(--bg);border:1.5px solid var(--gray2);color:var(--muted);
  padding:6px 18px;border-radius:30px;font-family:var(--font);font-size:.78rem;
  font-weight:600;cursor:pointer;transition:all .18s;letter-spacing:.03em;
}
.fbtn:hover,.fbtn.on{background:var(--dark);border-color:var(--dark);color:#fff}
#srch{
  border:1.5px solid var(--gray2);background:var(--bg);padding:6px 16px;
  border-radius:30px;font-family:var(--font);font-size:.78rem;outline:none;
  width:175px;transition:border-color .2s;
}
#srch:focus{border-color:var(--dark)}
.cnt{margin-left:auto;font-size:.78rem;color:var(--muted);font-weight:500}
.reset-btn{
  background:transparent;border:1.5px solid var(--accent);color:var(--accent);
  padding:6px 14px;border-radius:30px;font-family:var(--font);font-size:.75rem;
  font-weight:600;cursor:pointer;transition:all .18s;display:none;
}
.reset-btn.show{display:inline-flex}
.reset-btn:hover{background:var(--accent);color:#fff}

/* ── GRID ── */
.shop{padding:32px 40px 100px}
.pgrid{display:grid;grid-template-columns:repeat(auto-fill,minmax(225px,1fr));gap:20px}

/* ── CARD ── */
.pcard{
  background:var(--white);border-radius:var(--r);overflow:hidden;
  cursor:pointer;border:2px solid transparent;
  transition:transform .22s,box-shadow .22s,border-color .22s,opacity .22s,filter .22s;
  position:relative;
}
.pcard:hover{transform:translateY(-6px);box-shadow:0 18px 44px rgba(0,0,0,.09)}
.pcard.hl{
  border-color:var(--accent);
  box-shadow:0 0 0 4px rgba(232,68,26,.14),0 18px 44px rgba(232,68,26,.13);
  transform:translateY(-6px);
}
.pcard.dm{opacity:.28;filter:grayscale(.6);transform:none!important}

.bw{position:absolute;top:11px;left:11px;display:flex;gap:5px;z-index:2}
.bdg{font-size:.62rem;font-weight:700;padding:3px 9px;border-radius:5px;
  letter-spacing:.07em;text-transform:uppercase}
.bdg.nv{background:var(--accent2);color:#fff}
.bdg.of{background:var(--accent);color:#fff}
.bdg.sl{background:#f59e0b;color:#000}

.imgw{height:245px;overflow:hidden;background:var(--bg)}
.cimg{width:100%;height:100%;object-fit:cover;transition:transform .32s;display:block}
.pcard:hover .cimg,.pcard.hl .cimg{transform:scale(1.06)}

.cbody{padding:14px 15px 13px}
.cmarca{font-size:.67rem;font-weight:700;color:var(--muted);letter-spacing:.1em;
  text-transform:uppercase;margin-bottom:2px}
.cname{font-size:.93rem;font-weight:600;margin-bottom:4px;line-height:1.3}
.cdesc{font-size:.73rem;color:var(--muted);margin-bottom:10px;line-height:1.4}
.cmeta{display:flex;align-items:center;justify-content:space-between;margin-bottom:11px}
.cprice{font-size:1.02rem;font-weight:700;color:var(--accent)}
.cprice-old{font-size:.73rem;color:var(--muted);text-decoration:line-through;margin-left:5px}
.ctags{display:flex;gap:4px}
.ctag{background:var(--bg);border:1px solid var(--gray);font-size:.67rem;
  padding:2px 8px;border-radius:5px;color:var(--dark);font-weight:600}
.ctag.tl{border-color:var(--accent2);color:var(--accent2)}
.stk{font-size:.7rem;color:#f59e0b;margin-bottom:8px}
.addcart{
  width:100%;padding:10px;border:none;background:var(--dark);color:#fff;
  border-radius:8px;font-family:var(--font);font-size:.82rem;font-weight:600;
  cursor:pointer;letter-spacing:.02em;transition:background .18s,transform .14s;
}
.addcart:hover{background:#333;transform:scale(1.02)}

/* ── FOOTER ── */
footer{background:var(--dark);color:rgba(255,255,255,.45);text-align:center;
  padding:26px;font-size:.78rem}
footer b{color:var(--accent)}

/* ══════════════════════════════
   CHATBOT FLOTANTE
══════════════════════════════ */
#chatBtn{
  position:fixed;bottom:28px;right:28px;z-index:900;
  width:62px;height:62px;border-radius:50%;border:none;
  background:var(--accent);color:#fff;cursor:pointer;
  box-shadow:0 6px 26px rgba(232,68,26,.5);
  display:flex;align-items:center;justify-content:center;
  font-size:1.7rem;transition:transform .2s,box-shadow .2s;
  animation:popIn .55s cubic-bezier(.36,.07,.19,.97) both;
}
#chatBtn:hover{transform:scale(1.13);box-shadow:0 10px 34px rgba(232,68,26,.6)}
@keyframes popIn{0%{transform:scale(0);opacity:0}80%{transform:scale(1.12)}100%{transform:scale(1);opacity:1}}
.notif{
  position:absolute;top:-2px;right:-2px;
  background:var(--accent2);color:#fff;width:19px;height:19px;
  border-radius:50%;font-size:.6rem;font-weight:800;
  display:flex;align-items:center;justify-content:center;
  border:2px solid var(--white);
}

/* ── CHAT WINDOW ── */
#chatWin{
  position:fixed;bottom:102px;right:28px;z-index:899;
  width:375px;border-radius:20px;background:var(--white);
  box-shadow:0 24px 80px rgba(0,0,0,.18);
  display:flex;flex-direction:column;overflow:hidden;
  max-height:570px;
  transform:scale(.88) translateY(24px);opacity:0;pointer-events:none;
  transition:transform .3s cubic-bezier(.34,1.56,.64,1),opacity .25s;
}
#chatWin.open{transform:scale(1) translateY(0);opacity:1;pointer-events:all}

.cwh{
  background:var(--dark);padding:15px 18px;
  display:flex;align-items:center;gap:11px;flex-shrink:0;
}
.cwav{
  width:40px;height:40px;border-radius:50%;background:var(--accent);
  display:flex;align-items:center;justify-content:center;font-size:1.25rem;
}
.cwnm{font-family:var(--dis);font-size:1rem;letter-spacing:.06em;color:#fff}
.cwst{font-size:.7rem;color:rgba(255,255,255,.5);display:flex;align-items:center;gap:5px}
.cwdot{width:6px;height:6px;border-radius:50%;background:#4ade80}
.cwx{margin-left:auto;background:rgba(255,255,255,.1);border:none;color:#fff;
  width:30px;height:30px;border-radius:8px;cursor:pointer;font-size:1.1rem;
  display:flex;align-items:center;justify-content:center;transition:background .18s}
.cwx:hover{background:rgba(255,255,255,.2)}

/* mensajes */
.cwmsgs{
  flex:1;overflow-y:auto;padding:15px;display:flex;flex-direction:column;gap:10px;
  scrollbar-width:thin;scrollbar-color:var(--gray) transparent;
}
.cm{display:flex;gap:7px;animation:cm_in .24s ease}
.cm.u{flex-direction:row-reverse}
@keyframes cm_in{from{opacity:0;transform:translateY(6px)}to{opacity:1;transform:none}}
.cmav{width:28px;height:28px;border-radius:8px;flex-shrink:0;display:flex;
  align-items:center;justify-content:center;font-size:.8rem}
.cmav.bot{background:var(--accent);color:#fff}
.cmav.u{background:var(--accent2);color:#fff}
.cmbbl{max-width:82%;padding:10px 13px;border-radius:11px;font-size:.82rem;line-height:1.52}
.cm.bot .cmbbl{background:var(--bg);border:1px solid var(--gray);border-top-left-radius:3px}
.cm.u .cmbbl{background:var(--dark);color:#fff;border-top-right-radius:3px}

/* typing */
.ctyp .cmbbl{display:flex;align-items:center;gap:4px;padding:12px 15px}
.ctd{width:5px;height:5px;border-radius:50%;background:var(--muted);animation:td 1.2s infinite}
.ctd:nth-child(2){animation-delay:.2s}.ctd:nth-child(3){animation-delay:.4s}
@keyframes td{0%,60%,100%{transform:translateY(0)}30%{transform:translateY(-5px)}}

/* hint resultado */
.crhint{
  background:rgba(232,68,26,.07);border:1px solid rgba(232,68,26,.2);
  border-radius:9px;padding:9px 12px;font-size:.78rem;
  display:flex;align-items:center;gap:8px;
}
.crhint b{color:var(--accent)}

/* quick buttons */
.cwq{padding:8px 13px 4px;display:flex;gap:5px;flex-wrap:wrap;flex-shrink:0}
.cqb{
  background:var(--bg);border:1.5px solid var(--gray);color:var(--muted);
  font-family:var(--font);font-size:.71rem;font-weight:600;
  padding:5px 11px;border-radius:20px;cursor:pointer;transition:all .17s;white-space:nowrap;
}
.cqb:hover{border-color:var(--accent);color:var(--accent)}

/* input */
.cwi{
  padding:11px 13px;border-top:1px solid var(--gray);
  display:flex;gap:8px;align-items:flex-end;flex-shrink:0;
}
.cwi textarea{
  flex:1;border:1.5px solid var(--gray);background:var(--bg);
  color:var(--dark);padding:9px 13px;border-radius:10px;
  font-family:var(--font);font-size:.82rem;
  resize:none;min-height:40px;max-height:90px;outline:none;transition:border-color .2s;
}
.cwi textarea:focus{border-color:var(--accent)}
.cwi textarea::placeholder{color:var(--muted)}
.cws{
  width:40px;height:40px;border-radius:10px;border:none;background:var(--accent);
  cursor:pointer;flex-shrink:0;display:flex;align-items:center;justify-content:center;
  transition:transform .15s,opacity .2s;
}
.cws:hover{transform:scale(1.08)}.cws:disabled{opacity:.35;cursor:not-allowed}
.cws svg{width:16px;height:16px;fill:#fff}

/* ── RESPONSIVE ── */
@media(max-width:768px){
  header{padding:0 16px}.nav-links{display:none}
  .hero{flex-direction:column;padding:40px 16px}.hero-img{width:100%;height:210px}
  .shopbar{padding:12px 16px}.shop{padding:18px 14px 90px}
  #chatWin{width:calc(100vw - 28px);right:14px;bottom:96px}
}
</style>
</head>
<body>

<!-- HEADER -->
<header>
  <div class="logo">URBAN<span>STORE</span></div>
  <nav class="nav-links">
    <a href="#tienda">Tienda</a>
    <a href="#">Hombres</a>
    <a href="#">Mujeres</a>
    <a href="#">Ofertas</a>
    <a href="#">Contacto</a>
  </nav>
  <div class="hd-right">
    <button class="cart-ico" id="cartBtn">🛒 Carrito (0)</button>
  </div>
</header>

<!-- HERO -->
<section class="hero">
  <div class="hero-txt">
    <h1>NUEVA<br>COLECCIÓN<br><em>2025</em></h1>
    <p>Moda urbana que habla por ti. Busos, camisetas, chaquetas, jeans y sneakers premium para tu estilo único.</p>
    <button class="hero-cta" onclick="document.getElementById('tienda').scrollIntoView({behavior:'smooth'})">
      Explorar colección →
    </button>
  </div>
  <img class="hero-img" src="https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?w=700&h=500&fit=crop" alt="Nueva colección"/>
</section>

<!-- BARRA FILTROS -->
<div class="shopbar" id="tienda">
  <span class="shopbar-title">TIENDA</span>
  <button class="fbtn on" data-cat="todos" onclick="filtrar(this,'todos')">Todos</button>
  <?php foreach($categorias as $c): ?>
  <button class="fbtn" data-cat="<?=$c?>" onclick="filtrar(this,'<?=$c?>')"><?=ucfirst($c)?></button>
  <?php endforeach ?>
  <input id="srch" type="text" placeholder="🔍 Buscar producto…" oninput="buscarTxt(this.value)"/>
  <button class="reset-btn" id="resetBtn" onclick="resetFiltros()">✕ Limpiar filtro IA</button>
  <span class="cnt" id="cnt"><?=$totalProds?> productos</span>
</div>

<!-- GRID PRODUCTOS -->
<section class="shop">
  <div class="pgrid" id="pgrid">
    <?php foreach($catalogo as $p):
      $pf = '$'.number_format($p['precio'],0,',','.');
      $af = isset($p['precio_antes']) ? '$'.number_format($p['precio_antes'],0,',','.') : '';
    ?>
    <div class="pcard"
         id="p<?=$p['id']?>"
         data-id="<?=$p['id']?>"
         data-cat="<?=$p['categoria']?>"
         data-search="<?=strtolower($p['nombre'].' '.$p['marca'].' '.$p['color'].' '.$p['categoria'])?>">

      <div class="bw">
        <?php if($p['nuevo']): ?><span class="bdg nv">Nuevo</span><?php endif ?>
        <?php if($p['oferta']): ?><span class="bdg of">Oferta</span><?php endif ?>
        <?php if($p['stock']<=4): ?><span class="bdg sl">Solo <?=$p['stock']?></span><?php endif ?>
      </div>

      <div class="imgw">
        <img class="cimg" src="<?=$p['imagen']?>" alt="<?=$p['nombre']?>" loading="lazy"
          onerror="this.src='https://placehold.co/500x600/e0ddd8/8a8780?text=<?=urlencode($p['nombre'])?>'"/>
      </div>

      <div class="cbody">
        <div class="cmarca"><?=$p['marca']?></div>
        <div class="cname"><?=$p['nombre']?></div>
        <div class="cdesc"><?=$p['desc']?></div>
        <div class="cmeta">
          <div>
            <span class="cprice"><?=$pf?></span>
            <?php if($af): ?><span class="cprice-old"><?=$af?></span><?php endif ?>
          </div>
          <div class="ctags">
            <span class="ctag tl"><?=$p['talla']?></span>
            <span class="ctag"><?=$p['color']?></span>
          </div>
        </div>
        <?php if($p['stock']<=4): ?><div class="stk">⚠️ ¡Solo <?=$p['stock']?> disponibles!</div><?php endif ?>
        <button class="addcart" onclick="addCart(event,<?=$p['id']?>,'<?=addslashes($p['nombre'])?>')">
          Agregar al carrito
        </button>
      </div>
    </div>
    <?php endforeach ?>
  </div>
</section>

<footer>
  <p>© 2025 <b>UrbanStore</b> — Moda urbana premium. Hecho con ❤️ en Colombia</p>
</footer>

<!-- ══ CHAT BOTÓN FLOTANTE ══ -->
<button id="chatBtn" onclick="toggleChat()" title="Habla con nuestro asistente IA">
  <span id="chatIco">💬</span>
  <span class="notif" id="notif">1</span>
</button>

<!-- ══ CHAT VENTANA ══ -->
<div id="chatWin">
  <div class="cwh">
    <div class="cwav">🤖</div>
    <div>
      <div class="cwnm">ASISTENTE IA</div>
      <div class="cwst"><span class="cwdot"></span>En línea · UrbanStore</div>
    </div>
    <button class="cwx" onclick="toggleChat()">✕</button>
  </div>

  <div class="cwmsgs" id="cwmsgs">
    <div class="cm bot">
      <div class="cmav bot">🤖</div>
      <div class="cmbbl">¡Hola! 👋 Soy el asistente de <strong>UrbanStore</strong>.<br>
      Dime qué buscas y te lo muestro en la tienda al instante:<br>
      <em>"busos talla S"</em> · <em>"zapatos Adidas"</em> · <em>"algo negro menos de $80.000"</em></div>
    </div>
  </div>

  <div class="cwq">
    <button class="cqb" onclick="qsend('Busos talla S')">👕 Busos S</button>
    <button class="cqb" onclick="qsend('Zapatos Adidas disponibles')">👟 Adidas</button>
    <button class="cqb" onclick="qsend('Chaquetas en oferta')">🧥 Chaquetas</button>
    <button class="cqb" onclick="qsend('Camisetas talla M')">👚 Camisetas M</button>
    <button class="cqb" onclick="qsend('Mostrar todos los productos')">📦 Ver todo</button>
  </div>

  <div class="cwi">
    <textarea id="cwinp" placeholder="Escribe lo que buscas…" rows="1"
      onkeydown="cwtecla(event)" oninput="cwajust(this)"></textarea>
    <button class="cws" id="cwsend" onclick="cwenviar()">
      <svg viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
    </button>
  </div>
</div>

<script>
const PRODS = <?=$catalogoJS?>;
let hist=[], busy=false, chatOpen=false, cartN=0, filtroIA=false;

// ── TOGGLE ────────────────────────────────────
function toggleChat(){
  chatOpen=!chatOpen;
  document.getElementById('chatWin').classList.toggle('open',chatOpen);
  document.getElementById('chatIco').textContent = chatOpen?'✕':'💬';
  document.getElementById('notif').style.display  = chatOpen?'none':'flex';
  if(chatOpen) document.getElementById('cwinp').focus();
}

// ── ENVIAR ────────────────────────────────────
async function cwenviar(){
  const inp=document.getElementById('cwinp');
  const txt=inp.value.trim();
  if(!txt||busy) return;
  inp.value=''; inp.style.height='auto';
  addMsg('u',txt);
  hist.push({role:'user',content:txt});
  showTyp(); busy=true;
  document.getElementById('cwsend').disabled=true;

  try{
    const r=await fetch('',{
      method:'POST',headers:{'Content-Type':'application/json'},
      body:JSON.stringify({mensaje:txt,historial:hist.slice(0,-1)})
    });
    const d=await r.json();
    hideTyp();
    if(d.error){addMsg('bot','❌ '+d.error);return;}
    addMsg('bot',d.mensaje);
    hist.push({role:'assistant',content:d.mensaje});
    if(d.accion==='filtrar') aplicarFiltro(d.ids, txt);
  }catch(e){
    hideTyp();
    addMsg('bot','❌ Error de conexión con el servidor.');
  }finally{
    busy=false;
    document.getElementById('cwsend').disabled=false;
  }
}

function qsend(t){document.getElementById('cwinp').value=t;cwenviar();}

// ── APLICAR FILTRO IA ────────────────────────
function aplicarFiltro(ids, query){
  filtroIA=true;
  document.getElementById('resetBtn').classList.add('show');

  const cards=document.querySelectorAll('.pcard');

  if(!ids||ids.length===0){
    cards.forEach(c=>{c.classList.remove('hl','dm')});
    addMsg('bot','No encontré productos con eso 😕 Te muestro el catálogo completo.');
    document.getElementById('cnt').textContent='0 resultados';
    return;
  }

  cards.forEach(c=>{
    const id=parseInt(c.dataset.id);
    if(ids.includes(id)){c.classList.add('hl');c.classList.remove('dm');}
    else{c.classList.add('dm');c.classList.remove('hl');}
  });

  document.getElementById('cnt').textContent=ids.length+' resultado'+(ids.length!==1?'s':'');

  // Scroll al primer resultado
  const first=document.getElementById('p'+ids[0]);
  if(first) setTimeout(()=>first.scrollIntoView({behavior:'smooth',block:'center'}),350);

  // Hint en el chat
  const msgs=document.getElementById('cwmsgs');
  const hint=document.createElement('div');
  hint.className='cm bot';
  hint.innerHTML=`<div class="cmav bot">🤖</div>
    <div class="crhint">🎯 <span>Encontré <b>${ids.length} producto${ids.length!==1?'s':''}</b> — marcados en la tienda ↗</span></div>`;
  msgs.appendChild(hint);
  msgs.scrollTop=msgs.scrollHeight;

  // Reset filtros de barra
  document.querySelectorAll('.fbtn').forEach(b=>b.classList.remove('on'));
  document.getElementById('srch').value='';
}

// ── RESET FILTRO IA ──────────────────────────
function resetFiltros(){
  filtroIA=false;
  document.querySelectorAll('.pcard').forEach(c=>{
    c.classList.remove('hl','dm');c.style.display='';
  });
  document.getElementById('cnt').textContent='<?=$totalProds?> productos';
  document.getElementById('resetBtn').classList.remove('show');
  document.querySelector('.fbtn[data-cat="todos"]').classList.add('on');
  addMsg('bot','Mostré todos los productos de la tienda 😊');
}

// ── FILTROS MANUALES ─────────────────────────
function filtrar(btn,cat){
  if(filtroIA) resetFiltros();
  document.querySelectorAll('.fbtn').forEach(b=>b.classList.remove('on'));
  btn.classList.add('on');
  const cards=document.querySelectorAll('.pcard');
  let v=0;
  cards.forEach(c=>{
    const show=cat==='todos'||c.dataset.cat===cat;
    c.style.display=show?'':'none'; if(show)v++;
  });
  document.getElementById('cnt').textContent=v+' producto'+(v!==1?'s':'');
  document.getElementById('srch').value='';
}

function buscarTxt(q){
  if(filtroIA) resetFiltros();
  const lq=q.toLowerCase();
  const cards=document.querySelectorAll('.pcard');
  let v=0;
  cards.forEach(c=>{
    const show=!q||c.dataset.search.includes(lq);
    c.style.display=show?'':'none'; if(show)v++;
  });
  document.getElementById('cnt').textContent=v+' producto'+(v!==1?'s':'');
  document.querySelectorAll('.fbtn').forEach(b=>b.classList.remove('on'));
  if(!q) document.querySelector('[data-cat="todos"]').classList.add('on');
}

// ── CHAT UI ──────────────────────────────────
function addMsg(rol,html){
  const c=document.getElementById('cwmsgs');
  const d=document.createElement('div');
  d.className='cm '+rol;
  d.innerHTML=`<div class="cmav ${rol}">${rol==='bot'?'🤖':'👤'}</div>
    <div class="cmbbl">${html.replace(/\n/g,'<br>')}</div>`;
  c.appendChild(d); c.scrollTop=c.scrollHeight;
}
function showTyp(){
  const c=document.getElementById('cwmsgs');
  const d=document.createElement('div');
  d.className='cm bot ctyp'; d.id='ctyp';
  d.innerHTML=`<div class="cmav bot">🤖</div>
    <div class="cmbbl"><span class="ctd"></span><span class="ctd"></span><span class="ctd"></span></div>`;
  c.appendChild(d); c.scrollTop=c.scrollHeight;
}
function hideTyp(){document.getElementById('ctyp')?.remove();}
function cwtecla(e){if(e.key==='Enter'&&!e.shiftKey){e.preventDefault();cwenviar();}}
function cwajust(el){el.style.height='auto';el.style.height=Math.min(el.scrollHeight,90)+'px';}

// ── CARRITO ──────────────────────────────────
function addCart(ev,id,nombre){
  ev.stopPropagation();
  cartN++;
  document.getElementById('cartBtn').textContent='🛒 Carrito ('+cartN+')';
  const btn=ev.target;
  const prev=btn.textContent;
  btn.textContent='✓ Agregado!';
  btn.style.background='#22c55e';
  setTimeout(()=>{btn.textContent=prev;btn.style.background='';},1800);
}
</script>
</body>
</html>