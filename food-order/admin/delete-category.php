<?php
    //Include constants file
    include('../config/constants.php');
    //echo "Delete Page";
    // Check whether the id and image_name value is set or not
    if (isset($_GET['id']) AND isset($_GET['image_name']))
    {
      // Get the value and delete
      //echo "Get Value and delete";
      $id = $_GET['id'];
      $image_name = $_GET['image_name'];

      //Remove the physical image file if available
      if ($image_name != "")
      {
        //Image is available. So remove it.
        $path = "../images/category/".$image_name;
        //Remove the image
        $remove = unlink($path);

        //If failed to remove image then add an error message and stop the process
        if ($remove==false)
        {
            //Set the session message
            $_SESSION['remove'] = "<div class='error'>Failed to remove Category Image.</div>";
            //Redirect to manage category page
            header('location:'.SITEURL.'admin/manage-category.php');
            //Stop the process
            die();
        }

      }

      //Delete data from database
      //SQL query to delete data from database
      $sql = "DELETE FROM tbl_category WHERE id=$id";

      //Execute the Query
      $res = mysqli_query($conn, $sql);

      //Check whether the data is deleted from database or not
      if ($res==true)
      {
        //Set succes message and redirect
        $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully..</div>";
        //Redirect t manage category
        header('location:'.SITEURL.'admin/manage-category.php');
      }
      else
      {
        //Set fail message and redirect
        //Set succes message and redirect
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Category</div>";
        //Redirect t manage category
        header('location:'.SITEURL.'admin/manage-category.php');
      }



    }
    else
    {
      //Redirect to manage category page
      header('location:'.SITEURL.'admin/manage-category.php');
    }

 ?>
