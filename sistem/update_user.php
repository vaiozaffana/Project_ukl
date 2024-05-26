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
if (isset($_POST['update'])) {
    $userId = $_POST['userId'];
    $newUsername = $_POST['newUsername'];
    $newEmail = $_POST['newEmail'];

    // Mulai proses transaksi
    $koneksi->begin_transaction();

    try {
        // Ambil username lama sebelum diupdate
        $sql_select_old_username = "SELECT username FROM users WHERE userId='$userId'";
        $result_old_username = $koneksi->query($sql_select_old_username);
        $row_old_username = $result_old_username->fetch_assoc();
        $oldUsername = $row_old_username['username'];

        // Query untuk mengupdate username, email, dan password di tabel users
        $sql_update_user = "UPDATE users SET username='$newUsername', email='$newEmail' WHERE userId='$userId'";
        if (!$koneksi->query($sql_update_user)) {
            throw new Exception("Error updating users table: " . $koneksi->error);
        }

        // Query untuk mengupdate username di tabel pembayaran
        $sql_update_pembayaran = "UPDATE pembayaran SET username='$newUsername' WHERE username='$oldUsername'";
        if (!$koneksi->query($sql_update_pembayaran)) {
            throw new Exception("Error updating pembayaran table: " . $koneksi->error);
        }

        // Query untuk mengupdate username di tabel pertemuan
        $sql_update_pembayaran = "UPDATE pertemuan SET username='$newUsername' WHERE username='$oldUsername'";
        if (!$koneksi->query($sql_update_pembayaran)) {
            throw new Exception("Error updating pembayaran table: " . $koneksi->error);
        }

        $koneksi->commit();
        echo "<script>alert('User berhasil diperbarui');</script>";
        echo "<script>window.location.href = 'viewtableuser.php';</script>";
        exit;
    } catch (Exception $e) {
        $koneksi->rollback();
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
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
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap" rel="stylesheet">
<title>Update User</title>
<link rel="stylesheet" href="datastyle.css" />
</head>
<body>
<main>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
<input type="email" name="newEmail" value="<?php echo $row['email']; ?>" id="email" class="input-field" required>
<label for="user" class="label">Email</label>
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
