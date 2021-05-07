<?php include('../admin/partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <?php 
            //get id of the selected
            $id = $_GET['id'];

            //create sql to update
            $sql = "SELECT * FROM tbl_admin WHERE $id=id";

            //execute the query
            $res = mysqli_query($conn, $sql);

            //check if executed
            if($res == true)
            {
                //available
                $count = mysqli_num_rows($res);
                //check whether we have admin data or not
                if($count==1)
                {
                    //get details
                    //echo 'available';
                    $row = mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else
                {
                    //redirect to manage-admin.php
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
            }
            else
            {
                //not available
            }

        ?> 
        
        <form action="" method="post">
            
            <table class="tbl-30">
                <tr>
                    <td>Fullname: </td>
                    <td>
                        <input type="text" name="full_name" id="" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" id="" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" id="" value="<?php echo $id; ?>">
                        <input type="submit" value="update Admin" name="submit" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php
    //check if btn is clicked
    if(isset($_POST['submit']))
    {
       // echo 'Success';
       // get all the values from form
       $id = $_POST['id'];
       $full_name = $_POST['full_name'];
       $username = $_POST['username'];

       //create sql to update
       $sql = "UPDATE tbl_admin SET
            full_name = '$full_name',
            username = '$username'
            WHERE id = '$id'
       ";

       //execute the query
       $res = mysqli_query($conn, $sql);

       //check if query is executed
       if($res == true)
       {
           //updated!
           $_SESSION['update'] = "<div class='success'>Admin updated successful</div>";
           header('location:'.SITEURL.'admin/manage-admin.php');
        }
       else
       {
           //failed
           $_SESSION['update'] = "<div class='error'>Admin updated failed</div>";
           header('location:'.SITEURL.'admin/manage-admin.php');
       }
    }
?>

<?php include('../admin/partials/footer.php') ?>