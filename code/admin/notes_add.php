<?php include 'includes/admin_header.php' ?>
<?php include '../functions.php' ?>
<div class="container">
    <div class="row">
        <div class="col-2 admin-box">

        <?php include 'includes/admin_navigation.php' ?>

        </div>
        <div class="col-7 admin-box">

            <h4>Add a new Note:</h4>
            <form action="meeting_details.php?id=<?php echo $_GET['id'];?>" method="post">
                <div class="form-group">
                    <input type="hidden" name="note-client" value="<?php echo $_GET['client'];?>">
                    <input type="hidden" name="note-therapist" value="<?php echo getTherapist();?>">
                    <input type="hidden" name="note-meeting" value="<?php echo $_GET['id'];?>">
                    <label for="note-content">Note Content:</label>
                    <input type="text" class="form-control" name="note-content">
                    <div class="empty-space"></div>
                    <input type="submit" class="btn-primary" name="add_note" value="Add note">
                </div>
            </form>
        </div>
        <?php include 'includes/admin_sidebar.php'?>
    </div>

</div>

<?php include 'includes/admin_footer.php' ?>