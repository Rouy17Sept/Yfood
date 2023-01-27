<?php
  //include constants.php for SITEURL
  include('../config/constants.php');

  //1. Destroy the session and redirect to login page
  session_destroy(); //Unsets $_SESSION['user']
  //2. Redirect to login page
  header('location:'.SITEURL.'admin/login.php');
 ?>
