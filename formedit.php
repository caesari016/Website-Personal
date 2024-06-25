<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Warna latar belakang biru muda */
            padding: 20px;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .menu {
            text-align: center;
            margin-bottom: 20px;
        }
        .menu a {
            margin: 0 10px;
            color: #007bff;
            text-decoration: none;
        }
        .menu a:hover {
            text-decoration: underline;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
            font-weight: bold;
            color: #333;
        }
        input[type="text"],
        input[type="date"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            width: 100%;
        }
        input[type="submit"] {
            padding: 10px;
            margin: 5px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:first-of-type {
            background-color: #28a745;
            color: #fff;
        }
        input[type="submit"]:first-of-type:hover {
            background-color: #218838;
        }
        input[type="submit"]:last-of-type {
            background-color: #dc3545;
            color: #fff;
        }
        input[type="submit"]:last-of-type:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>FORM EDIT DATA</h1>
        <div class="menu">
            <p><a href="awaladmin.php">Halaman Awal</a></p>
            <p><a href="index.php">Logout</a></p>
        </div>
        <?php
        // Koneksi ke database (gantikan nilai-nilai berikut dengan koneksi Anda)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "poltekba";

        // Buat koneksi
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Periksa koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Inisialisasi variabel dengan nilai default
        $nama = $nim = $tempat_lahir = $tanggal_lahir = $umur = "";

        // Periksa apakah ada data yang ingin diedit
        if (isset($_GET['nim'])) {
            $nim = $conn->real_escape_string($_GET['nim']); // Mengamankan NIM

            // Query untuk mengambil data dari database
            $sql = "SELECT * FROM mahasiswa WHERE NIM='$nim'"; 

            // Jalankan query
            $result = $conn->query($sql);

            // Periksa apakah data ditemukan
            if ($result->num_rows > 0) {
                // Loop melalui hasil untuk mendapatkan data
                while ($row = $result->fetch_assoc()) {
                    $nim = $row["nim"]; 
                    $nama_mahasiswa = $row["nama_mahasiswa"]; 
                    $jenis_kelamin = $row["jenis_kelamin"]; 
                    $tempat_lahir = $row["tempat_lahir"]; 
                    $tanggal_lahir = $row["tanggal_lahir"];    
                    $nomor_hp = $row["nomor_hp"];
                    $prodi = $row["prodi"];
                    $dosen_wali = $row["dosen_wali"];
                }
            } else {
                echo "Data tidak ditemukan";
            }
        } else {
            echo "NIM tidak ditemukan";
        }

        // Tutup koneksi
        $conn->close();
        ?>
        <form method="post" action="edit.php">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" value="<?php echo htmlspecialchars($nim); ?>" readonly>
            <label for="nama_mahasiswa">Nama Mahasiswa:</label>
            <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" value="<?php echo htmlspecialchars($nama_mahasiswa); ?>">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <input type="text" id="jenis_kelamin" name="jenis_kelamin" value="<?php echo htmlspecialchars($jenis_kelamin); ?>">
            <label for="tempat_lahir">Tempat Lahir:</label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?php echo htmlspecialchars($tempat_lahir); ?>">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo htmlspecialchars($tanggal_lahir); ?>">
            <label for="nomor_hp">Nomor HP:</label>
            <input type="text" id="nomor_hp" name="nomor_hp" value="<?php echo htmlspecialchars($nomor_hp); ?>">
            <label for="prodi">Prodi:</label>
            <input type="text" id="prodi" name="prodi" value="<?php echo htmlspecialchars($prodi); ?>">
            <label for="dosen_wali">Dosen Wali:</label>
            <input type="text" id="dosen_wali" name="dosen_wali" value="<?php echo htmlspecialchars($dosen_wali); ?>">
            <input type="submit" name="edit" value="Edit">
            <input type="submit" name="batal" value="Batal">
        </form>
    </div>
</body>
</html>
