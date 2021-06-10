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
    $therapist = getTherapist();
}
if (!isset($_SESSION['active-user']['id'])) {
    header('Location: login.php?message=logged-out');
}
?>

<div class="container">
    <div class="row">
        <div class="col-2 admin-box">

        <?php include 'includes/admin_navigation.php' ?>

        </div>
        <div class="col-9 admin-box">
            <?php
            if (isset($_POST['client_add'])) {

                addClient($_POST['client-fname'],
                    $_POST['client-lname'],
                    $_POST['client-phone'],
                    $_POST['client-email'],
                    'default',
                    '1');
                echo 'New client added';
                include 'clients.php';
            } elseif (isset($_POST['update'])) {
                updateClient(
                    $_POST['client-fname'],
                    $_POST['client-lname'],
                    $_POST['client-phone'],
                    $_POST['client-email'],
                    $_POST['client-password'],
                    $_POST['client-id']
                );
                echo 'client updated';
                $_GET['client'] = 'details';
                $_GET['id'] = $_POST['client-id'];
            };

            if (isset($_GET['client'])) {
                if ($_GET['client'] == 'list') {
                    include 'clients.php';
                } elseif ($_GET['client'] == 'add') {
                    include 'client_add.php';
                } elseif ($_GET['client'] == 'details') {
                    include 'client_details.php';
                } elseif ($_GET['client'] == 'update') {
                    include 'client_update.php';
                } elseif ($_GET['client'] == 'delete') {
                    deleteClient($_GET['delete']);
                    echo "Client " . $_GET['delete'] . " deleted.";
                    include 'clients.php';
                }
            } elseif (isset($_GET['meeting'])) {
                if ($_GET['meeting'] == 'list') {
                    include 'meetings.php';
                } elseif ($_GET['meeting'] == 'details') {
                    include 'meeting_details.php';
                } elseif ($_GET['meeting'] == 'add') {
                    include 'meeting_add.php';
                } elseif ($_GET['meeting'] == 'update') {
                    include 'meeting_update.php';
                } elseif ($_GET['meeting'] == 'delete') {
                    deleteMeeting($_GET['delete']);
                    include 'client_details.php';
                }
            } elseif (isset($_POST['add_meeting'])) {
                addMeeting($_POST['meeting-client'],
                    $_POST['meeting-therapist'],
                    getClientNo($_POST['meeting-therapist'], $_POST['meeting-client']),
                    $_POST['meeting-dateTime'],
                    $_POST['meeting-duration']);
                $_GET['id'] = $_POST['meeting-client'];
                include 'client_details.php';
            } elseif (isset($_POST['update_meeting'])){
                updateMeeting($_POST['meeting-id'],
                    $_POST['meeting-client'],
                    $_POST['meeting-dateTime'],
                    $_POST['meeting-duration']);
                $meetingUpdate = "Meeting " . $_POST['meeting-id'] . " updated.";
                $_GET['id'] = $_POST['meeting-id'];
                include 'meeting_details.php';
            } else {
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
                <?php }
            }; ?>
        </div>
    </div>

</div>

<?php include 'includes/admin_footer.php' ?>