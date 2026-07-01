<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">

<div class="container">

<span class="navbar-brand">
Dashboard Lowongan Pekerjaan
</span>

<a href="logout.php" class="btn btn-light">
Logout
</a>

</div>

</nav>

<div class="container mt-4">

<div class="card">

<div class="card-body">

<h3>
Selamat Datang,
<?php echo $_SESSION['nama']; ?>
</h3>

<hr>

<h5>Menu</h5>

<a href="data_lowongan.php" class="btn btn-success">
Kelola Data Lowongan
</a>

</div>

</div>

</div>

</body>
</html>