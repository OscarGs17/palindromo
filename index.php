<?php
$datos = [];
$resultado = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $frase = $_POST['num1'] ?? '';
    
    if (!empty($frase)) {
        // Convertir la frase a minúsculas y eliminar los espacios y caracteres especiales
        $fraseLimpia = '';
        for ($i = 0; $i < strlen($frase); $i++) {
            $char = strtolower($frase[$i]);
            if (ctype_alpha($char)) {
                $fraseLimpia .= $char;
            }
        }

        // Verificar si la frase es un palíndromo
        $esPalindromo = true;
        $len = strlen($fraseLimpia);
        for ($i = 0; $i < $len / 2; $i++) {
            if ($fraseLimpia[$i] !== $fraseLimpia[$len - 1 - $i]) {
                $esPalindromo = false;
                break;
            }
        }

        // Mostrar el resultado
        $resultado = $esPalindromo ? "La frase es un palíndromo." : "La frase no es un palíndromo.";
    } else {
        $error = "Por favor, ingresa una frase.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Generador de Palíndromos</title>
</head>
<body class="bg-secondary">
  <div class="container py-5 bg-light shadow-lg rounded-pill border border-info">
    <div class="row justify-content-center align-items-center g-2">
            <div class="col-3"></div>
            <div class="col-6 mt-5 mb-5">
                <form action="./index.php" method="post">
                    <div class="alert alert-danger" role="alert">
                        <?php echo (!empty($error)) ? $error : ""; ?>
                    </div>
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bg-secondary fw-bold fs-4 text-black" id="inputGroup-sizing-lg"><i class="bi bi-alphabet-uppercase"></i> Ingresar frase</span>
                        <input type="text" class="form-control fw-bold fs-4" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" id="datos" name="num1" value="<?php echo (!empty($frase)) ? $frase : ""; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 w-100"> <i class="bi bi-chevron-double-right"></i> Verificar Palíndromo </button>
                </form>
                <div class="alert alert-primary mt-4" role="alert">
                    <?php echo (!empty($resultado)) ? $resultado : ""; ?>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</body>
</html>
