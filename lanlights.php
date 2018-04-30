<?php

     $result = exec('bash hs100.sh '.$_GET["address"].' 9999 '.$_GET["dat"]);
    header("Location: lights.php");


?>