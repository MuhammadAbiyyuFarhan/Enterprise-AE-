<?php
    include_once "../config/dbconnect.php";
    
    $c_id = $_POST['record'];
    $query = "DELETE FROM project WHERE project_id='$c_id'";
    $data = mysqli_query($conn, $query);
?>