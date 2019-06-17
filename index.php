<?php
include_once('modelRoupa.php');
$roupas = loadRoupas();
?>


<!DOCTYPE html>
<html lang="en">
<?php include("head.php") ?>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 todos-produtos">
        <h2 class='mb-4 mt-4'> Todos os produtos </h2>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Categoria</th>
              <th scope="col">Preço</th>
              <th scope="col"></th>

            </tr>
          </thead>
          <tbody>
            <?php foreach($roupas as $chave => $roupa):  ?>
            <tr>
              <td><a href="./showRoupa.php?id=<?= $chave ?>"><?= $roupa['nome'] ?></a></td>
              <td><?= $roupa['categoria'] ?></td>
              <td><?= $roupa['preco'] ?></td>
              <td>
                <form method='post' action='routerRoupa.php'>
                  <div class="d-flex flex-row justify-content-around">
                    <input type='text' name='submit' value='delete' style="display:none" />
                    <input type='text' name='key' value="<?= $chave ?>" style="display:none" />
                    <button type='submit' name='submit' value='delete'>&#x1F5D1;</button>   
                    <span id='btn-delete-item'>&#x270E;</span>      
                  </div>
                </form>
              </td>
            </tr>
            <?php endforeach  ?>
          </tbody>
        </table>
      </div>
      <div class="col-lg-4 bg-light cadastrar-produto p-5">
        <form method='post' action='routerRoupa.php' enctype="multipart/form-data">
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name='nome' id="nome" placeholder="Nome do produto">
          </div>
          <div class="form-group">
            <label for="descricao">Descrição do Produto</label>
            <textarea id="descricao" class="form-control" name="descricao" rows="2"></textarea>
          </div>
          <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" name='categoria' id="categoria">
              <option> Camiseta </option>
              <option> Shorts </option>
              <option> Calça </option>
              <option> Chapéu </option>
            </select>
          </div>
          <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" class="form-control" name='quantidade' id="quantidade"
              placeholder="Quantidade do produto">
          </div>
          <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" class="form-control" name='preco' id="preco" placeholder="Preço do produto">
          </div>
          <div class="form-group">
            <label for="foto">Foto do produto</label>
            <input type="file" class="form-control" name='foto' id="foto" placeholder="Foto do produto">
          </div>
          <input class='btn-primary' type="submit" name='submit' value="Enviar" />
        </form>
      </div>
    </div>
  </div>


</body>

</html>.
