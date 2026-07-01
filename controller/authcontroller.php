<?php
session_start();

require_once "../model/User.php";

$user = new User();

// ================= REGISTER =================
if (isset($_POST['register'])) {

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user->register($nama, $username, $password)) {

        echo "<script>
            alert('Registrasi berhasil!');
            window.location='../login.php';
        </script>";

    } else {

        die("Register Gagal!");
    }
}

// ================= LOGIN =================
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = $user->login($username, $password);

    if ($data) {

        $_SESSION['login'] = true;
        $_SESSION['id'] = $data['id'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['username'] = $data['username'];

        header("Location: ../dashboard.php");
        exit;

    } else {

        echo "<script>
            alert('Username atau Password salah!');
            history.back();
        </script>";
    }
}
?>