<?php
include_once "../config/dbconnect.php";

$project_id = $_POST['project_id'];
$pemesan = $_POST['pemesan'];
$No_Order = $_POST['No_Order'];
$Produk = $_POST['Produk'];
$PIC = $_POST['PIC'];
$Deadline = $_POST['Deadline'];
$Status = $_POST['Status'];


if(isset($_POST['update']))
{ 
    // Menjalankan kueri untuk memperbarui data di tabel "project"
    $update = mysqli_query($conn, "INSERT INTO project
    (pemesan, `No Order`, Produk, PIC, Deadline, Status)
    VALUES ('$pemesan', '$No_Order', '$Produk', '$PIC', '$Deadline', '$Status')");
}
?>
