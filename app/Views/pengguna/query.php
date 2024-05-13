<?php
include "../koneksi.php";

$nilai = $_POST['poin']; 
$ide = $_POST['sesi']; 
$dat = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * from pengguna WHERE id_anggota='$ide'"));

$query = mysqli_query($koneksi, "UPDATE pengguna SET point='$nilai' WHERE id_anggota='$ide'");


if($query){
    echo "success";
} else {
    echo "error";
}
?>