<?php 
const DB_NAME = 'dummyDatabase.json';


function writeToDB($content){
  $fp = fopen(DB_NAME, 'w');
  fwrite($fp, 'Cats chase mice');
  fclose($fp);
}

?>