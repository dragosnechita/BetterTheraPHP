<?php include 'includes/admin_header.php' ?>
<?php include '../functions.php' ?>
<div class="container">
    <div class="row">
        <div class="col-2 admin-box">

        <?php include 'includes/admin_navigation.php' ?>

        </div>
        <div class="col-7 admin-box">

            <h4>Add a new Client:</h4>
            <form action="clients.php" method="post">
                <div class="form-group">
                    <label for="client-fname">First Name</label>
                    <input type="text" class="form-control" name="client-fname">
                    <label for="client-lname">Last Name</label>
                    <input type="text" class="form-control" name="client-lname">
                    <label for="client-phone">Telephone</label>
                    <input type="text" class="form-control" name="client-phone">
                    <label for="client-email">Email</label>
                    <input type="email" class="form-control" name="client-email">
                    <input type="submit" class="btn-primary" name="add"></input>
                </div>



            </form>
        </div>
        <?php include 'includes/admin_sidebar.php'?>
    </div>

</div>

<?php include 'includes/admin_footer.php' ?>