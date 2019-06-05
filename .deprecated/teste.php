<?php
  include_once('db/db.php');
  if($_POST){
    $usuario = $_POST;
    saveObj($usuario);
  }
?>

<form method='POST' action="#">
Nome:<input type='text' name='nome' />
Idade: <input type='number' name='idade' />
<input type='submit'>

<?php
$conteudodb = file_get_contents('db/db.json');
$objs = json_decode($conteudodb,true);
var_dump($objs);
?>