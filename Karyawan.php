<?php
session_start(); // Start the session to access session variables
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunjungan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="pasien.php">Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Karyawan.php">Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="kunjungan.php">Kunjungan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row">
            <div class="col-sm">
                <h3>Tabel Karyawan</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="tambahkaryawan.php" class="btn btn-primary btn-sm d-flex justify-content-center">Tambah Data</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <table class="table table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Dokter</th>
                            <th>ID Nomor Dokter</th>
                            <th>Spesialisasi</th>
                            <th>Nomor Telpon</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'koneksi.php';
                        $no = 1;
                        $hasil = $koneksi->query("SELECT * FROM dokter");

                        while ($row = $hasil->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['idDokter']; ?></td>
                                <td><?= $row['nmDokter']; ?></td>
                                <td><?= $row['spesialisasi']; ?></td>
                                <td><?= $row['noTelp']; ?></td>

                                <td>
                                    <a href="editKaryawan.php?edit=<?= $row['idDokter']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $row['idDokter']; ?>)">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
