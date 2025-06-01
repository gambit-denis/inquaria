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
        WHERE STATEID = 1 AND ADVERTCATEGORYID = 2 
        AND ENDDATE > SYSDATETIME()
        ORDER BY INSERTDATE DESC";

$stmt = sqlsrv_query($conn, $sql);
$found = false;

while ($stmt && ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))) {
    $found = true;
    $imageSrc = str_replace(['C:\\xampp\\htdocs', 'C:/xampp/htdocs'], '', $row['IMAGEDIR']);
    $imageSrc = str_replace('\\', '/', $imageSrc);
    
    echo '<div class="ad-box" style="display:none;">';
    echo '<img src="' . htmlspecialchars($imageSrc) . '" style="width:400px; height:500px; max-height:400px;">';
    echo '</div>';
}

if (!$found) {
    echo "<p style='padding: 10px;'>Nuk ka reklama aktive për momentin.</p>";
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
