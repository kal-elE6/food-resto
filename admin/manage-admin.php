<?php include('../admin/partials/menu.php') ?>
    <!-- main content -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
    <br><br>
    <?php 
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add']; // display session message
            unset($_SESSION['add']); //removing session message
        }

        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if(isset($_SESSION['user-not-found']))
        {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }

        if(isset($_SESSION['pw-not-matched']))
        {
            echo $_SESSION['pw-not-matched'];
            unset($_SESSION['pw-not-matched']);
        }

        if(isset($_SESSION['change-pw']))
        {
            echo $_SESSION['change-pw'];
            unset($_SESSION['change-pw']);
        }
    ?>
    <br><br>
            <!-- btn to add admin -->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
    <br><br><br>
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php 
                    //query to get all admin
                    $sql =  "SELECT * FROM tbl_admin";
                    //execute query
                    $res = mysqli_query($conn, $sql);
                    
                    if($res == TRUE)
                    {
                        //count rows to check if we have data or not in DB
                        $count = mysqli_num_rows($res); //Function to get all the rows in DB

                        $sn=1; //create a variable
                        //Check the number of row
                        if($count>0)
                        {
                            //we have data in DB
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //using while loop to get all the data in DB
                                //and while loop will run as long as we have data in DB

                                //Get individual data
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                //Display the values in Table
                                ?>
                                <tr>
                                    <td>0000-<?php echo $sn++ ?></td>
                                    <td><?php echo $full_name ?></td>
                                    <td><?php echo $username ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete</a>
                                        
                                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            //we do not have data in DB
                        }
                    }
                ?>
            </table>

        </div>
    </div>
<?php include('../admin/partials/footer.php') ?>