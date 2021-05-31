<?php include 'includes/admin_header.php' ?>
<?php include '../models.php'?>
<div class="container">
    <div class="row">
        <div class="col-2 admin-box">

        <?php include 'includes/admin_navigation.php' ?>

        </div>
        <div class="col-7 admin-box">

            <h4>Update Client</h4>

        <?php
        if (isset($_GET['update'])) {
                    $client = getClientDetails($_GET['update']);
                    $fName = $client['firstName'];
                    $lName = $client['lastName'];
                    $phone = $client['phone'];
                    $email = $client['email'];
                    $password = $client['password'];
            }?>
            <form action="clients.php" method="post">
                <div class="form-group">
                    <label for="client-fname">First Name</label>
                    <input type="text" class="form-control" name="client-fname" value="<?php echo $fName;?>">
                    <label for="client-lname">Last Name</label>
                    <input type="text" class="form-control" name="client-lname" value="<?php echo $lName;?>">
                    <label for="client-phone">Telephone</label>
                    <input type="text" class="form-control" name="client-phone" value="<?php echo $phone;?>">
                    <label for="client-email">Email</label>
                    <input type="email" class="form-control" name="client-email" value="<?php echo $email;?>">
                    <label for="client-email">Password</label>
                    <input type="text" class="form-control" name="client-password" value="<?php echo $password;?>">
                    <input type="hidden" class="form-control" name="client-id" value="<?php echo $_GET['update'];?>">
                    <input type="submit" class="btn-primary" name="update" value="update">
                </div>



            </form>
        </div>
        <?php include 'includes/admin_sidebar.php'?>
    </div>

</div>

<?php include 'includes/admin_footer.php' ?>