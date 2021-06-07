<?php ob_start(); ?>
<?php session_start();?>
<?php include '../functions.php' ?>


<?php
if (isset($_POST['login'])) {
    $userType = $_POST['user-type'];
    $userName = $_POST['user'];
    $password = $_POST['password'];
    $active_user = getUserCredentials($userType, $userName, $password);

}



if ($active_user) {
    $userName = $active_user['firstName'];
    $
} else {
    header("Location: login.php?message=not-exist");
}

?>


<?php include 'includes/admin_header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-2 admin-box">

        <?php include 'includes/admin_navigation.php' ?>

        </div>
        <div class="col-7 admin-box">
            <h2>Welcome!</h2>
        </div>
        <?php include 'includes/admin_sidebar.php'?>
    </div>

</div>

<?php include 'includes/admin_footer.php' ?>