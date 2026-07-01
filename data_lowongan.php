<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require_once "model/Lowongan.php";

$lowongan = new Lowongan();

if(isset($_GET['cari'])){

    $data = $lowongan->cari($_GET['keyword']);

}else{

    $data = $lowongan->tampil();

}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Lowongan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

<h2>Data Lowongan Pekerjaan</h2>

<hr>

<a href="dashboard.php" class="btn btn-secondary">Kembali</a>

<a href="laporan/laporan_pdf.php" class="btn btn-success">
    Export PDF
</a>

<a href="tambah_lowongan.php" class="btn btn-primary">
Tambah Lowongan
</a>

<br><br>

<form method="GET" class="mb-3">

<div class="row">

<div class="col-md-4">
<input
type="text"
name="keyword"
class="form-control"
placeholder="Cari perusahaan, posisi atau lokasi">
</div>

<div class="col-md-2">
<button
type="submit"
name="cari"
class="btn btn-success">
Cari
</button>
</div>

</div>

</form>

<table class="table table-bordered">

<br>

<tr>
<th>No</th>
<th>Logo</th>
<th>Perusahaan</th>
<th>Posisi</th>
<th>Lokasi</th>
<th>Gaji</th>
<th>Aksi</th>
</tr>

<?php
$no = 1;
while($row = $data->fetch_assoc()){
?>

<tr>
<td><?= $no++; ?></td>

<td>
<?php if($row['logo'] != "") { ?>
    <img src="uploads/<?= $row['logo']; ?>" width="80">
<?php } else { ?>
    Tidak ada logo
<?php } ?>
</td>

<td><?= $row['nama_perusahaan']; ?></td>
<td><?= $row['posisi']; ?></td>
<td><?= $row['lokasi']; ?></td>
<td><?= $row['gaji']; ?></td>

<td>
   <a href="edit_lowongan.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
    Edit
</a>
    <a href="controller/LowonganController.php?hapus=<?= $row['id']; ?>"
       class="btn btn-danger btn-sm"
       onclick="return confirm('Yakin ingin menghapus data ini?')">
        Hapus
    </a>
</td>
<?php } 