<?php
session_start();

// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'bimbel';
$koneksi = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencari user berdasarkan username
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $koneksi->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verifikasi password
        if ($password === $row['password']) {
            // Set session
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];

            // Cek peran pengguna dan arahkan ke halaman yang sesuai
            if ($_SESSION['role'] == 'admin') {
                // Pengguna adalah admin, arahkan ke halaman admin
                header("Location: viewtableuser.php");
            } elseif ($_SESSION['role'] == 'user') {
                // Pengguna adalah user, arahkan ke halaman paket_belajar
                header("Location: ../Paket Belajar/index.php");
            } elseif ($_SESSION['role'] == 'pelajar') {
                // Pengguna adalah pelajar, cek pembayaran dan arahkan sesuai
                $sql_pembayaran = "SELECT * FROM pembayaran WHERE userId='$userId'";
                $result_pembayaran = $koneksi->query($sql_pembayaran);

                if ($result_pembayaran->num_rows > 0) {
                    $row_pembayaran = $result_pembayaran->fetch_assoc();
                    $jumlah_pembayaran = $row_pembayaran['jumlah_pembayaran'];

                    // Memeriksa jumlah pembayaran dan mengarahkan ke halaman yang sesuai
                    switch ($jumlah_pembayaran) {
                        case 2000000:
                            // Pengguna melakukan pembayaran sebesar 2000000, arahkan ke zen_fokus_kelas.php
                            header("Location: ../kelas/cerdas_fokus_kelas.php");
                            break;
                        case 500000:
                            // Pengguna melakukan pembayaran sebesar 500000, arahkan ke ultima_kelas.php
                            header("Location: ../kelas/ultima_kelas.php");
                            break;
                        case 300000:
                            // Pengguna melakukan pembayaran sebesar 300000, arahkan ke aktiva_kelas.php
                            header("Location: ../kelas/aktiva_kelas.php");
                            break;
                        case 0:
                            // Pengguna melakukan pembayaran sebesar 0, arahkan ke basic_kelas.php
                            header("Location: ../kelas/basic_kelas.php");
                            break;
                        default:
                            // Jumlah pembayaran tidak sesuai dengan kriteria yang ditentukan
                            echo "<script>alert('Jumlah pembayaran tidak valid');</script>";
                            break;
                    }
                } else {
                    // Pengguna tidak ditemukan di tabel pembayaran, arahkan ke halaman ../Paket Belajar/index.php
                    header("Location: ../Paket Belajar/index.php");
                }
            }

            exit(); // Penting: Keluar dari skrip setelah mengarahkan pengguna
        } else {
            echo "<script>alert('Password Salah!');</script>";
        }
    } else {
        echo "<script>alert('User tidak ditemukan');</script>";
    }
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Inter&family=Montserrat&family=Russo+One&display=swap" rel="stylesheet" />
  <title>Document</title>
  <link rel="stylesheet" href="datastyle.css" />
</head>
<body>
  <main>
  <form action="" method="post">
    <div class="arrow-back">
      <a href="../index.php">
        <img src="../img/arrow_white.png" width="35px" height="35px" alt="">
      </a>
    </div>
    <div class="wrapper">
      <div class="login_box">
        <div class="login-header">
          <span>Login</span>
        </div>

        <div class="input_box">
          <input type="text" name="username" id="username" class="input-field" required>
          <label for="username" class="label">Username</label>
        </div>

        <div class="input_box">
          <input type="password" name="password" id="password" class="input-field" required>
          <label for="password" class="label">Password</label>
        </div>

        <div class="input_box">
          <input type="submit" class="input-submit" value="Login">
        </div>

        <div class="register">
          <span>Don't Have An Account? <a href="register.php">Register</a></span>
        </div>
      </div>
    </div>
  </form>
  </main>
</body>
</html>
