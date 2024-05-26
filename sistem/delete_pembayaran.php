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
    $id_pembayaran = $_POST['id'];

    // Mulai transaksi
    $koneksi->begin_transaction();

    try {
        // Ambil username yang terkait dengan pembayaran yang akan dihapus
        $sql_get_username = "SELECT username FROM pembayaran WHERE id_pembayaran='$id_pembayaran'";
        $result = $koneksi->query($sql_get_username);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $username = $row['username'];

            // Query untuk menghapus pembayaran
            $sql_delete_pembayaran = "DELETE FROM pembayaran WHERE id_pembayaran='$id_pembayaran'";
            if (!$koneksi->query($sql_delete_pembayaran)) {
                throw new Exception("Error deleting from pembayaran table: " . $koneksi->error);
            }

            // Query untuk menghapus pertemuan
            $sql_delete_pertemuan = "DELETE FROM pertemuan WHERE username='$username'";
            if (!$koneksi->query($sql_delete_pertemuan)) {
                throw new Exception("Error deleting from pembayaran table: " . $koneksi->error);
            }

            // Query untuk mengubah role menjadi 'user' di tabel users
            $sql_update_role = "UPDATE users SET role='user' WHERE username='$username'";
            if (!$koneksi->query($sql_update_role)) {
                throw new Exception("Error updating users table: " . $koneksi->error);
            }

            // Commit transaksi
            $koneksi->commit();
            echo "<script>alert('Pembayaran berhasil dihapus dan role pengguna diubah menjadi user');</script>";
            echo "<script>window.location.href = 'viewtablepembayaran.php';</script>";
            exit();
        } else {
            throw new Exception("Username tidak ditemukan");
        }
    } catch (Exception $e) {
        // Rollback transaksi jika terjadi error
        $koneksi->rollback();
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Delete Pembayaran</title>
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
<h2>Delete Pembayaran</h2>
<p>Apakah Anda yakin ingin menghapus pembayaran ini?</p>

<div>
<a href="viewtablepembayaran.php">Batalkan</a>
<form method="post" action="">
    <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? htmlspecialchars($_GET['id']) : ''; ?>">
    <input type="submit" value="Delete">
</form>
</div>

</body>
</html>
