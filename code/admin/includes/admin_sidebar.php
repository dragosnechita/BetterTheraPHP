

<div class="col-2 admin-box">
    <div class="col-2 dropdown">
        <?php if(isset($_SESSION['active-user']['id'])) {
            $menuGreeting = 'Hello '.$_SESSION['active-user']['firstName'];
        } else {
            $menuGreeting = 'Log in';
        };
        ?>
        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $menuGreeting;?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <?php if(isset($_SESSION['active-user'])) { ?>
            <li><a class="dropdown-item" href="#"><i class="fa fa-fw fa-user"></i>Profile</li>
            <li><a class="dropdown-item" href="#"><i class="fa fa-fw fa-gear"></i>Settings</li>
            <li><a class="dropdown-item" href="./logout.php"><i class="fa fa-fw fa-power-off"></i>Log out</a></li>
            <?php } else { ?>
            <li><a class="dropdown-item" href="./login.php"><i class="fa fa-fw fa-power-off"></i>Log in</a></li>
            <?php }; ?>
        </ul>
    </div>
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
