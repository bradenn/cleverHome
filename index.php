<?php
require "mongo.php";
$lights = $client->cleverHome->lights;
$personal = $client->cleverHome->personal;
$system = $client->cleverHome->systeminfo;

$systemquery = $system->find( [ 'data' => 'info' ] );
$lightsquery = $lights->find( [ 'type' => 'device' ] );
$housename = $personal->find( [ 'data' => 'house name' ] );

include "header.php";
?>



  <body>

    <!-- Navigation -->

    <!-- Page Content -->
    <div class="container">
        <div class="row">

        <div class="col-lg-7">
            <h1 style="font-family: 'Abel', sans-serif; color:#dfe6e9;">Cleverhome:<span style="color:#0984e3;">menu</span></h1>
            </div><div class="col-lg-3"></div></div><br>
        <div class="row">

       <div class="col-lg-6">
          <a href="lights.php" style="text-decoration: none; " > <li class="list-group-item d-flex justify-content-between align-items-center" style=" background-color:#000; border-color:#2d3436;">

             <h4 class=""  style="font-family: 'Abel', sans-serif; color:#dfe6e9;">Lights</h4><br>
        </li></a>
            </div>
        </div>
         <br>
          <div class="row">

       <div class="col-lg-6">
          <a href="climate.php" style="text-decoration: none;"> <li class="list-group-item d-flex justify-content-between align-items-center" style=" background-color:#000; border-color:#2d3436;">

             <h4 class=""  style="font-family: 'Abel', sans-serif; color:#dfe6e9;">Climate</h4><br>
        </li></a>
            </div>
        </div>
        <br>

          <div class="row">

       <div class="col-lg-6">
          <a href="ring.php" style="text-decoration: none;"> <li class="list-group-item d-flex justify-content-between align-items-center" style=" background-color:#000; border-color:#2d3436;">

             <h4 class=""  style="font-family: 'Abel', sans-serif; color:#dfe6e9;">Ring</h4><br>
        </li></a>
            </div>
        </div><br>
          <div class="row">

       <div class="col-lg-6">
          <a href="security.php" style="text-decoration: none;"> <li class="list-group-item d-flex justify-content-between align-items-center" style=" background-color:#000; border-color:#2d3436;">

             <h4 class=""  style="font-family: 'Abel', sans-serif; color:#dfe6e9;">Security</h4><br>
        </li></a>
            </div>
        </div><br>
         <div class="row">

       <div class="col-lg-6">
          <a href="server.php" style="text-decoration: none;"> <li class="list-group-item d-flex justify-content-between align-items-center" style=" background-color:#000; border-color:#2d3436;">

             <h4 class=""  style="font-family: 'Abel', sans-serif; color:#dfe6e9;">Server Status</h4><br>
        </li></a>
            </div>
        </div>







        </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
