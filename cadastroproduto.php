<!DOCTYPE html>
<html lang="en">
  <?php include("components/head.php") ?>
<body>
  <?php include("components/header.php") ?>
  <main class="container">
    <section class='row'>
      <div class='col-md-6'>
        <form action="salvarProduto.php" method="post" enctype="multipart/form-data">
        
        <div class="form-group">
          <label for="nomeProduto">Nome do produto</label>
          <input type="text" class="form-control" id="nomeProduto" name="nomeProduto">
        </div>
        <div class="form-group">
        <div class="form-group">
          <label for="descricaoProduto">Descrição do produto</label>
          <textarea id="descricaoProduto" class="form-control" name="descricaoProduto" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="precoProduto">Preco do produto</label>
          <input type="number" class="form-control" id="precoProduto" name="precoProduto" name="precoProduto">
        </div>
        <div class="form-group">
          <label for="imgProduto">Text</label>
          <input id="imgProduto" class="form-control-file" type="file" name="imgProduto">
        </div>
        <button type="submit" class="btn btn-primary">Finalizar Cadastro</button>
        </form>
      </div>
    </section class='row'>
  </main>
</body>
</html>