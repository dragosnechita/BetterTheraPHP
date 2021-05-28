<?php include 'includes/admin_header.php' ?>
<?php include '../models.php'?>
<?php

$therapist = '1';

$meetings = getMeetings($therapist);?>
    <div class="container">
        <div class="row">
            <div class="col-2 admin-box">

                <?php include 'includes/admin_navigation.php' ?>

            </div>
            <div class="col-6 admin-box">
                <?php foreach ($meetings as $meeting) {
                    $clientDetails = getClientDetails($meeting['client']);
                    $clientName = $clientDetails['firstName'].' '.$clientDetails['lastName'];?>
                    <div class="row"><h4>Meeting No. <?php echo $meeting['clientNo'];?> with <?php echo $clientName;?></h4></div>
                    <div class="row"><h5>Date & time: <?php echo $meeting['dateTime'];?></h5></div>
                    <div class="row"><h5>Duration: <?php echo $meeting['duration'];?> minutes.</h5></div>
                    <div class="separator"></div>
                <?php } ?>
            </div>
            <?php include 'includes/admin_sidebar.php'?>
        </div>

    </div>

<?php include 'includes/admin_footer.php' ?>