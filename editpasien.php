<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="row mt-3">
        <div class="col-4">
            <h3>Edit Data Pasien</h3>
            <?php
            include 'koneksi.php';
            $panggil = $koneksi->query("SELECT * FROM pasien where id='$_GET[edit]'");

            while ($row = $panggil->fetch_assoc()) {
            ?>
            <form action="koneksi.php" method="POST">
                <div class=form-group>
                    <label for="id">ID Pasien</label>
                    <input type="text" class="form-control mb-3" name="id" placeholder="ID Pasien"
                        value="<?= $row['id'] ?>">
                </div>
                <div class=form-group>
                    <label for="nama">Nama Pasien</label>
                    <input type="text" class="form-control mb-3" name="nama" placeholder="Nama Pasien"
                        value="<?= $row['nama'] ?>">
                </div>
                <div class=form-group>
                    <label for="jk">Jenis Kelamin</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="jk" value="Perempuan" <?php if (($row['jk']) === "Perempuan") {
                            echo "checked";
                        }?>>Perempuan
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="jk" value="Laki-Laki" <?php if (($row['jk']) === "Laki-Laki") {
                            echo "checked";
                        }?>>Laki-Laki
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="5" rows="3" placeholder="Alamat" class="form-control"
                        value="<?= $row['alamat'] ?>"><?= $row['alamat'] ?></textarea>
                </div>
                <div class=" form-group mt-3">
                    <input type="submit" name="edit" value="Edit" class="form-control btn btn-primary">
                </div>
            </form>
            <?php    }   ?>
        </div>
    </div>
</body>

</html>