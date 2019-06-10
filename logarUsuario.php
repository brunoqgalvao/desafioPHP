<?php
include_once('repos/funcoes.php');
include_once('./components/head.php');

$contadorInputVazio = 0;
foreach($_POST  as $item){
  $item ==''?$contadorInputVazio++:0;
}

$itemsPost = is_array($_POST)?count($_POST):0;
if($contadorInputVazio == $itemsPost){
  echo "<h1> Você não enviou nenhuma informação sobre o login</h1>";
  echo "<a class='btn btn-primary' href='login.php'> Voltar para a página de login! </a>";
  exit;
}
$email = $_POST['emailUsuario'];
$senha = $_POST['senhaUsuario'];

function validarLoginUsuario($usuario,$senha){
  $usuario = getUsuarioEmail($usuario);
  if(!$usuario){
    return false;
  } elseif(!senhaValida($usuario,$senha)){
    return false;
  } else{
    return $usuario;
  }
}

if(!validarLoginUsuario($email,$senha)){
  echo 'E-mail ou senha inválida';
} else{
  session_start();
  $_SESSION['usuario'] = validarLoginUsuario($email,$senha);
  header('Location: ./index.php');
}

