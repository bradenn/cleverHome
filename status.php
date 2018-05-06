<?php

require("mongo.php");

$collection = $client->cleverHome->lights;

if(isset($_GET["locationId"])){
$result = $collection->find( [ 'locationId' => $_GET["locationId"] ] );
}else{
  $result = $collection->find( [ 'type' => "device" ] );
}
$arr = array();

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
array_push($arr, $entry);


}

echo json_encode($arr);



?>
