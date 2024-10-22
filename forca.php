<?php
session_start();
$animal="cachorro";
$letras=strlen($animal);
$letras_animal=str_split($animal);

if (!isset($_SESSION["adivinhar"])) {
    $_SESSION["adivinhar"] = array_fill(0, $letras, "_");
}
if (!isset($_SESSION["tentativas"])) {
    $_SESSION["tentativas"] = 10;
}
$letra = strtolower(trim($_POST["letra"] ?? ""));
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($letra)) {
    $letra_correta = false;

    for ($i = 0; $i < $letras; $i++) {
        if ($letra === $letras_animal[$i]) {
            $_SESSION["adivinhar"][$i] = $letra;
            $letra_correta = true;
        }
    }
    if (!$letra_correta) {
        $_SESSION["tentativas"]--;
        $mensagem = "A letra '{$letra}' não está correta.";
    }
    if (!in_array("_", $_SESSION["adivinhar"])) {
        echo "Parabéns! Você adivinhou a palavra '{$animal}'.<br>";
        session_destroy();
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forca</title>
</head>
<body>
    <h1>Jogo da Forca</h1>
    <p>O animal tem <?= $letras ?> letras</P>
    <p>Palavra: <?= implode(" ", $_SESSION["adivinhar"]) ?></p>
    <p>Tentativas restantes: <?= $_SESSION["tentativas"] ?></p>
    <form method ="post" action="">
        <label for="letra"><strong>Digite uma letra:</strong></label>
        <input type="text" id="letra" name="letra" maxlength="1" required>
        <button type="submit" >Adivinhar</button>
    </form>
</body>
</html>