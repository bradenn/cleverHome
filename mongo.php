<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require("config.php");
// include Composer's autoloader
require("vendor/autoload.php");
$client = new MongoDB\Client($cleveHomeMongoAddress);





?>
