<?php
require("mongo.php");

$collection = $client->cleverHome->climate;
$result = $collection->find( [ 'data' => "measurments" ] );
$currentTarget = 0;
foreach ($result as $entry) {
$currentTarget = $entry["target"];
}
if($_GET["change"] == 1){
$collection->updateOne([ 'data' => "measurments" ], [ '$set' => [ 'target' => $currentTarget+1 ]]);
}
if($_GET["change"] == 0){
  $collection->updateOne([ 'data' => "measurments" ], [ '$set' => [ 'target' => $currentTarget-1 ]]);
}


header("Location: climate.php");




?>
