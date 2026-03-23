<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Chatbot tienda</title>
  <style>
    #chatBtn {
      position: fixed;
      bottom: 20px;
      left: 20px;
    }

    #chatBox {
      display: none;
      position: fixed;
      bottom: 60px;
      left: 20px;
      width: 300px;
      height: 400px;
      background: #fff;
      border: 1px solid #ccc;
      overflow-y: auto;
      padding: 10px;
    }
  </style>
</head>
<body>

<button id="chatBtn">💬</button>

<div id="chatBox">
  <div id="messages"></div>
  <input type="text" id="input" placeholder="Escribe...">
</div>

<script>
document.getElementById("chatBtn").onclick = () => {
  let box = document.getElementById("chatBox");
  box.style.display = box.style.display === "none" ? "block" : "none";
};

document.getElementById("input").addEventListener("keypress", function(e) {
  if (e.key === "Enter") {
    let msg = this.value;
    this.value = "";

    document.getElementById("messages").innerHTML += "<p><b>Tú:</b> " + msg + "</p>";

    fetch("chat.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      },
      body: "mensaje=" + encodeURIComponent(msg)
    })
    .then(res => res.text())
    .then(data => {
      document.getElementById("messages").innerHTML += data;
    });
  }
});

</script>

</body>
</html>