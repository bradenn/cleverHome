<?php
require("mongo.php");

$collection = $client->cleverHome->security;



if($_GET["dat"] == 1){
$collection->updateOne([ 'type' => "system" ], [ '$set' => [ 'status' => $_GET["dat"] ]]);
}
if($_GET["dat"] == 0 && $_POST["pin"] == $cleverHomeSecurityCode){
$collection->updateOne([ 'type' => "system" ], [ '$set' => [ 'status' => $_GET["dat"] ]]);
}

header("Location: security.php");




?>
