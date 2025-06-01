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
    echo "<p class='text-danger'>Gabim në lidhje me databazën.</p>";
    return;
}

$sql = "
SELECT 
  StartDate + ', ' + Weekday AS FULLDATE,
  StartTime,
  EndTime,
  Title
FROM vw_ProgramSchema
ORDER BY CONVERT(datetime, StartDate, 104), StartTime, Title
";

$stmt = sqlsrv_query($conn, $sql);
if (!$stmt) {
    echo "<p class='text-danger'>Gabim gjatë leximit të orarit të programeve.</p>";
    die(print_r(sqlsrv_errors(), true));
}

$currentDate = null;
$first = true;

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    if ($first) {
        echo '<h2 class="program-section-title mt-5 mb-4">SKEMA PROGRAMORE</h2>';
        $first = false;
    }

    if ($currentDate !== $row['FULLDATE']) {
        if ($currentDate !== null) echo '</div>'; // mbyll grupin e mëparshëm
        $currentDate = $row['FULLDATE'];
        echo "<h2 class='program-day-header'>" . htmlspecialchars($currentDate) . "</h2>";
        echo "<div class='ps-3 program-group'>";
    }

    echo "<p class='program-line'><strong>{$row['StartTime']} - {$row['EndTime']}</strong>: " . htmlspecialchars($row['Title']) . "</p>";
}
if ($currentDate !== null) echo '</div>';

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
