<?php include 'models.php';


function outputTableRow ($data) {
    foreach ($data as $item) {
    ?> <tr><td> <?php print($item)?></td><?php;
    }
}

$data = getClientList('1');

foreach ($data as $row) {
    outputTableRow($row);
}