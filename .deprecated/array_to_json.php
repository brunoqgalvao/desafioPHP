<?php

include('repos/dados.php');


$jsonProdutos = json_encode($produtos);
file_put_contents('produtos.json',$jsonProdutos);