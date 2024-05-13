<?php
if(isset($_GET['kode'])){
    $sql_cek = "select * from tugas where id_tugas='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<?php
    $pdf= $data_cek['file_tugas'];
    if (file_exists("pdf/$pdf")){
        unlink("pdf/$pdf");
    }

    $sql_hapus = "DELETE FROM tugas WHERE id_tugas='".$_GET['kode']."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);
    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus tugas Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'page.php?page=MyApp/data_tugas'
        ;}})</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Hapus tugas Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'page.php?page=MyApp/data_tugas'
        ;}})</script>";
    }
