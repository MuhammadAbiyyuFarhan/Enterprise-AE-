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
    $konsep_design = isset($_POST['Konsep_Design']) ? 1 : 0;
    $material_preparation = isset($_POST['Material_Preparation']) ? 1 : 0;
    $machining = isset($_POST['Machining']) ? 1 : 0;
    $assy = isset($_POST['Assy']) ? 1 : 0;
    $trial_improve = isset($_POST['TrialImprove']) ? 1 : 0;
    $delivery = isset($_POST['Delivery']) ? 1 : 0;
    $keuangan = isset($_POST['Keuangan']) ? 1 : 0;

    // Debugging
    echo "Project ID: $project_id<br>";
    echo "Konsep Design: $konsep_design<br>";
    echo "Material Preparation: $material_preparation<br>";
    echo "Machining: $machining<br>";
    echo "Assy: $assy<br>";
    echo "Trial/Improve: $trial_improve<br>";
    echo "Delivery: $delivery<br>";
    echo "Keuangan: $keuangan<br>";

    $sql_update = "UPDATE proses_project SET 
    `Konsep_Design`='$konsep_design', 
    `Material_Preparation`='$material_preparation', 
    `Machining`='$machining', 
    `Assy`='$assy', 
    `TrialImprove`='$trial_improve', 
    `Delivery`='$delivery', 
    `Keuangan`='$keuangan' 
    WHERE project_id='$project_id'";

    $result_update = mysqli_query($koneksi, $sql_update);
    if ($result_update) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}



// Ambil nilai kode dari URL
$kode = $_GET['kode'];

// Periksa apakah nilai kode sudah tersedia
if (isset($kode)) {
    // Buat query untuk mengambil data hanya untuk project_id tertentu
    $sql = "SELECT * FROM proses_project WHERE project_id='$kode'";
    $result = mysqli_query($koneksi, $sql);
    if ($result) {
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
                                    <?php
                                    // Mulai perulangan untuk menampilkan data
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr class="detail-table" id="detail_<?php echo $row['project_id']; ?>">
                                            <td colspan="3">
                                                <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td>Proses</td>
                                                    <td>Waktu</td>
                                                    <td>Checkbox</td>
                                                </tr>
                                                <tr>
                                                    <td>Konsep Design</td>
                                                    <td>3D</td>
                                                    <td><input type="checkbox" name="Konsep_Design" <?php echo (isset($row['Konsep_Design']) && $row['Konsep_Design'] == 1) ? 'checked' : ''; ?>></td>
                                                </tr>
                                                <tr>
                                                    <td>Material Preparation</td>
                                                    <td>14D</td>
                                                    <td><input type="checkbox" name="Material_Preparation"<?php echo (isset($row['Material_Preparation']) && $row['Material_Preparation'] == 1) ? 'checked' : ''; ?>></td>
                                                </tr>
                                                <tr>
                                                    <td>Machining</td>
                                                    <td>5D</td>
                                                    <td><input type="checkbox" name="Machining"<?php echo (isset($row['Machining']) && $row['Machining'] == 1) ? 'checked' : ''; ?>></td>
                                                </tr>
                                                <tr>
                                                    <td>Assy</td>
                                                    <td>2D</td>
                                                    <td><input type="checkbox" name="Assy"<?php echo (isset($row['Assy']) && $row['Assy'] == 1) ? 'checked' : ''; ?>></td>
                                                </tr>
                                                <tr>
                                                    <td>Trial/Improve</td>
                                                    <td>5D</td>
                                                    <td><input type="checkbox" name="TrialImprove"<?php echo (isset($row['TrialImprove']) && $row['TrialImprove'] == 1) ? 'checked' : ''; ?>></td>
                                                </tr>
                                                <tr>
                                                    <td>Delivery</td>
                                                    <td>6D</td>
                                                    <td><input type="checkbox" name="Delivery"<?php echo (isset($row['Delivery']) && $row['Delivery'] == 1) ? 'checked' : ''; ?>></td>
                                                </tr>
                                                <tr>
                                                    <td>Keuangan</td>
                                                    <td>3D</td>
                                                    <td><input type="checkbox" name="Keuangan"<?php echo (isset($row['Keuangan']) && $row['Keuangan'] == 1) ? 'checked' : ''; ?>></td>
                                                </tr>

                                            </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
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
