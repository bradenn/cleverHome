<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "status.php";
require "mongo.php";
require "weather.php";
$lights = $client->cleverHome->lights;
$personal = $client->cleverHome->personal;

$lightsquery = $lights->find( [ 'type' => 'device' ] );
$housename = $personal->find( [ 'data' => 'info' ] );

include "header.php";

//IGNORE THIS FILE! THIS FILE DOES NOT WORK AND EVER WILL WORK!


?>



  <body>

    
    
    
    <!-- Navigation -->

    <!-- Page Content -->
    <div class="container">
        <div class="row">

        <div class="col-lg-12">
            <h1 ><a href="index.php" style="text-decoration: none; color:#dfe6e9;">Cleverhome:<span style="color:#0984e3;">ring</span></a></h1>
            </div><div class="col-lg-3"></div></div><br>





<div class="row">
        <?php
  //File 'vendor/ring/init.py' was redacted from repositry due to wildly useless need. 
   $arrs = str_replace('u"', '"', str_replace("'", '"', exec("python vendor/ring/init.py")));

$arr = json_decode($arrs);


echo '<div class="col-lg-6">';

foreach($arr as $in){


            echo '<li class="list-group-item justify-content-between align-items-center" style="  background-color:#000; border-color:#2d3436;">';
      echo ' <h4 class=""  style="font-family: \'Abel\', sans-serif; color:#dfe6e9;">Ring:<span style="color:#0984e3;">'.strtolower(str_replace(" ", "", $in->{"name"})).'</span></h4>
      <span class="float-right">WIFI: '.strtolower(str_replace(" ", "", $in->{"wificat"})).' ('.strtolower(str_replace(" ", "", $in->{"wifi"})).')</span><br>';
 echo '</li>';
}








            ?></div>
     </li>
      <div class="col-lg-6">


  </div>

          </div>
        </div>






    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
