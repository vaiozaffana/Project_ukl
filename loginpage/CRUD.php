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

// Query untuk mengambil semua user
$sql = "SELECT * FROM users";
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
        background-image: linear-gradient(to bottom, #fe5c89, #a7a7a7);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

        body {
            font-family: "Montserrat";
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>User List</h2>
    <table>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Username</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        $counter = 1; // inisialisasi counter
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$counter."</td>";
                echo "<td>".$row["userId"]."</td>";
                echo "<td>".$row["username"]."</td>";
                echo "<td>"."<a href='update_user.php?id=". $row["userId"] . "'>Update</a>"."</td>";
                echo "<td>"."<a href='delete_user.php?id=". $row["userId"] . "'>Delete</a>"."</td>";
                echo "</tr>";
                $counter++;
            }
        } else {
            echo "<tr><td colspan='3'>0 results</td></tr>";
        }
        ?>
    </table>
</body>
</html>
