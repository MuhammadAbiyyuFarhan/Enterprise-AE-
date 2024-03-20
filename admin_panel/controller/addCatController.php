<?php
include_once "../config/dbconnect.php";

if(isset($_POST['upload']))
{
    // Mengambil nilai dari input formulir
    $pemesan = $_POST['pemesan'];
    $no_order = $_POST['No_Order'];
    $produk = $_POST['Produk'];
    $pic = $_POST['PIC'];
    $deadline = $_POST['Deadline'];
    $status = $_POST['Status'];

    // Menjalankan kueri untuk memasukkan data ke dalam tabel "project"
    $insert = mysqli_query($conn, "INSERT INTO project
        (pemesan, `No Order`, Produk, PIC, Deadline, Status) 
        VALUES ('$pemesan', '$no_order', '$produk', '$pic', '$deadline', '$status')");

    // Memeriksa apakah penyisipan data berhasil atau tidak
    if($insert)
    {
        // Menampilkan notifikasi
        echo "<script>
                alert('Data Berhasil Ditambahkan!');
                window.location.href = '../index.php'; // Mengarahkan kembali ke index.php
             </script>";
    }
    else
    {
        // Menampilkan notifikasi error
        echo "<script>
                alert('Error: " . mysqli_error($conn) . "');
             </script>";
    }
}
?>