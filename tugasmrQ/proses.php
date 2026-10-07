<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$db = new mysqli(
    "localhost",
    "root",
    "",
    "myteniz"
);


if ($db->connect_error) {

    die(
        "Koneksi database gagal: "
        . $db->connect_error
    );

}


/* ================= REGISTER ================= */

if (isset($_POST['register'])) {

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );


    $cek = $db->query(
        "SELECT *
         FROM users
         WHERE email='$email'"
    );


    if ($cek->num_rows > 0) {

        header(
            "Location: register.php?error=Email sudah digunakan"
        );

        exit;
    }


    $db->query("
        INSERT INTO users
        (nama, email, password)

        VALUES
        ('$nama', '$email', '$password')
    ");


    header("Location: login.php");

    exit;
}


/* ================= LOGIN ================= */

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $data = $db->query("
        SELECT *
        FROM users
        WHERE email='$email'
    ");


    $user = $data->fetch_assoc();


    if (
        $user &&
        password_verify(
            $password,
            $user['password']
        )
    ) {

        $_SESSION['user_id'] =
            $user['id'];

        $_SESSION['nama'] =
            $user['nama'];


        header(
            "Location: dashboard.php"
        );

        exit;
    }


    header(
        "Location: login.php?error=Email atau password salah"
    );

    exit;
}


/* ================= BOOKING ================= */

if (isset($_POST['booking'])) {


    if (!isset($_SESSION['user_id'])) {

        header(
            "Location: login.php"
        );

        exit;
    }


    $user =
        $_SESSION['user_id'];

    $lapangan =
        $_POST['lapangan'];

    $tanggal =
        $_POST['tanggal'];

    $jam =
        $_POST['jam'];


    $cek = $db->query("
        SELECT *
        FROM booking

        WHERE lapangan_id='$lapangan'

        AND tanggal='$tanggal'

        AND jam='$jam'

        AND status='Berhasil'
    ");


    if ($cek->num_rows > 0) {

        header(
            "Location: booking.php?error=Jadwal sudah dibooking"
        );

        exit;
    }


    $db->query("
        INSERT INTO booking
        (
            user_id,
            lapangan_id,
            tanggal,
            jam,
            status
        )

        VALUES
        (
            '$user',
            '$lapangan',
            '$tanggal',
            '$jam',
            'Berhasil'
        )
    ");


    header(
        "Location: dashboard.php"
    );

    exit;
}


/* ================= RESCHEDULE ================= */

if (isset($_POST['reschedule'])) {


    if (!isset($_SESSION['user_id'])) {

        header(
            "Location: login.php"
        );

        exit;
    }


    $id =
        $_POST['id'];

    $lapangan =
        $_POST['lapangan'];

    $tanggal =
        $_POST['tanggal'];

    $jam =
        $_POST['jam'];

    $user =
        $_SESSION['user_id'];


    $cek = $db->query("
        SELECT *
        FROM booking

        WHERE lapangan_id='$lapangan'

        AND tanggal='$tanggal'

        AND jam='$jam'

        AND status='Berhasil'

        AND id != '$id'
    ");


    if ($cek->num_rows > 0) {

        header(
            "Location: reschedule.php?id=$id&error=Jadwal sudah digunakan"
        );

        exit;
    }


    $db->query("
        UPDATE booking

        SET
            lapangan_id='$lapangan',
            tanggal='$tanggal',
            jam='$jam'

        WHERE id='$id'

        AND user_id='$user'
    ");


    header(
        "Location: dashboard.php"
    );

    exit;
}

?>