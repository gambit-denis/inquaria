<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

// Kërkimi
$search = $_GET['search'] ?? '';
$search = trim($search);
$params = [];

$whereClause = '';
if ($search !== '') {
    $whereClause = "WHERE TITLE LIKE ? OR CATEGORY LIKE ?";
    $params[] = '%' . $search . '%';
    $params[] = '%' . $search . '%';
}

$sql = "SELECT NEWSID, CATEGORY, TITLE, IMAGEDIR FROM vw_NewsList $whereClause ORDER BY NEWSID DESC";
$stmt = sqlsrv_query($conn, $sql, $params);

$news = [];

if ($stmt) {
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $category = $row['CATEGORY'] ?? 'Tjetër';
        $news[$category][] = $row;
    }
    sqlsrv_free_stmt($stmt);
}

sqlsrv_close($conn);

// Render HTML me strukturën ekzistuese
if (empty($news)) {
    echo '<p class="text-muted">Nuk u gjetën artikuj për këtë kërkim.</p>';
}

foreach ($news as $category => $items) {
    echo '<div class="category-section">';
    echo '<div class="category-title">' . htmlspecialchars($category) . '</div>';
    echo '<div class="row g-3">';

    foreach ($items as $item) {
        $imageSrc = str_replace(['C:\\xampp\\htdocs', 'C:/xampp/htdocs'], '', $item['IMAGEDIR']);
        $imageSrc = str_replace('\\', '/', $imageSrc);
        $newsId = (int)$item['NEWSID'];

        echo '<div class="col-md-3">';
        echo '<a href="newsdetails.php?id=' . $newsId . '" style="text-decoration:none; color:inherit;">';
        echo '<div class="item-card">';
        echo '<img src="' . htmlspecialchars($imageSrc) . '" alt="">';
        echo '<h6>' . htmlspecialchars($item['TITLE']) . '</h6>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
    }

    echo '</div>'; // close .row
    echo '</div>'; // close .category-section
}
?>
