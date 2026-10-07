<?php
include "proses.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user_id'];

$data = $db->query("
    SELECT
        booking.id,
        booking.tanggal,
        booking.jam,
        booking.status,
        lapangan.nama AS lapangan,
        lapangan.harga,
        cabang.nama AS cabang,
        cabang.lokasi
    FROM booking
    JOIN lapangan ON booking.lapangan_id = lapangan.id
    JOIN cabang ON lapangan.cabang_id = cabang.id
    WHERE booking.user_id='$user'
    ORDER BY booking.tanggal DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Booking Saya - MyTeniz</title>
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
<a href="booking.php">Book Court</a>
<a href="logout.php">Logout</a>
</div>
</div>
</nav>

<section>
<div class="container">

<h1 class="title">Hello, <?= htmlspecialchars($_SESSION['nama']) ?></h1>
<p>Berikut adalah booking kamu.</p>
<br>

<?php if($data->num_rows == 0): ?>
<div class="card" style="text-align: center;">
    <h3>Belum ada booking</h3>
    <p style="margin-bottom: 20px;">Kamu belum memiliki booking lapangan.</p>
    <a href="booking.php" class="btn">BOOK A COURT</a>
</div>
<?php else: ?>

<div class="cards">
<?php while($b = $data->fetch_assoc()): ?>
<div class="booking">
    <p><?= htmlspecialchars($b['cabang']) ?></p>
    <h3><?= htmlspecialchars($b['lapangan']) ?></h3>
    <p>📍 <?= htmlspecialchars($b['lokasi']) ?></p>
    <p>📅 <?= htmlspecialchars($b['tanggal']) ?></p>
    <p>🕐 <?= substr($b['jam'],0,5) ?></p>
    <p>💰 Rp<?= number_format($b['harga'],0,',','.') ?></p>
    <p style="margin-top: 10px;">Status: <strong style="color: #FF4C29;"><?= htmlspecialchars($b['status']) ?></strong></p>
    <br>
    <a href="reschedule.php?id=<?= $b['id'] ?>">↻ RESCHEDULE</a>
</div>
<?php endwhile; ?>
</div>

<?php endif; ?>
</div>
</section>

<footer>
MYTENIZ © 2026
</footer>

</body>
</html>