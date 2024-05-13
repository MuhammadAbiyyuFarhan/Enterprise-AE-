<?php
if(isset($_GET['kode'])){
            $sql_hapus = "DELETE FROM project WHERE project_id='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            if ($query_hapus) {
                echo "<script>
                Swal.fire({title: 'Hapus Data Project Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=MyApp/data_project';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Hapus Data Project Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=NyApp/data_project';
                })</script>";
            }
        }