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

// Periksa apakah ada data yang dikirimkan untuk delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $userId = $_POST['id'];
    $id_pembayaran = $_['id'];
    $idPertemuan = $_['id'];

    // Query untuk menghapus user
    $sql = "DELETE FROM users WHERE userId='$userId'";
    if ($koneksi->query($sql) === TRUE) {
        // Redirect ke halaman daftar pengguna setelah penghapusan
        header("Location: viewtableuser.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    // Query untuk menghapus user di table pembayaran
    $sql = "DELETE FROM pembayaran WHERE id_pembayaran='$id_pembayaran'";
    if ($koneksi->query($sql) === TRUE) {
        // Redirect ke halaman daftar pengguna setelah penghapusan
        header("Location: viewtableuser.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    // Query untuk menghapus user di table pertemuan
    $sql = "DELETE FROM pertemuan WHERE idPertemuan='$idPertemuan'";
    if ($koneksi->query($sql) === TRUE) {
        // Redirect ke halaman daftar pengguna setelah penghapusan
        header("Location: viewtableuser.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Delete User</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap" rel="stylesheet">
<style>
* {
    color: #fff;
    background-color: #1f2937;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

body {
    font-family: "Montserrat";
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

a {
    font-size: 20px;
    color: white;
}

a:focus {
    color: black;
}

input {
  font-size: 20px;
  background-color: transparent;
  border: none;
  text-decoration: underline;
  margin-left: 12px;
  cursor: pointer;
}

div {
  display: flex;
}

</style>
</head>
<body>
<h2>Delete User</h2>
<p>Apakah Anda yakin ingin menghapus pengguna ini?</p>

<div>
<a href="viewtableuser.php">Batalkan</a>
<form method="post" action="">
    <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? htmlspecialchars($_GET['id']) : ''; ?>">
    <input type="submit" value="Delete">
</form>
</div>

</body>
</html>
