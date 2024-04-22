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

// Periksa apakah ada data yang dikirimkan dari form update
if(isset($_POST['update'])) {
    $userId = $_POST['userId'];
    $newUsername = $_POST['newUsername'];
    $newPassword = $_POST['newPassword'];

    // Query untuk mengupdate username dan password
    $sql = "UPDATE users SET username='$newUsername', password='$newPassword' WHERE userId='$userId'";
    if ($koneksi->query($sql) === TRUE) {
        header("Location: CRUD.php");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Ambil data user yang akan diupdate
$userId = $_GET['id'];
$sql = "SELECT * FROM users WHERE userId='$userId'";
$result = $koneksi->query($sql);
$row = $result->fetch_assoc();
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
      <form action=""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"" method="post">
      <div class="wrapper">
  <div class="login_box">
    <div class="login-header">
      <span>Update</span>
    </div>

    <input type="hidden" name="userId" value="<?php echo $row['userId']; ?>">

    <div class="input_box">
      <input type="text" name="newUsername" value="<?php echo $row['username']; ?>" id="username" class="input-field" required>
      <label for="user" class="label">Username</label>
    </div>

    <div class="input_box">
      <input type="password" name="newPassword" value="<?php echo $row['password']; ?>" id="password" class="input-field" required>
      <label for="pass" class="label">Password</label>
    </div>

    <div class="input_box">
      <input type="submit" class="input-submit" name="update" value="Update">
    </div>
  </div>
      </div>
      </form>
    </main>

</body>
</html>