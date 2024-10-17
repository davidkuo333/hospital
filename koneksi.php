<?php
    $koneksi = new mysqli('localhost', 'root', '', 'david_pplg1')
        or die(mysqli_error($koneksi));


        if (isset($_POST['simpan'])) {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $jk = $_POST['jk'];
            $alamat = $_POST['alamat'];
        
            // Use prepared statement to avoid SQL Injection
            $stmt = $koneksi->prepare("INSERT INTO pasien (idPasien, nmPasien, jk, alamat) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $id, $nama, $jk, $alamat);
            header ("location:pasien.php");
        
            if ($stmt->execute()) {
                header('Location: pasien.php');
                exit();
            } else {
                echo "Error: " . $stmt->error; // Output the error
            }
        
            $stmt->close();
        }


        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        
            // Use the correct column name and bind the variable $id
            $stmt = $koneksi->prepare("DELETE FROM pasien WHERE idPasien = ?");
            $stmt->bind_param("s", $id);
        
            if ($stmt->execute()) {
                header("Location: pasien.php");
                exit(); // Important to stop further execution after the redirect
            } else {
                echo "Error: " . $stmt->error;
            }
        
            // Close the statement
            $stmt->close();
        }
        

    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];

        $koneksi->query("UPDATE pasien SET id='$id', nama='$nama', jk='$jk', alamat='$alamat'");
        header("location:pasien.php");
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $koneksi->query("DELETE FROM pasien WHERE id = '$id'");
    
        // Set session variable for deletion notification
        $_SESSION['deleted'] = true;
    
        header("Location: pasien.php");
        exit();
    }

    
    
    

    
    ?>