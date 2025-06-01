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
  <title>Inquaria • Radio</title>
   <link rel="icon" href="/images/logo.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
      flex-direction: row;
      padding: 0 20px 0 335px;
      margin-top: 10px;
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
  background-color: #ffffff;
  padding: 30px;
  border: 1px solid #ddd;
  border-radius: 8px;
  max-width: 1000px; /* increase this */
  width: 100%;
  margin: 0 auto;
}

.news-title {
  font-size: 2rem;
  color: #002B45;
  font-weight: bold;
}

.social-buttons a {
  display: inline-flex;
  align-items: center;
  margin-right: 10px;
  text-decoration: none;
  color: #fff;
  padding: 6px 12px;
  font-size: 0.9rem;
  border-radius: 5px;
  transition: background-color 0.2s;
}

.social-buttons .facebook { background-color: #3b5998; }
.social-buttons .twitter { background-color: #1da1f2; }
.social-buttons .instagram { background-color: #e4405f; }

.social-buttons a:hover {
  opacity: 0.9;
}

.social-buttons i {
  margin-right: 6px;
}
.video-player {
  width: 100%;
  max-width: 800px;
  height: auto;
  border-radius: 10px;
  border: 1px solid #ccc;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.ps-3 p {
  margin-bottom: 6px;
  font-size: 0.95rem;
}
.program-section-title {
  font-size: 1.7rem;
  color: #002B45;
  padding-left: 12px;
  font-weight: 600;
  margin-top: 550px;
  padding: 10px 0;
}

.program-day-header {
  font-size: 30px;
  color: #0056b3;
  border-bottom: 1px solid #ddd;
  padding-bottom: 5px;
  padding: 10px 0;
}

.program-line {
  padding: 10px 0;
  margin: 0;
  border-bottom: 1px solid #eee;
  font-size: 0.95rem;
  color: #333;
}

.program-group {
  margin-left: 10px;
}
.schema-program {
  margin-top: 120px;
  padding: 10px;
  background-color: #f9f8f4;
  border-radius: 8px;
  border: 1px solid #ddd;
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
      <a href="radio.php" class="active"><i class="bi bi-broadcast"></i>Radio</a>
      <a href="https://slopetravel.com" target="_blank"><i class="bi bi-signpost"></i>Udhëtime</a>
<?php if (isset($_SESSION['username'])): ?>
  <a href="profile.php"><i class="bi bi-person-circle"></i> <?= htmlspecialchars($_SESSION['username']) ?></a>
<?php else: ?>
  <a href="login.php"><i class="bi bi-person-circle"></i>Kyqu</a>
<?php endif; ?>
    </div>
  </div>

  <div class="content">
      <div class="content-left">
  <div class="news-wrapper">
    <h1 class="news-title mb-3">🎧 Live Radio | Inquaria</h1>

  <div class="text-center my-4">
  <video id="radioVideo" class="video-player" autoplay muted loop playsinline>
    <source src="/images/video.webm" type="video/webm">
    Shfletuesi juaj nuk e suporton këtë video.
  </video>
</div>
    <p class="text-muted mt-2">Hapësirë reklamuese! Reklamo këtu!</p>

    <audio controls id="radio" class="w-100 mb-3">
      <source src="http://80.80.162.204:8000/stream" type="audio/mpeg">
      Shfletuesi juaj nuk e suporton këtë audio player!
    </audio>

    <div class="social-buttons mt-3">
      <a class="facebook" href="https://www.facebook.com/share.php?u=http://inquaria.com/radio.php" target="_blank">
        <i class="fab fa-facebook-f"></i> Facebook
      </a>
      <a class="twitter" href="https://twitter.com/intent/tweet?url=http://inquaria.com/radio.php" target="_blank">
        <i class="fab fa-twitter"></i> Twitter
      </a>
      <a class="instagram" href="https://www.instagram.com/inquaria.ks" target="_blank">
        <i class="fab fa-instagram"></i> Instagram
      </a>
    </div>
<div class="schema-program" id="program-schema-container">
  <p>Ngarkim i skemës programore...</p>
</div>
  </div>
</div>

 <div class="content-right">
  <div class="ad-title">Reklama të sponsorizuara</div>
  <div id="ads-container">
    <p>Ngarkim i reklamave...</p>
  </div>
</div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
    <script>
        function startRadio() {
            let radio = document.getElementById("radio");
            radio.play().then(() => {
                console.log("Radio started playing");
            }).catch(error => {
                console.log("Autoplay blocked: User interaction required.");
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
        let advertVideo = document.getElementById('advertVideo');

        // Use a timeout to add a small delay before playing
        setTimeout(function() {
            advertVideo.play().catch(function(error) {
                console.log("Autoplay was blocked. Trying again after a short delay.");
                setTimeout(function() {
                    advertVideo.play(); // Try playing again after a second delay
                }, 1000);
            });
        }, 500); // Add a 500ms delay before attempting to play

        // Listen for when the ad video ends
        advertVideo.addEventListener('ended', function() {
            // Restart the video when it ends
            advertVideo.currentTime = 0; // Reset to the start
            advertVideo.play(); // Play again
        });
    });

        document.addEventListener("DOMContentLoaded", function() {
            let radio = document.getElementById("radio");
            let playButton = document.getElementById("playButton");

            radio.play().then(() => {
            radio.muted = false;
            radio.volume = 1.0;
            playIcon.classList.replace("fa-play", "fa-pause"); // Change icon to pause
        }).catch(error => {
            console.log("Autoplay blocked, play button required.");
            playButton.style.display = "inline-block"; // Ensure button is visible
        });

        // Play/Pause when clicking the button
        playButton.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent page reload
            if (radio.paused) {
                radio.play();
                playIcon.classList.replace("fa-play", "fa-pause"); // Change icon to pause
            } else {
                radio.pause();
                playIcon.classList.replace("fa-pause", "fa-play"); // Change icon back to play
            }
        });
    });
    // Set the current year dynamically
    document.getElementById("year").textContent = new Date().getFullYear();
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
<script>
document.addEventListener("DOMContentLoaded", function () {
  function loadProgramSchema() {
    fetch("exec/loadprogramschema.php")
      .then(response => response.text())
      .then(html => {
        document.getElementById("program-schema-container").innerHTML = html;
      })
      .catch(err => {
        document.getElementById("program-schema-container").innerHTML = "<p class='text-danger'>Gabim gjatë rifreskimit të skemës.</p>";
        console.error(err);
      });
  }

  loadProgramSchema(); // Load initially

  // Auto-refresh every 5 minutes (300,000 milliseconds)
  setInterval(loadProgramSchema, 60000);
});
</script>

</html>
