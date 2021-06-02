<?php include 'includes/admin_header.php' ?>
<?php include '../models.php'?>
<?php
$therapist = '1';

$notes = getTherapistNotes($therapist);?>
    <div class="container">
        <div class="row">
            <div class="col-2 admin-box">

                <?php include 'includes/admin_navigation.php' ?>

            </div>
            <div class="col-7 admin-box">
                <div class="accordion" id="accordionNotes">
                    <?php foreach ($notes as $note) {
                    $clientDetails = getClientDetails($note['client']);
                    $clientName = $clientDetails['firstName'].' '.$clientDetails['lastName'];
                    $meetingDetails = getMeetingDetails($note['meeting']);
                    $meetingNo = $meetingDetails['clientNo'];
                    ?>
                <div class="accordion-item">
                    <h5 class="accordion-header" id="headingNote<?php echo $note['id']?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNote<?php echo $note['id']?>" aria-expanded="false" aria-controls="collapseNote<?php echo $note['id']?>">
                            <div class="col">Note No. <?php echo $note['id']?></div>
                            <div class="col">Client: <?php echo $clientName?></div>
                            <div class="col">Meeting No. <?php echo $meetingNo?></div>
                        </button>
                    </h5>
                <div id="collapseNote<?php echo $note['id']?>" class="accordion-collapse collapse" aria-labelledby="headingNote<?php echo $note['id']?>" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p><?php echo $note['content'];?></p>
                </div>
                </div>
                </div>
                    <?php } ?>
                </div>


<!--                    <div class="row">-->
<!--                        <div class="col-7"><h5>Client: --><?php //echo $clientName;?><!--</h5></div>-->
<!--                        <div class="col-4"><h5>Meeting No. --><?php //echo $meetingNo;?><!--</h5></div>-->
<!--                    </div>-->
<!--                        <div class="container">--><?php //echo $note['content'];?><!--</div>-->

            </div>
            <?php include 'includes/admin_sidebar.php'?>
        </div>

    </div>

<?php include 'includes/admin_footer.php' ?>