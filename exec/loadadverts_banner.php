<?php
$config = include 'db_config.php';

$connectionOptions = [
    "Database" => $config['dbname'],
    "Uid" => $config['username'],
    "PWD" => $config['password'],
    "CharacterSet" => "UTF-8"
];

$conn = sqlsrv_connect($config['servername'], $connectionOptions);

if (!$conn) {
    die("Lidhja me MSSQL dështoi.");
}

$sql = "SELECT * FROM ADVERTS 
        WHERE STATEID = 1 AND ADVERTCATEGORYID = 1 
        AND ENDDATE > SYSDATETIME()
        ORDER BY INSERTDATE DESC";

$stmt = sqlsrv_query($conn, $sql);
$found = false;

while ($stmt && ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))) {
    $found = true;
    $imageSrc = str_replace(['C:\\xampp\\htdocs', 'C:/xampp/htdocs'], '', $row['IMAGEDIR']);
    $imageSrc = str_replace('\\', '/', $imageSrc);
    echo '<img class="banner-img" src="' . htmlspecialchars($imageSrc) . '" alt="Banner Reklamë">';
}

if (!$found) {
    echo '<img class="banner-img active" src="/images/advert.png" alt="Banner i parazgjedhur">';
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
