<?php
if(isset($_GET['kode'])){
            $sql_hapus = "DELETE FROM worker WHERE worker_id='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            if ($query_hapus) {
                echo "<script>
                Swal.fire({title: 'Hapus Data Worker Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=MyApp/data_worker';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Hapus Data Worker Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=NyApp/data_worker';
                })</script>";
            }
        }

