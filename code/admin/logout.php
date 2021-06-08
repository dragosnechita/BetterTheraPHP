<?php ob_start(); ?>
<?php session_start(); ?>
<?php $_SESSION['active-user'] = null;

header('Location: login.php?message=logged-out');

?>