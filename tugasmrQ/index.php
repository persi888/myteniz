<?php
include "proses.php";

$cabang = $db->query(
    "SELECT * FROM cabang"
);
?>

<!DOCTYPE html>
<html>

<head>

<title>MyTeniz</title>

<link rel="stylesheet" href="style.css">

</head>

<body>


<nav>

<div class="container nav">

<a href="index.php" class="logo">
MY<span>TENIZ</span>
</a>

<div class="menu">

<a href="index.php">
Home
</a>

<a href="#cabang">
Cabang
</a>

<?php if(isset($_SESSION['user_id'])): ?>

<a href="dashboard.php">
Booking Saya
</a>

<a href="proses.php?logout=1">
Logout
</a>

<?php else: ?>

<a href="login.php">
Login
</a>

<a href="register.php">
Register
</a>

<?php endif; ?>

</div>

</div>

</nav>


<section class="hero">

<div class="container">

<p>PREMIUM TENNIS BOOKING</p>

<h1>
PLAY YOUR GAME.
<br>
<span>YOUR WAY.</span>
</h1>

<p>
Booking lapangan tenis dengan mudah.
Jika rencana berubah, kamu bisa
reschedule cabang dan waktu.
</p>

<a
href="booking.php"
class="btn"
>
BOOK A COURT
</a>

</div>

</section>


<section id="cabang">

<div class="container">

<h2 class="title">
Our Courts
</h2>

<div class="cards">

<?php while($c = $cabang->fetch_assoc()): ?>

<div class="card">

<p>
<?= $c['lokasi'] ?>
</p>

<h3>
<?= $c['nama'] ?>
</h3>

<p>
Premium tennis court dengan
fasilitas modern.
</p>

<?php if (isset($_SESSION['user_id'])): ?>

<a href="booking.php" class="btn">
    BOOK A COURT
</a>

<?php else: ?>

<a href="login.php" class="btn">
    LOGIN TO BOOK
</a>

<?php endif; ?>

</div>

<?php endwhile; ?>

</div>

</div>

</section>


<section>

<div class="container">

<h2 class="title">
Flexible Booking
</h2>

<p>
Rencana berubah? Tidak masalah.
MyTeniz memungkinkan kamu mengubah
lapangan, tanggal, dan waktu booking.
</p>

</div>

</section>


<footer>

MYTENIZ © 2026

</footer>

</body>

</html>