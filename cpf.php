<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autentificador de CPF</title>
</head>
<body>
<h1>Autentificador de CPF</h1> 
<form method ="post" action="">
        <label for="numeros"><strong>Digite os numeros do cpf:</strong></label>
        <input type="text" id="numeros" name="numeros">
        <button type="submit" >Verificar</button>
    </form> 
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $numeros = $_POST["numeros"] ?? "";
$numeros =$_POST["numeros"] ?? "";
if (!is_numeric($numeros)) {
    echo "Digite apenas números";
}
else{
$numeros=str_split($numeros);
if (count($numeros) !== 11) {
    echo "Por favor, insira exatamente 11 números.<br>";
    exit;
}
$numeros_separados=implode("",$numeros);
$ultimo = end($numeros);
$penultimo = $numeros[count($numeros) - 2] ?? "";
echo "Cpf digitado: " . $numeros_separados . "<br>";
echo "Digitos Verificadores: " . $penultimo . " e " .$ultimo.  "<br>";


unset($numeros[10]);
$numeros2=$numeros;
unset($numeros[9]);

$numeros = array_values($numeros); 
$numeros_separados = implode(".", $numeros);
$array_primeira = array(10,9,8,7,6,5,4,3,2);
$resultado = [];
$soma=0;
    for ($i = 0; $i < 9; $i++) {
        $resultado[] = $numeros[$i] * $array_primeira[$i];
    }
    $soma=array_sum($resultado)*10%11;
    echo "Primeiro digito verificado: ". $soma . "<br>";

$numeros_separados2 = implode(".", $numeros2);
$array_segunda = array(11,10,9,8,7,6,5,4,3,2);
$resultado2=[];
$soma2=0;
    for ($o = 0; $o < 10; $o++) {
        $resultado2[] = $numeros2[$o] * $array_segunda[$o];
    }
    $soma2=array_sum($resultado2)*10%11;
    echo "Segundo digito verificado: ". $soma2 . "<br>";
}
    if($soma ==$penultimo && $soma2 ==$ultimo){
    echo "O cpf é valido";

    }
    else{
    echo "o cpf não é valido";
    }
}
?>