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
if (isset($_POST['sesi_submit'])) {
    $idPertemuan = $_POST['idPertemuan'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $durasi = $_POST['durasi'];

    // Query untuk mengupdate data pertemuan
    $sql_update = "UPDATE pertemuan SET tanggal='$tanggal', waktu='$waktu', durasi='$durasi' WHERE idPertemuan='$idPertemuan'";
    if ($koneksi->query($sql_update) === TRUE) {
        echo "<script>alert('Pertemuan berhasil diperbarui');</script>";
        echo "<script>window.location.href = 'viewtablepertemuan.php';</script>";
        exit;
    } else {
        echo "Error: " . $sql_update . "<br>" . $koneksi->error;
    }
}

// Ambil data pertemuan yang akan diupdate
$idPertemuan = $_GET['id'];
$sql = "SELECT * FROM pertemuan WHERE idPertemuan='$idPertemuan'";
$result = $koneksi->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pertemuan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap" rel="stylesheet">
    <style>
        body {
            display: grid;
            place-items: center;
            height: 100vh;
            font-family: 'Montserrat', sans-serif;
            background-color: #0f172a;
        }
        .class-benefit {
            background-color: #fff;
            color: #0f172a;
            width: 350px;
            border-radius: 20px;
            margin-left: 12px;
        }

        .class-benefit h4 {
            margin-top: 32px;
            margin-left: 32px;
        }

        .session-time {
            display: flex;
            flex-direction: column;
        }

        .label-session-time .label-session {
            margin-left: 32px;
        }

        .time-input {
            margin-left: 17px;
        }

        .label-session-time .duration-input {
            width: 25%;
            border-bottom: 2px solid #0f172a;
            outline: #0f172a;
        }

        .label-session-time .label-time {
            margin-right: 25px;
        }

        .label-session-time .duration-input:focus {
            width: 25%;
            border-bottom: 2px solid #0f172a;
            outline: #0f172a;
        }

        .session-submit {
            margin-left: 32px;
            margin-top: 12px;
            margin-bottom: 32px;
            padding: 6px;
            background-color: #0f172a;
            color: #fff;
            border: 2px solid #fff;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        .session-submit:hover {
            margin-left: 32px;
            margin-top: 12px;
            padding: 6px;
            background-color: #fff;
            color: #0f172a;
            border: 2px solid #0f172a;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        .session-time input {
            background-color: transparent;
            color: #0f172a;
            border: none;
            outline: none;
        }

        .session-time input:focus {
            background-color: transparent;
            color: #0f172a;
            border: none;
            outline: none;
        }
    </style>
</head>

<body>
    <div class="class-benefit">
        <h4>Sesi 1 On 1</h4>
        <div class="session-time">
            <div class="label-session-time">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="idPertemuan" value="<?php echo $row['idPertemuan']; ?>">
                    <label class="label-session" for="text">Waktu:</label>
                    <input name="tanggal" type="date" value="<?php echo $row['tanggal']; ?>">
            </div>
            <div class="label-session-time">
                <label class="label-session" for="text">Jam:</label>
                <input name="waktu" class="time-input" type="time" value="<?php echo $row['waktu']; ?>">
            </div>
            <div class="label-session-time">
                <label class="label-session" for="text">Durasi:</label>
                <input name="durasi" class="duration-input" type="text" value="<?php echo $row['durasi']; ?>">
            </div>
        </div>
        <input type="submit" name="sesi_submit" class="session-submit" value="Update">
        </form>
    </div>
</body>

</html>
