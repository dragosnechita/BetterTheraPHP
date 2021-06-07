<?php include 'includes/admin_header.php';?>
<?php //include 'includes/admin_sidebar.php';?>
<?php include '../functions.php' ?>

<?php

if(isset($_GET['submit'])) {

    $search = $_GET['search'];

    $query = searchNotes($search, '1');

};

?>

<div class="container">
    <div class="row">
        <div class="col-2 admin-box">

            <?php include 'includes/admin_navigation.php' ?>

        </div>
        <div class="col-7 admin-box">
        <?php if (empty($query)) {?>
            <h4>We're sorry, your search for "<?php echo $search;?>" has 0 results</h4>
        <?php } else {?>
            <div class="row"><h2>Your notes containing "<?php echo $search;?>":</h2></div>
                    <?php foreach ($query as $note) {
                        $clientDetails = getClientDetails($note['client']);
                        $clientName = $clientDetails['firstName'].' '.$clientDetails['lastName'];
                        $meetingDetails = getMeetingDetails($note['meeting']);
                        $meetingNo = $meetingDetails['clientNo'];
                        ?>
                        <div class="row">
                            <div class="col-7"><h5>Client: <?php echo $clientName;?></h5></div>
                            <div class="col-4"><h5>Meeting No. <?php echo $meetingNo;?></h5></div>
                        </div>
                        <div class="container"><?php echo $note['content'];?></div>
                        <div class="row separator"></div>
                    <?php } }?>
        </div>
            <?php include 'includes/admin_sidebar.php';?>
    </div>

</div>

<?php include 'includes/admin_footer.php' ?>