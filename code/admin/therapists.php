<?php include 'includes/admin_header.php' ?>
<?php include '../functions.php' ?>
<div class="container">
    <div class="row">
        <div class="col-2 admin-box">

            <?php include 'includes/admin_navigation.php' ?>

        </div>
        <div class="col-7 admin-box">
            <?php if(isset($_GET['delete'])) {
                deleteClient($_GET['delete']);
                echo "Therapist ".$_GET['delete']." deleted.";
            };

            if(isset($_POST['add'])) {

                addClient($_POST['therapist-fname'],
                    $_POST['therapistt-lname'],
                    $_POST['therapist-phone'],
                    $_POST['therapist-email'],
                    'default',
                    '1');
                echo 'New therapist added';
            };

            if (isset($_POST['update'])) {
                updateClient(
                    $_POST['therapist-fname'],
                    $_POST['therapist-lname'],
                    $_POST['therapist-phone'],
                    $_POST['therapist-email'],
                    $_POST['therapist-password'],
                    $_POST['therapist-id']
                );
            };


            ?>
            <div class="row"><h2>Therapists:</h2></div>
            <?php $therapists = getTherapistList('1');?>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>

                <?php foreach ($therapists as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['firstName'];?></td>
                        <td><?php echo $row['lastName'];?></td>
                        <td><?php echo $row['phone'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php $id = $row['id'];?><a href='therapist_details.php?id=<?php echo $id;?>' class="btn btn-info">Details</a></td>
                    </tr>
                <?php } ?>
                </thead>
            </table>
            <a href='therapist_add.php?' class="btn btn-primary">Add Therapist</a>
        </div>
        <?php include 'includes/admin_sidebar.php'?>
    </div>

</div>

<?php include 'includes/admin_footer.php' ?>





