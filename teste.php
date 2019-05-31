 <?php
  //  $teste = 'teste';
  //  echo $teste;
  //  for ($i=10; $i > 5; $i--) { 
  //     echo $i;
  //     if($i == 5){
  //       break;
  //     }
  //  }
 ?>

<?php var_dump($_POST); ?><br/>
<?php echo "Olá ".$_POST['nome']." ".$_POST['sobreNome'] ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form method="POST" action="">
    <input type="text" name="nome" id="nome">
    <input type="text" name="sobreNome" id="sobreNome">
    <button type="submit">Enviar</button>
  </form>
</body>
</html>
