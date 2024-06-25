<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Warna latar belakang biru muda */
            padding: 20px;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }
        h2 {
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td a {
            color: #dc3545;
            text-decoration: none;
        }
        td a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Koneksi ke database
        $koneksi = mysqli_connect('localhost', 'root', '', 'poltekba');
        if (!$koneksi) {
            die("Koneksi ke database MariaDB dengan nama poltekba gagal");
        }

        // Cek jika ada parameter nim untuk menghapus data
        if (isset($_GET['nim'])) {
            $nim = $_GET['nim'];

            // Jalankan query untuk menghapus data
            $query = $koneksi->prepare("DELETE FROM mahasiswa WHERE nim = ?");
            $query->bind_param("s", $nim);

            if ($query->execute()) {
                echo "<script>alert('Data berhasil dihapus.'); window.location='awaladmin.php';</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($koneksi) . "'); window.location='awaladmin.php';</script>";
            }
            $query->close();
        }

        // Judul di atas tabel
        echo "<h2 style='color: red;'>APLIKASI BIMBINGAN DOSEN WALI KELAS 2TE1 PRODI TEKNIK ELEKTRONIKA</h2>";

        echo "<div class='menu'>";
        echo "<p><a href='awaladmin.php'>Kembali Ke Menu Utama</a></p>";
        echo "<p><a href='index.php'>Logout</a></p>";
        echo "</div>";

        echo "<h2 style='color: red;'>DATA MAHASISWA</h2>";

        // Mulai tabel
        echo "<table>";
        echo "<tr><th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Jenis Kelamin</th><th>Tempat Lahir</th><th>Tanggal Lahir</th><th>Nomor HP</th><th>Prodi</th><th>Dosen Wali</th><th>Aksi</th></tr>";

        // Ambil data mahasiswa dari database
        $hasil = mysqli_query($koneksi, 'SELECT * FROM mahasiswa');

        // Nomor urut
        $nomor = 1;

        // Looping untuk mengambil dan menampilkan semua baris data
        while ($row = mysqli_fetch_assoc($hasil)) {
            echo "<tr>";
            echo "<td>".$nomor++."</td>"; // Nomor urut
            echo "<td>".$row['nim']."</td>"; // NIM
            echo "<td>".$row['nama_mahasiswa']."</td>"; // Nama Mahasiswa
            echo "<td>".$row['jenis_kelamin']."</td>"; // Jenis Kelamin
            echo "<td>".$row['tempat_lahir']."</td>"; // Tempat Lahir
            echo "<td>".$row['tanggal_lahir']."</td>"; // Tanggal Lahir
            echo "<td>".$row['nomor_hp']."</td>"; // Nomor HP
            echo "<td>".$row['prodi']."</td>"; // Prodi
            echo "<td>".$row['dosen_wali']."</td>"; // Dosen Wali
            // Tambahkan link untuk menghapus data
            echo "<td><a href='hapus.php?nim=".$row['nim']."' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Hapus</a></td>";
            echo "</tr>";
        }

        // Selesai tabel
        echo "</table>";

        // Setelah selesai, jangan lupa untuk menutup koneksi
        mysqli_close($koneksi);
        ?>
    </div>
</body>
</html>
