<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kunjungan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row mt-3">
        <div class="col-4">
            <h3>Tambah Data Kunjungan</h3>
            <form action="koneksi_kunjungan.php" method="POST">
                <div class="form-group">
                    <label for="idKunjungan">ID Kunjungan</label>
                    <input type="text" class="form-control mb-3" name="idKunjungan" placeholder="ID Kunjungan" required>
                </div>
                <div class="form-group">
                    <label for="idPasien">ID Pasien</label>
                    <input type="text" class="form-control mb-3" name="idPasien" placeholder="ID Pasien" required>
                </div>
                <div class="form-group">
                    <label for="idDokter">ID Dokter</label>
                    <input type="text" class="form-control mb-3" name="idDokter" placeholder="ID Dokter" required>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control mb-3" name="tanggal" required>
                </div>
                <div class="form-group mt-3">
                    <label for="keluhan">Keluhan</label>
                    <textarea class="form-control mb-3" name="keluhan" placeholder="Keluhan" required></textarea>
                </div>
                <div class="form-group mt-3">
                    <input type="submit" name="simpan" value="Simpan" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
