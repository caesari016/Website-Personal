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

// HTML untuk memulai halaman dengan latar belakang berwarna
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Data Mahasiswa</title>";
echo "<style>";
echo "body { background-color: #f0f8ff; font-family: Arial, sans-serif; }"; // Latar belakang berwarna
echo "table { width: 100%; border-collapse: collapse; }";
echo "th, td { padding: 8px 12px; border: 1px solid #ddd; text-align: left; }";
echo "th { background-color: #f2f2f2; }";
echo "h2 { color: #333; display: flex; align-items: center; }"; // Gaya untuk judul
echo "h2 img { margin-left: 10px; width: 50px; }"; // Gaya untuk gambar dalam judul
echo "a { margin-right: 10px; }";
echo "</style>";
echo "</head>";
echo "<body>";

// Judul di atas tabel dengan gaya huruf berwarna
echo "<h2 style='color: orange;'>APLIKASI BIMBINGAN DOSEN WALI KELAS 2TE1 PRODI TEKNIK ELEKTRONIKA";
echo "<img src='https://poltekba.ac.id/site/wp-content/uploads/2023/01/LOGO_POLTEKBA-removebg-preview-1.png' alt='Logo Poltekba'></h2>";

// Tampilkan link untuk menambah data dengan textbox dan warna yang berbeda
echo "<p><a href='tambah.php'>Tambah Data</a>";
echo "<a href='edit.php'>Edit Data</a>";
echo "<a href='hapus.php'>Hapus Data</a>";
echo "<a href='index.php'>Logout</a></p>";

echo "<h2 style='color: orange;'>DATA MAHASISWA</h2>";

// Mulai tabel
echo "<table border='1'>";
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

echo "</body>";
echo "</html>";
?>
