<?php include 'includes/admin_header.php' ?>
<?php include '../models.php'?>
<?php

$meetingId = $_GET['id'];
$therapist = '1';


$meetingDetails = getMeetingDetails($meetingId);
$meetingId = $meetingDetails['id'];
$clientDetails = getClientDetails($meetingDetails['client']);

$meetingNotes = getMeetingNotes($meetingId);?>
<div class="container">
    <div class="row">
        <div class="col-2 admin-box">

            <?php include 'includes/admin_navigation.php' ?>

        </div>

        <div class="col-7 admin-box">
                <div class="row">
                    <h5>Meeting with <?php echo $clientDetails['firstName']." ".$clientDetails['lastName']?></h5>
                </div>
                <div class="row">
                    <div class="col">
                        <h6>Meeting No. <?php echo $meetingDetails['clientNo']." with the client"?></h6>
                    </div>
                    <div class="col">
                        <h6>Date & time:</h6>
                        <p><?php echo $meetingDetails['dateTime']?></p>
                    </div>
                    <div class="col">
                        <h6>Duration:</h6>
                        <p><?php echo $meetingDetails['duration']." minutes"?></p>
                    </div>
                </div>
                <div class="row">
                    <H4>Meeting Notes:</H4>
                <?php
                foreach($meetingNotes as $meetingNote) {
                    ?><div class="accordion" id="accordionNotes">
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingNote<?php echo $meetingNote['id']?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNote<?php echo $meetingNote['id']?>" aria-expanded="false" aria-controls="collapseNote<?php echo $meetingNote['id']?>">
                                    Note No. <?php echo $meetingNote['id']?>
                                </button>
                            </h4>
                            <div id="collapseNote<?php echo $meetingNote['id']?>" class="accordion-collapse collapse" aria-labelledby="headingNote<?php echo $meetingNote['id']?>" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p><?php echo $meetingNote['content'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php }
                ?>
                </div>
            <div class="empty-space"></div>
            <div class="row">
                <div class="col"><a href="meeting_update.php?update=<?php echo $meetingId;?>" class="btn btn-info">Update Meeting Data</a></div>
                <div class="col"><a href="meetings.php?delete=<?php echo $meetingId;?>" class="btn btn-danger">Delete Meeting</a></div>
            </div>
        </div>
            <?php include 'includes/admin_sidebar.php';?>
    </div>


</div>

<?php include 'includes/admin_footer.php' ?>





