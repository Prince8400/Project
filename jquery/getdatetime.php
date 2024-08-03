<?php
       // header("Access-Control-Allow-Origin: *"); // Allow access from any origin
        //header("Access-Control-Allow-Methods: GET, POST"); // Allow specific HTTP methods
        //header("Access-Control-Allow-Headers: Content-Type");
        date_default_timezone_set("asia/kolkata");
        $currentdatetime= date("h:i:s D d-m-Y");
        echo $currentdatetime;
?>