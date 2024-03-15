<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
        $ProductName = $_POST['p_name'];
        $desc= $_POST['p_desc'];
        $price = $_POST['p_price'];
        $category = $_POST['category'];
       
        $BOM = $_POST['p_bom'];

        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        $location="./uploads/";
        $image=$location.$name;

        $target_dir="../uploads/";
        $finalImage=$target_dir.$name;

        move_uploaded_file($temp,$finalImage);

        // Tambahkan nilai default untuk project_id
        $project_id = 1; // Ganti dengan nilai default yang sesuai
        
        // Masukkan data ke dalam tabel product
        $insert = mysqli_query($conn,"INSERT INTO product
         (product_name, product_desc, product_image, price, project_id, uploaded_date,BOM) 
         VALUES ('$ProductName', '$desc', '$image', $price, $project_id, NOW(),'$BOM')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../viewAllProducts.php?category=success");
         }
    }
?>
