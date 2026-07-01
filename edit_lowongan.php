<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require_once "model/Lowongan.php";

$lowongan = new Lowongan();

$id = $_GET['id'];
$data = $lowongan->getById($id);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Lowongan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h2>Edit Data Lowongan</h2>

<form action="controller/LowonganController.php" method="POST">

<input type="hidden" name="id" value="<?= $data['id']; ?>">

<div class="mb-3">
<label>Nama Perusahaan</label>
<input type="text" name="nama_perusahaan" class="form-control" value="<?= $data['nama_perusahaan']; ?>" required>
</div>
<div class="mb-3">
<label>Posisi</label>
<input type="text" name="posisi" class="form-control" value="<?= $data['posisi']; ?>" required>
</div>
<div class="mb-3">
<label>Lokasi</label>
<input type="text" name="lokasi" class="form-control" value="<?= $data['lokasi']; ?>" required>
</div>
<div class="mb-3">
<label>Gaji</label>
<input type="text" name="gaji" class="form-control" value="<?= $data['gaji']; ?>" required>
</div>
<div class="mb-3">
<label>Kualifikasi</label>
<textarea name="kualifikasi" class="form-control" required><?= $data['kualifikasi']; ?></textarea>
</div>
<div class="mb-3">
<label>Tanggal</label>
<input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal']; ?>" required>
</div>
<button type="submit" name="update" class="btn btn-primary">
Update
</button>
<a href="data_lowongan.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</body>
</html>