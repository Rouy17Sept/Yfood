<?php
    //Start Session
    session_start();

  //Create Constants to Store non Repeating Values
  define('SITEURL', 'https://yfood.yjilderda.nl/food-order/');
  define('LOCALHOST', 'yjilde-yjilderdanlyfood4740.db.transip.me');
  define('DB_USERNAME', 'yjilde_yjilderdanl4740');
  define('DB_PASSWORD', 'HErQ4WUeVhfMgFAMgBsfCwQBEASqqbKB');
  define('DB_NAME', 'yjilde_yjilderdanlyfood4740');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting Database


 ?>
