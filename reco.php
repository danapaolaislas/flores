<?php
session_start();

$mensaje = '';
$comentarioReciente = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['enviar']) && !empty($_POST['comentario'])) {
        $comentario = htmlspecialchars($_POST['comentario']);
        file_put_contents('comentarios.txt', $comentario . PHP_EOL, FILE_APPEND);
        $_SESSION['ultimo_comentario'] = $comentario;
        $mensaje = '<div style="color: green; margin: 20px 0;">¡Recomendación enviada con éxito!</div>';
    }
    if (isset($_POST['ver'])) {
        if (isset($_SESSION['ultimo_comentario'])) {
            $comentarioReciente = $_SESSION['ultimo_comentario'];
        } else {
            $mensaje = '<div style="color: red; margin: 20px 0;">No hay recomendaciones enviadas en esta sesión.</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recomendaciones</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #eabdf0b7;
            color: #333;
        }
        
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .image-container {
            margin-top: 30px;
            text-align: center;
        }
        
        .image-container img {
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.3s ease;
        }
        
        .image-container img:hover {
            transform: scale(1.02);
        }
        
        .button-container {
            text-align: center;
            margin-top: 20px;
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        
        textarea {
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
            width: 100%;
            padding: 10px;
            margin: 20px 0;
        }
        
        button {
            background-color: #ec85f0ff;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        button:hover {
            background-color: #af90e9ff;
        }
        
        .btn-regresar {
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }
        
        .mensaje {
            margin: 20px 0;
            font-weight: bold;
        }
        
        .comentario-reciente {
            margin-top: 20px;
            padding: 10px;
            background: #f3e5f5;
            border-radius: 8px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div>
        <h1>Recomendaciones</h1>
        
        <div class="image-container">
            <img src="img6.jpg" alt="Imagen ilustrativa">
        </div>

        <form method="post" action="" class="form-group">
            <textarea name="comentario" rows="5" placeholder="Escribe aquí tus recomendaciones..."></textarea>
            
            <div class="button-container">
                <button type="submit" name="enviar">Enviar</button>
                <button type="submit" name="ver">Ver Enviados</button>
            </div>
        </form>

        <?php 
        if ($mensaje) {
            echo '<div class="mensaje">' . $mensaje . '</div>';
        }
        if ($comentarioReciente) {
            echo '<div class="comentario-reciente"><strong>Última recomendación enviada:</strong><br>' . nl2br($comentarioReciente) . '</div>';
        }
        ?>
        
        <div style="text-align: center;">
            <a href="index.php" class="btn-regresar">Regresar</a>
        </div>
    </div>
</body>
</html>
