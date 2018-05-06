<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include "mongo.php";

$lights = $client->cleverHome->lights;

$lightsquery = $lights->find( [ 'type' => 'device' ] );

?>

<html>
  <script src="vendor/jquery/jquery.js"></script>
<script type="text/javascript">


function updateUI(){
  $.get( "check.php", function( data ) {
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
  $.get( "status.php", function( data ) {
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
<h1>CLEVERHOME <span class="ch-text-secondary">HUB</span></h1>
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
