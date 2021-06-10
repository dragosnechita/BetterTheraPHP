 <?php
 $meetings = getMeetings($therapist);
?>
<a href="index.php?meeting=add" class="btn btn-info">Add new meeting</a>
<div class="empty-space"></div>
<?php foreach ($meetings as $meeting) {
    $clientDetails = getClientDetails($meeting['client']);
    $clientName = $clientDetails['firstName'].' '.$clientDetails['lastName'];?>
        <h5>Client: <?php echo $clientName;?></h5>
        <div class="row"><h6>Date & time <?php echo $meeting['dateTime'];?></h6></div>
        <div class="row"><h6><a href="index.php?meeting=details&id=<?php echo $meeting['id'];?>" class="btn btn-info">See Meeting Details</a></h6></div>
    <div class="separator"></div>
<?php } ?>