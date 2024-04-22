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
if(isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Query untuk menghapus user
    $sql = "DELETE FROM users WHERE userId='$userId'";
    if ($koneksi->query($sql) === TRUE) {
        echo "";
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
    background-image: linear-gradient(to bottom, #fe5c89, #a7a7a7);
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
  text-decoration: none;
  color: white;
}

  a:focus {
    color: black;
  }

    </style>
</head>
<body>
    <h2>Delete User</h2>
    <p>Apakah Anda yakin ingin menghapus pengguna ini?</p>

   <a href="CRUD.php">Delete</a>

</body>
</html>
