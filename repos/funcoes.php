 <?php
 
  function validarNome($nome){
    return $nome != "" && strlen($nome) >=3;
  }
  function validarCpf($cpf){
    return strlen($cpf) == 11;
  }
  function validarCartao($cartaoCliente){
    return  strlen($cartaoCliente) == 16;
  }
  function validarDataValidade($dataValidade){
    return $dataValidade > date('y-m-d');
  }
  function validarCVV($cvv){
    return  strlen($cvv) == 3;
  }
  function logarUsuario($nome, $nivelAcesso){

    $usuario = ["logado" => true, "nome" => $nome, "nivelAcesso" => $nivelAcesso];
    return $usuario;
  }

  function addProduto($nome, $descricao, $preco, $img_path){
    $jsonProdutos = file_get_contents('db/produtos.json');
    $produtosObj = json_decode($jsonProdutos,true);
    $produtos = $produtosObj['produtos'];
    $chave = count($produtos) + 1;
    $novoProduto = [
      "id" => "produto$chave",
      "nome" => $nome,
      "descricao" => $descricao,
      "preco" => $preco,
      "img_path" => $img_path,
    ]; 
    $produtos[] = $novoProduto;
    $produtosObj['produtos']=$produtos;
    $jsonProdutos = json_encode($produtosObj,128);
    file_put_contents('db/produtos.json', $jsonProdutos);
    return $produtosObj;
  }   


  
?>