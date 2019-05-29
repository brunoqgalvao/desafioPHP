 <?php

  function logarUsuario($nome, $nivelAcesso){

    $usuario = ["logado" => true, "nome" => $nome, "nivelAcesso" => $nivelAcesso];
    return $usuario;
    }
    $categorias = [
      "Cursos",
      "Tutoriais",
      "Artigos",
      "Forum",
      "Códigos",
    ];
  
  function addProduto($nome, $descricao, $preco, $img_path, $produtos){
        $novoProduto = [
          "nome" => $nome,
          "descricao" => $descricao,
          "preco" => $preco,
          "img_path" => $img_path,
        ];
        $chave = count($produtos) + 1;
        $produtos["produto$chave"] = $novoProduto;
        return $produtos;
      }   

?>