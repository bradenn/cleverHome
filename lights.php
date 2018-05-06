<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include "mongo.php";

$lights = $client->cleverHome->lights;

if(!isset($_GET["locationId"])){
$lightsquery = $lights->find( [ 'type' => "device" ] );
}else{
$lightsquery = $lights->find( [ 'locationId' => $_GET["locationId"] ] );
}
?>

<html>
  <script src="vendor/jquery/jquery.js"></script>
<script type="text/javascript">
function $_GET(param) {
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace(
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);

	if ( param ) {
		return vars[param] ? vars[param] : null;
	}
	return vars;
console.log(vars);

}

function updateUI(){
  $.get( "status.php", <?php if(isset($_GET["locationId"])){ echo '{locationId: '.$_GET["locationId"].'},'; } ?> function( data ) {
  var array = JSON.parse(data);
  for (var i = 0, len = array.length; i < len; i++) {
    var nested = array[i];
    console.log("Device: "+nested["_id"]["$oid"]+" Status: "+nested["status"])
    if(nested["status"] == 1){
      document.getElementById(nested["_id"]["$oid"]).checked = true;
      document.getElementById(nested["_id"]["$oid"]).setAttribute('onclick','updateLights("off", "'+nested["lanAddress"]+'")');
    }else if (nested["status"] == 0) {
      document.getElementById(nested["_id"]["$oid"]).checked = false;
      document.getElementById(nested["_id"]["$oid"]).setAttribute('onclick','updateLights("on", "'+nested["lanAddress"]+'")');
    }
  }
});
}

function init(){
updateUI();
}
window.setInterval(function() {
updateUI();
}, 5000);

function updateLights(toggle, device){

    $.get("lanlights.php", {address: device, dat: toggle});

}
</script>

<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="vendor/css/style.css">
<body onload="init();">

<br>
<div class="ch-content">
<h1><a href="index.php" class="ch-header-link">CLEVERHOME <span class="ch-text-secondary">HUB</span></a></h1>
<br>
<?php
foreach ($lightsquery as $entry) {
echo '<div class="ch-element-group"><div class="ch-element-inline">';
echo '<h2 class="ch-element-primary">'.$entry["name"].'</h2><h2 class="ch-element-secondary">'.$entry["location"].'</h2>';
echo '</div>';
echo '  <div class="ch-element-inline-right">
  <label class="switch">
  <input type="checkbox" id="'.$entry["_id"].'">
  <span class="slider round" style=""></span>
</label>
</div>';
echo '</div><br>';
}
?>

</div>
</body>

</html>
