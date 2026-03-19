<?php
// ============================================================
//  CHAT BOT COMPARTIDO — Solo PHP, sin JavaScript
//  Incluir en todas las páginas con: <?php include 'chat_bot.php'; ?>
// ============================================================

session_start();

// Inicializar historial de conversación
if (!isset($_SESSION['chat_historial'])) {
    $_SESSION['chat_historial'] = [];
}

// Estado del chat (abierto/cerrado) — persiste entre páginas
if (!isset($_SESSION['chat_abierto'])) {
    $_SESSION['chat_abierto'] = false;
}

// Acción: abrir/cerrar chat
if (isset($_POST['toggle_chat'])) {
    $_SESSION['chat_abierto'] = !$_SESSION['chat_abierto'];
}

// Acción: limpiar historial
if (isset($_POST['limpiar_chat'])) {
    $_SESSION['chat_historial'] = [];
}

// ── PROCESAR MENSAJE ──────────────────────────────────────────
$redirigir = null;
$respuesta_bot = null;

if (isset($_POST['chat_mensaje']) && trim($_POST['chat_mensaje']) !== '') {
    $_SESSION['chat_abierto'] = true;
    $msg_usuario = trim($_POST['chat_mensaje']);
    $msg_lower   = strtolower($msg_usuario);

    // Guardar mensaje del usuario
    $_SESSION['chat_historial'][] = ['rol' => 'usuario', 'texto' => $msg_usuario];

    // ── LÓGICA DE RESPUESTAS ─────────────────────────────────
    // Palabras clave para redirigir a páginas de productos
    $palabras_zapatos  = ['zapato','zapatos','tenis','calzado','adidas','nike','fila','puma','zapatilla','zapatillas','snicker','sneaker'];
    $palabras_adidas   = ['adidas'];
    $palabras_nike     = ['nike'];
    $palabras_fila     = ['fila'];
    $palabras_ropa     = ['ropa','buzo','buso','camiseta','camisetas','pantaloneta','pantalonetas','camisa','chaqueta','pantalon','pantalones','vestido','blusa','polo','busos'];
    $palabras_inicio   = ['inicio','principal','home','portada','menu','menú','categoria','categorias','volver','empezar'];
    $palabras_saludo   = ['hola','buenos','buenas','hi','hey','saludos','que tal','qué tal','buen dia','buen día'];
    $palabras_precio   = ['precio','precios','cuanto','cuánto','cuántos','vale','valen','cuesta','cuestan','costo'];
    $palabras_talla    = ['talla','tallas','medida','medidas','talle','talles','tamaño'];
    $palabras_pago     = ['pago','pagar','efectivo','tarjeta','transferencia','nequi','daviplata','pse'];
    $palabras_envio    = ['envio','envío','domicilio','despacho','entrega','llegar','llega'];
    $palabras_gracias  = ['gracias','muchas gracias','thank','thanks','grax'];

    // Función helper para detectar palabras clave
    function contienePalabras($texto, $palabras) {
        foreach ($palabras as $p) {
            if (strpos($texto, $p) !== false) return true;
        }
        return false;
    }

    // ── DETECCIÓN DE INTENCIÓN ─────────────────────────────
    $ir_adidas  = contienePalabras($msg_lower, $palabras_adidas);
    $ir_nike    = contienePalabras($msg_lower, $palabras_nike);
    $ir_fila    = contienePalabras($msg_lower, $palabras_fila);
    $ir_zapatos = contienePalabras($msg_lower, $palabras_zapatos);
    $ir_ropa    = contienePalabras($msg_lower, $palabras_ropa);
    $ir_inicio  = contienePalabras($msg_lower, $palabras_inicio);
    $es_saludo  = contienePalabras($msg_lower, $palabras_saludo);
    $es_precio  = contienePalabras($msg_lower, $palabras_precio);
    $es_talla   = contienePalabras($msg_lower, $palabras_talla);
    $es_pago    = contienePalabras($msg_lower, $palabras_pago);
    $es_envio   = contienePalabras($msg_lower, $palabras_envio);
    $es_gracias = contienePalabras($msg_lower, $palabras_gracias);

    // ── GENERAR RESPUESTA ───────────────────────────────────
    if ($es_saludo) {
        $respuesta_bot = "¡Hola! 👋 Bienvenido a UrbanStyle. Soy tu asistente virtual. Puedo ayudarte a encontrar:\n👟 Zapatos (Adidas, Nike, Fila)\n👕 Ropa (busos, camisetas, pantalonetas)\n¿Qué estás buscando hoy?";

    } elseif ($ir_adidas) {
        $respuesta_bot = "¡Perfecto! 👟 Tenemos una colección increíble de Adidas. Te llevo directo a verlos...";
        $redirigir = "zapato.php?filtro=adidas";

    } elseif ($ir_nike) {
        $respuesta_bot = "¡Excelente elección! 🔥 Los Nike están disponibles. Te muestro el catálogo de zapatos...";
        $redirigir = "zapato.php?filtro=nike";

    } elseif ($ir_fila) {
        $respuesta_bot = "¡Buena opción! 👟 Los Fila son muy cómodos. Te llevo a verlos...";
        $redirigir = "zapato.php?filtro=fila";

    } elseif ($ir_zapatos) {
        $respuesta_bot = "¡Claro! 👟 Tenemos zapatos Adidas, Nike y Fila. Te muestro todo el catálogo de calzado...";
        $redirigir = "zapato.php";

    } elseif (strpos($msg_lower, 'buso') !== false || strpos($msg_lower, 'buzo') !== false) {
        $respuesta_bot = "¡Tenemos busos increíbles! 👕 Te llevo a verlos ahora...";
        $redirigir = "ropa.php?filtro=buso";

    } elseif (strpos($msg_lower, 'camiseta') !== false) {
        $respuesta_bot = "¡Perfectas camisetas te esperan! 👕 Te muestro nuestra colección...";
        $redirigir = "ropa.php?filtro=camiseta";

    } elseif (strpos($msg_lower, 'pantaloneta') !== false) {
        $respuesta_bot = "¡Tenemos pantalonetas muy bacanas! 🩳 Te llevo a verlas...";
        $redirigir = "ropa.php?filtro=pantaloneta";

    } elseif ($ir_ropa) {
        $respuesta_bot = "¡Con gusto! 👕 Tenemos busos, camisetas y pantalonetas. Te muestro toda la ropa disponible...";
        $redirigir = "ropa.php";

    } elseif ($ir_inicio) {
        $respuesta_bot = "¡Claro! 🏠 Te llevo al menú principal donde puedes ver todas las categorías.";
        $redirigir = "presentacion2.php";

    } elseif ($es_precio) {
        $respuesta_bot = "💰 Nuestros precios son muy competitivos:\n• Zapatos: desde $120.000\n• Busos: desde $45.000\n• Camisetas: desde $25.000\n• Pantalonetas: desde $30.000\n¿Te interesa algún producto en particular?";

    } elseif ($es_talla) {
        $respuesta_bot = "📏 Manejamos todas las tallas:\n• Ropa: XS, S, M, L, XL, XXL\n• Zapatos: 35 al 46\n¿Cuál es tu talla? Te ayudo a encontrar lo que necesitas.";

    } elseif ($es_pago) {
        $respuesta_bot = "💳 Aceptamos todos los medios de pago:\n• Efectivo\n• Tarjeta débito/crédito\n• Nequi y Daviplata\n• PSE\n• Transferencia bancaria\n¿Algo más en lo que te pueda ayudar?";

    } elseif ($es_envio) {
        $respuesta_bot = "🚚 ¡Hacemos envíos a todo el país!\n• Bogotá: 1-2 días hábiles\n• Ciudades principales: 2-3 días\n• Resto del país: 3-5 días\n• Envío gratis en compras mayores a $150.000\n¿Tienes alguna otra pregunta?";

    } elseif ($es_gracias) {
        $respuesta_bot = "¡De nada! 😊 Es un placer atenderte. Si necesitas algo más, aquí estoy. ¡Que tengas un excelente día! 🌟";

    } elseif (strpos($msg_lower, 'horario') !== false || strpos($msg_lower, 'hora') !== false) {
        $respuesta_bot = "🕐 Nuestros horarios de atención:\n• Lunes a Viernes: 8am - 8pm\n• Sábados: 9am - 7pm\n• Domingos: 10am - 5pm\n¡Te esperamos!";

    } elseif (strpos($msg_lower, 'oferta') !== false || strpos($msg_lower, 'descuento') !== false || strpos($msg_lower, 'promocion') !== false) {
        $respuesta_bot = "🔥 ¡Tenemos ofertas increíbles!\n• 20% de descuento en zapatos seleccionados\n• 2x1 en camisetas básicas\n• Busos con 15% off esta semana\n¿Qué producto te interesa ver?";

    } elseif (strpos($msg_lower, 'devolucion') !== false || strpos($msg_lower, 'devolución') !== false || strpos($msg_lower, 'cambio') !== false) {
        $respuesta_bot = "🔄 Política de cambios y devoluciones:\n• Tienes 30 días para cambios\n• Producto sin uso y con etiqueta\n• Cambio por talla o referencia\n• Devolución del dinero en 5 días hábiles\n¿Tienes alguna otra duda?";

    } else {
        $respuesta_bot = "Entiendo tu consulta 🤔 Puedo ayudarte con:\n👟 Ver zapatos → escribe 'zapatos' o 'Adidas', 'Nike', 'Fila'\n👕 Ver ropa → escribe 'ropa', 'busos', 'camisetas'\n💰 Precios → escribe 'precios'\n📏 Tallas → escribe 'tallas'\n🚚 Envíos → escribe 'envío'\n¿Con cuál te ayudo?";
    }

    // Guardar respuesta del bot
    $_SESSION['chat_historial'][] = ['rol' => 'bot', 'texto' => $respuesta_bot];

    // Mantener máximo 20 mensajes (10 intercambios)
    if (count($_SESSION['chat_historial']) > 20) {
        $_SESSION['chat_historial'] = array_slice($_SESSION['chat_historial'], -20);
    }

    // Redirigir si aplica
    if ($redirigir) {
        header("Location: " . $redirigir);
        exit;
    }
}

$chat_abierto    = $_SESSION['chat_abierto'];
$chat_historial  = $_SESSION['chat_historial'];
$pagina_actual   = basename($_SERVER['PHP_SELF']);
?>

<!-- ════════════════════════════════════════════
     ESTILOS DEL CHATBOT
════════════════════════════════════════════ -->
<style>
/* ── BOTÓN FLOTANTE ── */
.chat-fab {
  position: fixed;
  bottom: 28px;
  right: 28px;
  z-index: 9999;
}

.chat-fab form {
  margin: 0;
}

.btn-chat-toggle {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background: linear-gradient(135deg, #ff6b35, #f7c59f);
  border: none;
  cursor: pointer;
  font-size: 1.6rem;
  box-shadow: 0 6px 24px rgba(255,107,53,.5);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform .2s;
  color: white;
}

.btn-chat-toggle:hover {
  transform: scale(1.12);
}

.chat-notif-dot {
  position: absolute;
  top: 0; right: 0;
  width: 16px; height: 16px;
  background: #ff2d55;
  border-radius: 50%;
  border: 2px solid #fff;
  font-size: .58rem;
  font-weight: 800;
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* ── VENTANA DEL CHAT ── */
.chat-ventana {
  position: fixed;
  bottom: 100px;
  right: 28px;
  z-index: 9998;
  width: 340px;
  max-height: 500px;
  background: #ffffff;
  border-radius: 20px;
  box-shadow: 0 20px 70px rgba(0,0,0,.18);
  display: flex;
  flex-direction: column;
  overflow: hidden;
  border: 1px solid rgba(255,107,53,.15);
}

/* ── HEADER DEL CHAT ── */
.chat-header {
  background: linear-gradient(135deg, #1a1a2e, #16213e);
  padding: 14px 16px;
  display: flex;
  align-items: center;
  gap: 11px;
  flex-shrink: 0;
}

.chat-av {
  width: 38px; height: 38px;
  border-radius: 50%;
  background: linear-gradient(135deg, #ff6b35, #f7c59f);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  flex-shrink: 0;
}

.chat-header-info .chat-nombre {
  font-weight: 700;
  font-size: .9rem;
  color: #fff;
  letter-spacing: .03em;
}

.chat-header-info .chat-estado {
  font-size: .7rem;
  color: rgba(255,255,255,.55);
  display: flex;
  align-items: center;
  gap: 5px;
}

.chat-estado-dot {
  width: 6px; height: 6px;
  border-radius: 50%;
  background: #4ade80;
  display: inline-block;
}

.chat-acciones {
  margin-left: auto;
  display: flex;
  gap: 6px;
}

.btn-chat-accion {
  background: rgba(255,255,255,.1);
  border: none;
  color: rgba(255,255,255,.7);
  width: 28px; height: 28px;
  border-radius: 7px;
  cursor: pointer;
  font-size: .9rem;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background .18s;
}

.btn-chat-accion:hover {
  background: rgba(255,255,255,.2);
  color: #fff;
}

/* ── MENSAJES ── */
.chat-mensajes {
  flex: 1;
  overflow-y: auto;
  padding: 14px 12px;
  display: flex;
  flex-direction: column;
  gap: 10px;
  background: #f8f7f5;
  scrollbar-width: thin;
  scrollbar-color: #ddd transparent;
}

.chat-burbuja {
  display: flex;
  gap: 7px;
  align-items: flex-end;
}

.chat-burbuja.usuario {
  flex-direction: row-reverse;
}

.burbuja-av {
  width: 26px; height: 26px;
  border-radius: 8px;
  flex-shrink: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: .75rem;
}

.burbuja-av.bot-av {
  background: linear-gradient(135deg, #ff6b35, #f7c59f);
  color: #fff;
}

.burbuja-av.user-av {
  background: #1a1a2e;
  color: #fff;
}

.burbuja-txt {
  max-width: 80%;
  padding: 9px 13px;
  border-radius: 13px;
  font-size: .8rem;
  line-height: 1.5;
  white-space: pre-line;
}

.chat-burbuja.bot .burbuja-txt {
  background: #fff;
  border: 1px solid #ece9e4;
  border-bottom-left-radius: 3px;
  color: #222;
}

.chat-burbuja.usuario .burbuja-txt {
  background: linear-gradient(135deg, #ff6b35, #f7931e);
  color: #fff;
  border-bottom-right-radius: 3px;
}

/* mensaje vacío */
.chat-vacio {
  text-align: center;
  padding: 20px 10px;
  color: #aaa;
  font-size: .78rem;
}

.chat-vacio .chat-emoji-grande {
  font-size: 2.5rem;
  display: block;
  margin-bottom: 8px;
}

/* ── SUGERENCIAS ── */
.chat-sugerencias {
  padding: 8px 10px 4px;
  display: flex;
  gap: 5px;
  flex-wrap: wrap;
  background: #f8f7f5;
  border-top: 1px solid #ece9e4;
  flex-shrink: 0;
}

.sug-form { margin: 0; }

.btn-sug {
  background: #fff;
  border: 1.5px solid #e0ddd8;
  color: #555;
  padding: 4px 10px;
  border-radius: 15px;
  font-size: .68rem;
  font-weight: 600;
  cursor: pointer;
  transition: all .17s;
  white-space: nowrap;
}

.btn-sug:hover {
  border-color: #ff6b35;
  color: #ff6b35;
  background: rgba(255,107,53,.05);
}

/* ── INPUT ── */
.chat-input-area {
  padding: 10px 12px;
  border-top: 1px solid #ece9e4;
  display: flex;
  gap: 8px;
  align-items: center;
  background: #fff;
  flex-shrink: 0;
}

.chat-input-form {
  display: flex;
  gap: 8px;
  align-items: center;
  width: 100%;
  margin: 0;
}

.chat-input {
  flex: 1;
  border: 1.5px solid #e0ddd8;
  background: #f8f7f5;
  padding: 9px 13px;
  border-radius: 22px;
  font-size: .8rem;
  outline: none;
  font-family: inherit;
  color: #222;
  transition: border-color .2s;
}

.chat-input:focus {
  border-color: #ff6b35;
}

.btn-chat-enviar {
  width: 36px; height: 36px;
  border-radius: 50%;
  border: none;
  background: linear-gradient(135deg, #ff6b35, #f7931e);
  color: #fff;
  cursor: pointer;
  font-size: .95rem;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  transition: transform .15s;
}

.btn-chat-enviar:hover {
  transform: scale(1.1);
}

/* ── RESPONSIVE ── */
@media (max-width: 480px) {
  .chat-ventana {
    width: calc(100vw - 32px);
    right: 16px;
    bottom: 90px;
  }
}
</style>

<!-- ════════════════════════════════════════════
     HTML DEL CHATBOT
════════════════════════════════════════════ -->

<!-- Botón flotante para abrir/cerrar -->
<div class="chat-fab">
  <form method="POST" action="<?= $pagina_actual ?>">
    <button type="submit" name="toggle_chat" value="1" class="btn-chat-toggle" title="Hablar con el asistente">
      <?= $chat_abierto ? '✕' : '💬' ?>
    </button>
    <?php if (!$chat_abierto && count($chat_historial) === 0): ?>
    <span class="chat-notif-dot">1</span>
    <?php endif ?>
  </form>
</div>

<!-- Ventana del chat -->
<?php if ($chat_abierto): ?>
<div class="chat-ventana">

  <!-- Header -->
  <div class="chat-header">
    <div class="chat-av">🤖</div>
    <div class="chat-header-info">
      <div class="chat-nombre">Asistente UrbanStyle</div>
      <div class="chat-estado">
        <span class="chat-estado-dot"></span>
        En línea · Listo para ayudarte
      </div>
    </div>
    <div class="chat-acciones">
      <!-- Limpiar historial -->
      <form method="POST" action="<?= $pagina_actual ?>" style="margin:0">
        <button type="submit" name="limpiar_chat" value="1" class="btn-chat-accion" title="Limpiar chat">🗑</button>
      </form>
      <!-- Cerrar -->
      <form method="POST" action="<?= $pagina_actual ?>" style="margin:0">
        <button type="submit" name="toggle_chat" value="1" class="btn-chat-accion" title="Cerrar">✕</button>
      </form>
    </div>
  </div>

  <!-- Mensajes -->
  <div class="chat-mensajes" id="chatMensajes">
    <?php if (empty($chat_historial)): ?>
      <div class="chat-vacio">
        <span class="chat-emoji-grande">👋</span>
        <strong>¡Hola! Soy tu asistente</strong><br>
        Pregúntame lo que necesites sobre nuestros productos o escribe <em>"hola"</em> para empezar.
      </div>
    <?php else: ?>
      <?php foreach ($chat_historial as $msg): ?>
        <div class="chat-burbuja <?= $msg['rol'] === 'bot' ? 'bot' : 'usuario' ?>">
          <div class="burbuja-av <?= $msg['rol'] === 'bot' ? 'bot-av' : 'user-av' ?>">
            <?= $msg['rol'] === 'bot' ? '🤖' : '👤' ?>
          </div>
          <div class="burbuja-txt"><?= htmlspecialchars($msg['texto']) ?></div>
        </div>
      <?php endforeach ?>
    <?php endif ?>
  </div>

  <!-- Sugerencias rápidas -->
  <div class="chat-sugerencias">
    <form class="sug-form" method="POST" action="<?= $pagina_actual ?>">
      <input type="hidden" name="chat_mensaje" value="Zapatos Adidas">
      <button type="submit" class="btn-sug">👟 Adidas</button>
    </form>
    <form class="sug-form" method="POST" action="<?= $pagina_actual ?>">
      <input type="hidden" name="chat_mensaje" value="Zapatos Nike">
      <button type="submit" class="btn-sug">✔ Nike</button>
    </form>
    <form class="sug-form" method="POST" action="<?= $pagina_actual ?>">
      <input type="hidden" name="chat_mensaje" value="Ver busos disponibles">
      <button type="submit" class="btn-sug">👕 Busos</button>
    </form>
    <form class="sug-form" method="POST" action="<?= $pagina_actual ?>">
      <input type="hidden" name="chat_mensaje" value="Ver camisetas">
      <button type="submit" class="btn-sug">🎽 Camisetas</button>
    </form>
    <form class="sug-form" method="POST" action="<?= $pagina_actual ?>">
      <input type="hidden" name="chat_mensaje" value="Cuáles son los precios">
      <button type="submit" class="btn-sug">💰 Precios</button>
    </form>
    <form class="sug-form" method="POST" action="<?= $pagina_actual ?>">
      <input type="hidden" name="chat_mensaje" value="Información de envíos">
      <button type="submit" class="btn-sug">🚚 Envíos</button>
    </form>
  </div>

  <!-- Input para escribir -->
  <div class="chat-input-area">
    <form class="chat-input-form" method="POST" action="<?= $pagina_actual ?>">
      <input
        type="text"
        name="chat_mensaje"
        class="chat-input"
        placeholder="Escribe aquí tu pregunta…"
        autocomplete="off"
        maxlength="200"
        autofocus
      />
      <button type="submit" class="btn-chat-enviar" title="Enviar">➤</button>
    </form>
  </div>

</div>
<?php endif ?>