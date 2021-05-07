<?php
    //include constant.php
    include('../config/constant.php');
    //delete all session
    session_destroy();
    //redirect to login
    header('location:'.SITEURL.'admin/login.php');
?>