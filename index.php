<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Virtual PHP</title>
</head>
<body>
   <?php 
    $nome = "Vinicius";
    
    // ola mundo
      echo $nome;
      if($nome == "Vinicius"){
        echo "Ok - é Vinicius";
      }else{
        echo "Não é Vinicius";
      }
      for ($i=0; $i < 5; $i++) { 
        echo "<h1> $i </h1>";
      }
      var_dump($nome)
    ?>
</body>

</html>