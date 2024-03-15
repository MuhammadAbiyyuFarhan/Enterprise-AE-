<?php
session_start();
if(isset($_SESSION['username'])){
  header("location:index.php");
}
$username = "";
$password = "";
$err = "";
include_once "./config/dbconnect.php";
if(isset($_POST['sign_in'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  if($username == '' && $password == ''){
    $err = "<li>Silahkan masukkan username dan password</li>";
  } 
  else {
    if($username == ''){
      $err = "<li>Masukkan Username</li>";
    }
    if ($password == '') {
      $err = "<li>Masukkan Password</li>";
    }
  }
  if (empty($err)) {
    $sql1 = "select * from users where username = '$username'";
    $q1 = mysqli_query($conn, $sql1);
    $r1 = mysqli_fetch_array($q1);
    if ($r1['password'] != md5($password)) {
      $err = "<li>akun tidak ditemukan</li>";
    }
    if(empty($err)){
      $_SESSION['username'] = $username;
      header("Location: index.php");
      exit();
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/style2.css">
</head>
<body>
    <div id="app">
        <h1>Sign In</h1>
        <?php
          if ($err) {
            echo "<ul class='error-message'>$err</ul>";
          }
        ?>
        <form action="" method="post" name="signinForm" onsubmit="return validateForm()">
            <div class="form-group">
                <input type="text" value="<?php echo $username?>" name="username" class="form-control" placeholder="Username"><br>
            </div>
            <div class="form-group">
                <input type="password" value="<?php echo $password?>" name="password" class="form-control" placeholder="Password"><br>
            </div>
            <div class="form-group">
                <input type="submit" name="sign_in" value="Sign In" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>

