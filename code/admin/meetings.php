<?php include 'includes/admin_header.php' ?>
<?php include '../models.php'?>
<?php

$therapist = getTherapist();

if(isset($_POST['add_meeting'])) {
    addMeeting($_POST['meeting-client'],
                $_POST['meeting-therapist'],
                getClientNo($therapist, $_POST['meeting-client']),
                $_POST['meeting-dateTime'],
                $_POST['meeting-duration']);
    $meetingAdd = "Meeting ".$_POST['meeting-id']." added.";
};

if(isset($_POST['update_meeting'])){
    updateMeeting($_POST['meeting-id'],
                  $_POST['meeting-client'],
                    $_POST['meeting-dateTime'],
                    $_POST['meeting-duration']);
    $meetingUpdate = "Meeting " . $_POST['meeting-id'] . " updated.";
}

if (isset($_GET['delete'])) {
    deleteMeeting($_GET['delete']);
    $meetingDelete = "Meeting " . $_GET['delete'] . " deleted.";
};

$meetings = getMeetings($therapist);
?>


    <div class="container">
        <div class="row">
            <div class="col-2 admin-box">

                <?php include 'includes/admin_navigation.php' ?>

            </div>
            <div class="col-6 admin-box">
                <?php
                if(isset($meetingAdd)) {
                    echo $meetingAdd;
                } elseif (isset($meetingUpdate)) {
                    echo $meetingUpdate;
                }   elseif (isset($meetingDelete)) {
                    echo $meetingDelete;
                }
                ?>
                <a href="meeting_add.php" class="btn btn-info">Add new meeting</a>
                <div class="empty-space"></div>
                <?php foreach ($meetings as $meeting) {
                    $clientDetails = getClientDetails($meeting['client']);
                    $clientName = $clientDetails['firstName'].' '.$clientDetails['lastName'];?>
                        <h5>Client: <?php echo $clientName;?></h5>
                        <div class="row"><h6>Date & time <?php echo $meeting['dateTime'];?></h6></div>
                        <div class="row"><h6><a href="meeting_details.php?id=<?php echo $meeting['id'];?>" class="btn btn-info">See Meeting Details</a></h6></div>
                    <div class="separator"></div>
                <?php } ?>
            </div>
            <?php include 'includes/admin_sidebar.php'?>
        </div>

    </div>

<?php include 'includes/admin_footer.php' ?>