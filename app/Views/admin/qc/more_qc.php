<?php
// Lakukan koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "swiss_collection");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $project_id = $_POST['project_id'];
    $Pengujian_elektrik = isset($_POST['Pengujian_elektrik']) ? 1 : 0;
    $Pengujian_mekanik = isset($_POST['Pengujian_mekanik']) ? 1 : 0;
    $Pengujian_program = isset($_POST['Pengujian_program']) ? 1 : 0;

    $sql_update = "UPDATE proses_project SET 
        Pengujian_elektrik='$Pengujian_elektrik', 
        Pengujian_mekanik='$Pengujian_mekanik', 
        Pengujian_program='$Pengujian_program' 
        WHERE project_id='$project_id'";

    $result_update = mysqli_query($koneksi, $sql_update);
    if ($result_update) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

// Ambil nilai kode dari URL
$kode = isset($_GET['kode']) ? $_GET['kode'] : null;

if ($kode) {
    $sql = "SELECT * FROM qc_project WHERE project_id='$kode'";
    $result = mysqli_query($koneksi, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <style>
        table {
            background-color: transparent;
        }
        input[type="submit"],
        input[type="button"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #0056b3;
        }
        select {
            background-color: transparent;
            border: none;
            outline: none;
        }
        .detail-table {
            display: table-row;
        }
        </style>
        <section class="content-header">
            <!-- Bagian header Anda -->
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return confirmUpdate()">
                            <input type="hidden" name="project_id" value="<?php echo $kode; ?>">
                            <table id="example1" class="table table-bordered table-striped">
                                <tbody>
                                    <tr class="detail-table" id="detail_<?php echo $row['project_id']; ?>">
                                        <td colspan="3">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Pengujian</td>
                                                        <td>Checkbox</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pengujian_elektrik</td>
                                                        <td><input type="checkbox" name="Pengujian_elektrik" <?php echo ($row['Pengujian_elektrik'] == 1) ? 'checked' : ''; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pengujian_mekanik</td>
                                                        <td><input type="checkbox" name="Pengujian_mekanik" <?php echo ($row['Pengujian_mekanik'] == 1) ? 'checked' : ''; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pengujian_program</td>
                                                        <td><input type="checkbox" name="Pengujian_program" <?php echo ($row['Pengujian_program'] == 1) ? 'checked' : ''; ?>></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="submit" name="submit" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php
    } else {
        echo "Tidak ada data ditemukan untuk project_id tersebut.";
    }
} else {
    echo "Parameter kode tidak ditemukan.";
}

mysqli_close($koneksi);
?>
