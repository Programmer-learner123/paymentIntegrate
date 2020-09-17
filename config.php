<?php 

$dbhost = "sql211.epizy.com";
$dbuser = "epiz_26756170";
$dbpass = "kNMRQfFzvx0Fp";
$dbname = "epiz_26756170_paymentIntegration";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(!$conn){
        die("Could not connect to the Database".mysqli_connect_error());
    }

?>