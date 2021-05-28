<?php include 'includes/admin_header.php';?>
<?php //include 'includes/admin_sidebar.php';?>
<?php include '../models.php'?>

<?php

if(isset($_GET['submit'])) {

    $search = $_GET['search'];

    $query = searchClients($search, '1');

};

?>

<div class="container">
    <div class="row">
        <div class="col-2 admin-box">

            <?php include 'includes/admin_navigation.php' ?>

        </div>
        <div class="col-7 admin-box">
            <div class="row"><h2>Your clients:</h2></div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>

                <?php foreach ($query as $row) {
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
            <?php include 'includes/admin_sidebar.php';?>
    </div>

</div>

<?php include 'includes/admin_footer.php' ?>





