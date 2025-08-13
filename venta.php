<?php
session_start();

// Productos
$productos = [
    ['nombre' => 'Gardenia', 'precio' => 25, 'descuento' => 0.05, 'imagen' => 'ven1.jpg', 'color' => '#fff3cd'], // Amarillo suave
    ['nombre' => 'Rosas', 'precio' => 40, 'descuento' => 0.10, 'imagen' => 'ven2.jpg', 'color' => '#f8d7da'], // Rosa suave
    ['nombre' => 'Tulipan', 'precio' => 15, 'descuento' => 0.15, 'imagen' => 'ven3.jpg', 'color' => '#d4edda'], // Verde suave
];

// Mensajes por producto
$mensajes = array_fill(0, count($productos), '');

// Procesar compras
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($productos as $index => $producto) {
        if (isset($_POST['comprar' . ($index + 1)])) {
            $cantidad = $_POST['cantidad' . ($index + 1)] ?? 0;
            if ($cantidad > 0) {
                $subtotal = $producto['precio'] * $cantidad;
                $descuento = $subtotal * $producto['descuento'];
                $total = $subtotal - $descuento;

                $mensajes[$index] = "<div class='factura'>
                    <h4>Factura para {$producto['nombre']}</h4>
                    <p>Cantidad: $cantidad</p>
                    <p>Subtotal: \$$subtotal</p>
                    <p>Descuento: \$$descuento</p>
                    <p><strong>Total a pagar: \$$total</strong></p>
                </div>";
            }
        }

        if (isset($_POST['siguiente'])) {
            $mensajes[$index] = '';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ventas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3d4b0e0;
            background-image: url('fondo.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            color: #333;
            padding: 20px;
            max-width: 900px;
            margin: auto;
        }
        h1 {
            text-align: center;
            color: #fff;
            text-shadow: 2px 2px 5px #000;
        }
        .productos-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .producto {
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }
        .producto img {
            width: 100%;
            height: 180px; /* Tamaño uniforme */
            object-fit: cover; /* Mantiene proporción y recorta si es necesario */
            border-radius: 5px;
        }
        .comprar-form {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }
        .comprar-form input {
            width: 60px;
            padding: 5px;
            text-align: center;
        }
        .btn-comprar {
            background-color: #e9babaff;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-comprar:hover {
            background-color: #eab2ecff;
        }
        .factura {
            margin-top: 15px;
            text-align: left;
            font-size: 14px;
            background-color: #e9babaff;
            padding: 10px;
            border-radius: 5px;
            border-left: 4px solid #736899ff;
        }
        .btn-regresar, .btn-siguiente {
            display: inline-block;
            margin: 20px 5px 0;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            background-color: #e9babaff;
        }
        .btn-regresar {
            background-color: #deb2e9ff;
        }
        .btn-regresar:hover,
        .btn-siguiente:hover {
            opacity: 0.85;
        }
    </style>
</head>
<body>
    <h1>Ventas</h1>

    <div class="productos-container">
        <?php foreach ($productos as $index => $producto): ?>
            <div class="producto" style="background-color: <?= $producto['color'] ?>;">
                <img src="<?= $producto['imagen']; ?>" alt="<?= $producto['nombre']; ?>">
                <h3><?= $producto['nombre']; ?></h3>
                <p>Precio: $<?= $producto['precio']; ?></p>
                <form method="post">
                    <div class="comprar-form">
                        <input type="number" name="cantidad<?= $index + 1; ?>" min="1" placeholder="Cantidad">
                        <button type="submit" name="comprar<?= $index + 1; ?>" class="btn-comprar">Comprar</button>
                    </div>
                </form>
                <?= $mensajes[$index]; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <div>
        <a href="index.php" class="btn-regresar">Regresar</a>
        <form method="post" style="display:inline;">
            <button type="submit" name="siguiente" class="btn-siguiente">Siguiente</button>
        </form>
    </div>
</body>
</html>
