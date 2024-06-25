<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Latar belakang halaman berwarna biru muda */
            padding: 20px;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 600px; /* Membatasi lebar maksimal container */
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center; /* Menengahkan judul */
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }

        label {
            margin: 10px 0 5px;
            font-weight: bold;
            color: #333;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }

        .links {
            margin-top: 20px;
            text-align: center;
        }

        .links a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Tambah Data Mahasiswa</h2>
        <form action="awaladmin.php" method="post">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required>
            
            <label for="nama_mahasiswa">Nama Mahasiswa:</label>
            <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <input type="text" id="jenis_kelamin" name="jenis_kelamin" required>

            <label for="tempat_lahir">Tempat Lahir:</label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" required>

            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

            <label for="nomor_hp">Nomor HP:</label>
            <input type="text" id="nomor_hp" name="nomor_hp" required>

            <label for="prodi">Prodi:</label>
            <input type="text" id="prodi" name="prodi" required>

            <label for="dosen_wali">Dosen Wali:</label>
            <input type="text" id="dosen_wali" name="dosen_wali" required>
            
            <button type="submit" name="tambah">Tambah Data</button>
        </form>
        <div class="links">
            <p><a href="awaladmin.php">Halaman Awal</a></p>
            <p><a href="index.php">Logout</a></p>
        </div>
    </div>
</body>
</html>
