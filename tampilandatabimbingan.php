<!DOCTYPE html>
<html>
<head>
    <title>Data Bimbingan</title>
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
        h4 {
            color: #333;
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
    </style>
</head>
<body>

<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'poltekba');
if (!$koneksi) {
    die("Koneksi ke database MariaDB dengan nama poltekba gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $awal_semester = $_POST['awal_semester'];
    $tengah_semester = $_POST['tengah_semester'];
    $akhir_semester = $_POST['akhir_semester'];
    $insidental1 = $_POST['insidental1'];
    $insidental2 = $_POST['insidental2'];
    $insidental3 = $_POST['insidental3'];

    $query_tambah = "INSERT INTO bimbingan (nim, nama_mahasiswa, awal_semester, tengah_semester, akhir_semester, insidental1, insidental2, insidental3) 
                     VALUES ('$nim', '$nama_mahasiswa', '$awal_semester', '$tengah_semester', '$akhir_semester', '$insidental1', '$insidental2', '$insidental3') 
                     ON DUPLICATE KEY UPDATE 
                     nama_mahasiswa='$nama_mahasiswa', 
                     awal_semester='$awal_semester', 
                     tengah_semester='$tengah_semester', 
                     akhir_semester='$akhir_semester', 
                     insidental1='$insidental1', 
                     insidental2='$insidental2', 
                     insidental3='$insidental3'";
    $hasil_tambah = mysqli_query($koneksi, $query_tambah);

    if ($hasil_tambah) {
        echo "<p>Data bimbingan berhasil ditambahkan atau diperbarui.</p>";
    } else {
        echo "<p>Gagal menambahkan atau memperbarui data bimbingan: " . mysqli_error($koneksi) . "</p>";
    }
}

$query = "SELECT * FROM bimbingan";
$hasil = mysqli_query($koneksi, $query);

echo "<h2>Data Bimbingan</h2>";

if (mysqli_num_rows($hasil) > 0) {
    echo "<table>";
    echo "<tr><th>No</th><th>NIM</th><th>Nama Mahasiswa</th><th>Data Bim-1</th><th>Data Bim-2</th><th>Data Bim-3</th><th>Data Bim-4</th><th>Data Bim-5</th><th>Data Bim-6</th></tr>";

    $nomor = 1;

    while ($row = mysqli_fetch_assoc($hasil)) {
        echo "<tr>";
        echo "<td>".$nomor++."</td>";
        echo "<td>".$row['nim']."</td>"; 
        echo "<td>".$row['nama_mahasiswa']."</td>"; 
        echo "<td>".$row['awal_semester']."</td>"; 
        echo "<td>".$row['tengah_semester']."</td>"; 
        echo "<td>".$row['akhir_semester']."</td>"; 
        echo "<td>".$row['insidental1']."</td>"; 
        echo "<td>".$row['insidental2']."</td>"; 
        echo "<td>".$row['insidental3']."</td>"; 
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Tidak ada data bimbingan.</p>";
}

echo "<h2>Data Bimbingan</h2>";
echo "<h4>01. Awal Semester (KRS)</h4>";
echo "<h4>02. Tengah Semester</h4>";
echo "<h4>03. Akhir Semester (KHS)</h4>";
echo "<h4>04. Insidental I</h4>";
echo "<h4>05. Insidental II</h4>";
echo "<h4>06. Insidental III</h4>";

echo "<p><a href='bimbingandosenwali.php'>Kembali ke Data Mahasiswa</a></p>";

mysqli_close($koneksi);
?>

</body>
</html>
