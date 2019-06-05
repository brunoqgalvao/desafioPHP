
<?php include_once("repos/funcoes.php"); ?>

 <?php


  function validarCompra($dadosCompras){
    
    $erros = validarRequest($dadosCompras);
    if(!count($erros)){
      $erros = array_merge($erros,validarCamposCompra($dadosCompras));
    }
    return $erros;
  }

  function validarRequest($request){
    $erros = []; 
    if(!$request){
      $erros[] = "Não identificamos envio de informações, favor voltar à página inicial";
    }
    return $erros;
  }

  function validarCamposCompra($dadosCompras){

    $erros = []; 

    // $dadosCompras = completarIndicesVazios($dadosCompras);

    if(!validarNome($dadosCompras['nomeCliente'])){
      $erros[] = "Verifique se seu nome esta correto, e se é maior que 2 caracteres!";
    }
    if(!validarCpf($dadosCompras['cpfCliente'])){
      $erros[] = "CPF inválido, tentar novamente";
    }
    if(!validarCartao($dadosCompras['cartaoCliente'])){
      $erros[] = "numero de cartao invalido";
    }
    if(!validarDataValidade($dadosCompras['dataValidadeCartao'])){
      $erros[] = "Cartão com data vencida!";
    }
    if(!validarCVV($dadosCompras['cvvCartao'])){
      $erros[] = "Numero de CVV inválido";
    }
    return $erros;
  }

  $errosValidacao = validarCompra($_POST);
  $nomeCompleto = isset($_POST['nomeCliente']) ? $_POST['nomeCliente'] : 'semNome';
  $nomeProduto = isset($_POST['nomeProduto']) ? $_POST['nomeProduto'] : 'semProduto';

 ?>
<html>
<?php include('components/head.php') ?>
<?php include('components/header.php') ?>

<body>
  <?php if(count($errosValidacao) > 0): ?>
    <div class="col-md-12">
      <ul>
      <?php foreach($errosValidacao as $erro): ?>
        <li><?php echo $erro; ?></li>
      <?php endforeach; ?>    
      </ul>
    </div>
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