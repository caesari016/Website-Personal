<!DOCTYPE html>
<html>
<head>
    <title>Input Data Bimbingan</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        input[type="date"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
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

$nim = isset($_GET['nim']) ? $_GET['nim'] : '';

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
                     VALUES ('$nim', '$nama_mahasiswa', '$awal_semester', '$tengah_semester', '$akhir_semester', '$insidental1', '$insidental2', '$insidental3')";
    $hasil_tambah = mysqli_query($koneksi, $query_tambah);

    if ($hasil_tambah) {
        echo "<p>Data bimbingan berhasil ditambahkan.</p>";
    } else {
        echo "<p>Gagal menambahkan data bimbingan: " . mysqli_error($koneksi) . "</p>";
    }
}

echo "<h2>Input Data Bimbingan</h2>";

echo "<form method='post' action='tampilandatabimbingan.php'>";
echo "<p><label>NIM: </label><input type='text' name='nim' value='$nim' readonly></p>";
echo "<p><label>Nama Mahasiswa: </label><input type='text' name='nama_mahasiswa' required></p>";
echo "<h4>Semester : Semester Genap 2023/2024</h4>";
echo "<p><label>Awal Semester: </label><input type='date' name='awal_semester' required></p>";
echo "<p><label>Tengah Semester: </label><input type='date' name='tengah_semester' required></p>";
echo "<p><label>Akhir Semester: </label><input type='date' name='akhir_semester' required></p>";
echo "<p><label>Insidental1: </label><input type='date' name='insidental1' required></p>";
echo "<p><label>Insidental2: </label><input type='date' name='insidental2' required></p>";
echo "<p><label>Insidental3: </label><input type='date' name='insidental3' required></p>";
echo "<p><input type='submit' name='Simpan Data' value='Simpan Data'></p>";
echo "</form>";

echo "<p><a href='awaldosenwali.php'>Kembali ke Data Mahasiswa</a></p>";

mysqli_close($koneksi);
?>

</body>
</html>
