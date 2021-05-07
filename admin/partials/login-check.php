<?php
    //check if user is logged in
    if(!isset($_SESSION['user']))
    {
        //user is not logged in
        $_SESSION['not-login'] = "<div class='error text-center'>Please log in to access admin page</div>";

        //redirect to login page
        header('location:'.SITEURL.'admin/login.php');
    }
?>