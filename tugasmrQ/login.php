<?php
include "proses.php";
?>

<!DOCTYPE html>
<html>

<head>

<title>Login - MyTeniz</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="form-box">

<a href="index.php" class="logo">
MY<span>TENIZ</span>
</a>

<h1>
Welcome Back
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

<button name="login">
LOGIN
</button>

</form>


<p>
Belum punya akun?
<a href="register.php">
Register
</a>
</p>

</div>

</body>

</html>