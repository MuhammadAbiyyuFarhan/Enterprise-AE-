<?php
include_once "../config/dbconnect.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role     = $_POST['role'];
    $insert = mysqli_query($conn, "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')");

    if ($insert) {
        // Jika berhasil, arahkan ke halaman indeks dengan pesan sukses
        echo "<script>
                alert('Penambahan data berhasil');
                window.location.href = '../index.php';
              </script>";
        exit();
    } else {
        // Jika gagal, arahkan ke halaman indeks dengan pesan kesalahan
        echo "<script>
                alert('Penambahan data gagal');
                window.location.href = '../index.php';
              </script>";
        exit();
    }
}
?>
