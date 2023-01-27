<?php

    //include constants.php file here
    include('../config/constants.php');

  // 1. get the ID of Admin to be deleted
  $id = $_GET['id'];
  //2. Create SQL Query to delete admin
  $sql = "DELETE FROM tbl_admin WHERE id=$id";

  //Execute the query
  $res = mysqli_query($conn, $sql);

  // Check whether the query is executed succesfully or not
  if ($res==TRUE)
  {
    // Querey executed succesfully en admin deleted
    //echo "Admin Deleted";
    //Create section variable to display message
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Succesfully.</div>";
    //Redirect to Admin Page
    header('location:'.SITEURL.'admin/manage-admin.php');
  }
  else {
    //Failed to delete Admin
    //echo "Failed to delete admin";

    $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
  }

  //3. Redirect to manage admin page with message (succes or error)


 ?>
