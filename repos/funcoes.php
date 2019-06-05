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

  function addProduto(&$produtos, $nome, $descricao, $preco, $img_path){
        $novoProduto = [
          "nome" => $nome,
          "descricao" => $descricao,
          "preco" => $preco,
          "img_path" => $img_path,
        ];
        $chave = count($produtos) + 1;
        $produtos["produto$chave"] = $novoProduto;
  }   

  
?>