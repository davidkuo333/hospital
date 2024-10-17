<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
        <div class="row mt-3">
            <div class="col-4">
                <h3>Tambah Data Karyawan</h3>
                <form action="koneksi_dokter.php" method="POST">
                    <div class="form-group">
                        <label for="id">ID Dokter</label>
                        <input type="text" class="form-control mb-3" name="id" placeholder="ID Dokter">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Dokter</label>
                        <input type="text" class="form-control mb-3" name="nama" placeholder="Nama Dokter">
                    </div>
                    <div class="form-group">
                        <label for="jk">Spesialisasi</label>
                        <input type="text" class="form-control mb-3" name="id" placeholder="Spesialisasi">
                    </div>
                    <div class="form-group mt-3">
                        <label for="alamat">No Telpon</label>
                        <input type="text" class="form-control mb-3" name="Telpon" placeholder="Telpon">
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