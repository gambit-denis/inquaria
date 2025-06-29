<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inquaria • Regjistrimi</title>
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
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  padding-top: 5vh;
  padding-left: 0; /* ose max 100px */
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
      max-width: 600px;
    }
    .form-control {
      border-radius: 8px;
    }
    .btn-primary {
      background-color: #002B45;
      border: none;
      width: 505px !important;
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
.news-wrapper {
  background-color: #f9f8f4;
  padding: 50px;
  border: 1px solid #ddd;
  border-radius: 12px;
  max-width: 800px;
  width: 100%;
  margin: 0 auto;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
  text-align: center; /* ✅ center form and title */
}
form {
  width: 100%;
  max-width: 700px;
  margin: 0 auto;
  text-align: left;
}
.news-title {
  margin-top: 30px;
  font-size: 1.8rem;
  color: #002B45;
  font-weight: bold;
}
form .mb-3 {
  margin-bottom: 1.3rem !important;
}
.btn-primary {
  background-color: #002B45;
  border: none;
  border-radius: 8px;
  padding: 12px 0;
  font-weight: 600;
  font-size: 16px;
  width: 505px; /* fiksoje si inputet */
}

.btn-primary:hover {
  background-color: #004a75;
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
      <a href="login.php" class="active"><i class="bi bi-person-circle"></i>Kyqu</a>
    </div>
  </div>

  <div class="content">
<div class="content-left">
  <div class="news-wrapper text-center">
    <img src="/images/logo.png" alt="logo" style="width: 80px; height: 80px; margin-bottom: 10px;">
    <h2 class="news-title mb-4">Regjistrimi | Krijimi i llogarisë së re</h2>
    
    <form method="post" id="registerForm" class="text-start">
      <div class="d-flex align-items-center gap-3 mb-3">
        <div class="w-100">
          <label for="firstname" class="form-label">Emri:</label>
          <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Emri juaj">
        </div>
        <div class="w-100">
          <label for="lastname" class="form-label">Mbiemri:</label>
          <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Mbiemri juaj">
        </div>
      </div>

      <div class="d-flex align-items-center gap-3 mb-3">
        <div class="w-100">
          <label for="cityid" class="form-label">Qyteti</label>
          <select class="form-select" name="cityid" id="cityid">
            <option value="" disabled selected>Ngarkim...</option>
          </select>
        </div>
        <div class="w-100">
          <label for="birthday" class="form-label">Data e lindjes</label>
          <input type="date" name="birthday" class="form-control" id="birthday">
        </div>
      </div>

      <div class="mb-3">
        <label for="username" class="form-label">Përdoruesi:</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Shkruani përdoruesin">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email adresa</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Shkruani email-in">
      </div>

      <div class="d-flex align-items-center gap-3 mb-3">
        <div class="w-100">
          <label for="sourceid" class="form-label">Referenca</label>
          <select class="form-select" name="sourceid" id="sourceid">
            <option value="" disabled selected>Ngarkim...</option>
          </select>
        </div>
        <div class="w-100">
          <label for="refdetails" class="form-label">Detajet:</label>
          <input type="text" class="form-control" name="refdetails" id="refdetails" placeholder="Detajet e referencës">
        </div>
      </div>

      <div class="d-flex align-items-center gap-3 mb-4">
        <div class="w-100">
          <label for="password" class="form-label">Fjalëkalimi</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Fjalëkalimi">
        </div>
        <div class="w-100">
          <label for="confirmpassword" class="form-label">Konfirmo fjalëkalimin</label>
          <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Konfirmo fjalëkalimin">
        </div>
      </div>
<div style="text-align: center;">
  <button type="submit" class="btn btn-primary">Regjistrohu</button>
</div>
    </form>
  </div>
</div>
   <div class="content-right">
  <div class="ad-title">Reklama të sponsorizuara</div>
  <div id="ads-container">
    <p>Ngarkim i reklamave...</p>
  </div>
</div>
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
function fetchCities() {
  fetch('exec/getcities.php')
    .then(response => response.json())
    .then(data => {
      const destinationSelect = document.getElementById('cityid');
      destinationSelect.innerHTML = '<option value="" disabled selected>Përzgjedh qytetin</option>';
      data.destinations.forEach(destination => {
        const option = document.createElement('option');
        option.value = destination.CITYID;
        option.textContent = destination.IDENTIFIER;
        destinationSelect.appendChild(option);
      });
    })
    .catch(error => {
      console.error('Gabim gjatë marrjes së qyteteve:', error);
    });
}

document.addEventListener("DOMContentLoaded", fetchCities);

function fetchSources() {
  fetch('exec/getsources.php')
    .then(response => response.json())
    .then(data => {
      const sourceSelect = document.getElementById('sourceid');
      sourceSelect.innerHTML = '<option value="" disabled selected>Përzgjedh referencen</option>';
      data.sources.forEach(source => {
        const option = document.createElement('option');
        option.value = source.SOURCEID;
        option.textContent = source.IDENTIFIER;
        sourceSelect.appendChild(option);
      });
    })
    .catch(error => {
      console.error('Gabim gjatë marrjes së referencave:', error);
    });
}

document.addEventListener("DOMContentLoaded", fetchSources);
</script>
  <script>
    document.getElementById('registerForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const formData = new FormData(this);

      fetch('exec/adduser.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert('Regjistrimi u krye me sukses!');
          window.location.href = 'login.php';
        } else {
          alert('Gabim: ' + data.message);
        }
      })
      .catch(error => {
        console.error('Gabim:', error);
        alert('Ndodhi një gabim gjatë regjistrimit.');
      });
    });
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
