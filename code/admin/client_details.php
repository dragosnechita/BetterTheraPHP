<?php

$client = $_GET['id'];
$therapist = getTherapist();


$clientDetails = getClientDetails($client, $therapist);
$clientId = $clientDetails['id'];

$clientMeetings = getClientMeetings($client, $therapist);?>

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
    <div class="col"><a href="index.php?client=update&update=<?php echo $clientId;?>" class="btn btn-info">Update Client Data</a></div>
    <div class="col"><a href="index.php?client=delete&delete=<?php echo $clientId;?>" class="btn btn-danger">Delete Client</a></div>
</div>
<div class="empty-space"></div>
<h4>Client Meetings</h4>
<?php foreach ($clientMeetings as $meeting) { ?>
    <div class="row"><h5>Meeting No. <?php echo $meeting['clientNo'];?></h5></div>
    <div class="row"><h6>Date & time <?php echo $meeting['dateTime'];?></h6></div>
    <div class="row"><h6><a href="index.php?meeting=details&id=<?php echo $meeting['id'];?>" class="btn btn-info">See Meeting Details</a></h6></div>
    <div class="separator"></div>
<?php } ?>
<a href="index.php?meeting=add" class="btn btn-info">Add new meeting</a>
<div class="empty-space"></div>





