<h4>Add a new Meeting:</h4>
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
        <input type="datetime-local" class="form-control" name="meeting-dateTime">
        <label for="meeting-duration">Duration (in minutes)</label>
        <input type="number" class="form-control" name="meeting-duration">
        <input type="submit" class="btn-primary" name="add_meeting"></input>
    </div>
</form>
