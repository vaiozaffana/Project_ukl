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
        if (password_verify($password, $row['password'])) {
            // Set session
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];

            // Redirect sesuai role
            if ($_SESSION['role'] == 'admin') {
                header("Location: CRUD.php");
            } else {
                header("Location: ../dashboard.php");
            }
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
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
      <span>Don't Have An Account <a href="register.php">Register</a></span>
    </div>
  </div>
</div>
      </form>
  </main>
</body>

</html>