<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../error_log.txt');

// Load MSSQL config
$config = include('db_config.php');

// Create MSSQL connection using sqlsrv
$connectionOptions = [
    "Database" => $config['dbname'],
    "Uid" => $config['username'],
    "PWD" => $config['password'],
    "CharacterSet" => "UTF-8"
];
$conn = sqlsrv_connect($config['servername'], $connectionOptions);

if (!$conn) {
    error_log("Database connection failed: " . print_r(sqlsrv_errors(), true));
    echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
    exit;
}

// Required fields
$requiredFields = ['firstname', 'lastname', 'username', 'email', 'password', 'birthday', 'cityid', 'sourceid'];
$missingFields = [];

foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        $missingFields[] = $field;
    }
}

if (!empty($missingFields)) {
    error_log("Missing fields: " . implode(', ', $missingFields));
    echo json_encode(['success' => false, 'message' => 'Ju lutem plotësoni fushat: ' . implode(', ', $missingFields)]);
    exit;
}

// Collect and sanitize data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$birthday = $_POST['birthday'];
$cityid = $_POST['cityid'];
$sourceid = $_POST['sourceid'];
$refdetails = $_POST['refdetails'] ?? '';
$insertdate = date("Y-m-d H:i:s");
$stateid = 1;
$isadmin = 0;

$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO USERS (USERNAME, EMAIL, PASSWORD, FIRSTNAME, LASTNAME, BIRTHDATE, INSERTDATE, CITYID, SOURCEID, FROMAGENT, STATEID, ISADMIN)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$params = [
    $username,
    $email,
    $hashedPassword,
    $firstname,
    $lastname,
    $birthday,
    $insertdate,
    $cityid,
    $sourceid,
    $refdetails,
    $stateid,
    $isadmin
];

$stmt = sqlsrv_prepare($conn, $sql, $params);

if (!$stmt) {
    error_log("SQL Prepare Error: " . print_r(sqlsrv_errors(), true));
    echo json_encode(['success' => false, 'message' => 'Përgatitja e query-t dështoi.']);
    exit;
}

if (!sqlsrv_execute($stmt)) {
    $errors = sqlsrv_errors();
    error_log("SQL Execute Error: " . print_r($errors, true));
    $msg = $errors[0]['message'] ?? 'Dështoi regjistrimi.';
    echo json_encode(['success' => false, 'message' => $msg]);
} else {
    echo json_encode(['success' => true, 'message' => 'Regjistrimi u krye me sukses.']);
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
