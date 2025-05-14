<?php
include 'koneksi.php';

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;


$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_query = $search ? "WHERE nama_siswa LIKE '%$search%'" : '';


$query = "SELECT siswa.*, kelas.nama_kelas, wali_murid.nama_wali FROM siswa
           LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
           LEFT JOIN wali_murid ON siswa.id_wali = wali_murid.id_wali
           $search_query LIMIT $start, $limit";
$result = mysqli_query($koneksi, $query);

$total_query = "SELECT COUNT(*) AS total FROM siswa $search_query";
$total_result = mysqli_query($koneksi,$total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total = $total_row['total'];
$total_pages = ceil($total / $limit);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,0">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-3">Data Siswa</h2>
        <div class="d-flex justify


















$sql = "SELECT siswa.*, id_kelas.nama_kelas, wali_murid.nama_wali FROM siswa
       LEFT JOIN id_kelas ON siswa.id_kelas = id_kelas.id_kelas
       LEFT JOIN wali_murid ON siswa.id_wali = wali_murid.id_wali";
$result = mysqli_query($koneksi, $sql);

?>

<html>
    <head>
       <title>Data Siswa</title> 
</head>
<body>
    <a href="kelas.php">Kelola Kelas</a>
    <a href="wali_murid.php">Kelola Wali Murid</a>
    <a href="tambah_siswa.php">Tambah Siswa</a>
    <table border="1">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Kelas</th>
                <th>Wali Murid</th>
                <th>Aksi</th>
        </tr>
          </thead>
           <tbody>
            <?php while($data = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?php echo $data['nis'] ?></td>
                <td><?php echo $data['nama_siswa'] ?></td>
                <td><?php echo $data['jenis_kelamin'] ?></td>
                <td><?php echo $data['tempat_lahir'] ?></td>
                <td><?php echo $data['tanggal_lahir'] ?></td>
                <td><?php echo $data['id_kelas'] ?></td>
                <td><?php echo $data['id_wali'] ?></td>
                <td>
                    <a href="edit_siswa.php">Edit</a>
                    <a href="#">Hapus</a>
                </td>
       </tr>
       <?php endwhile; ?>
        <tbody>
    </table>
      </body>
          </html>
