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

////////////////////// --- Functions for handling users --- /////////////////////////



////////////// -- Supervisor -- //////////////


function getSupervisor() {
    return '1';
}



////////////// -- Therapist -- //////////////


function getTherapist() {
    return '1';
}

function addTherapist($fname, $lname, $phone, $email, $password, $supervisor) {
    global $pdo;
    $createdAt = date('Y-m-d')." ".date('h:i:s');
    $lastSeen = $createdAt;
    $add_therapist = $pdo->prepare
    ('INSERT INTO therapist (firstName, lastName, phone, email, password, createdAt, lastSeen, supervisor)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $add_therapist->execute([$fname, $lname, $phone, $email, $password, $createdAt, $lastSeen, $supervisor]);
};

function getTherapistList($supervisor_id)
{
    global $pdo;
    $therapist_list = $pdo->prepare('SELECT * from therapist WHERE therapist = ?');
    $therapist_list->execute([$supervisor_id]);
    $result = $therapist_list->fetchAll();
    return $result;
};

function getTherapistDetails($therapist_id) {
    global $pdo;
    $therapist_details = $pdo->prepare('SELECT * from therapist WHERE id = ?');
    $therapist_details->execute([$therapist_id]);
    $result = $therapist_details->fetch();
    return $result;
};

function updateTherapist($fname, $lname, $phone, $email, $password, $id) {
    global $pdo;
    $update_therapist = $pdo->prepare
    ('UPDATE therapist SET firstName = ?, lastName = ?, phone = ?, email = ?, password = ?
WHERE  id = ?');
    $update_therapist->execute([$fname, $lname, $phone, $email, $password, $id]);
};

function deleteTherapist($id) {
    global $pdo;
    $delete_therapist = $pdo->prepare('DELETE FROM therapist WHERE id = ?');
    $delete_therapist->execute([$id]);
};




////////////// -- Clients -- //////////////


function getClientList($therapist_id) {
    global $pdo;
    $client_list = $pdo->prepare('SELECT * from client WHERE therapist = ?');
    $client_list->execute([$therapist_id]);
    $result = $client_list->fetchAll();
    return $result;
};

function getClientDetails($client_id) {
    global $pdo;
    $client_details = $pdo->prepare('SELECT * from client WHERE id = ?');
    $client_details->execute([$client_id]);
    $result = $client_details->fetch();
    return $result;
};

function addClient($fname, $lname, $phone, $email, $password, $therapist) {
    global $pdo;
    $createdAt = date('Y-m-d')." ".date('h:i:s');
    $lastSeen = $createdAt;
    $add_client = $pdo->prepare
    ('INSERT INTO client (firstName, lastName, phone, email, password, createdAt, lastSeen, therapist)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $add_client->execute([$fname, $lname, $phone, $email, $password, $createdAt, $lastSeen, $therapist]);
};

function updateClient($fname, $lname, $phone, $email, $password, $id) {
    global $pdo;
    $update_client = $pdo->prepare
    ('UPDATE client SET firstName = ?, lastName = ?, phone = ?, email = ?, password = ?
WHERE  id = ?');
    $update_client->execute([$fname, $lname, $phone, $email, $password, $id]);
};

function deleteClient($id) {
    global $pdo;
    $delete_client = $pdo->prepare('DELETE FROM client WHERE id = ?');
    $delete_client->execute([$id]);
};





////////////////////// --- Functions for handling meetings --- /////////////////////////

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
    $meetings = $pdo->prepare('SELECT * from meeting WHERE therapist = ? ORDER BY client, clientNo');
    $meetings->execute([$therapistId]);
    $result = $meetings->fetchAll();
    return $result;
}

function getClientNo($therapistId, $clientId) {
    global $pdo;
    $clientNo = $pdo->prepare('SELECT clientNo from meeting WHERE therapist = ? and client = ? ORDER BY clientNo');
    $clientNo->execute([$therapistId, $clientId]);
    $clientCurrent = $clientNo->fetch();
    $result = intval(end($clientCurrent)) + 1;
    return $result;
}

function addMeeting($client, $therapist, $clientNo, $dateTime, $duration) {
    global $pdo;
    $meeting = $pdo->prepare(
        'INSERT INTO meeting (client, therapist, clientNo, dateTime, duration)
VALUES (?, ?, ?, ?, ?)');
    $meeting->execute([$client, $therapist, $clientNo, $dateTime, $duration]);
}

function deleteMeeting($meetingId) {
    global $pdo;
    $delete_meeting = $pdo->prepare('DELETE FROM meeting WHERE id = ?');
    $delete_meeting->execute([$meetingId]);

}

function updateMeeting($id, $client, $dateTime, $duration) {
    global $pdo;
    $update_meeting = $pdo->prepare
    ('UPDATE meeting SET client = ?, dateTime = ?, duration = ? WHERE  id = ?');
    $update_meeting->execute([$client, $dateTime, $duration, $id]);
};





////////////////////// --- Functions for handling notes --- /////////////////////////


function getTherapistNotes($therapistId) {
    global $pdo;
    $notesList = $pdo->prepare('SELECT * from notes WHERE therapist = ?');
    $notesList->execute([$therapistId]);
    $result = $notesList->fetchAll();
    return $result;
}

function getMeetingNotes($meetingId) {
    global $pdo;
    $notesList = $pdo->prepare('SELECT * from notes WHERE meeting = ?');
    $notesList->execute([$meetingId]);
    $result = $notesList->fetchAll();
    return $result;
}

function addNote($client, $therapist, $meeting, $content) {
    global $pdo;
    $note = $pdo->prepare(
        'INSERT INTO notes (client, therapist, meeting, content)
VALUES (?, ?, ?, ?)');
    $note->execute([$client, $therapist, $meeting, $content]);
}

function getNote ($noteId) {
    return 'success';
}

function searchClients($input, $therapist) {
    global $pdo;
    $input = "%$input%";
    $clients = $pdo->prepare('SELECT * from client WHERE therapist = ? AND (firstName LIKE ? OR lastName LIKE ?)');
    $clients->execute([$therapist, $input, $input]);
    $result = $clients->fetchAll();
    return $result;
}

function searchNotes($input, $therapist) {
    global $pdo;
    $input = "%$input%";
    $clients = $pdo->prepare('SELECT * from notes WHERE therapist = ? AND (content LIKE ?)');
    $clients->execute([$therapist, $input]);
    $result = $clients->fetchAll();
    return $result;
}

////////////////////// --- Functions for login and logout --- /////////////////////////

function getUserCredentials ($userType, $userName, $password) {
    global $pdo;
    switch($userType) {
        case 'supervisor':
            $credentials = $pdo->prepare('SELECT * from supervisor WHERE email = ? AND password = ?');
            $credentials->execute([$userName, $password]);
            $result = $credentials->fetch();
            return $result;
        case 'therapist':
            $credentials = $pdo->prepare('SELECT * from therapist WHERE email = ? AND password = ?');
            $credentials->execute([$userName, $password]);
            $result = $credentials->fetch();
            return $result;
        case 'client':
            $credentials = $pdo->prepare('SELECT * from client WHERE email = ? AND password = ?');
            $credentials->execute([$userName, $password]);
            $result = $credentials->fetch();
            return $result;
    }

}