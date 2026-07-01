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
<title>Tambah Lowongan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

<h2>Tambah Data Lowongan</h2>

<form action="controller/LowonganController.php" method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Nama Perusahaan</label>
<input type="text" name="nama_perusahaan" class="form-control" required>
</div>

<div class="mb-3">
<label>Posisi</label>
<input type="text" name="posisi" class="form-control" required>
</div>

<div class="mb-3">
<label>Lokasi</label>
<input type="text" name="lokasi" class="form-control" required>
</div>

<div class="mb-3">
<label>Gaji</label>
<input type="text" name="gaji" class="form-control" required>
</div>

<div class="mb-3">
<label>Kualifikasi</label>
<textarea name="kualifikasi" class="form-control" required></textarea>
</div>

<div class="mb-3">
<label>Tanggal</label>
<input type="date" name="tanggal" class="form-control" required>
</div>

<div class="mb-3">
<label>Logo</label>
<input type="file" name="logo" class="form-control">
</div>

<button type="submit" name="simpan" class="btn btn-primary">
Simpan
</button>
<a href="data_lowongan.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html>