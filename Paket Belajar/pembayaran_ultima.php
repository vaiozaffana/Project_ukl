<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Method Payment</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: 'Montserrat', sans-serif;
            background-image: url('../sistem/color_paper.jpeg');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .payment-table {
            background-color: rgba(255, 255, 255, 0.4);
            -webkit-backdrop-filter: blur(5px);
            backdrop-filter: blur(5px);
            width: 25%;
            height: 75%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-radius: 10px;
            padding: 20px;
        }

        .payment-div {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .payment-content {
            display: flex;
            flex-direction: column;
            margin-top: 12px;
            margin-bottom: 12px;
        }

        .payment-input,
        select,
        option,
        textarea {
            background-color: transparent;
            width: 90%;
            height: 30px;
            border-radius: 5px;
            border: none;
        }

        .payment-submit {
            background-color: transparent;
            width: 90%;
            height: 30px;
            border-radius: 5px;
            border: 2px solid #000;
            cursor: pointer;
            margin-left: 12px;
            margin-bottom: 12px;
        }

        .payment-input:focus {
            outline: none;
        }

        select:focus {
            outline: none;
        }

        .payment-input,
        select {
            margin-left: 12px;
            margin-bottom: 12px;
        }

        label {
            margin-bottom: 2px;
            margin-left: 12px;
        }

        a {
            color: #000;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Koneksi ke database
        $host = 'localhost';
        $username_db = 'root';
        $password_db = '';
        $database = 'bimbel';
        $koneksi = new mysqli($host, $username_db, $password_db, $database);

        // Cek koneksi
        if ($koneksi->connect_error) {
            die("Koneksi gagal: " . $koneksi->connect_error);
        }

        // Menangkap data yang dikirimkan oleh formulir
        $username = $_POST['username'];
        $tanggal_pembayaran = $_POST['tanggal_pembayaran'];
        $metode_pembayaran = $_POST['metode_pembayaran'];
        $harga = 500000;

        // Mengecek apakah username ada di dalam tabel users
        $query_user = "SELECT * FROM users WHERE username='$username'";
        $result_user = mysqli_query($koneksi, $query_user);

        if (mysqli_num_rows($result_user) == 0) {
            echo "<script>alert('Username tidak ditemukan.');</script>";
        } else {
            // Mengecek apakah username sudah melakukan pembayaran sebelumnya
            $query_check = "SELECT * FROM pembayaran WHERE username='$username'";
            $result_check = mysqli_query($koneksi, $query_check);

            if (mysqli_num_rows($result_check) > 0) {
                echo "<script>alert('Pembayaran untuk username tersebut sudah dilakukan sebelumnya.');</script>";
            } else {
                // Memasukkan data ke dalam tabel pembayaran
                $query = "INSERT INTO pembayaran (username, tanggal_pembayaran, jumlah_pembayaran, metode_pembayaran) 
                      VALUES ('$username', '$tanggal_pembayaran', $harga, '$metode_pembayaran')";
                $result = mysqli_query($koneksi, $query);

                if ($result) {
                    // Mengubah role menjadi 'pelajar' setelah pembayaran berhasil
                    $query_update_role = "UPDATE users SET role='pelajar' WHERE username='$username'";
                    mysqli_query($koneksi, $query_update_role);

                    echo "<script>alert('Pembayaran Berhasil!.');
                    window.location.href='../kelas/ultima_kelas.php';</script>";
                } else {
                    echo "<script>alert('Pembayaran Gagal Silahkan Coba Lagi!.');</script>";
                }
            }
        }

        // Menutup koneksi ke database
        mysqli_close($koneksi);
    }
    ?>



    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="payment-table">
        <h1 style="text-align: center;">Pembayaran</h1>
        <div class="payment-div">
            <div class="payment-content">
                <label for="name">Username</label>
                <input class="payment-input" type="text" placeholder="Username" name="username" required>
            </div>
            <div class="payment-content">
                <label for="date">Tanggal Pembayaran</label>
                <input class="payment-input" type="date" name="tanggal_pembayaran" required>
            </div>
            <div class="payment-content">
                <label for="method">Alat Pembayaran</label>
                <select name="metode_pembayaran" required>
                    <option value="gopay">Gopay</option>
                    <option value="dana">DANA</option>
                    <option value="ovo">OVO</option>
                </select>
            </div>
            <div class="payment-content">
                <label for="text">Harga</label>
                <label for="note">500.000</label>
            </div>
            <input class="payment-submit" type="submit" value="Bayar">
            <a href="./index.php">Batalkan Pembayaran</a>
        </div>
    </form>

</body>

</html>