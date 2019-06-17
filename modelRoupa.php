<?php
const DB_ROUPAS = './db/roupas.json';
include_once('./repos/gen_uuid.php');

//load roupas
function loadRoupas() {
  $jsonRoupas = file_get_contents(DB_ROUPAS);
  $roupas = json_decode($jsonRoupas,true);
  return $roupas;
}

function getRoupa($id){
  $roupas = loadRoupas();
  if(isset($roupas[$id])){
    return $roupas[$id];
  } else {
    return [];
  }
}


function removeProdutoRoupa(&$produtos, $chave){
  unset($produtos["$chave"]);
}

// "crud"

function saveRoupas($obj,$file){
  $jsonRoupasIn = file_get_contents(DB_ROUPAS);
  $roupas = json_decode($jsonRoupasIn,true);
  $nomeArquivo = $file['foto']['name'];
  $img_path= "img/$nomeArquivo";
  salvarImg($file['foto'], $img_path);
  $add = addProdutoRoupa($roupas,$obj['nome'],$obj['descricao'], $obj['categoria'], $obj['quantidade'], $obj['preco'] ,$img_path);
  if (!$add) {
    return 'erro';
  } else {
    $jsonRoupasOut = json_encode($roupas,148);
    file_put_contents(DB_ROUPAS,$jsonRoupasOut);
    return $roupas;
  }
}

function deleteRoupas($obj){
  $chave = $obj['key'];
  $jsonRoupasIn = file_get_contents(DB_ROUPAS);
  $roupas = json_decode($jsonRoupasIn,true);
  removeProdutoRoupa($roupas,$chave);
  $jsonRoupasOut = json_encode($roupas,148);
  file_put_contents(DB_ROUPAS,$jsonRoupasOut);
}

function addProdutoRoupa(&$produtos, $nome, $descricao, $categoria, $quantidade, $preco, $img_path){

  $chave = gen_uuid();
  $novoProduto = [
    "nome" => $nome,
    "categoria" => $categoria,
    "descricao" => $descricao,
    "quantidade" => $quantidade,
    "preco" => $preco,
    "img_path" => $img_path,
  ];
  $produtos["produto$chave"] = $novoProduto;
  return true;
}

function validarRoupa(){
    if(!validarNomeProduto($_POST['nome'])){
      return 'nome de produto inválido';
    } elseif(!validarDescricao($_POST['descricao'])){
      return 'descricao de produto inválido';
    } elseif(!validarCategoria($_POST['categoria'])){
      return 'categoria invalida';
    } elseif(!validarPreco($_POST['preco'])){
      return 'preço inválido';
    } elseif(!validarImg($_FILES['foto']['type'])){
      return "imagem inválida";
    } else{
      return false;
    }
}

function salvarImg($arquivo,$img_path){
  $nomeArquivo = $arquivo['name'];
  $arquivoTmp = $arquivo['tmp_name'];
  move_uploaded_file($arquivoTmp, "img/$nomeArquivo");
  }

function validarNomeProduto($nome){
  return $nome != "" && strlen($nome) >3;
}

function validarDescricao($descricao){
  return $descricao != "" && strlen($descricao) > 3;
}
function validarCategoria($categoria){
  $valid_categorias = ["Camiseta", "Shorts","Calça","Chapéu"];
  return in_array($categoria , $valid_categorias);
}

function validarPreco($preco){
  return $preco != "" && $preco >= 0 ;
}
function validarImg($tipo){
  var_dump($tipo);
  $imgAceitas = ['image/png','image/jpg','image/jpeg'];
  return array_search($tipo, $imgAceitas) !== false;
}