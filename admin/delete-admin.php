<?php

    //include constants.php here
    include('../config/constant.php');

    //1. get the id of admin to be deleted
    $id = $_GET['id'];
    
    //2. create sql query to delete 
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //execute the query
    $res = mysqli_query($conn, $sql);

    //check if the query executed successfuly
    if($res == true)
    {
        //successful
        //echo 'successfully deleted';
        //create session variable to display message
        $_SESSION['delete'] = '<div class="success">successfully deleted.</div>';
        //redirect to manage-admin.php
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //failed
        //echo 'failed to delete';
        $_SESSION['delete'] = "<div class='error'>failed to delete.</div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    }

    //3. redirect to manager admin page
?>