
<?php
include('modelRoupa.php');
?>

<?php if(!$_POST && !$_FILES):?>
  <h1> Você não enviou nenhuma informação </h1>
  <a class='btn btn-primary' href="index.php">Voltar para tela inicial</a>
  <?php exit; ?>
<?php endif ?>
<?php 

if($_POST && $_POST['submit'] == 'Enviar'){
  $error = validarRoupa($_POST,$_FILES);
  if(!$error){
    $roupas = saveRoupas($_POST,$_FILES);
    header( 'Location: ./');
  } else {
    echo "<h1>$error</h1>";
  }
} elseif($_POST && $_POST['submit'] == 'delete'){
  deleteRoupas($_POST);
  header( 'Location: ./');
}



?>