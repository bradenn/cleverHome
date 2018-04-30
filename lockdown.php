<?php
require_once "status.php";
require "mongo.php";
require "weather.php";
$lights = $client->cleverHome->lights;
$personal = $client->cleverHome->personal;

$lightsquery = $lights->find( [ 'type' => 'device' ] );
$housename = $personal->find( [ 'data' => 'info' ] );


?>

<!DOCTYPE html>
<html lang="en">
  <head>
<style>
    
     

.switch {
  position: relative;
  display: inline-block;
  width: 120px;
  height: 68px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 52px;
  width: 52px;
  left: 8px;
  bottom: 8px;
  background-color: #dfe6e9;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #0984e3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #0984e3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(52px);
  -ms-transform: translateX(52px);
  transform: translateX(52px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 68px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <title>Cleverhome:lights</title>

    <!-- Bootstrap core CSS -->
    <link href="https://bootswatch.com/4/cyborg/bootstrap.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <!-- Custom styles for this template -->
    <style>
      body {
        padding-top: 54px;
          background-color: #000;
          font-family: 'Abel', sans-serif;
          color:#dfe6e9;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }

    </style>

  </head>

  <body>

    <!-- Navigation -->

    <!-- Page Content -->
    <div class="container">
        <div class="row">
        
        <div class="col-lg-12">
            <h1 ><a href="index.php" style="text-decoration: none; color:#dfe6e9;">Cleverhome:<span style="color:#0984e3;">security</span></a></h1>
            </div><div class="col-lg-3"></div></div><br>
      
      
        
            
            
<div class="row">
        <?php 
            foreach ($lightsquery as $entry) {
                $border = "";
                if($entry["status"] == 1){ 
               $border = "border-color:#0984e3;";
                }else if($entry["status"] == 0){
                 $border = "";
                }
               
                echo '<div class="col-lg-6"><li class="list-group-item d-flex justify-content-between align-items-center" style="'.$border.' background-color:#2d3436; ">

             <h4 class=""  style="font-family: \'Abel\', sans-serif; color:#dfe6e9;">'.$entry["name"].'</h4><br>';
              
                
                
             
                if($entry["status"] == 1){ 
                    echo '<label class="switch">
  <input type="checkbox" style="padding-top:10px;" checked onclick="window.location.href=\'lanlights.php?address='.$entry["lanAddress"].'&&dat=off\'">
  <span class="slider"></span>
</label>';
                
                }else if($entry["status"] == 0){
                     echo '<label class="switch">
  <input type="checkbox" style="padding-top:10px;" onclick="window.location.href=\'lanlights.php?address='.$entry["lanAddress"].'&&dat=on\'">
  <span class="slider"></span>
</label>';
                   
                }
              
}   echo '</li></div>';
            ?>
     </li>
      <div class="col-lg-6">
          
  
  </div>

          </div>
        </div>
        
   
 

    <div style="position: absolute; bottom: 5px;">
    <a href="server.php">debug</a>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
