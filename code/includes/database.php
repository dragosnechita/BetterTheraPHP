<?php
$pdo = new PDO('mysql:host=mysql;dbname=bettertherapy;', 'better', 'base2', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$query = $pdo->query('SHOW VARIABLES like "version"');

$row = $query->fetch();

echo 'MySQL version:' . $row['Value'];
echo "does not work";
?>




