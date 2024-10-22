<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<header>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</header>
<form action ="minutos.php" method="post">
        <label><strong>Minutos:</strong></label>
        <input type="text" name="min">
        <input type="submit" value="calcular">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $min = isset($_POST["min"]) ? intval($_POST["min"]) : 0;
        switch (true) {
            case ($min < 60 && $min > 0):
                echo "Os valores são de {$min} minutos." . "<br>";
                break;
            
            case ($min < 0):
                echo "Os valores inseridos devem ser positivos" . "<br>";
                break;
        
            case ($min == 60):
                echo "O valor é de 1 hora" . "<br>";
                break;
        
            case ($min == 1440):
                echo "O valor é de 1 Dia" . "<br>";
                break;
        
            case ($min > 60 && $min < 1440):
                $resultado = $min / 60;
                $horas = intval($resultado);
                $minutos = ($resultado - $horas) * 60;
                echo "{$min} minutos é um total de: {$horas} horas e {$minutos} minutos";
                break;
        
            case ($min > 1440):
                $dias = intval($min / 1440);
                $restantes = $min % 1440;
                $horas = intval($restantes / 60);
                $minutos = $restantes % 60;
                echo "{$min} minutos é um total de {$dias} dias, {$horas} horas e {$minutos} minutos.";
                break;
        
            default:
                echo "Caso não tratado.";
                break;
        }
        
    }

    ?>

</body>
</html>