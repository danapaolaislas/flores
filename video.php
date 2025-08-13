<?php
echo '<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Remedio para Flores</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #db9bd8d3; /* color de fondo más vistoso */
      text-align: center;
      padding: 40px;
    }
    h1 {
      color: #774265ff;
      font-size: 36px;
      margin-bottom: 30px;
    }
    iframe {
      width: 80%;
      height: 400px;
      max-width: 800px;
      border: none;
      margin-bottom: 40px;
    }
    .boton {
      display: inline-block;
      padding: 12px 25px;
      font-size: 18px;
      background-color: #d0ace6ff;
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }
    .boton:hover {
      background-color: #cca3d1ff;
    }
  </style>
</head>
<body>

  <h1>Remedio para Flores</h1>

  <!-- Video embebido -->
  <iframe src="https://www.youtube.com/embed/JRcks85Luh0" allowfullscreen></iframe>

  <!-- Botón de regreso -->
  <br>
  <a class="boton" href="index.php">Regresar</a>

</body>
</html>';
?>