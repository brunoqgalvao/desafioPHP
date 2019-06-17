<?php
include_once('modelRoupa.php');
$roupa = getRoupa($_GET['id']);
if($roupa == []){
  echo '<h1> Nenhum item Encontrado</h1>';
} else {
extract($roupa); // $nome, $descricao, $categoria, $preco, $img_path
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include("head.php") ?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <button onclick="location.href='./';">Voltar para página de produtos</button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <img src='<?= $img_path?>' style='width:100%'>
      </div>
      <div class="col-md-6">
        <h1><?= $nome ?></h1>
        <p class='font-weight-bold'>Categoria</p>
        <p><?= $categoria ?></p>
        <p class='font-weight-bold'>Descrição</p>
        <p><?= $descricao ?></p>
        <div class="d-flex flex-row justify-content-start">
          <div class='mr-3'>
              <p class='font-weight-bold'>Quantidade em Estoque</p>
            <p><?= $quantidade ?></p>
          </div>
          <div class='mr-3'>
              <p class='font-weight-bold'>Preço</p>
            <p><?= $preco ?></p>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>

</html>.
