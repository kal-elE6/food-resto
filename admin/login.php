<?php
    include('../config/constant.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food Order System</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
<br>
        <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>

        <?php 
            if(isset($_SESSION['not-login']))
            {
                echo $_SESSION['not-login'];
                unset($_SESSION['not-login']);
            }
        ?>

        <br><br>
        <!-- login -->
        <form action="" method="post" class="text-center"> 
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username">
            <br><br>
            Password: <br>
            <input type="password" name="password" id="" placeholder="Enter Password">
            <br><br>
            <input type="submit" value="Login" name="submit" class="btn-primary">
        </form>
        
    </div>
</body>
</html>

<?php 

    //check if btn is clicked
    if(isset($_POST['submit']))
    {
        //success
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //check db if user exist
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //execute
        $res = mysqli_query($conn, $sql);

        //count rows to check if user exist or not
        $count = mysqli_num_rows($res);

        if($count == 1)
        {
            //available
            $_SESSION['login'] = "<div class='success'>Login successful</div>";
            $_SESSION['user'] = $username; //to check user is logged in or not
            header('location:'.SITEURL.'admin/index.php');

        }
        else
        {
            //not available
            $_SESSION['login'] = "<div class='error'>Username or Password did not match</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }
    

?>