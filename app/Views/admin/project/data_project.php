<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Project</title>
    <!-- Tambahkan link CSS dan skrip JS yang diperlukan di sini -->
</head>
<body>
    <?php
    // Koneksi ke database
    $koneksi = new mysqli("localhost", "root", "", "swiss_collection");

    // Periksa koneksi
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    // Ambil data proyek dari tabel 'project'
    $sql = "SELECT * FROM project";
    $result = $koneksi->query($sql);

    $projects = []; // Array untuk menyimpan data proyek

    if ($result->num_rows > 0) {
        // Mengambil setiap baris hasil kueri dan menyimpannya sebagai objek dalam array
        while ($row = $result->fetch_assoc()) {
            $projects[] = (object) $row;
        }
    } else {
        echo "0 hasil";
    }

    // Tutup koneksi
    $koneksi->close();

    // // Debugging print
    // echo "<pre>";
    // print_r($projects);
    // echo "</pre>";
    ?>

    <section class="content-header">
        <h1>
            <a href="index.php">
                <i class="fa fa-home"></i>
            </a>
            Kelola Project
            <small>Data Project</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <b>Enterperise PPC Automation Engineering</b>
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <a href="?page=MyApp/add_project" title="Tambah Data" class="btn btn-primary">
                    <i class="glyphicon glyphicon-plus"></i> Tambah SPK
                </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pemesan</th>
                                <th>No Order</th>
                                <th>Produk</th>
                                <th>PIC</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <!-- <th>project_id</th> -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($projects as $project) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= htmlspecialchars($project->pemesan); ?></td>
                                    <td><?= htmlspecialchars($project->no_order); ?></td>
                                    <td><?= htmlspecialchars($project->product_id); ?></td>
                                    <td><?= htmlspecialchars($project->worker_id); ?></td>
                                    <td><?= htmlspecialchars($project->deadline); ?></td>
                                    <td><?= htmlspecialchars($project->status); ?></td>
                                    <!-- <td><?= htmlspecialchars($project->project_id); ?></td> -->
                                    <td>
                                        <a href="?page=MyApp/more_project&kode=<?= htmlspecialchars($project->project_id); ?>" title="Info" class="btn btn-info">
                                            <i class="glyphicon glyphicon-info-sign"></i>
                                        </a>
                                        <a href="?page=MyApp/edit_project&kode=<?= htmlspecialchars($project->project_id); ?>" title="Ubah" class="btn btn-success">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>
                                        <a href="?page=MyApp/del_project&kode=<?= htmlspecialchars($project->project_id); ?>" onclick="return confirm('Yakin Hapus Project Ini ?')" title="Hapus" class="btn btn-danger">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
