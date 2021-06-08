<?php ob_start(); ?>
<?php include '../functions.php' ?>





<?php include 'includes/admin_header.php' ?>
<?php
if (isset($_POST['login'])) {
    $userType = $_POST['user-type'];
    $userName = $_POST['user'];
    $password = $_POST['password'];
    $activeUser = getUserCredentials($userType, $userName, $password);
    $_SESSION['active-user'] = $activeUser;
}
if (!isset($_SESSION['active-user']['id'])) {
    header('Location: login.php?message=not-exist');
}
?>
<div class="container">
    <div class="row">
        <div class="col-2 admin-box">

        <?php include 'includes/admin_navigation.php' ?>

        </div>
        <div class="col-7 admin-box">
            <?php

            echo 'Welcome '.$_SESSION['active-user']['firstName'].' '.$_SESSION['active-user']['lastName'];
            echo '<div class="empty-space"></div>';

            switch($_SESSION['active-user']['user-type']) {
                case 'supervisor': ?>
                    <div class="btn btn-info">See therapists</div>
                    <div class="empty-space"></div>
                    <a class="btn btn-info" href="meetings.php?id=<?php $_SESSION['active-user']['id'];?>">See meetings</a>
                    <div class="empty-space"></div>
                    <div class="btn btn-info">See notes</div>
                <?php break;
                 case 'therapist': ?>
                    <a class="btn btn-info" href="clients.php?id=<?php $_SESSION['active-user']['id'];?>">See Clients</a>
                    <div class="empty-space"></div>
                    <a class="btn btn-info" href="meetings.php?id=<?php $_SESSION['active-user']['id'];?>">See Meetings</a>
                    <div class="empty-space"></div>
                    <div class="btn btn-info">See notes</div>
                 <?php break;
                 case 'client': ?>
                    <a class="btn btn-info" href="client_meeting.php?id=<?php $_SESSION['active-user']['id'];?>">See meetings</a>
                    <div class="empty-space"></div>
                    <div class="btn btn-info" href="#">See assignments</div>
            <?php }; ?>
        </div>
        <?php include 'includes/admin_sidebar.php'?>
    </div>

</div>

<?php include 'includes/admin_footer.php' ?>