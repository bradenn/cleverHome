<?php

require("mongo.php");

$collection = $client->cleverHome->lights;

$result = $collection->find( [ 'type' => 'device' ] );



foreach ($result as $entry) {
  $results = exec('bash hs100.sh '.$entry["lanAddress"].' 9999 check');


    if($results == "ON"){
         $collection->updateOne(
  [ 'lanAddress' => $entry["lanAddress"] ],
[ '$set' => [ 'status' => 1 ]]
);
    }
    if($results == "OFF"){
         $collection->updateOne(
  [ 'lanAddress' => $entry["lanAddress"] ],
[ '$set' => [ 'status' => 0 ]]
);
    }



}





?>
