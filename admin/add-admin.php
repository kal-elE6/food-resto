<?php include('../admin/partials/menu.php') ?>


<div class="main-content">
    <div class="wrapper">
        <h1>+ Admin Form</h1>
      <br><br>
      <?php 
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add']; // display session message
            unset($_SESSION['add']); //removing session message
        }
    ?>
<br><br>
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Username"></td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td><input type"password" name="password" placeholder="Password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" id="" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php include('../admin/partials/footer.php') ?>

<?php
    //Process the value from form and save it in DB

    //Check whether the button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button clicked
        //echo " Button Clicked";

        // Get data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with md5

        //SQL query to save the data into DB
        $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password'
        ";

      
        //Executing query and saving data in DB
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
        
        // Check wither the data is inserted or not
        if($res == true)
        {
            // data inserted
            //echo 'Data Successfuly inserted';
            $_SESSION['add'] = 'admin added successfully';
            //redirect page manage-admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            // failed
            //echo 'Data Failed to inserted';
            $_SESSION['add'] = 'Failed to add Admin';
            //redirect page manage-admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }

?>