<?php
require_once "status.php";
require "mongo.php";
require "weather.php";
$security = $client->cleverHome->security;
$personal = $client->cleverHome->personal;

$securityquery = $security->find( [ 'type' => 'system' ] );
$housename = $personal->find( [ 'data' => 'info' ] );
include "header.php";

?>


<body>

    <!-- Navigation -->

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <h1><a href="index.php" style="text-decoration: none; color:#dfe6e9;">Cleverhome:<span style="color:#0984e3;">security</span></a></h1>
            </div>
            <div class="col-lg-3"></div>
        </div><br>





        <div class="row">
            <?php 
            foreach ($securityquery as $entry) {
                $border = "";
                if($entry["status"] == 1){ 
               $border = "border-color:#0984e3;";
                }else if($entry["status"] == 0){
                 $border = "";
                }
               
            echo '<div class="col-lg-6"><li class="list-group-item d-flex justify-content-between align-items-center" style="  background-color:#000; border-color:#2d3436; '.$border.'">';
                if($entry["status"] == 1){ 
            echo ' <h4 class=""  style="font-family: \'Abel\', sans-serif; color:#dfe6e9;">System:<span style="color:#0984e3;">armed</span></h4><br>';
                }
              if($entry["status"] == 0){ 
            echo ' <h4 class=""  style="font-family: \'Abel\', sans-serif; color:#dfe6e9;">System:<span style="color:#0984e3;">disarmed</span></h4><br>';
              }
                
                
             
                if($entry["status"] == 1){ 
                    echo '<label class="switch">
  <input type="checkbox" style="padding-top:10px;" checked data-toggle="modal" data-target="#password"">
  <span class="slider"></span>
</label>';
                
                }else if($entry["status"] == 0){
                     echo '<label class="switch">
  <input type="checkbox" style="padding-top:10px;" onclick="window.location.href=\'securitysettings.php?dat=1\'">
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

<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color:#000; border-color:#2d3436;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ender code to disarm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="securitysettings.php" method="POST">
          <input type="number" name="pin" id="pin" class="form-control" placeholder="Pin Code" style="background-color:#000; border-color:#2d3436; color:#dfe6e9;" required/>
      </div>
      <div class="modal-footer">
          <button type="submit" name="submit" id="submit" class="btn btn-primary" style="background-color:#0984e3;">DISARM</button>
          </form>
      </div>
    </div>
  </div>
</div>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>