<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Bimbingan Dosen Wali</title>
    <style>
        body {
            background-color: #f0f0f0; /* Warna latar belakang */
            font-family: Arial, sans-serif; /* Pilihan font */
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: red; /* Warna judul */
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
            background-color: #f2f2f2; /* Warna latar belakang kolom judul */
        }
        tr:nth-child(even) {
            background-color: #f9f9f9; /* Warna latar belakang baris genap */
        }
        tr:hover {
            background-color: #f2f2f2; /* Warna latar belakang saat pointer hover */
        }
        a {
            text-decoration: none; /* Hapus garis bawah pada tautan */
            color: blue; /* Warna tautan */
        }
        a:hover {
            color: darkblue; /* Warna tautan saat pointer hover */
        }
        .container {
            max-width: 800px;
            margin: auto;
            background-color: white; /* Warna latar belakang container */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Efek bayangan */
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
    echo "<h2>APLIKASI BIMBINGAN DOSEN WALI KELAS 2TE1 PRODI TEKNIK ELEKTRONIKA</h2>";

    // Tampilkan link untuk menambah data dengan textbox dan warna yang berbeda
   
    echo "<p><a href='index.php'>Logout</a></p>"; 
    echo "<p><a href='awaldosenwali.php'>Halaman Awal</a></p>";

    echo "<h2>DATA MAHASISWA 2TE1 DOSEN WALI Nur Yanti, S.T., M.T.</h2>";

    // Mulai tabel
    echo "<table>";
    echo "<tr><th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Jenis Kelamin</th><th>Tempat Lahir</th><th>Tanggal Lahir</th><th>Nomor HP</th><th>Prodi</th><th>Dosen Wali</th><th>Aksi</th><th>Aksi</th></tr>";

    // Ambil data mahasiswa dari database dengan dosen wali tertentu
    $dosen_wali = "Nur Yanti, S.T., M.T.";
    $query = "SELECT * FROM mahasiswa WHERE dosen_wali='$dosen_wali'";
    $hasil = mysqli_query($koneksi, $query);

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
        echo "<td><a href='forminputdatabimbingan.php?nim=".$row['nim']."'>Input Data Bimbingan</a></td>"; // Aksi
        echo "<td><a href='tampilandatabimbingan.php?nim=".$row['nim']."'>Tampil Data Bimbingan</a></td>"; // Aksi
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
