
<section class="content-header">
	<h1>
    <a href="page.php">
			<i class="fa fa-home"></i>
		</a>
		QUIZ
		<small> PRAKTIKUM APLIKASI KOMPUTASI AWAN</small>
	</h1>
</section>
	
	<div class="container-fluid admin">
		<div class="col-md-12 alert alert-primary">My Quiz List</div>
		<br>

 <body>
        <form action="?page=hasil" method="POST">
        <?php
        try {
            $pdo = include "koneksi.php";
            $query = $pdo->prepare("select * from pertanyaan order by rand() limit 50");
            $query->execute();
            echo '<ol>';
            while ($pertanyaan = $query->fetch()) {
                echo '<li>';
                echo htmlentities($pertanyaan['deskripsi']);
                $query2 = $pdo->prepare("select * from jawaban where id_pertanyaan = :id_pertanyaan order by rand()");
                $query2->execute(array("id_pertanyaan" => $pertanyaan['id']));
                echo '<ol type="A">';
                while($jawaban = $query2->fetch()) {
                    echo '<li>';
                    echo '<input type="radio" name="jawaban['.$pertanyaan['id'].']" value="'.$jawaban['id'].'"/> ';
                    echo htmlentities($jawaban['deskripsi']);
                    echo '</li>';
                }
                echo '</ol>';
                echo '</li>';
            }
            echo '</ol>';
        } catch (Exception $e) {
            echo "Gagal menampilkan pertanyaan. ";
            echo "Error: ".$e->getMessage();
        }
        ?>
        <button type="submit">Kirim Jawaban</button>
        </form>
    </body>
</html>

