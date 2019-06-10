 <?php
 
 include_once('repos/gen_uuid.php');


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
    $produtos = json_decode($jsonProdutos,true);
    $chave = count($produtos) + 1;
    $novoProduto = [
      "id" => "produto$chave",
      "nome" => $nome,
      "descricao" => $descricao,
      "preco" => $preco,
      "img_path" => $img_path,
    ]; 
    $produtos[] = $novoProduto;
    $jsonProdutos = json_encode($produtos,148);
    file_put_contents('db/produtos.json', $jsonProdutos);
    return $produtos;
  }   

  function addUsuario($nome, $senha, $email, $nivelDeAcesso){
    $jsonUsuarios = file_get_contents('db/usuarios.json');
    $usuarios = json_decode($jsonUsuarios,true);
    $chave = gen_uuid();
    $novoUsuario = [
      "id" => "usuario$chave",
      "nome" => $nome,
      "email" => $email,
      "senha" => $senha,
      "nivelAcesso" => $nivelDeAcesso,
    ]; 
    $usuarios[] = $novoUsuario;
    $jsonUsuarios = json_encode($usuarios,148);
    return file_put_contents('db/usuarios.json', $jsonUsuarios); // retorna um boleano se deu certo e se errado, falso
  }  
  
  function senhaValida($usuario,$senha){
    return password_verify($senha,$usuario['senha']);
  }

  function validarUsuarioExiste($usuario){
    if(!getUsuarioEmail($usuario)){
      return false;
    } else {
      return true;
    }
  }


  function getUsuarioEmail($email){
    $jsonUsuarios = file_get_contents('db/usuarios.json');
    $usuarios = json_decode($jsonUsuarios,true);
    foreach($usuarios as $usuario){
      if($usuario['email'] == $email){
        return $usuario;
      }
    }
    return false;
  }
?>