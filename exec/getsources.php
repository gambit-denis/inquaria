<?php
// Include config
$config = include('db_config.php');

// MSSQL connection array
$connectionInfo = array(
    "Database" => $config['dbname'],
    "UID" => $config['username'],
    "PWD" => $config['password'],
    "CharacterSet" => "UTF-8"
);

// Connect to MSSQL Server
$conn = sqlsrv_connect($config['servername'], $connectionInfo);

// Enable error logging
ini_set('log_errors', 1);
ini_set('error_log', 'error_log.txt');

// Check connection
if (!$conn) {
    $errors = sqlsrv_errors();
    error_log("Connection failed: " . print_r($errors, true));
    die(json_encode(['error' => 'Connection failed']));
}

// Prepare and execute query
$query = "SELECT SOURCEID, IDENTIFIER FROM FROMSOURCE ORDER BY IDENTIFIER";
$stmt = sqlsrv_query($conn, $query);

if (!$stmt) {
    error_log("Query failed: " . print_r(sqlsrv_errors(), true));
    die(json_encode(['error' => 'Query failed']));
}

// Fetch data
$sources = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $sources[] = $row;
}

// Output JSON
echo json_encode(['sources' => $sources]);

// Close connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
