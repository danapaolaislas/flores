<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Flores</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #e3a8ebff;
      text-align: center;
      padding: 30px;
    }

    h1 {
      color: #ce69c0ff;
      font-size: 36px;
    }
    
    .contenido {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 50px;
      margin-top: 40px;
    }

    .botones {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .botones form button {
      padding: 12px 25px;
      background-color: #c490c4ff;
      border: none;
      border-radius: 8px;
      color: white;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .botones form button:hover {
      background-color: #ae89c4ff;
    }

    .imagen img {
      width: 250px;
      border-radius: 12px;
    }
  </style>
</head>
<body>

  <h1>Flores</h1>

  <div class="contenido">
    <div class="imagen">
      <img src="img1.jpg" alt="Flor bonita">
    </div>

    <div class="botones">
      <form action="des.php" method="get">
        <button type="submit">Descripciones</button>
      </form>
      <form action="reco.php" method="get">
        <button type="submit">Recomendaciones</button>
      </form>
      <form action="venta.php" method="get">
        <button type="submit">Venta</button>
      </form>
      <form action="video.php" method="get">
        <button type="submit">Video</button>
      </form>
      <form action="calcu.php" method="get">
        <button type="submit">Calculadora</button>
      </form>
    </div>
  </div>
