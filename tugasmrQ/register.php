<?php
include "proses.php";
?>

<!DOCTYPE html>
<html>

<head>

<title>Register - MyTeniz</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="form-box">

<a href="index.php" class="logo">
MY<span>TENIZ</span>
</a>

<h1>
Create Account
</h1>

<?php if(isset($_GET['error'])): ?>

<div class="error">
<?= $_GET['error'] ?>
</div>

<?php endif; ?>


<form
action="proses.php"
method="POST"
>

<input
type="text"
name="nama"
placeholder="Nama lengkap"
required
>

<input
type="email"
name="email"
placeholder="Email"
required
>

<input
type="password"
name="password"
placeholder="Password"
required
>

<button name="register">
REGISTER
</button>

</form>


<p>
Sudah punya akun?
<a href="login.php">
Login
</a>
</p>

</div>

</body>

</html>