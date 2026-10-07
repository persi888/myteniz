<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyTeniz - Booking Lapangan Tenis</title>
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
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="dashboard.php">Booking Saya</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container hero-content">
        <div class="hero-text">
            <?php if (isset($_SESSION['user_id'])): ?>
                <p class="eyebrow">WELCOME BACK</p>
                <h1>
                    HALO,
                    <span><?= htmlspecialchars($_SESSION['nama']) ?></span>
                </h1>
                <p class="hero-description">
                    Selamat datang kembali di MyTeniz.
                    Siap untuk bermain tenis hari ini?
                </p>
                <a href="booking.php" class="btn">BOOK A COURT</a>
            <?php else: ?>
                <p class="eyebrow">PREMIUM TENNIS BOOKING</p>
                <h1>
                    PLAY YOUR GAME.<br>
                    <span>YOUR WAY.</span>
                </h1>
                <p class="hero-description">
                    Booking lapangan tenis jadi lebih mudah,
                    cepat, dan fleksibel bersama MyTeniz.
                </p>
                <a href="login.php" class="btn">BOOK A COURT</a>
            <?php endif; ?>
        </div>

        <div class="hero-card">
            <div class="hero-card-top">
                <span>MYTENIZ</span>
                <span>01</span>
            </div>
            <div class="tennis-ball">●</div>
            <h3>
                BOOK.<br>
                PLAY.<br>
                REPEAT.
            </h3>
        </div>
    </div>
</section>

<section class="features">
    <div class="container">
        <div class="section-heading">
            <p class="eyebrow">WHY MYTENIZ</p>
            <h2>Booking Tanpa Ribet</h2>
        </div>

        <div class="feature-grid">
            <div class="card">
                <div class="feature-number">01</div>
                <h3>Easy Booking</h3>
                <p>
                    Pilih cabang, lapangan, tanggal,
                    dan jam bermain dengan mudah.
                </p>
            </div>
            <div class="card">
                <div class="feature-number">02</div>
                <h3>Flexible Reschedule</h3>
                <p>
                    Jadwal berubah? Kamu dapat mengganti cabang,
                    court, tanggal, dan waktu booking.
                </p>
            </div>
            <div class="card">
                <div class="feature-number">03</div>
                <h3>Your Game</h3>
                <p>
                    Fokus bermain dan nikmati
                    pengalaman booking tenis yang simpel.
                </p>
            </div>
        </div>
    </div>
</section>

<footer>
    MYTENIZ © 2026 — PLAY YOUR GAME. YOUR WAY.
</footer>

</body>
</html>