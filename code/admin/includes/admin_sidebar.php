<div class="col-2 admin-box">
    <h4>Clients</h4>
    <?php
    $therapist = '1';
    $clients = getClientList($therapist);
    ?>
    <ul>

            <?php foreach ($clients as $client) {
                ?><li>
                <h5>
                    <a href="./client_details.php?id=<?php echo $client['id'];?>">
                        <?php echo $client['firstName']." ".$client['lastName']?>
                    </a>
                </h5>
                </li>
    <?php } ?>
    </ul>
    <div class="separator"></div>
    <h4>Search Notes</h4>
    <form action="../admin/notes_search.php" method="get">
        <div class="input-group">
            <input type="text" name="search" class="form-control">
            <span class="input-group-btn">
                <button name="submit" class="btn btn-primary" type="submit">
                    <span class="fas fa-search"></span>
                </button>
            </span>
        </div>
    </form>
</div>
