<?php
include_once "../config/dbconnect.php";

echo "Update Cat Controller accessed"; 

var_dump($_POST);

if(isset($_POST['update']))
{
    // Mengambil nilai dari input formulir
    $project_id = $_POST['project_id'];
    $pemesan = $_POST['pemesan'];
    $no_order = $_POST['No_Order'];
    $produk = $_POST['Produk'];
    $pic = $_POST['PIC'];
    $deadline = $_POST['Deadline'];
    $status = $_POST['Status'];

    // Menjalankan kueri untuk memperbarui data di tabel "project"
    $update = mysqli_query($conn, "UPDATE project SET
    pemesan = '$pemesan',
    `No Order` = '$no_order',
    Produk = '$produk',
    PIC = '$pic',
    Deadline = '$deadline',
    Status = '$status'
    WHERE project_id = '$project_id'");

    // Memeriksa apakah pembaruan data berhasil atau tidak
    if($update)
    {
    // Menampilkan notifikasi
    echo "<script>
            alert('Data Berhasil Diperbarui!');
            window.location.href = '../index.php'; // Mengarahkan kembali ke index.php
        </script>";
    }
    else
    {
    // Menampilkan notifikasi error
    echo "<script>
            alert('Error: " . mysqli_error($conn) . "');
            window.location.href = '../index.php'; // Mengarahkan kembali ke index.php
        </script>";
    }
}
?>
