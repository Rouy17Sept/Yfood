<?php
    //Include constants page
    include('../config/constants.php');
    //echo "deletefoodpage";
    
    if (isset($_GET['id']) && isset($_GET)) //Either use '&&' or 'AND'
    {
        //Process to delete
        //echo "Process to Delete";

        //1. Get ID and imagename
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //2. Remove image if available
        //check whether the image is available or not and delete if available
        if ($image_name != "") 
        {
            //It has image and need to remove from folder
            //Get the image path
            $path = "../images/food/".$image_name;

            //Remove image file from folder
            $remove = unlink($path);

            //Check whether the image is removed or not
            if($remove==false)
            {
                //Failed to remove image
                $_SESSION['upload'] = "<div class='error'>Failed to remove image file.</div>";
                //Redirect to manage food
                header('location:'.SITEURL.'admin/manage-food.php');
                //Stop the proces of deleting food
                die();
            }
            else {
                
            }
        }

        //3. Delete food from database

        $sql = "DELETE FROM tbl_food WHERE id=$id";
        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed or not and set the session message respectively
                //4. Rediret to manage food with session message 
        if($res==true)
        {
            //Food deleted
            $_SESSION['delete'] = "<div class='success'>Food deleted successfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else 
        {
            //Failed to delete food
            $_SESSION['delete'] = "<div class='error'>Failed to delete food..</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }

    }
    else
    {
        //Redirect to manage food page
        //echo "Redirect ";
        $_SESSION['delete'] = "<div class='error'>Unauthorised access.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>
