

<?php
  //TODO: Não é um json de verdaed, falta o formato de { "nome" : [array de objectos]}
  //  $arquivo = fopen('teste.json','w');
  // fwrite($arquivo, "ALOU MUNDO");
  // var_dump($arquivo);


  function file_add_contents($path,$conteudo){
    file_put_contents($path,$conteudo, FILE_APPEND );
  }

  function beginJsonObj($id){
    return "\"$id\" : { \n";
  }

  function featureToJson($key,$feature){
    if(is_array($feature)){
      return serializeToJson($key,$feature);
    }
    return "  \"$key\" : \"$feature\", \n";
  }

  function endJsonObj(){
    return "},\n";

  }

  // TODO: colocar isso como uma função só, sendo um objeto do arquivo
  function serializeToJson($id, $object){
    $serialObj = beginJsonObj($id);
    foreach($object as $key => $feature){
      $serialObj .= featureToJson($key, $feature);
    }
    $serialObj .= endJsonObj();
    return $serialObj;
  }

  function deserializeJson($json){
    preg_match_all('/\[\[.*?]]/s', $text, $matches);

  }

  // $object = ['test' => [123123,123123], 'teste3' => 'reserse'];

  // $pathArquivo = 'db/db.json';
  // $jsonObj = serializeToJson(gen_uuid(), $object);
  // file_add_contents($pathArquivo,$jsonObj);

?>