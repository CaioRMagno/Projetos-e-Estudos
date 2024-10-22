<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplicação</title>
    <h1>Multiplicação de Array</h1> 
</head>
<body>
<form method ="post" action="">
        <label for="numeros"><strong>Digite os numeros da array separados por virgula:</strong></label>
        <input type="text" id="numeros" name="numeros">
        <button type="submit" >Calcular</button>
    </form> 
</body>
</html>

<?php
$numeros = $_POST["numeros"] ?? "";
    if ($numeros !== "") {
        $array_numeros = explode(",", $numeros);
        $array_numeros = array_map('trim', $array_numeros);
        $valores_array = implode(", ", $array_numeros);
        $soma=0;
        
        foreach ($array_numeros as $numero) {
            if (!is_numeric($numero)) {
                unset($array_numeros[$numero]);
            } else {
                $soma += $numero;
            }
        
        }
        
        echo "A array contém os valores: $valores_array" . "<br>";
        echo $soma;
    }

?>