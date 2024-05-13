<?php
    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM pengguna WHERE id_anggota='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<section class="content-header">
	<h1>
    <a href="page.php">
			<i class="fa fa-home"></i>
		</a>
		MATERI 14
		<small> APLIKASI KOMPUTASI AWAN 2</small>
	</h1>
</section>

<div id="materi" class="container-fluid text-center">
    <br>
        <img class="img-fluid" src="assets/img/Modul14/0.jpg" alt="..." style="width:80%" ; />
    <br>
        <img class="img-fluid" src="assets/img/Modul14/1.jpg" alt="..." style="width:80%" ; />
    <br>
        <img class="img-fluid" src="assets/img/Modul14/2.jpg" alt="..." style="width:80%" ; />
    <br>
        <img class="img-fluid" src="assets/img/Modul14/3.jpg" alt="..." style="width:80%" ; />
    <br>
        <img class="img-fluid" src="assets/img/Modul14/4.jpg" alt="..." style="width:80%" ; />

 
  
        
    <a href="https://drive.google.com/file/d/18ISfUpughKF1MMIPLZZ-2emtUkGaY3N4/view?usp=share_link" class="button">
        <br><button class="btn btn-default btn-primary">Download</button></a>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
                                                                               
    <script>
      var point = 15;
      var id = <?= $_SESSION["ses_id"] ?>;
      console.log(id);

    
    function myFunc(){
        myFunc = function(){};
        // alert('You\'ve reached the bottom');
        $.ajax({
                type: 'POST',
                url: "pengguna/query.php",
                data: {
                  "poin" : point,
                  "sesi" : id
                },
                success: function(response) {
                  console.log(response);
                }
              });
    }

    window.addEventListener('scroll', function(){
        // const scrollable = document.documentElement.scrollHeight = window.innerHeight;
    const scrolled = window.scrollY;
        console.log(scrolled);
        // function myFunc()
    if(Math.ceil(scrolled) >= 1600){
        myFunc();
        }
    });


    </script>