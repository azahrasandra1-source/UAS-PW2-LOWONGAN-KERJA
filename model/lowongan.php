<?php
require_once "C:/xampp/htdocs/PW2/UAS_pw2/config/database.php";

class Lowongan
{
    private $conn;
    private $table = "lowongan";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    // Menampilkan semua data
    public function tampil()
    {
        $query = "SELECT * FROM $this->table ORDER BY id DESC";
        return $this->conn->query($query);
    }

    // Pencarian
public function cari($keyword)
{
    $query = "SELECT * FROM lowongan
              WHERE nama_perusahaan LIKE ?
              OR posisi LIKE ?
              OR lokasi LIKE ?";

    $stmt = $this->conn->prepare($query);

    $cari = "%$keyword%";

    $stmt->bind_param("sss", $cari, $cari, $cari);
    $stmt->execute();

    return $stmt->get_result();
}

    // Menambah data
    public function tambah($nama_perusahaan, $posisi, $lokasi, $gaji, $kualifikasi, $tanggal, $logo)
    {
        $query = "INSERT INTO $this->table
        (nama_perusahaan, posisi, lokasi, gaji, kualifikasi, tanggal, logo)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "sssssss",
            $nama_perusahaan,
            $posisi,
            $lokasi,
            $gaji,
            $kualifikasi,
            $tanggal,
            $logo
        );

        return $stmt->execute();
    }

    // Hapus data
public function hapus($id)
{
    $query = "DELETE FROM lowongan WHERE id=?";

    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $id);

    return $stmt->execute();
  }

  // Ambil data berdasarkan ID
public function getById($id)
{
    $query = "SELECT * FROM lowongan WHERE id=?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    return $stmt->get_result()->fetch_assoc();
}

// Update data
public function update($id, $nama_perusahaan, $posisi, $lokasi, $gaji, $kualifikasi, $tanggal)
{
    $query = "UPDATE lowongan
              SET nama_perusahaan=?,
                  posisi=?,
                  lokasi=?,
                  gaji=?,
                  kualifikasi=?,
                  tanggal=?
              WHERE id=?";

    $stmt = $this->conn->prepare($query);

    $stmt->bind_param(
        "ssssssi",
        $nama_perusahaan,
        $posisi,
        $lokasi,
        $gaji,
        $kualifikasi,
        $tanggal,
        $id
    );

    return $stmt->execute();
}

}
?>