<?php
    //Start Session
    session_start();

  //Create Constants to Store non Repeating Values
  define('SITEURL', 'https://yfood.yjilderda.nl/food-order/');
  define('LOCALHOST', 'localhost');
  define('DB_USERNAME', 'yjilderda_nl_yfood');
  define('DB_PASSWORD', 'jWK3oiEmhFCL');
  define('DB_NAME', 'yjilderda_nl_yfood');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting Database


 ?>
