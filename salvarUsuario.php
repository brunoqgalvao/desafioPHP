<?php include('repos/funcoes.php'); ?>
<?php include('components/head.php')?>

<?php if(!$_POST && !$_FILES):?>
  <h1> Você não enviou nenhuma informação sobre o Usuario </h1>
  <a class='btn btn-primary' href="cadastroUsuario.php">Voltar para o cadastro</a>
  <?php exit; ?>
<?php endif ?>
<?php 

function validarNomeUsuario($nome){
  return $nome != "" && strlen($nome) >3;
}

function validarSenha($senha, $confirmarSenha){
  if(password_verify($senha,$confirmarSenha)){
    return false;
  } else {
    return $senha != "" && strlen($senha) >= 6;
  }
}
function validarEmail($email){
  $valido = !validarUsuarioExiste($email);
  return $valido && $email != "";
}
function validarNivelAcesso($nivelAcesso){
  return $nivelAcesso == 1 || $nivelAcesso == 0;
}
function validarUsuario(){
    if(!validarNomeUsuario($_POST['nomeUsuario'])){
      return 'nome de Usuario inválido';
    } elseif(!validarSenha($_POST['senhaUsuario'],$_POST['confirmarSenha'])){
      return 'senha do Usuario inválida';
    } elseif(!validarEmail($_POST['emailUsuario'])){
      return 'e-mail inválido';
    } elseif(!validarNivelAcesso($_POST['nivelAcessoUsuario'])){
      return "nível de acesso inválido";
    } else{
      return 'NO ERROR';
    }
}

function salvarUsuario(){
  $nome = $_POST['nomeUsuario'];
  $senhaUsuario = password_hash($_POST['senhaUsuario'],PASSWORD_DEFAULT);
  $confimarSenhaUsuario = $_POST['confirmarSenha'];
  $email = $_POST['emailUsuario'];
  $nivelAcesso = $_POST['nivelAcessoUsuario'];
  $error = validarUsuario();
  if($error == 'NO ERROR'){
    if(addUsuario($nome,$senhaUsuario,$email, $nivelAcesso)){
      echo "<h1>Usuario Adicionado com sucesso!</h1>";
      echo "<a class='btn btn-primary' href='login.php'>Ir para a página de login</a>";

    }
  } else {
    echo "<h1>$error</h1>";
    echo "<a class='btn btn-primary' href='cadastroUsuario.php'>Voltar para a página de cadastro</a>";
  }
}

salvarUsuario();