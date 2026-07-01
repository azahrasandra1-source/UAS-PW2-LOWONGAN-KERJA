<?php
session_start();

require_once "../model/Lowongan.php";

$lowongan = new Lowongan();

if (isset($_POST['simpan'])) {

    $nama_perusahaan = $_POST['nama_perusahaan'];
    $posisi          = $_POST['posisi'];
    $lokasi          = $_POST['lokasi'];
    $gaji            = $_POST['gaji'];
    $kualifikasi     = $_POST['kualifikasi'];
    $tanggal         = $_POST['tanggal'];

    // Upload logo
    $logo = "";

    if ($_FILES['logo']['name'] != "") {

        $logo = time() . "_" . $_FILES['logo']['name'];

        move_uploaded_file(
            $_FILES['logo']['tmp_name'],
            "../uploads/" . $logo
        );
    }

    if ($lowongan->tambah(
        $nama_perusahaan,
        $posisi,
        $lokasi,
        $gaji,
        $kualifikasi,
        $tanggal,
        $logo
    )) {

        echo "<script>
                alert('Data berhasil disimpan');
                window.location='../data_lowongan.php';
              </script>";

    } else {

        echo "<script>
                alert('Data gagal disimpan');
                history.back();
              </script>";
    }

}

// ================= UPDATE =================

if (isset($_POST['update'])) {

    $id               = $_POST['id'];
    $nama_perusahaan  = $_POST['nama_perusahaan'];
    $posisi           = $_POST['posisi'];
    $lokasi           = $_POST['lokasi'];
    $gaji             = $_POST['gaji'];
    $kualifikasi      = $_POST['kualifikasi'];
    $tanggal          = $_POST['tanggal'];

    if ($lowongan->update(
        $id,
        $nama_perusahaan,
        $posisi,
        $lokasi,
        $gaji,
        $kualifikasi,
        $tanggal
    )) {

        echo "<script>
                alert('Data berhasil diupdate');
                window.location='../data_lowongan.php';
              </script>";

    } else {

        echo "<script>
                alert('Data gagal diupdate');
                history.back();
              </script>";
    }

}

// ================= HAPUS =================

if (isset($_GET['hapus'])) {

    $id = $_GET['hapus'];

    if ($lowongan->hapus($id)) {

        echo "<script>
                alert('Data berhasil dihapus');
                window.location='../data_lowongan.php';
              </script>";

    } else {

        echo "<script>
                alert('Data gagal dihapus');
                history.back();
              </script>";

    }
}

?>