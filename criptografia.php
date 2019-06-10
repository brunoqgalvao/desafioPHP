<?php
$senha = "vinicius123";
$senhaC = password_hash($senha,PASSWORD_DEFAULT);
var_dump($senhaC);
var_dump(password_verify("vinicius123",$senhaC));