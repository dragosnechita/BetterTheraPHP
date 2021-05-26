<?php include 'includes/admin_header.php' ?>
<?php include '../models.php'?>
<div class="container">
    <div class="row">
        <div class="col-2 admin-navbar">

        <?php include 'includes/admin_navigation.php' ?>

        </div>
        <div class="col-8">
            <?php include 'views/client_list.php'?>
        </div>
        <div class="col-2">
            Admin sidebar goes here
        </div>
    </div>

</div>

<?php include 'includes/admin_footer.php' ?>