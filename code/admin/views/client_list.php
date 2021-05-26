<?php include '../../models.php';?>

<?php $clients = getClientList('2');?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
        <th scope="col">Created at</th>
        <th scope="col">Last seen</th>
    </tr>

    <?php
    foreach ($clients as $client) {
        ?> <tr><td> <?php print($client['id'])?></td><?php
        ?> <td> <?php print($client['firstName'])?></td><?php
        ?> <td> <?php print($client['lastName'])?></td><?php
        ?> <td> <?php print($client['phone'])?></td><?php
        ?> <td> <?php print($client['email'])?></td><?php
        ?> <td> <?php print($client['createdAt'])?></td><?php
        ?> <td> <?php print($client['lastSeen'])?></td></tr><?php
    }
    ?>

    </thead>

</table>
