<?php
session_start();

$userid = $_SESSION['userid'] ?? null;
$username = $_SESSION['username'] ?? null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inquaria • Profili</title>
   <link rel="icon" href="/images/logo.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
      
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <style>
    body {
      background-color: #f9f8f4;
    }
     .advert-top {
      margin-top: 20px;
      margin-bottom: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100px;
      background-color: #f9f8f4;
    }
    .advert-top img {
      max-height: 120px;
      width: 800px;
      max-width: 100%;
    }
    .logo-area {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 40px;
    }
    .logo-brand {
      display: flex;
      align-items: center;
      gap: 15px;
    }
    .logo-brand img {
      width: 100px;
      height: 100px;
      object-fit: contain;
    }
    // Ndryshimi 1
    .logo-brand h3 {
      margin: 0;
      font-size: 4rem !important;
    }
    
    h3 {
      font-size: 4rem !important;
    }

    .logo-brand p{
      font-size: 1.5rem !important;
    }
    .language-selector .dropdown-toggle {
      display: flex;
      align-items: center;
      gap: 5px;
    }
    .language-selector img {
      width: 20px;
      height: 14px;
      object-fit: cover;
    }
    .navbar-custom {
      background-color: #f9f8f4;
      border-top: 1px solid #ddd;
      border-bottom: 1px solid #ddd;
      padding: 10px 0;
    }
    .nav-icons {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 30px;
    }
    .nav-icons a {
      text-align: center;
      color: #002B45;
      font-size: 14px;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    .nav-icons a:hover {
      color: #0056b3;
      transform: scale(1.05);
    }
    .nav-icons i {
      font-size: 24px;
      display: block;
      margin-bottom: 4px;
      transition: transform 0.3s ease;
    }
    .nav-icons a:hover i {
      transform: scale(1.2);
    }
    .nav-icons a.active {
      font-weight: bold;
      color: #0056b3;
      border-bottom: 2px solid #0056b3;
    }
    .content {
      display: flex;
      padding: 10px 20px;
    }
.content-left {
  flex: 3;
  padding: 0 20px 0 335px;
  margin-top: 10px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}
    .content-right {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 20px;
      padding-right: 255px;
    }
    .ad-box img {
      width: 250px;
      height: 400px;
      border: 1px solid #ddd;
      margin-bottom: 10px;
    }
    .ad-title {
      font-size: 0.9rem;
      font-weight: bold;
      margin-bottom: 0px;
    }
        form {
      max-width: 400px;
    }
    .form-control {
      border-radius: 8px;
    }
    .btn-primary {
      background-color: #002B45;
      border: none;
    }
    .btn-primary:hover {
      background-color: #004a75;
    }
    .btn-google {
      background-color: #ffffff;
      border: 1px solid #ddd;
      color: #444;
    }
    .btn-google:hover {
      background-color: #f1f1f1;
    }
    .form-footer {
      text-align: center;
      margin-top: 10px;
    }
     .form-footer a {
      text-decoration: none;
      color: #002B45 !important;
    }
     .advert-top img.banner-img {
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 800px;
  height: 120px;
  object-fit: cover;
  opacity: 0;
  transition: opacity 1s ease-in-out;
  z-index: 0;
}
.advert-top img.banner-img.active {
  opacity: 1;
  z-index: 1;
}
  </style>
</head>
<body>
 <div class="advert-top">
  <?php include 'exec/loadadverts_banner.php'; ?>
</div>

  <div class="logo-area">
    <div class="logo-brand">
      <img src="/images/logo.png" alt="logo">
      <div>
        <h3 class="mb-0">INQUARIA</h3>
        <p>Aty ku idetë marrin formë.</p>
      </div>
    </div>
    <div class="dropdown language-selector">
      <button class="btn btn-noline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://flagcdn.com/w40/al.png" alt="Shqip"> Shqip
      </button>
      <ul class="dropdown-menu dropdown-menu-end">
        <li><a class="dropdown-item d-flex align-items-center gap-2" href="#"><img src="https://flagcdn.com/w40/de.png" alt="DE"> Gjermanisht</a></li>
        <li><a class="dropdown-item d-flex align-items-center gap-2" href="#"><img src="https://flagcdn.com/w40/gb.png" alt="EN"> Anglisht</a></li>
      </ul>
    </div>
  </div>

  <div class="navbar-custom">
    <div class="container nav-icons">
      <a href="index.php"><i class="bi bi-newspaper"></i>News</a>
      <a href="#" hidden><i class="bi bi-buildings"></i>Drejtësia</a>
      <a href="#" hidden><i class="bi bi-archive"></i>Biblioteka</a>
      <a href="#" hidden><i class="bi bi-bank"></i>Ekonomia</a>
      <a href="#" hidden><i class="bi bi-cpu"></i>AI</a>
      <a href="#" hidden><i class="bi bi-briefcase"></i>Punësimi</a>
      <a href="#" hidden><i class="bi bi-heart-pulse"></i>Shëndeti</a>
      <a href="#" hidden><i class="bi bi-cart"></i>Commerce</a>
      <a href="#" hidden><i class="bi bi-camera"></i>Lifestyle</a>
      <a href="#" hidden><i class="bi bi-journal"></i>Revista</a>
      <a href="#" hidden><i class="bi bi-chat-left-text"></i>Podcast</a>
      <a href="radio.php"><i class="bi bi-broadcast"></i>Radio</a>
      <a href="https://slopetravel.com" target="_blank"><i class="bi bi-signpost"></i>Udhëtime</a>
      <?php if (isset($_SESSION['username'])): ?>
  <a href="profile.php" class="active"><i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['username']) ?></a>
<?php else: ?>
  <a href="login.php"><i class="bi bi-person-circle"></i>Kyqu</a>
<?php endif; ?>
    </div>
  </div>
  <div class="content">
    <div class="content-left">
      <h2>Profili im</h2>
<form action="exec/logout.php" method="post">
  <button type="submit" class="btn btn-danger">Dil nga llogaria</button>
</form>
    </div>
<div class="content-right">
  <div class="ad-title">Reklama të sponsorizuara</div>
  <div id="ads-container">
    <p>Ngarkim i reklamave...</p>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
   <script>
            function notifyUnavailable() {
              alert("Kjo veçori nuk është ende e disponueshme!"); 
            }
    </script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  fetch("exec/loadadverts.php")
    .then(response => response.text())
    .then(html => {
      const container = document.getElementById("ads-container");
      container.innerHTML = html;

      const allAds = Array.from(container.querySelectorAll(".ad-box"));
      const groupSize = 10;
      let currentGroup = 0;

      if (allAds.length === 0) return;

      // Funksion për të shfaqur vetëm një grup
      function showGroup(index) {
        allAds.forEach(ad => ad.style.display = "none");
        const start = index * groupSize;
        const end = start + groupSize;
        for (let i = start; i < end && i < allAds.length; i++) {
          allAds[i].style.display = "block";
        }
      }

      showGroup(currentGroup); // shfaq grupin e parë

      if (allAds.length > groupSize) {
        setInterval(() => {
          currentGroup = (currentGroup + 1) % Math.ceil(allAds.length / groupSize);
          showGroup(currentGroup);
        }, 10000); // çdo 10 sekonda
      }
    })
    .catch(error => {
      document.getElementById("ads-container").innerHTML = "Gabim gjatë ngarkimit të reklamave.";
      console.error(error);
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const banners = document.querySelectorAll(".advert-top .banner-img");
  let current = 0;

  if (banners.length === 0) return;

  banners[current].classList.add("active");

  if (banners.length > 1) {
    setInterval(() => {
      banners[current].classList.remove("active");
      current = (current + 1) % banners.length;
      banners[current].classList.add("active");
    }, 10000);
  }
});
</script>
</html>
