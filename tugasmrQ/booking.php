<?php
include "proses.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$cabang_id = $_GET['cabang'] ?? '';
$cabang = $db->query("SELECT * FROM cabang ORDER BY nama");
$lapangan = $db->query("
    SELECT lapangan.id, lapangan.nama, lapangan.harga, cabang.nama AS cabang
    FROM lapangan
    JOIN cabang ON lapangan.cabang_id = cabang.id
    ORDER BY cabang.nama
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Booking - MyTeniz</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
<div class="container nav">
<a href="index.php" class="logo">MY<span>TENIZ</span></a>
<div class="menu">
<a href="index.php">Home</a>
<a href="dashboard.php">Booking Saya</a>
<a href="logout.php">Logout</a>
</div>
</div>
</nav>

<section>
<div class="form-box">
<h1 class="title" style="font-size: 30px;">Book Your Court</h1>
<p>Pilih cabang, lapangan, tanggal, dan waktu bermain.</p>

<?php if(isset($_GET['error'])): ?>
<div class="error"><?= htmlspecialchars($_GET['error']) ?></div>
<?php endif; ?>

<form action="proses.php" method="POST">

<label>Cabang</label>
<select name="cabang" required>
<option value="">Pilih Cabang</option>
<?php while($c = $cabang->fetch_assoc()): ?>
<option value="<?= $c['id'] ?>" <?= $cabang_id == $c['id'] ? 'selected' : '' ?>>
<?= htmlspecialchars($c['nama']) ?>
</option>
<?php endwhile; ?>
</select>

<label>Lapangan</label>
<select name="lapangan" required>
<option value="">Pilih Lapangan</option>
<?php while($l = $lapangan->fetch_assoc()): ?>
<option value="<?= $l['id'] ?>">
<?= htmlspecialchars($l['cabang']) ?> - <?= htmlspecialchars($l['nama']) ?> - Rp<?= number_format($l['harga'],0,',','.') ?>
</option>
<?php endwhile; ?>
</select>

<label>Tanggal</label>
<input type="date" name="tanggal" required>

<label>Jam</label>
<select name="jam" required>
<option value="">Pilih Jam</option>
<option value="08:00:00">08:00 - 09:00</option>
<option value="09:00:00">09:00 - 10:00</option>
<option value="10:00:00">10:00 - 11:00</option>
<option value="15:00:00">15:00 - 16:00</option>
<option value="16:00:00">16:00 - 17:00</option>
<option value="17:00:00">17:00 - 18:00</option>
<option value="18:00:00">18:00 - 19:00</option>
<option value="19:00:00">19:00 - 20:00</option>
<option value="20:00:00">20:00 - 21:00</option>
</select>

<button name="booking" type="submit" class="btn">CONFIRM BOOKING</button>
</form>
</div>
</section>

<footer>MYTENIZ © 2026</footer>

</body>
</html>