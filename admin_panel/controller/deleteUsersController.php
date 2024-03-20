<?php
include_once "../config/dbconnect.php";

// Periksa apakah ID pengguna dikirimkan melalui permintaan POST
if(isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Query untuk menghapus pengguna berdasarkan ID
    $query = "DELETE FROM users WHERE user_id='$user_id'";
    
    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Periksa apakah penghapusan berhasil
    if($result) {
        // Tampilkan pesan alert sebelum mengarahkan pengguna
        echo "<script>
                alert('User is deleted');
                window.location.href = '../index.php'; // Arahkan ke halaman pengguna setelah alert ditampilkan
             </script>";
        exit(); // Pastikan tidak ada output lain sebelum redirect
    } else {
        echo "Unable to delete user.";
    }
} else {    
    echo "No user ID provided.";
}
?>
