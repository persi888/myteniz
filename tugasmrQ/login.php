<?php
session_start();
$error = $_GET['error'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MyTeniz</title>
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
            <a href="register.php">Register</a>
        </div>
    </div>
</nav>

<section>
    <div class="container">
        <!-- Mengubah .card menjadi .form-box agar rapi sesuai CSS baru -->
        <div class="form-box">
            <h1 class="title">Login</h1>
            <p>Masuk ke akun MyTeniz kamu.</p>

            <?php if ($error): ?>
                <div class="error">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form action="proses.php" method="POST">
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>

                <button type="submit" name="login" class="btn">LOGIN</button>
            </form>

            <p style="margin-top: 20px; text-align: center;">
                Belum punya akun? <a href="register.php" style="color:#FF4C29; font-weight:bold;">Register</a>
            </p>
        </div>
    </div>
</section>

<footer>
    MYTENIZ © 2026
</footer>

</body>
</html>