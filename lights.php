<?php
require_once "status.php";
require "mongo.php";
require "weather.php";
$lights = $client->cleverHome->lights;
$personal = $client->cleverHome->personal;

$lightsquery = $lights->find( [ 'type' => 'device' ] );
$housename = $personal->find( [ 'data' => 'info' ] );

include "header.php";
?>



  <body>

    <!-- Navigation -->

    <!-- Page Content -->
    <div class="container">
        <div class="row">
        
        <div class="col-lg-12">
            <h1 ><a href="index.php" style="text-decoration: none; color:#dfe6e9;">Cleverhome:<span style="color:#0984e3;">lights</span></a></h1>
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
               
                echo '<div class="col-lg-6"><li class="list-group-item d-flex justify-content-between align-items-center" style="  background-color:#000; border-color:#2d3436; '.$border.'">';

             if($entry["status"] == 1){ 
            echo ' <h4 class=""  style="font-family: \'Abel\', sans-serif; color:#dfe6e9;">'.$entry["name"].':<span style="color:#0984e3;">on</span></h4><br>';
                }
              if($entry["status"] == 0){ 
            echo ' <h4 class=""  style="font-family: \'Abel\', sans-serif; color:#dfe6e9;">'.$entry["name"].':<span style="color:#0984e3;">off</span></h4><br>';
              }
              
                
                
             
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
        
   
 

    

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
