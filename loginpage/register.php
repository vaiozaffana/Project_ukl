<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $role = 'user'; // Role default untuk user baru

  // Periksa apakah username sudah ada
  $sql_check_username = "SELECT * FROM users WHERE username='$username'";
  $result_check_username = $koneksi->query($sql_check_username);

  if ($result_check_username->num_rows > 0) {
      echo "<script> alert('Username sudah digunakan!')</script>";
  } else {
      // Periksa apakah password sama dengan username
      if ($username == $password) {
          echo "<script> alert('Password tidak boleh sama dengan username!')</script>";
      } else {
          // Enkripsi password sebelum disimpan
          $password_hash = password_hash($password, PASSWORD_DEFAULT);

          // Query untuk insert user baru ke database
          $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password_hash', '$role')";

          if ($koneksi->query($sql) === TRUE) {
              header( "Location: login.php" );
          } else {
              echo "Error: " . $sql . "<br>" . $koneksi->error;
          }
      }
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
    <link
      href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Inter&family=Montserrat&family=Russo+One&display=swap"
      rel="stylesheet"
    />
    <title>Document</title>
    <link rel="stylesheet" href="datastyle.css" />
  </head>
  <body>
    <main>
      <form action="" method="post">
      <div class="wrapper">
  <div class="login_box">
    <div class="login-header">
      <span>Register</span>
    </div>

    <div class="input_box">
      <input type="text" name="username" id="username" class="input-field" required>
      <label for="user" class="label">Username</label>
    </div>

    <div class="input_box">
      <input type="password" name="password" id="password" class="input-field" required>
      <label for="pass" class="label">Password</label>
    </div>

    <div class="input_box">
      <input type="submit" class="input-submit" value="Register">
    </div>

    <div class="register">
      <span>Already have an account? <a href="login.php">Login</a></span>
    </div>
  </div>
</div>
      </form>
    </main>
  </body>
</html>
