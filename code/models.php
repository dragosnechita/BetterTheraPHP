<?php


$host = 'better_database';
$database = 'bettertherapy';
$user = 'better';
$pass = 'base2';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$database;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

function getClientList($therapist_id) {
    global $pdo;
    $client_list = $pdo->prepare('SELECT * from client WHERE therapist = ?');
    $client_list->execute([$therapist_id]);
    $result = $client_list->fetchAll();
    return $result;
};

function getClientDetails($client_id) {
    global $pdo;
    $client_list = $pdo->prepare('SELECT * from client WHERE id = ?');
    $client_list->execute([$client_id]);
    $result = $client_list->fetch();
    return $result;
};

function getClientMeetings($client_id, $therapist_id) {
    global $pdo;
    $meeting_list = $pdo->prepare('SELECT * from meeting WHERE client = ? AND therapist = ?');
    $meeting_list->execute([$client_id, $therapist_id]);
    $result = $meeting_list->fetchAll();
    return $result;
};

