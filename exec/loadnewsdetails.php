<?php
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<div class='alert alert-danger'>Lajmi nuk u gjet.</div>";
    return;
}

$newsId = (int)$_GET['id'];

$config = include 'db_config.php';
$connectionOptions = [
    "Database" => $config['dbname'],
    "Uid" => $config['username'],
    "PWD" => $config['password'],
    "CharacterSet" => "UTF-8"
];

$conn = sqlsrv_connect($config['servername'], $connectionOptions);
if (!$conn) {
    echo "<div class='alert alert-danger'>Lidhja me MSSQL dështoi.</div>";
    return;
}

// Rrit numrin e shikimeve
$updateSql = "UPDATE NEWS SET VIEWS = VIEWS + 1 WHERE NEWSID = ?";
sqlsrv_query($conn, $updateSql, [$newsId]);

$sql = "SELECT n.NEWSID, nc.IDENTIFIER AS CATEGORY, n.TITLE, n.INSERTDATE, n.CONTENT, n.IMAGEDIR, 
               u.FIRSTNAME + ' ' + u.LASTNAME as AGENT, n.VIEWS
        FROM NEWS n 
        JOIN NEWSCATEGORY nc ON nc.NEWSCATEGORYID = n.NEWSCATEGORYID 
        JOIN USERS u ON u.USERID = n.USERID
        WHERE n.NEWSID = ?";

$stmt = sqlsrv_query($conn, $sql, [$newsId]);
$news = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

if (!$news) {
    echo "<div class='alert alert-warning'>Lajmi nuk ekziston ose është arkivuar.</div>";
    return;
}

$imageSrc = str_replace(['C:\\xampp\\htdocs', 'C:/xampp/htdocs'], '', $news['IMAGEDIR']);
$imageSrc = str_replace('\\', '/', $imageSrc);
$formattedDate = $news['INSERTDATE']->format('d.m.Y H:i');
$currentUrl = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$encodedUrl = urlencode($currentUrl);
$encodedTitle = urlencode($news['TITLE']);
?>

<div class="news-wrapper">
  <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
    <a href="index.php" class="btn btn-secondary">&larr; Kthehu mbrapa</a>
    <div class="social-buttons d-flex gap-3 mt-3">
      <a class="btn btn-sm btn-primary" href="https://www.facebook.com/sharer/sharer.php?u=<?= $encodedUrl ?>" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-facebook-f"></i> Facebook
      </a>
      <a class="btn btn-sm btn-info text-white" href="https://twitter.com/intent/tweet?url=<?= $encodedUrl ?>&text=<?= $encodedTitle ?>" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-twitter"></i> Twitter
      </a>
      <a class="btn btn-sm btn-danger text-white" href="https://www.instagram.com/inquaria.ks" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-instagram"></i> Instagram
      </a>
      <div class="text-muted d-flex align-items-center gap-1">
        <i class="bi bi-eye"></i> <?= (int)$news['VIEWS'] ?> shikime
      </div>
    </div>
  </div>

  <img src="<?= htmlspecialchars($imageSrc) ?>" alt="News Image" class="news-image mb-3">
  <h1 class="news-title"><?= htmlspecialchars($news['TITLE']) ?></h1>

  <div class="news-meta text-muted mb-3">
    Kategoria: <?= htmlspecialchars($news['CATEGORY']) ?> |
    Data: <?= $formattedDate ?> |
    Redaktoi: <?= htmlspecialchars($news['AGENT']) ?>
  </div>

  <div class="news-content">
    <?= nl2br(htmlspecialchars($news['CONTENT'])) ?>
  </div>
</div>

<?php
// Load related news from same category
$sqlRelated = "SELECT TOP 6 NEWSID, TITLE, IMAGEDIR 
               FROM NEWS 
               WHERE NEWSCATEGORYID = (
                 SELECT NEWSCATEGORYID FROM NEWS WHERE NEWSID = ?
               ) AND NEWSID <> ? 
               ORDER BY INSERTDATE DESC";
$stmtRelated = sqlsrv_query($conn, $sqlRelated, [$newsId, $newsId]);

if ($stmtRelated && sqlsrv_has_rows($stmtRelated)) {
    echo '<div class="news-wrapper mt-5 pt-4 border-top">';
    echo '<div class="category-title">Më shumë nga kjo kategori</div>';
    echo '<div class="row g-3">';

    while ($row = sqlsrv_fetch_array($stmtRelated, SQLSRV_FETCH_ASSOC)) {
        $relatedImage = str_replace(['C:\\xampp\\htdocs', 'C:/xampp/htdocs'], '', $row['IMAGEDIR']);
        $relatedImage = str_replace('\\', '/', $relatedImage);

        echo '<div class="col-md-4">';
        echo '<a href="newsdetails.php?id=' . (int)$row['NEWSID'] . '" style="text-decoration:none; color:inherit;">';
        echo '<div class="item-card">';
        echo '<img src="' . htmlspecialchars($relatedImage) . '" alt="">';
        echo '<h6>' . htmlspecialchars($row['TITLE']) . '</h6>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
    }

    echo '</div>'; // close row
    echo '</div>'; // close news-wrapper
}

sqlsrv_free_stmt($stmt);
sqlsrv_free_stmt($stmtRelated);
sqlsrv_close($conn);
?>
