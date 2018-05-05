<?php

//Here we allow our mistakes to be known
error_reporting(E_ALL);
ini_set('display_errors', '1');

//Require the credentials to the db and security
require("config.php");

// include Composer's autoloader
require("vendor/autoload.php");

//Create mongodb client
$client = new MongoDB\Client($cleveHomeMongoAddress);

?>
