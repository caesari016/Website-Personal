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
            margin: 20px auto;
            max-width: 800px;
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
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .action-links a {
            color: #28a745;
            text-decoration: none;
        }
        .action-links a:hover {
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
            die("Koneksi ke database MariaDB dengan nama poltekba gagal: " . mysqli_connect_error());
        }

        // Cek jika form untuk mengedit data disubmit
        if (isset($_POST['edit'])) {
            // Ambil nilai dari form untuk data yang akan diedit
            $nim = $_POST['nim'];
            $nama_mahasiswa = $_POST['nama_mahasiswa'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $tempat_lahir = $_POST['tempat_lahir'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $nomor_hp = $_POST['nomor_hp'];
            $prodi = $_POST['prodi'];
            $dosen_wali = $_POST['dosen_wali'];

            // Jalankan query untuk melakukan update data mahasiswa ke dalam database
            $query = "UPDATE mahasiswa SET nama_mahasiswa='$nama_mahasiswa', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', nomor_hp='$nomor_hp', prodi='$prodi', dosen_wali='$dosen_wali' WHERE nim='$nim'";
            if (mysqli_query($koneksi, $query)) {
                echo "<p>Data berhasil diupdate</p>";
            } else {
                echo "<p>Error: " . mysqli_error($koneksi) . "</p>";
            }
        }

        // Judul di atas tabel
        echo "<h2 style='color: blue;'>APLIKASI BIMBINGAN DOSEN WALI KELAS 2TE1 PRODI TEKNIK ELEKTRONIKA</h2>";
	

        echo "<div class='menu'>";
        echo "<p><a href='awaladmin.php'>Kembali Ke Menu Utama</a></p>";
        echo "<p><a href='index.php'>Logout</a></p>";
        echo "</div>";

        echo "<h2 style='color: blue;'>DATA MAHASISWA</h2>";

        // Mulai tabel
        echo "<table>";
        echo "<tr><th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Jenis Kelamin</th><th>Tempat Lahir</th><th>Tanggal Lahir</th><th>Nomor HP</th><th>Prodi</th><th>Dosen Wali</th><th>Aksi</th></tr>";

        // Ambil data mahasiswa dari database
        $hasil = mysqli_query($koneksi, 'SELECT * FROM mahasiswa');
        if (!$hasil) {
            die("Query gagal: " . mysqli_error($koneksi));
        }

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
            // Tambahkan link untuk mengedit data
            echo "<td class='action-links'><a href='formedit.php?nim=".$row['nim']."'>Edit</a></td>"; 
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
