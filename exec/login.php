<?php
session_start();
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../error_log.txt');

$config = include('db_config.php');

$connectionOptions = [
    "Database" => $config['dbname'],
    "Uid" => $config['username'],
    "PWD" => $config['password'],
    "CharacterSet" => "UTF-8"
];
$conn = sqlsrv_connect($config['servername'], $connectionOptions);

if (!$conn) {
    error_log("Database connection failed: " . print_r(sqlsrv_errors(), true));
    echo json_encode(['success' => false, 'message' => 'Lidhja me bazën e të dhënave dështoi.']);
    exit;
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    error_log("Missing email or password input.");
    echo json_encode(['success' => false, 'message' => 'Ju lutem plotësoni email-in dhe fjalëkalimin.']);
    exit;
}

$sql = "SELECT USERID, USERNAME, PASSWORD FROM USERS WHERE EMAIL = ?";
$params = [$email];
$stmt = sqlsrv_query($conn, $sql, $params);

if (!$stmt) {
    error_log("Query failed: " . print_r(sqlsrv_errors(), true));
    echo json_encode(['success' => false, 'message' => 'Kërkimi i përdoruesit dështoi.']);
    exit;
}

$user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

if ($user && password_verify($password, $user['PASSWORD'])) {
    $_SESSION['userid'] = $user['USERID'];
    $_SESSION['username'] = $user['USERNAME'];

    echo json_encode(['success' => true, 'message' => 'Autentifikimi i suksesshëm.']);
} else {
    error_log("Login failed for email: $email");
    echo json_encode(['success' => false, 'message' => 'Email ose fjalëkalim i pasaktë.']);
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
