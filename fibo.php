
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fibonacci</title>
</head>
<body>
    <h1 style="text-align: center;"><strong>Sequencia de fibonacci</strong></h1>
<header>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</header>
<p></p>
    <form style="text-align: center;" action ="fibo.php" method="post">
        <label ><strong>Numero inteiro:</strong></label>
        <input type="number" name="x" min="1" required>
        <input type="submit" value="calcular">
    </form>
    <?php 
    $x=0;
    $inteiro=(int)$x;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $inteiro = isset($_POST["x"]) ? $_POST["x"] : 0 . "<br>";
    }
    if ($inteiro <=0) {
        echo "<p style='text-align: center;'>O valor inserido deve ser maior que zero</p>" . "<br>";
    }
    elseif ($inteiro> 1) {
    $fib = array(0,1);
    $penultimo = $fib[count($fib) - 2];
    $ultimo = end($fib); 

    echo "<p style='text-align: center;'> Os {$inteiro} primeiros numeros da sequencia de fibonacci são: </p>". "<br>";
    for ($i = 1; $i < $inteiro-1; $i++) {
        array_push($fib, $ultimo+$penultimo);
        $penultimo = $fib[count($fib) - 2];
        $ultimo = end($fib); 
    

    }
    
    $string = implode(",", $fib);
    echo "<p style='text-align: center;'>$string</p>";
    }
    elseif ($inteiro = 1) {
        echo "<p style='text-align: center;'> O primeiro número na sequencia de fibonacci é 0 </p>";
        }
     ?>
</body>
</html>
