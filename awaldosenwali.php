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
            max-width: 900px;
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
    </style>
</head>
<body>
    <div class="container">
        <?php
        $koneksi = mysqli_connect('localhost', 'root', '', 'poltekba');
        if (!$koneksi) {
            die("Koneksi ke database MariaDB dengan nama poltekba gagal: " . mysqli_connect_error());
        }

        // Jika form untuk menambah data disubmit
        if (isset($_POST['tambah'])) {
            // Ambil nilai dari form untuk data mahasiswa baru
            $nim = $_POST['nim'];
            $nama_mahasiswa = $_POST['nama_mahasiswa'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $tempat_lahir = $_POST['tempat_lahir'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $nomor_hp = $_POST['nomor_hp'];
            $prodi = $_POST['prodi'];
            $dosen_wali = $_POST['dosen_wali'];

            // Query untuk menambahkan data mahasiswa baru ke dalam database
            $query_tambah = "INSERT INTO mahasiswa (nim, nama_mahasiswa, jenis_kelamin, tempat_lahir, tanggal_lahir, nomor_hp, prodi, dosen_wali) VALUES ('$nim', '$nama_mahasiswa', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$nomor_hp', '$prodi', '$dosen_wali')";
            $hasil_tambah = mysqli_query($koneksi, $query_tambah);

            // Jika berhasil ditambahkan, tampilkan pesan sukses
            if ($hasil_tambah) {
                echo "<p>Data mahasiswa berhasil ditambahkan.</p>";
            } else {
                echo "<p>Gagal menambahkan data mahasiswa: " . mysqli_error($koneksi) . "</p>";
            }
        }

        // Judul di atas tabel dengan gaya huruf berwarna
        echo "<h2 style='color: purple;'>APLIKASI BIMBINGAN DOSEN WALI KELAS 2TE1 PRODI TEKNIK ELEKTRONIKA</h2>";

        // Tampilkan link untuk menambah data dengan textbox dan warna yang berbeda
        echo "<div class='menu'>";
		echo "<p><a href='bimbingandosenwali1.php'>Bimbingan Dosen Wali Nur Yanti, S.T., M.T. </a></p>";
        echo "<p><a href='bimbingandosenwali.php'>Bimbingan Dosen Wali Nurwahidah Jamal, S.T., M.T.</a></p>";
        echo "<p><a href='index.php'>Logout</a></p>";
        echo "</div>";

        echo "<h2 style='color: purple;'>DATA MAHASISWA 2TE1</h2>";

        // Mulai tabel
        echo "<table>";
        echo "<tr><th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Jenis Kelamin</th><th>Tempat Lahir</th><th>Tanggal Lahir</th><th>Nomor HP</th><th>Prodi</th><th>Dosen Wali</th></tr>";

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
