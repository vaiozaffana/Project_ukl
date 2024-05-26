<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ultima</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bakbak+One&family=Montserrat:ital@0;1&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="kelas.css">
</head>

<body>
<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: index.php'); // Redirect ke halaman index jika tidak ada username di sesi
  exit();
}
$username = $_SESSION['username'];
?>

  <header>
    <div class="container">
      <div class="place-user">
        <img class="img-user" src="../img/default_user.png" width="50px" height="50px" alt="">
        <h2>Halo, <?php echo htmlspecialchars($username); ?> !</h2>
      </div>
      <nav>
        <ul>
          <li><a href="../sistem/logout.php" class="contact-btn">Log out</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <section class="services-section">
      <div class="container">
        <h3>Ultima</h3>
        <div class="services-grid">

          <div class="container-mapel">
            <div class="container-profile">
              <div class="profile-wrapper">
                <div class="profile">
                  <div class="profile-image">
                    <img src="../img/Matematika.png" alt="Profile" />
                  </div>
                  <div class="profile-name">
                    <div class="profile-bio">
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="material-class-list">
              <div class="class-list">
                <a href="#">I. Persamaan Kuadrat</a>
              </div>
              <div class="class-list">
                <a href="#">II. Fungsi</a>
              </div>
              <div class="class-list">
                <a href="#">III. Geometri 3D</a>
              </div>
              <div class="class-list">
                <a href="#">IV. Trigonometri</a>
              </div>
              <div class="class-list">
                <a href="#">V. Analisis Data</a>
              </div>
              <div class="class-list">
                <a href="#">VI. Probabilitas</a>
              </div>
              <div class="class-list">
                <a href="#">VII. Integral</a>
              </div>
            </div>

            <div class="class-benefit">
              <h4>Join CerdasClub</h4>
              <div class="live-class">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" width="30px" height="30px">
                  <g id="Right-2" data-name="Right">
                    <polygon points="17.5 5.999 16.793 6.706 22.086 11.999 1 11.999 1 12.999 22.086 12.999 16.792 18.294 17.499 19.001 24 12.499 17.5 5.999" style="fill:#FFFFFF" />
                  </g>
                </svg>
                <a href="#">Discord</a>
              </div>
              <h4>Akses Soal & Pembahasan</h4>
              <div class="live-class">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" width="30px" height="30px">
                  <g id="Right-2" data-name="Right">
                    <polygon points="17.5 5.999 16.793 6.706 22.086 11.999 1 11.999 1 12.999 22.086 12.999 16.792 18.294 17.499 19.001 24 12.499 17.5 5.999" style="fill:#FFFFFF" />
                  </g>
                </svg>
                <a href="#">Soal & Pembahasan</a>
              </div>
              <h4>Akses Video</h4>
              <div class="live-class">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" width="30px" height="30px">
                  <g id="Right-2" data-name="Right">
                    <polygon points="17.5 5.999 16.793 6.706 22.086 11.999 1 11.999 1 12.999 22.086 12.999 16.792 18.294 17.499 19.001 24 12.499 17.5 5.999" style="fill:#FFFFFF" />
                  </g>
                </svg>
                <a href="#">Video</a>
              </div>
            </div>
          </div>

          <div class="container-mapel">
            <div class="container-profile">
              <div class="profile-wrapper">
                <div class="profile">
                  <div class="profile-image">
                    <img src="../img/Binggris.png" alt="Profile" />
                  </div>
                  <div class="profile-name">
                    <div class="profile-bio">
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="material-class-list">
            <div class="class-list">
                <a href="#">I. Common Phrases and Expressions</a>
              </div>
              <div class="class-list">
                <a href="#">II. Vocabulary in Context</a>
              </div>
              <div class="class-list">
                <a href="#">III. Verb Tenses</a>
              </div>
              <div class="class-list">
                <a href="#">IV. Modals</a>
              </div>
              <div class="class-list">
                <a href="#">V. Conditional Sentences</a>
              </div>
              <div class="class-list">
                <a href="#">VI. Identifying Main Ideas</a>
              </div>
              <div class="class-list">
                <a href="#">VII. Identifying Supporting Details</a>
              </div>
            </div>

            <div class="class-benefit">
              <h4>Join CerdasClub</h4>
              <div class="live-class">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" width="30px" height="30px">
                  <g id="Right-2" data-name="Right">
                    <polygon points="17.5 5.999 16.793 6.706 22.086 11.999 1 11.999 1 12.999 22.086 12.999 16.792 18.294 17.499 19.001 24 12.499 17.5 5.999" style="fill:#FFFFFF" />
                  </g>
                </svg>
                <a href="#">Discord</a>
              </div>
              <h4>Akses Soal & Pembahasan</h4>
              <div class="live-class">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" width="30px" height="30px">
                  <g id="Right-2" data-name="Right">
                    <polygon points="17.5 5.999 16.793 6.706 22.086 11.999 1 11.999 1 12.999 22.086 12.999 16.792 18.294 17.499 19.001 24 12.499 17.5 5.999" style="fill:#FFFFFF" />
                  </g>
                </svg>
                <a href="#">Soal & Pembahasan</a>
              </div>
              <h4>Akses Video</h4>
              <div class="live-class">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" width="30px" height="30px">
                  <g id="Right-2" data-name="Right">
                    <polygon points="17.5 5.999 16.793 6.706 22.086 11.999 1 11.999 1 12.999 22.086 12.999 16.792 18.294 17.499 19.001 24 12.499 17.5 5.999" style="fill:#FFFFFF" />
                  </g>
                </svg>
                <a href="#">Video</a>
              </div>
            </div>

          </div>

          <div class="container-mapel">
            <div class="container-profile">
              <div class="profile-wrapper">
                <div class="profile">
                  <div class="profile-image">
                    <img src="../img/Bindo.png" alt="Profile" />
                  </div>
                  <div class="profile-name">
                    <div class="profile-bio">
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="material-class-list">
            <div class="class-list">
                <a href="#">I. Ejaan dan Tata Bahasa</a>
              </div>
              <div class="class-list">
                <a href="#">II. Kosa Kata</a>
              </div>
              <div class="class-list">
                <a href="#">III. Penggunaan Kata</a>
              </div>
              <div class="class-list">
                <a href="#">IV. Struktur Kalimat</a>
              </div>
              <div class="class-list">
                <a href="#">V. Penggunaan Kalimat dalam Konteks</a>
              </div>
              <div class="class-list">
                <a href="#">VI. Makna dan Kaidah</a>
              </div>
              <div class="class-list">
                <a href="#">VII. Paragraf dan Artikel</a>
              </div>
            </div>

            <div class="class-benefit">
              <h4>Join CerdasClub</h4>
              <div class="live-class">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" width="30px" height="30px">
                  <g id="Right-2" data-name="Right">
                    <polygon points="17.5 5.999 16.793 6.706 22.086 11.999 1 11.999 1 12.999 22.086 12.999 16.792 18.294 17.499 19.001 24 12.499 17.5 5.999" style="fill:#FFFFFF" />
                  </g>
                </svg>
                <a href="#">Discord</a>
              </div>
              <h4>Akses Soal & Pembahasan</h4>
              <div class="live-class">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" width="30px" height="30px">
                  <g id="Right-2" data-name="Right">
                    <polygon points="17.5 5.999 16.793 6.706 22.086 11.999 1 11.999 1 12.999 22.086 12.999 16.792 18.294 17.499 19.001 24 12.499 17.5 5.999" style="fill:#FFFFFF" />
                  </g>
                </svg>
                <a href="#">Soal & Pembahasan</a>
              </div>
              <h4>Akses Video</h4>
              <div class="live-class">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" width="30px" height="30px">
                  <g id="Right-2" data-name="Right">
                    <polygon points="17.5 5.999 16.793 6.706 22.086 11.999 1 11.999 1 12.999 22.086 12.999 16.792 18.294 17.499 19.001 24 12.499 17.5 5.999" style="fill:#FFFFFF" />
                  </g>
                </svg>
                <a href="#">Video</a>
              </div>
            </div>

          </div>

        </div>
      </div>
    </section>
  </main>

  <footer>
    <div class="container">
      <p>&copy; Bikin Cerdas, 2024.</p>
      <div class="reference">
        <h3>Sumber Referensi</h3>
        <a href="https://www.zenius.net/">Zenius</a>
      </div>
    </div>
  </footer>
</body>

</html>