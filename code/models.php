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

function getClientMeetings($clientId, $therapistId) {
    global $pdo;
    $meetingList = $pdo->prepare('SELECT * from meeting WHERE client = ? AND therapist = ?');
    $meetingList->execute([$clientId, $therapistId]);
    $result = $meetingList->fetchAll();
    return $result;
};

function getMeetingDetails($meetingId) {
    global $pdo;
    $meeting = $pdo->prepare('SELECT * from meeting WHERE id = ?');
    $meeting->execute([$meetingId]);
    $result = $meeting->fetch();
    return $result;
};

function getMeetings($therapistId) {
    global $pdo;
    $meetings = $pdo->prepare('SELECT * from meeting WHERE therapist = ?');
    $meetings->execute([$therapistId]);
    $result = $meetings->fetchAll();
    return $result;
}

function getTherapistNotes($therapistId) {
    global $pdo;
    $notesList = $pdo->prepare('SELECT * from notes WHERE therapist = ?');
    $notesList->execute([$therapistId]);
    $result = $notesList->fetchAll();
    return $result;
}

function searchClients($input, $therapist) {
    global $pdo;
    $input = "%$input%";
    $clients = $pdo->prepare('SELECT * from client WHERE therapist = ? AND (firstName LIKE ? OR lastName LIKE ?)');
    $clients->execute([$therapist, $input, $input]);
    $result = $clients->fetchAll();
    return $result;
}
