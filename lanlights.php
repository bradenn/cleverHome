<?php

     require("mongo.php");

     $collection = $client->cleverHome->lights;

     $result = $collection->find( [ 'type' => 'device' ] );

     $arr = array();



$data = 0;
if($_GET["dat"] == "on"){
  $data = 1;
}elseif ($_GET["dat"] == "off") {
  $data = 0;
}

              $collection->updateOne(
       [ 'lanAddress' => $_GET["address"] ],
     [ '$set' => [ 'status' => $data ]]
     );

 $result = exec('bash hs100.sh '.$_GET["address"].' 9999 '.$_GET["dat"]);



?>
