<?php include('repos/funcoes.php'); ?>
<?php include('components/head.php')?>

<?php if(!$_POST && !$_FILES):?>
  <h1> Você não enviou nenhuma informação sobre o produto </h1>
  <a class='btn btn-primary' href="cadastroProduto.php">Voltar para o cadastro</a>
  <?php exit; ?>
<?php endif ?>
<?php 

function validarNomeProduto($nome){
  return $nome != "" && strlen($nome) >3;
}

function validarDescricao($descricao){
  return $descricao != "" && strlen($descricao) > 3;
}
function validarPreco($preco){
  return $preco != "" && $preco >= 0 ;
}
function validarImg($tipo){
  var_dump($tipo);
  $imgAceitas = ['image/png','image/jpg','image/jpeg'];
  return array_search($tipo, $imgAceitas) != false;
}
function validarProduto(){
    if(!validarNomeProduto($_POST['nomeProduto'])){
      return 'nome de produto inválido';
    } elseif(!validarDescricao($_POST['descricaoProduto'])){
      return 'descricao de produto inválido';
    } elseif(!validarPreco($_POST['precoProduto'])){
      return 'preço inválido';
    } elseif(!validarImg($_FILES['imgProduto']['type'])){
      return "imagem inválida";
    } else{
      return 'NO ERROR';
    }
}


function salvarImg($arquivo,$img_path){
  $nomeArquivo = $arquivo['name'];
  $arquivoTmp = $arquivo['tmp_name'];
  move_uploaded_file($arquivoTmp, "img/$nomeArquivo");
  }

function salvarProduto(){
  $nome = $_POST['nomeProduto'];
  $descricao = $_POST['descricaoProduto'];
  $preco = $_POST['precoProduto'];
  $nomeArquivo = $_FILES['imgProduto']['name'];
  $img_path= "img/$nomeArquivo";
  $error = validarProduto();
  if($error == 'NO ERROR'){
    salvarImg($_FILES['imgProduto'], $img_path);
    addProduto($nome,$descricao,$preco, $img_path);
    echo "<h1>Produto Adicionado com sucesso!</h1>";
  } else {
    echo "<h1>$error</h1>";
  }
}


salvarProduto();