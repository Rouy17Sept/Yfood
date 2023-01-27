<?php include('partials/menu.php'); ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Admin</h1>

    <br> <br>

    <?php
    if (isset($_SESSION['add']))
    {
      echo $_SESSION['add'];   //DISPLAYING SESSION MESSAGE
      unset($_SESSION['add']); // REMOVING SESSION MESSAGE
    }
     ?>

    <form action="" method="POST">

      <table class="tbl-30">
        <tr>
          <td>Full Name: </td>
          <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
        </tr>

        <tr>
          <td>Username: </td>
          <td>
            <input type="text" name="username" placeholder="Your Username">
          </td>
        </tr>

        <tr>
          <td>Password: </td>
          <td>
            <input type="password" name="password" placeholder="Your Password">
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
          </td>
        </tr>
      </table>

    </form>
  </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
  //Process the Value from Form and Save it in Database

  //Check whether the submit button is clicked or not

  if (isset($_POST['submit'])) {
    //echo "Button Clicked";
    // Button Clicked

    //1. Get the Date from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //Password Encryption with MD5

    //2. SQL Query to Save the data into database
    $sql = "INSERT INTO tbl_admin SET
      full_name='$full_name',
      username='$username',
      password='$password'
    ";

  //3. Execute Query and Save Data in database

    $res = mysqli_query($conn, $sql)
    or die("ERROR".mysqli_error($conn));
    /*
    var_dump($res);
    echo "\n\n";
    var_dump($sql);
    */

    //4. Check whether the (Query is executed) date is inserted or not and display appropiate Message
    if ($res==TRUE)
    {
      // Data Inserted
      //echo "Data Inserted";
      //Create a Session Variable to Display Message
      $_SESSION['add'] = "<div class='success'>Admin Added Succesfully.</div>";
      //Redirect Page to Manage Admin
      header("location:".SITEURL.'admin/manage-admin.php');
    }
    else
    {
      // Failed to Insert Data
      //echo "Failed to insert Data";
      //Create a Session Variable to Display Message
      $_SESSION['add'] = "Failed to Add Admin";
      //Redirect Page to Add Admin
      header("location:".SITEURL.'admin/add-admin.php');
    }
    
  }
 ?>
