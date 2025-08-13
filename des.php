<?php
$seleccion = $_POST['opciones'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Flores Más Comunes</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background: url('img5.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    h1 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 30px;
    }

    .opcion {
      display: flex;
      align-items: center; /* Centrar verticalmente */
      gap: 10px;
      margin-bottom: 20px;
    }

    .opcion input[type="radio"] {
      transform: scale(1.3);
      margin-right: 5px;
    }

    .opcion label {
      font-size: 18px;
      color: #333;
      margin-right: 15px;
    }

    .opcion img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      display: none;
    }

    /* Mostrar imagen solo si está seleccionada */
    .opcion.seleccionada img {
      display: block;
    }

    .btn-regresar {
      display: inline-block;
      margin-top: 30px;
      background-color: #6c757d;
      color: white;
      padding: 12px 24px;
      border-radius: 6px;
      text-decoration: none;
      font-size: 16px;
      transition: background-color 0.3s;
    }

    .btn-regresar:hover {
      background-color: #5a6268;
    }
  </style>
</head>
<body>

  <h1>Flores Más Comunes</h1>

  <form method="post">
    <div class="opcion <?= $seleccion === 'rosa' ? 'seleccionada' : '' ?>">
      <input type="radio" id="rosa" name="opciones" value="rosa" <?= $seleccion === 'rosa' ? 'checked' : '' ?>>
      <label for="rosa">Rosa</label>
      <img src="img2.jpg" alt="Rosa">
    </div>

    <div class="opcion <?= $seleccion === 'girasol' ? 'seleccionada' : '' ?>">
      <input type="radio" id="girasol" name="opciones" value="girasol" <?= $seleccion === 'girasol' ? 'checked' : '' ?>>
      <label for="girasol">Girasol</label>
      <img src="img3.jpg" alt="Girasol">
    </div>

    <div class="opcion <?= $seleccion === 'margarita' ? 'seleccionada' : '' ?>">
      <input type="radio" id="margarita" name="opciones" value="margarita" <?= $seleccion === 'margarita' ? 'checked' : '' ?>>
      <label for="margarita">Margarita</label>
      <img src="img4.jpg" alt="Margarita">
    </div>
  </form>

  <a href="index.php" class="btn-regresar">Regresar</a>

  <script>
    const radios = document.querySelectorAll('input[name="opciones"]');
    const opciones = document.querySelectorAll('.opcion');

    radios.forEach(radio => {
      radio.addEventListener('change', () => {
        opciones.forEach(op => op.classList.remove('seleccionada'));
        radio.parentElement.classList.add('seleccionada');
        radio.form.submit();
      });
    });
  </script>

</body>
</html>
