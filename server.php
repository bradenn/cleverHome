<?php
require_once "status.php";
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
            <h1 style="font-family: 'Abel', sans-serif; color:#dfe6e9;"><a href="index.php" style="text-decoration: none; color:#dfe6e9;">Cleverhome:<span style="color:#0984e3;">server</span></a></h1>
            </div><div class="col-lg-3"></div></div><br>
        <div class="row">
        
        <div class="col-lg-6" style="word-wrap: break-word;">
               <span style="color:#0984e3;">cleverhome: </span>
            <?php
            
               foreach ($systemquery as $entry) {
                echo 'v'.$entry["version"].' - '.$entry["status"];
                
            }
            
            ?>
          
            <br>
           <span style="color:#0984e3;">php: </span>
            <?php
            
             $r = system('php -v', $retval);
            
       
            ?>
            <br>
             <span style="color:#0984e3;">mongo: </span>
            <?php
            
           $rs = system('service mongod status', $retvals);
            
            
            ?>   <br>
              <span style="color:#0984e3;">server cpu: </span>%
            <?php
            
           $cpu = system("top -bn1 | grep 'Cpu(s)' | 
           sed 's/.*, *\([0-9.]*\)%* id.*/\1/' | 
           awk '{print 100 - $1}'", $cpudf);
           
            ?><br>
             <span style="color:#0984e3;">server mem: </span>
            <?php
            
           $free = system('free', $freed);
           
            ?><br>
             <span style="color:#0984e3;">server disk: </span>
            <?php
            
           $rss = system('ps aux | grep ftp', $retvalss);
         
            ?>
           
            <br>
            
            <?php
            foreach ($lightsquery as $entry) {
                echo '
             <span style="color:#0984e3; word-wrap: break-word;">'.$entry["name"].': &nbsp;</span>';
                
             $rssdd = system('bash hs100.sh '.$entry["lanAddress"].' 9999 status', $retvalssd);
            
              
            
            }
          
            ?>
             <span style="color:#0984e3;">system dump: </span>
            <?php
            
           $lshw = system('lshw', $lshw);
            
           
            ?><br>
            </div>
            </div></div>
      
      
        
            
            


        </div>
   

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
