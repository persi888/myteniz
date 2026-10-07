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

        <a href="index.html" class="logo">
            MY<span>TENIZ</span>
        </a>

        <div class="menu">
            <a href="index.html">Home</a>
            <a href="register.html">Register</a>
        </div>

    </div>

</nav>


<div class="form-box">

    <h1>
        Welcome Back
    </h1>

    <p>
        Login untuk melakukan booking lapangan.
    </p>

    <div id="error" class="error"></div>

    <form id="loginForm">

        <label>
            Email
        </label>

        <input
            type="email"
            id="email"
            required
            placeholder="Masukkan email"
        >


        <label>
            Password
        </label>

        <input
            type="password"
            id="password"
            required
            placeholder="Masukkan password"
        >


        <button type="submit">
            LOGIN
        </button>

    </form>


    <p class="form-footer">
        Belum punya akun?
        <a href="register.html">
            Register
        </a>
    </p>

</div>


<script src="script.js"></script>

</body>
</html>