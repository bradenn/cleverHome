<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include "mongo.php";

$locations = $client->cleverHome->locations;
$lights = $client->cleverHome->lights;
$climate = $client->cleverHome->climate;

$locationsquery = $locations->find();


?>
<html>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="vendor/css/style.css">
<body>

<br>
<div class="ch-content">
<h1><a href="index.php" class="ch-header-link">CLEVERHOME <span class="ch-text-secondary">HUB</span></a></h1>
<br>
<?php
foreach ($locationsquery as $entry) {
  echo '<div class="ch-menu-container">';
  echo '<h2>'.$entry["location"].'</h2>';
  $lightsquery = $lights->find([ 'locationId' => $entry["locationId"] ]);
  if(sizeof($lightsquery) > 0){
  echo '<a href="lights.php?locationId='.$entry["locationId"].'" class="ch-menu-link"><div class="ch-menu-group">
<h2>Lights</h2>
</div>
</a>';
}
$climatequery = $climate->find([ 'locationId' => $entry["locationId"] ]);

foreach ($climatequery as $centry) {
echo '<a href="?locationId='.$centry["locationId"].'" class="ch-menu-link"><div class="ch-menu-group">
<h2>Climate</h2>
</div>
</a>';
}


echo '</div><br>';

}
?>

</div>
</body>

</html>
