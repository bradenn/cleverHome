<?php
require("mongo.php");

$collection = $client->cleverHome->lights;

$result = $collection->find( [ 'type' => 'device' ] );

$arr = array();

foreach ($result as $entry) {
array_push($arr, $entry);

}

echo json_encode($arr);

 ?>
