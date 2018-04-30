<?php
require_once "status.php";
require "mongo.php";
require "weather.php";
$climate = $client->cleverHome->climate;
$personal = $client->cleverHome->personal;

$climatequery = $climate->find( [ 'data' => 'measurments' ] );
$climatechange = $climate->find( [ 'org' => 'cli' ] );
$housename = $personal->find( [ 'data' => 'info' ] );

include "header.php";
?>



  <body>

    <!-- Navigation -->

    <!-- Page Content -->
    <div class="container">
        <div class="row">
        
        <div class="col-lg-12">
            <h1 ><a href="index.php" style="text-decoration: none; color:#dfe6e9;">Cleverhome:<span style="color:#0984e3;">climate</span></a></h1>
            </div><div class="col-lg-3"></div></div><br>
      
      
        
            
            
          <div class="row">
            <?php 
        foreach ($climatequery as $entry) {
            echo '<div class="col-lg-5">';
            echo ' <h4 class=""  style="font-family: \'Abel\', sans-serif; color:#dfe6e9;">Temperature:<span style="color:#0984e3;">'.$entry["temp"].'°</span>&nbsp;&nbsp;<span class="">Humidity:<span class="" style="color:#0984e3;">'.$entry["humidity"].'%</span></span></h4><br>';
        }   
            echo '</div>';
            ?>
    
     
          </div>
        
        <div class="row">
            <?php 
        foreach ($climatechange as $entry) {
                        $border = "";
                if($entry["target"] < $entry["temp"] || $entry["target"] > $entry["temp"]){ 
               $border = "border-color:#0984e3;";
                }else{
                 $border = "";
                }
            $stat = "heating";
            if($entry["target"] > $entry["temp"]){
                $stat = "heating";
            }else if($entry["target"] < $entry["temp"]){
                $stat = "cooling";
            }else if($entry["target"] == $entry["temp"]){
                $stat = "off";
            }
               
                echo '<div class="col-lg-6"><li class="list-group-item d-flex justify-content-between align-items-center" style="  background-color:#000; border-color:#2d3436; '.$border.'">';

            
            echo ' <h4 class=""  style="font-family: \'Abel\', sans-serif; color:#dfe6e9;">Thermostat:<span style="color:#0984e3;">'.$stat.'</span></h4><br>';
              echo '<div style="padding-top:10px;">
  <ul class="pagination pagination-md" style="background-color:#000; border-color:#2d3436;">
    <li class="page-item" >
      <a class="page-link" href="climatesettings.php?change=0" style="background-color:#000; border-color:#2d3436;">-</a>
    </li>
    <li class="page-item disabled">
      <a class="page-link" href="#" style="background-color:#000; border-color:#2d3436;"><span name="tar" id="tar" style="color:#dfe6e9;">'.$entry["target"].'</span></a>
    </li>
    <li class="page-item">
      <a class="page-link" href="climatesettings.php?change=1" style="background-color:#000; border-color:#2d3436;">+</a>
    </li>
  </ul>
</div>';
            
              
            
              
        }   
            echo '</li></div>';
            ?>
    
     
          </div>
        </div>
        
   
 

    

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
