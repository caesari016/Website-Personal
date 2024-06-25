<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Bimbingan Dosen Wali</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: red;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: blue;
        }
        a:hover {
            color: darkblue;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
        $nama_mahasiswa = mysqli_real_escape_string($koneksi, $_POST['nama_mahasiswa']);
        $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
        $tempat_lahir = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir']);
        $tanggal_lahir = mysqli_real_escape_string($koneksi, $_POST['tanggal_lahir']);
        $nomor_hp = mysqli_real_escape_string($koneksi, $_POST['nomor_hp']);
        $prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);
        $dosen_wali = mysqli_real_escape_string($koneksi, $_POST['dosen_wali']);

        $query_tambah = "INSERT INTO mahasiswa (nim, nama_mahasiswa, jenis_kelamin, tempat_lahir, tanggal_lahir, nomor_hp, prodi, dosen_wali) VALUES ('$nim', '$nama_mahasiswa', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$nomor_hp', '$prodi', '$dosen_wali')";
        $hasil_tambah = mysqli_query($koneksi, $query_tambah);

        if ($hasil_tambah) {
            echo "<p>Data mahasiswa berhasil ditambahkan.</p>";
        } else {
            echo "<p>Gagal menambahkan data mahasiswa: " . mysqli_error($koneksi) . "</p>";
        }
    }

    echo "<h2>APLIKASI BIMBINGAN DOSEN WALI KELAS 2TE1 PRODI TEKNIK ELEKTRONIKA</h2>";
    echo "<p><a href='index.php'>Logout</a></p>";
    echo "<p><a href='awaldosenwali.php'>Halaman Awal</a></p>";
    echo "<h2>DATA MAHASISWA 2TE1 DOSEN WALI Nurwahidah Jamal, S.T., M.T.</h2>";

    $nim = "932021022";
    $query_mahasiswa = "SELECT * FROM mahasiswa WHERE nim='$nim'";
    $hasil_mahasiswa = mysqli_query($koneksi, $query_mahasiswa);

    if (mysqli_num_rows($hasil_mahasiswa) > 0) {
        echo "<table>";
        echo "<tr><th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Jenis Kelamin</th><th>Tempat Lahir</th><th>Tanggal Lahir</th><th>Nomor HP</th><th>Prodi</th><th>Dosen Wali</th><th>Aksi</th><th>Aksi</th></tr>";

        $nomor = 1;
        while ($row = mysqli_fetch_assoc($hasil_mahasiswa)) {
            echo "<tr>";
            echo "<td>".$nomor++."</td>";
            echo "<td>".$row['nim']."</td>";
            echo "<td>".$row['nama_mahasiswa']."</td>";
            echo "<td>".$row['jenis_kelamin']."</td>";
            echo "<td>".$row['tempat_lahir']."</td>";
            echo "<td>".$row['tanggal_lahir']."</td>";
            echo "<td>".$row['nomor_hp']."</td>";
            echo "<td>".$row['prodi']."</td>";
            echo "<td>".$row['dosen_wali']."</td>";
            echo "<td><a href='forminputdatabimbingan.php?nim=".$row['nim']."'>Input Data Bimbingan</a></td>";
            echo "<td><a href='tampilandatabimbingan.php?nim=".$row['nim']."'>Tampil Data Bimbingan</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Tidak ada data mahasiswa dengan NIM $nim.</p>";
    }

    mysqli_close($koneksi);
    ?>
</div>

</body>
</html>
