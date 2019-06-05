<?php 
include_once('repos/gen_uuid.php');

const DB_FILEPATH = 'db/db.json';

function saveObj($obj){
  $contents = file_get_contents(DB_FILEPATH);
  $dbObj = json_decode($contents,true);
  var_dump($dbObj);
  $newDbObj = array_merge($dbObj,$obj);
  $jsonObj = json_encode($dbObj,148);
  var_dump($jsonObj);
  file_put_contents(DB_FILEPATH,$jsonObj);
}