<?php
include "proses.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'] ?? '';
$user = $_SESSION['user_id'];
$data = $db->query("SELECT * FROM booking WHERE id='$id' AND user_id='$user'");
$booking = $data->fetch_assoc();

if (!$booking) {
    die("Booking tidak ditemukan");
}

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
<title>Reschedule - MyTeniz</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
<div class="container nav">
<a href="index.php" class="logo">MY<span>TENIZ</span></a>
<div class="menu">
<a href="dashboard.php">Booking Saya</a>
<a href="logout.php">Logout</a>
</div>
</div>
</nav>

<section>
<div class="form-box">
<h1 class="title" style="font-size: 30px;">Reschedule</h1>
<p>Ubah cabang, lapangan, tanggal, atau waktu booking kamu.</p>

<?php if(isset($_GET['error'])): ?>
<div class="error"><?= htmlspecialchars($_GET['error']) ?></div>
<?php endif; ?>

<form action="proses.php" method="POST">
<input type="hidden" name="id" value="<?= $booking['id'] ?>">

<label>Lapangan Baru</label>
<select name="lapangan" required>
<?php while($l = $lapangan->fetch_assoc()): ?>
<option value="<?= $l['id'] ?>" <?= $l['id'] == $booking['lapangan_id'] ? 'selected' : '' ?>>
<?= htmlspecialchars($l['cabang']) ?> - <?= htmlspecialchars($l['nama']) ?>
</option>
<?php endwhile; ?>
</select>

<label>Tanggal Baru</label>
<input type="date" name="tanggal" value="<?= $booking['tanggal'] ?>" required>

<label>Waktu Baru</label>
<select name="jam" required>
<?php
$jam = ["08:00:00","09:00:00","10:00:00","15:00:00","16:00:00","17:00:00","18:00:00","19:00:00","20:00:00"];
foreach($jam as $j):
?>
<option value="<?= $j ?>" <?= $j == $booking['jam'] ? 'selected' : '' ?>>
<?= substr($j,0,5) ?>
</option>
<?php endforeach; ?>
</select>

<button name="reschedule" type="submit" class="btn">SAVE CHANGES</button>
</form>
</div>
</section>

<footer>MYTENIZ © 2026</footer>

</body>
</html>