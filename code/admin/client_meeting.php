<?php include 'includes/admin_header.php' ?>
<?php include '../functions.php' ?>
<?php
$client = $_GET['id'];
$therapist = getTherapist();

$meetings = getClientMeetings($client, $therapist);?>
<div class="container">
    <div class="row">
        <div class="col-2 admin-box">

            <?php include 'includes/admin_navigation.php' ?>

        </div>
        <div class="col-7 admin-box">
            <?php foreach ($meetings as $meeting) { ?>
                <div class="row"><h4>Meeting No. <?php echo $meeting['clientNo'];?></h4></div>
                <div class="row"><h5>Date & time <?php echo $meeting['dateTime'];?></h5></div>
                <div class="row"><h5>Duration <?php echo $meeting['duration'];?> minutes.</h5></div>
                <div class="container separator"></div>
            <?php } ?>
        </div>
            <?php include 'includes/admin_sidebar.php';?>
    </div>


</div>

<?php include 'includes/admin_footer.php' ?>





