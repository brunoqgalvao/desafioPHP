

 <?php

  // validação de que foi preenchido o formulario.    
  //DEV:
  // if($_GET && $_GET['Dev']==1){
  //   $_POST=[
  //     'nomeCliente'=> 'Fulano',
  //     'nomeProduto'=> 'Produto Dev',
  //   ];
  // }

  if(!$_POST){
    header( 'location: ./index.php');
  }

  $nomeCompleto = $_POST['nomeCliente'];
  $nomeProduto = $_POST['nomeProduto'];

  function compraValida(){
    // foreach($_POST as $info){
    //   if(!$info){
    //     return false;
    //   }
    // }
    return true;
  }




 ?>

<html>
<?php include('components/head.php') ?>
<?php include('components/header.php') ?>
<body>
<?php if(!compraValida()): ?>
Formulario Invalido
<?php else: ?>
<main class="container">
  <section class="row">
    <div class="col-md-12">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Compra Realizada!</h4>
        <p>Parabéns <?= $nomeCompleto ?>! Você comprou <?= $nomeProduto ?>, bom proveito!</p>
        <hr>
        <a href='index.php' class='btn btn-primary'>Voltar para home!</a>
      </div>
    </div>
  </section>
</main>
<?php endif ?>
</body>
</html>