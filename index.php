<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://poltekba.ac.id/site/wp-content/uploads/2021/12/polt-1024x680.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: white;
        }
        .container {
            text-align: center;
            margin-bottom: 20px;
        }
        .container h1 {
            margin: 0;
            font-size: 28px;
            color: white;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .login-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .login-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        .login-container input {
            width: calc(100% - 40px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            display: inline-block;
            vertical-align: middle;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-container button:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            margin-bottom: 20px;
        }
        .password-container {
            position: relative;
            width: 100%;
        }
        .password-container input {
            width: calc(100% - 40px);
        }
        .password-container .toggle-password {
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Selamat Datang</h1>
    <h1>Aplikasi Bimbingan Dosen Wali Kelas 2TE1 Prodi Teknik Elektronika</h1>
</div>

<div class="login-container">
    <h2>Login</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data dari form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Periksa username dan password
        if ($username == "admin" && $password == "adminelektro123") {
            // Jika username dan password adalah admin
            header("Location: awaladmin.php");
            exit();
        } elseif ($username == "nuryanti" && $password == "nuryanti123") {
            // Jika username dan password adalah dosenwali
            header("Location: awaldosenwali.php");
            exit();
        } else {
            // Jika username atau password salah
            echo "<p class='error-message'>Username atau password salah.</p>";
        }
    }
    ?>

    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <div class="password-container">
            <input type="password" id="password" name="password" required>
            <span class="toggle-password" onclick="togglePassword()">👁️</span>
        </div>
        
        <button type="submit">Login</button>
    </form>
</div>

<script>
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const passwordToggle = document.querySelector('.toggle-password');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            passwordToggle.textContent = '👁️‍🗨️';
        } else {
            passwordField.type = 'password';
            passwordToggle.textContent = '👁️';
        }
    }
</script>

</body>
</html>
