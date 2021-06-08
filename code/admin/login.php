<?php ob_start(); ?>
<?php include 'includes/admin_header.php' ?>
<?php include '../functions.php' ?>

    <div class="container">
        <div class="row">
            <div class="col-2 admin-box">

                <?php include 'includes/admin_navigation.php' ?>

            </div>
            <div class="col-7 admin-box">
                <?php
                if (!$_GET) {
                    echo '<div class="alert alert-info">Hello, to access BetterTherapy, please log in</div>';;
                } elseif ($_GET['message'] == 'logged-out') {
                    echo '<div class="alert alert-info">Hello, to access BetterTherapy, please log in</div>';
                } elseif ($_GET['message'] == 'not-exist') {
                    echo '<div class="alert alert-danger">The user you tried to log in does not exist, please try again</div>';
                }
                ?>
                <h2>Login</h2>
                <form action="index.php" method="post">
                    <label for="user-type">Client</label>
                    <select name="user-type" class="form-control" id="user-type">
                        <option value="therapist">Therapist</option>
                        <option value="supervisor">Supervisor</option>
                        <option value="client">Client</option>
                    </select>
                        <label for="user" value="username">User name (email): </label>
                        <input type="email" name="user" class="form-control" placeholder="email">
<!--                    <div class="empty-space"></div>-->
                        <label for="password" value="password">Password: </label>
                        <input type="password" name="password" class="form-control" placeholder="password">
                    <div class="empty-space"></div>
                        <span class="input-group-btn">
                <button name="login" class="btn btn-primary" type="submit">Log In
                    <span class="fas fa-sign-in-alt"></span>
                </button>
            </span>
                </form>
            </div>
            <?php include 'includes/admin_sidebar.php' ?>
        </div>

    </div>

<?php include 'includes/admin_footer.php' ?>