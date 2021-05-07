<?php include('../admin/partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
            }
        ?>

        <form action="" method="post">

            <table class="tbl-30">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" id="" placeholder="Type Current password">
                    </td>
                </tr>

                <tr>
                    <td>New Password: </td>
                    <td>
                        <input type="password" name="new_password" id="" placeholder="Type New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" id="" placeholder="Confirm your password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" value="Change Password" name="submit" class="btn-secondary">
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
        //echo 'clicekd';

        //get data from form
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        //check current id and current pw is exist or not
        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

        //execute the query
        $res = mysqli_query($conn, $sql);
        if($res == true)
        {
            //check if data is available or not
            $count=mysqli_num_rows($res);

            if($count == 1)
            {
                //user exist
                //echo 'user found';
                //check new pw and confirm pw matched
                if($new_password == $confirm_password)
                {
                    //update pw
                    //echo 'password matched';
                    $sql2 = "UPDATE tbl_admin SET
                        password='$new_password'
                        WHERE id=$id
                    ";

                    //execute
                    $res2 = mysqli_query($conn, $sql2);

                    //check query executed or not
                    if($res2==true)
                    {
                        //success
                        $_SESSION['change-pw'] = '<div class="success">Successfully updated.</div>';
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                    else
                    {
                        //failed
                        $_SESSION['change-pw'] = '<div class="error">Failed to update password.</div>';
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
                else
                {
                    //redirect to manage admin page
                    $_SESSION['pw-not-matched'] = '<div class="error">Password did not match.</div>';
                header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            else
            {
                //user does not exist
                $_SESSION['user-not-found'] = '<div class="error">User not found.</div>';
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
        //check new pw and confirm pw is matched
       
        //change pw if all above is true
    }
?>

<?php include('../admin/partials/footer.php') ?>