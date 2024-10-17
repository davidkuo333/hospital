<?php
$koneksi = new mysqli('localhost', 'root', '', 'david_pplg1') or die(mysqli_error($koneksi));

// Create (Tambah Data)
if (isset($_POST['simpan'])) {
    $idKunjungan = $_POST['idKunjungan'];
    $idPasien = $_POST['idPasien'];
    $idDokter = $_POST['idDokter'];
    $tanggal = $_POST['tanggal'];
    $keluhan = $_POST['keluhan'];

    // Gunakan prepared statement untuk menghindari SQL Injection
    $stmt = $koneksi->prepare("INSERT INTO kunjungan (idKunjungan, idPasien, idDokter, tanggal, keluhan) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $idKunjungan, $idPasien, $idDokter, $tanggal, $keluhan);

    if ($stmt->execute()) {
        header('Location: kunjungan.php'); // Redirect setelah berhasil
        exit();
    } else {
        echo "Error: " . $stmt->error; // Tampilkan pesan error jika ada
    }

    $stmt->close();
}

// Read (Ambil Data)
if (isset($_GET['id'])) {
    $idKunjungan = $_GET['id'];

    $stmt = $koneksi->prepare("SELECT * FROM kunjungan WHERE idKunjungan = ?");
    $stmt->bind_param("s", $idKunjungan);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Ambil data sesuai ID yang diberikan
    }

    $stmt->close();
}

// Update (Edit Data)
if (isset($_POST['edit'])) {
    $idKunjungan = $_POST['idKunjungan'];
    $idPasien = $_POST['idPasien'];
    $idDokter = $_POST['idDokter'];
    $tanggal = $_POST['tanggal'];
    $keluhan = $_POST['keluhan'];

    $stmt = $koneksi->prepare("UPDATE kunjungan SET idPasien = ?, idDokter = ?, tanggal = ?, keluhan = ? WHERE idKunjungan = ?");
    $stmt->bind_param("sssss", $idPasien, $idDokter, $tanggal, $keluhan, $idKunjungan);

    if ($stmt->execute()) {
        header("Location: kunjungan.php"); // Redirect setelah berhasil
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Delete (Hapus Data)
if (isset($_GET['hapus'])) {
    $idKunjungan = $_GET['hapus'];

    $stmt = $koneksi->prepare("DELETE FROM kunjungan WHERE idKunjungan = ?");
    $stmt->bind_param("s", $idKunjungan);

    if ($stmt->execute()) {
        header("Location: kunjungan.php");
        exit(); // Stop eksekusi setelah redirect
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

?>
