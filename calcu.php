<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Calculadora</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #cdb4d1ff;
      margin: 0;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      color: #4b2c57;
    }

    .container {
      max-width: 500px;
      width: 100%;
      padding: 0;
      box-sizing: border-box;
      text-align: center;
      background: transparent;
      box-shadow: none;
      border-radius: 0;
    }

    h1 {
      margin-bottom: 25px;
      color: #a463f2;
      background: transparent;
      border: none;
    }

    .equation {
      font-family: monospace;
      font-size: 1.4rem;
      background: transparent;
      padding: 0;
      border: none;
      margin-bottom: 25px;
      color: #4b2c57;
    }

    label {
      display: block;
      text-align: left;
      font-weight: bold;
      margin-bottom: 5px;
      color: #4b2c57;
    }

    input[type="number"] {
      width: 100%;
      padding: 10px;
      font-size: 1rem;
      border: 2px solid #eec3f0ff;
      border-radius: 8px;
      margin-bottom: 15px;
      box-sizing: border-box;
      transition: border-color 0.3s;
      background: transparent;
      color: #4b2c57;
    }

    input[type="number"]:focus {
      border-color: #a463f2;
      outline: none;
      background: transparent;
    }

    button {
      width: 30%;
      padding: 12px;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      color: white;
      text-transform: uppercase;
      margin: 0 5px;
      font-size: 1rem;
      transition: background-color 0.3s ease;
      box-shadow: none;
    }

    .btn-solve {
      background: #c084fc;
    }

    .btn-clear {
      background: #f9a8d4;
      color: #4b2c57;
    }

    .btn-back {
      background: #a463f2;
    }

    button:hover {
      opacity: 0.85;
    }

    #result {
      margin-top: 20px;
      text-align: left;
      font-family: monospace;
      color: #4b2c57;
      display: none;
      background: transparent;
      padding: 0;
      border: none;
      font-size: 1.2rem;
      font-weight: bold;
    }

    .error {
      background: transparent;
      color: #9d174d;
      padding: 0;
      margin-top: 15px;
      font-weight: bold;
      border: none;
      font-size: 1rem;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Calculadora</h1>

    <div class="equation">
      (3y² / 2y + 2y / z) + 1
    </div>

    <label for="yValue">Valor de Y (≠ 0):</label>
    <input type="number" id="yValue" placeholder="Ejemplo: 4" step="any" />

    <label for="zValue">Valor de Z (≠ 0):</label>
    <input type="number" id="zValue" placeholder="Ejemplo: 2" step="any" />

    <div style="margin-top: 15px;">
      <button class="btn-solve" onclick="solveEquation()">Resolver</button>
      <button class="btn-clear" onclick="clearFields()">Limpiar</button>
      <button class="btn-back" onclick="goBack()">Regresar</button>
    </div>

    <div id="result"></div>
  </div>

  <script>
    function solveEquation() {
      const y = parseFloat(document.getElementById('yValue').value);
      const z = parseFloat(document.getElementById('zValue').value);
      const resultDiv = document.getElementById('result');

      if (isNaN(y) || isNaN(z)) {
        showError('Por favor ingresa valores numéricos válidos para Y y Z');
        return;
      }
      if (y === 0 || z === 0) {
        showError('Y y Z no pueden ser 0 para evitar división por cero');
        return;
      }

      const step1 = (3 * y * y) / (2 * y);
      const step2 = (2 * y) / z;
      const insideParenthesis = step1 + step2;
      const finalResult = insideParenthesis + 1;

      resultDiv.style.display = 'block';
      resultDiv.innerHTML = `Resultado final: <b>${finalResult.toFixed(4)}</b>`;
    }

    function clearFields() {
      document.getElementById('yValue').value = '';
      document.getElementById('zValue').value = '';
      const resultDiv = document.getElementById('result');
      resultDiv.style.display = 'none';
      resultDiv.innerHTML = '';
      document.getElementById('yValue').focus();
    }

    function goBack() {
      if (window.history.length > 1) {
        window.history.back();
      } else {
        window.location.href = 'index.html';
      }
    }

    function showError(msg) {
      const resultDiv = document.getElementById('result');
      resultDiv.style.display = 'block';
      resultDiv.innerHTML = `<div class="error">${msg}</div>`;
    }
  </script>
</body>
</html>
