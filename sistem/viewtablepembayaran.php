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

// Query untuk mengambil data pembayaran dengan informasi pengguna
$sql = "
    SELECT p.id_pembayaran, p.userId, p.tanggal_pembayaran, p.jumlah_pembayaran, p.metode_pembayaran, u.email
    FROM pembayaran p
    JOIN users u ON p.userId = u.userId
";
$result = $koneksi->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap" rel="stylesheet">
    <title>Tabel view</title>
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
        }

        .arrow-back {
            width: 15%;
            margin-top: 20px;
            margin-left: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid white;
            padding: 8px;
            text-align: left;
        }

        .btn-pembayaran {
            display: grid;
            border-radius: 10px;
            background-color: #000;
            color: #fff;
            padding: 10px;
            margin-top: 15px;
            text-decoration: none;
            text-align: center;
            align-items: center;
            justify-content: center;
            border: none;
        }
        button {
            padding: 10px;
            font-size: 15px;
            background-color: transparent;
            font-weight: 700;
            border: none;
            cursor: pointer;
        }
        a {
            text-decoration: none;
        }
        .place-pembayaran {
            display: flex;
            justify-content: end;
        }
        .btn-delete {
            padding: 2px;
            border-radius: 5px;
            background-color: #FF0000;
        }
    </style>
</head>
<body>

<div class="arrow-back">
    <a href="./login.php">
      <img src="../img/arrow_white.png" width="35px" height="35px" alt="">
    </a>
  </div>
  <div class="place-pembayaran">
  <a class="btn-pembayaran" href="viewtableuser.php"><button>User</button></a>
    </div>
    <div class="place-pembayaran">
  <a class="btn-pembayaran" href="viewtablepertemuan.php"><button>Pertemuan</button></a>
    </div>
    <h2>Pembayaran List</h2>
    <table>
        <tr>
            <th>No</th>
            <th>ID Pembayaran</th>
            <th>UserId</th>
            <th>Email</th>
            <th>Tanggal Pembayaran</th>
            <th>Jumlah Pembayaran</th>
            <th>Metode Pembayaran</th>
            <th>Delete</th>
        </tr>
        <?php
        $counter = 1; // inisialisasi counter
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$counter."</td>";
                echo "<td>".$row["id_pembayaran"]."</td>";
                echo "<td>".$row["userId"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo "<td>".$row["tanggal_pembayaran"]."</td>";
                echo "<td>".$row["jumlah_pembayaran"]."</td>";
                echo "<td>".$row["metode_pembayaran"]."</td>";
                echo "<td>"."<a class='btn-delete' href='delete_pembayaran.php?id=". $row["id_pembayaran"] . "'>Delete</a>"."</td>";
                echo "</tr>";
                $counter++;
            }
        } else {
            echo "<tr><td colspan='8'>0 results</td></tr>";
        }
        ?>
    </table>
</body>
</html>
