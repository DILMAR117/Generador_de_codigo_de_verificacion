<?php
function generarCodigoVerificacion($longitud) {
    $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $codigo = '';

    for ($i = 0; $i < $longitud; $i++) {
        $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }

    return $codigo;
}

$codigoGenerado = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $longitudCodigo = $_POST['longitud'];

    // Validar la longitud ingresada
    if (is_numeric($longitudCodigo) && $longitudCodigo > 0) {
        $codigoGenerado = generarCodigoVerificacion($longitudCodigo);
    } else {
        echo "Por favor, ingresa una longitud válida.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Generador de Código de Verificación Mejorado+.</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 500px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        .codigo-generado {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Generador de Código de Verificación Mejorado.</h1>

    <form action="" method="post">
        <label for="longitud">Longitud del código:</label>
        <input type="number" id="longitud" name="longitud" required><br><br>

        <input type="submit" value="Generar código">
    </form>

    <?php if ($codigoGenerado !== '') : ?>
        <p class="codigo-generado">Código generado: <?php echo $codigoGenerado; ?></p>
    <?php endif; ?>
</body>
</html>
