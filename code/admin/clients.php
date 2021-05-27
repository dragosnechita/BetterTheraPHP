<?php include 'includes/admin_header.php' ?>
<?php include '../models.php'?>
<div class="container">
    <div class="row">
        <div class="col-2 admin-box">

            <?php include 'includes/admin_navigation.php' ?>

        </div>
        <div class="col-7 admin-box">
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
                        <td><?php $id = $row['id'];?><a href='client_meeting.php?id=<?php echo $id;?>' class="btn btn-info">Meetings</a></td>
                    </tr>
                <?php } ?>
                </thead>
            </table>
        </div>
        <div class="col-2 admin-box">
            Admin sidebar goes here
        </div>
    </div>

</div>

<?php include 'includes/admin_footer.php' ?>




