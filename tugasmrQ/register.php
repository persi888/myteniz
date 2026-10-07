<?php
session_start();
$error = $_GET['error'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MyTeniz</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<nav>
    <div class="container nav">
        <a href="index.php" class="logo">
            MY<span>TENIZ</span>
        </a>
        <div class="menu">
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
        </div>
    </div>
</nav>

<section>
    <div class="container">
        <!-- Mengubah .card menjadi .form-box -->
        <div class="form-box">
            <h1 class="title">Register</h1>
            <p>Buat akun MyTeniz kamu.</p>

            <?php if ($error): ?>
                <div class="error">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form action="proses.php" method="POST">
                <label>Nama</label>
                <input type="text" name="nama" placeholder="Masukkan nama" required>

                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>

                <button type="submit" name="register" class="btn">REGISTER</button>
            </form>

            <p style="margin-top: 20px; text-align: center;">
                Sudah punya akun? <a href="login.php" style="color:#FF4C29; font-weight:bold;">Login</a>
            </p>
        </div>
    </div>
</section>

<footer>
    MYTENIZ © 2026
</footer>

</body>
</html>