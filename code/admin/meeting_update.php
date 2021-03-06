
<?php if(isset($_GET['update'])) {
    $meeting = getMeetingDetails($_GET['update']);
    $meetingDateTime = $meeting['dateTime'];
    $meetingDuration = $meeting['duration'];

};
?>
<h4>Update Meeting:</h4>
<form action="index.php" method="post">
    <div class="form-group">
        <label for="meeting-client">Client</label>
        <select name="meeting-client" class="form-control" id="meeting-client">
            <?php $clients =  getClientList(getTherapist());
            foreach($clients as $client) {
                ?><option value="<?php echo $client['id']?>">
                <?php echo $client['firstName']." ".$client['lastName']?>
                </option>
            <?php };?>
        </select>
        <input type="hidden" name="meeting-therapist" value="<?php echo getTherapist()?>">
        <label for="meeting-dateTime">Date and time:</label>
        <input type="datetime-local" class="form-control" name="meeting-dateTime" value="<?php echo $meetingDateTime;?>">
        <label for="meeting-duration">Duration (in minutes)</label>
        <input type="number" class="form-control" name="meeting-duration" value="<?php echo $meetingDuration;?>">
        <input type="hidden" class="form-control" name="meeting-id" value="<?php echo $_GET['update'];?>">
        <input type="submit" class="btn-primary" name="update_meeting">
    </div>
</form>