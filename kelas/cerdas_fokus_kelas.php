<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cerdas Fokus</title>
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

// Koneksi ke database
$host = 'localhost';
$username_db = 'root';
$password_db = '';
$database = 'bimbel';
$koneksi = new mysqli($host, $username_db, $password_db, $database);

if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

// Mendapatkan userId berdasarkan username
$userId = null;
$result = $koneksi->query("SELECT userId FROM users WHERE username = '$username'");
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $userId = $row['userId'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sesi_submit'])) {
  $durasi = $_POST['durasi'];
  $tanggal = $_POST['tanggal'];
  $jam = $_POST['waktu'];

  $query = "INSERT INTO pertemuan (durasi, tanggal, waktu, username) VALUES ('$durasi', '$tanggal', '$jam', '$username')";
  if ($koneksi->query($query) === TRUE) {
    echo "<script>alert('Pemesanan sesi berhasil.');</script>";
  } else {
    echo "<script>alert('Terjadi kesalahan, silakan coba lagi.');</script>";
  }
}
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
        <h3>Cerdas Fokus</h3>
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
              <h4>Sesi 1 On 1</h4>
              <div class="session-time">
                <div class="label-session-time">
                  <form action="" method="post">
                    <label class="label-session" for="text">Waktu:</label>
                    <input name="tanggal" type="date" required>
                </div>
                <div class="label-session-time">
                  <label class="label-session" for="text">Jam:</label>
                  <input name="waktu" class="time-input" type="time" required>
                </div>
                <div class="label-session-time">
                  <label class="label-session" for="text">Durasi:</label>
                  <input name="durasi" class="duration-input" type="text" required>
                </div>
              </div>
              <input type="submit" name="sesi_submit" class="session-submit" value="Kirim">
              </form>
              <h4>Live Class Exclusive</h4>
              <div class="live-class">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" width="30px" height="30px">
                  <g id="Right-2" data-name="Right">
                    <polygon points="17.5 5.999 16.793 6.706 22.086 11.999 1 11.999 1 12.999 22.086 12.999 16.792 18.294 17.499 19.001 24 12.499 17.5 5.999" style="fill:#FFFFFF" />
                  </g>
                </svg>
                <a href="#">Zoom</a>
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
            <h4>Sesi 1 On 1</h4>
              <div class="session-time">
                <div class="label-session-time">
                  <form action="" method="post">
                    <label class="label-session" for="text">Waktu:</label>
                    <input name="tanggal" type="date" required>
                </div>
                <div class="label-session-time">
                  <label class="label-session" for="text">Jam:</label>
                  <input name="waktu" class="time-input" type="time" required>
                </div>
                <div class="label-session-time">
                  <label class="label-session" for="text">Durasi:</label>
                  <input name="durasi" class="duration-input" type="text" required>
                </div>
              </div>
              <input type="submit" name="sesi_submit" class="session-submit" value="Kirim">
              </form>
              <h4>Live Class Exclusive</h4>
              <div class="live-class">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" width="30px" height="30px">
                  <g id="Right-2" data-name="Right">
                    <polygon points="17.5 5.999 16.793 6.706 22.086 11.999 1 11.999 1 12.999 22.086 12.999 16.792 18.294 17.499 19.001 24 12.499 17.5 5.999" style="fill:#FFFFFF" />
                  </g>
                </svg>
                <a href="#">Zoom</a>
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
            <h4>Sesi 1 On 1</h4>
              <div class="session-time">
                <div class="label-session-time">
                  <form action="" method="post">
                    <label class="label-session" for="text">Waktu:</label>
                    <input name="tanggal" type="date" required>
                </div>
                <div class="label-session-time">
                  <label class="label-session" for="text">Jam:</label>
                  <input name="waktu" class="time-input" type="time" required>
                </div>
                <div class="label-session-time">
                  <label class="label-session" for="text">Durasi:</label>
                  <input name="durasi" class="duration-input" type="text" required>
                </div>
              </div>
              <input type="submit" name="sesi_submit" class="session-submit" value="Kirim">
              </form>
              <h4>Live Class Exclusive</h4>
              <div class="live-class">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" width="30px" height="30px">
                  <g id="Right-2" data-name="Right">
                    <polygon points="17.5 5.999 16.793 6.706 22.086 11.999 1 11.999 1 12.999 22.086 12.999 16.792 18.294 17.499 19.001 24 12.499 17.5 5.999" style="fill:#FFFFFF" />
                  </g>
                </svg>
                <a href="#">Zoom</a>
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