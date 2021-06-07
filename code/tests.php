<?php include 'functions.php';

// function test
$output = getClientMeetings('1', '1');

foreach ($output as $row) {
    print_r($row);
    echo '</br>';
}
