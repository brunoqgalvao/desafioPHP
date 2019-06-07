
<?php

//TODO: Colocar save de imagem e save no banco de dados;
//TODO: Fazer modal para editar item;

const DB_ROUPAS = 'db/roupas.json';
include('repos/gen_uuid.php');

// parte do crud
function addProdutoRoupa(&$produtos, $nome, $categoria, $preco, $img_path){
  $valid_categorias = ["Camiseta","Shorts","Calça","Chapéu"];
  if(!in_array($categoria , $valid_categorias)){
    return 'erro';
  }
  $novoProduto = [
    "nome" => $nome,
    "categoria" => $categoria,
    "preco" => $preco,
    "img_path" => $img_path,
  ];
  $chave = gen_uuid();
  $produtos["produto$chave"] = $novoProduto;
}   

function removeProdutoRoupa(&$produtos, $chave){
  unset($produtos["$chave"]);
}

// "crud"
function saveRoupas($obj,$files){
  $jsonRoupasIn = file_get_contents(DB_ROUPAS);
  $roupas = json_decode($jsonRoupasIn,true);
  addProdutoRoupa($roupas,$obj['nome'],$obj['categoria'],$obj['preco'] ,'testepath');
  $jsonRoupasOut = json_encode($roupas,148);
  file_put_contents(DB_ROUPAS,$jsonRoupasOut);
}

function deleteRoupas($obj){
  $chave = $obj['key'];
  $jsonRoupasIn = file_get_contents(DB_ROUPAS);
  $roupas = json_decode($jsonRoupasIn,true);
  removeProdutoRoupa($roupas,$chave);
  $jsonRoupasOut = json_encode($roupas,148);
  file_put_contents(DB_ROUPAS,$jsonRoupasOut);
}


// post roupa se houver request post
if($_POST && $_POST['submit'] == 'Enviar'){
  saveRoupas($_POST);
} elseif($_POST && $_POST['submit'] == 'delete'){
  deleteRoupas($_POST);
}


//load roupas
$jsonRoupas = file_get_contents(DB_ROUPAS);
$roupas = json_decode($jsonRoupas,true);

?>

<!DOCTYPE html>
<html lang="en">
  <?php include("components/head.php") ?>
<body>
  <?php include("components/header.php") ?>
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
                <td><?= $roupa['nome'] ?></td>
                <td><?= $roupa['categoria'] ?></td>
                <td><?= $roupa['preco'] ?></td>
                <td>	
                  <form method='post' action='#'>
                    <input type='text' name='submit' value='delete' style="display:none"/>
                    <input type='text' name='key' value= "<?= $chave ?>" style="display:none"/>
                    <button type='submit' name='submit' value='delete'>&#x1F5D1;</button>
                  </form>
                  <span id='btn-delete-item'>&#x270E;</span>
                </td>
              </tr>
            <?php endforeach  ?>
          </tbody>
        </table>
      </div>
      <div class="col-lg-4 bg-light cadastrar-produto p-5">
        <form method='post' action='#' enctype="multipart/form-data">
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name='nome' id="nome" placeholder="Nome do produto">
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
            <input type="number" class="form-control" name='quantidade' id="quantidade" placeholder="Quantidade do produto">
          </div>
          <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" class="form-control" name='preco' id="preco" placeholder="Preço do produto">
          </div>
          <div class="form-group">
            <label for="foto">Foto do produto</label>
            <input type="file" class="form-control" name='foto' id="foto" placeholder="Foto do produto">
          </div>
          <input class='btn-primary' type="submit" name='submit' value="Enviar"/>
        </form>
      </div>
    </div>
  </div>

  
</body>

</html>.
