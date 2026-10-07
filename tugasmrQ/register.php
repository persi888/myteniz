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

        <a href="index.html" class="logo">
            MY<span>TENIZ</span>
        </a>

        <div class="menu">
            <a href="index.html">Home</a>
            <a href="login.html">Login</a>
        </div>

    </div>

</nav>


<div class="form-box">

    <h1>
        Create Account
    </h1>

    <p>
        Buat akun MyTeniz untuk mulai bermain.
    </p>

    <div id="error" class="error"></div>

    <form id="registerForm">

        <label>
            Nama
        </label>

        <input
            type="text"
            id="nama"
            required
            placeholder="Nama lengkap"
        >


        <label>
            Email
        </label>

        <input
            type="email"
            id="email"
            required
            placeholder="Email"
        >


        <label>
            Password
        </label>

        <input
            type="password"
            id="password"
            required
            placeholder="Password"
        >


        <button type="submit">
            REGISTER
        </button>

    </form>


    <p class="form-footer">
        Sudah punya akun?
        <a href="login.html">
            Login
        </a>
    </p>

</div>


<script src="script.js"></script>

</body>
</html>