<div class="row"><h2>Your clients:</h2></div>
<?php $clients = getClientList(getTherapist());?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
        <th scope="col"></th>
    </tr>

    <?php foreach ($clients as $row) {
        ?>
        <tr>
            <td><?php echo $row['firstName'];?></td>
            <td><?php echo $row['lastName'];?></td>
            <td><?php echo $row['phone'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php $id = $row['id'];?><a href='index.php?client=details&id=<?php echo $id;?>' class="btn btn-info">Details</a></td>
        </tr>
    <?php } ?>
    </thead>
</table>
<a href='index.php?client=add' class="btn btn-primary">Add Client</a>




