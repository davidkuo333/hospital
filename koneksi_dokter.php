<?php
// Koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'david_pplg1') 
    or die(mysqli_error($koneksi));

// Simpan data dokter baru
if (isset($_POST['simpan'])) {
    $iddokter = $_POST['iddokter'];
    $namadokter = $_POST['namadokter'];
    $spesialisasi = $_POST['spesialisasi'];
    $notelp = $_POST['notelp'];
    
    // Gunakan prepared statement untuk menghindari SQL Injection
    $stmt = $koneksi->prepare("INSERT INTO dokter (idDokter, nmDokter, spesialisasi, noTelp) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $idDokter, $nmdDokter, $spesialisasi, $notelp);
    
    if ($stmt->execute()) {
        header('Location: karyawan.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Hapus data dokter
if (isset($_GET['hapus'])) {
    $iddokter = $_GET['hapus'];
    
    // Gunakan prepared statement untuk penghapusan
    $stmt = $koneksi->prepare("DELETE FROM dokter WHERE idDokter = ?");
    $stmt->bind_param("s", $iddokter);
    
    if ($stmt->execute()) {
        header('Location: karyawan.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Edit data dokter
if (isset($_POST['edit'])) {
    $iddokter = $_POST['iddokter'];
    $namadokter = $_POST['namadokter'];
    $spesialisasi = $_POST['spesialisasi'];
    $notelp = $_POST['notelp'];
    
    // Gunakan prepared statement untuk update
    $stmt = $koneksi->prepare("UPDATE dokter SET nmDokter = ?, spesialisasi = ?, noTelp = ? WHERE idDokter = ?");
    $stmt->bind_param("ssss", $namadokter, $spesialisasi, $notelp, $iddokter);
    
    if ($stmt->execute()) {
        header('Location: karyawan.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>
