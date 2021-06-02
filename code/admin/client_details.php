<?php include 'includes/admin_header.php' ?>
<?php include '../models.php'?>
<?php

$client = $_GET['id'];
$therapist = getTherapist();


$clientDetails = getClientDetails($client, $therapist);
$clientId = $clientDetails['id'];

$clientMeetings = getClientMeetings($client, $therapist);?>
<div class="container">
    <div class="row">
        <div class="col-2 admin-box">

            <?php include 'includes/admin_navigation.php' ?>

        </div>

        <div class="col-7 admin-box">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Last Seen</th>
                </tr>
                </thead>
                <tr>
                    <td><?php echo $clientDetails['firstName'] ?></td>
                    <td><?php echo $clientDetails['lastName'] ?></td>
                    <td><?php echo $clientDetails['phone'] ?></td>
                    <td><?php echo $clientDetails['email'] ?></td>
                    <td><?php echo $clientDetails['lastSeen'] ?></td>
                </tr>
            </table>
            <div class="row">
                <div class="col"><a href="client_update.php?update=<?php echo $clientId;?>" class="btn btn-info">Update Client Data</a></div>
                <div class="col"><a href="clients.php?delete=<?php echo $clientId;?>" class="btn btn-danger">Delete Client</a></div>
            </div>
            <div class="empty-space"></div>
            <h4>Client Meetings</h4>
            <?php foreach ($clientMeetings as $meeting) { ?>
                <div class="row"><h5>Meeting No. <?php echo $meeting['clientNo'];?></h5></div>
                <div class="row"><h6>Date & time <?php echo $meeting['dateTime'];?></h6></div>
                <div class="row"><h6><a href="meeting_details.php?id=<?php echo $meeting['id'];?>" class="btn btn-info">See Meeting Details</a></h6></div>
                <div class="separator"></div>
            <?php } ?>
        </div>
            <?php include 'includes/admin_sidebar.php';?>
    </div>


</div>

<?php include 'includes/admin_footer.php' ?>





