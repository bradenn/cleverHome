<?php
//This class is responsible for displaying info about cleverHome.
//Info is found the the mongo database

//Load collections

//Load DB credentials
require "mongo.php";
//connect to 'toggles' database in mongodb
$switches = $client->cleverHome->toggles;
//specify query with array
$switchQuery = $switches->find( [ 'type' => 'lightswitch' ] );
//include stype
include "header.php";

?>

<body>

  <!-- Navigation -->

  <!-- Page Content -->
  <div class="container">
      <div class="row">

      <div class="col-lg-12">
          <h1><a href="index.php" style="text-decoration: none; color:#dfe6e9;">Cleverhome:<span style="color:#0984e3;">Hub</span></a></h1>
      </div>
  </div>

<br>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">db UUID</th>
      <th scope="col">Switch</th>
      <th scope="col">Device</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>

  <?php
          foreach ($switchQuery as $entry) {

            $toggle = '<span class="badge badge-danger">Off</span>';

            if($entry["toggle"] == 1) $toggle = '<span class="badge badge-danger">Off</span>';

            echo '<div class="row">';
            echo '<tr class="table-active">';
            echo '<th scope="row">'.$entry["_id"].'</th>';
            echo  '<td>'.$entry["inputName"].':'.$entry["inputId"].'</td>';
            echo  '<td>'.$entry["deviceName"].':'.$entry["deviceId"].'</td>';
            echo  '<td>'.$toggle.'</td>';
            echo '</tr>';

          }
      ?>

    </tbody>
  </table>
   </li>
    <div class="col-lg-6">


</div>


      </div>






  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
