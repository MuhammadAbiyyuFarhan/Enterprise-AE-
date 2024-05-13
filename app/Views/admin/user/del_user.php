<?php
if(isset($_GET['kode'])){
            $sql_hapus = "DELETE FROM users WHERE id_user='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            if ($query_hapus) {
                echo "<script>
                Swal.fire({title: 'Hapus Data Admin Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=MyApp/data_user';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Hapus Data Admin Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=NyApp/data_user';
                })</script>";
            }
        }

