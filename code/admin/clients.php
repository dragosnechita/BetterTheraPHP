<?php include 'includes/admin_header.php' ?>
<?php include '../models.php'?>
<div class="container">
    <div class="row">
        <div class="col-2 admin-box">

            <?php include 'includes/admin_navigation.php' ?>

        </div>
        <div class="col-7 admin-box">
            <?php if(isset($_GET['delete'])) {
                deleteClient($_GET['delete']);
                echo "Client ".$_GET['delete']." deleted.";
            };

            ?>
            <?php if(isset($_POST['add'])) {

                addClient($_POST['client-fname'],
                    $_POST['client-lname'],
                    $_POST['client-phone'],
                    $_POST['client-email'],
                    'default',
                    '1');
                echo 'New client added';
            };

            if (isset($_POST['update'])) {
                updateClient(
                    $_POST['client-fname'],
                    $_POST['client-lname'],
                    $_POST['client-phone'],
                    $_POST['client-email'],
                    $_POST['client-password'],
                    $_POST['client-id']
                );
            };


            ?>
            <div class="row"><h2>Your clients:</h2></div>
            <?php $clients = getClientList('1');?>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>

                <?php foreach ($clients as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['firstName'];?></td>
                        <td><?php echo $row['lastName'];?></td>
                        <td><?php echo $row['phone'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php $id = $row['id'];?><a href='client_details.php?id=<?php echo $id;?>' class="btn btn-info">Details</a></td>
                    </tr>
                <?php } ?>
                </thead>
            </table>
            <a href='client_add.php?' class="btn btn-primary">Add Client</a>
        </div>
        <?php include 'includes/admin_sidebar.php'?>
    </div>

</div>

<?php include 'includes/admin_footer.php' ?>





