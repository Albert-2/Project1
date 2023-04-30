<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  include 'connect.php';
  $username = $_POST["username"];
  $password = $_POST["pass-1"];
  $cpassword = $_POST["pass-2"];
  $mobile = $_POST["mobile"];
  if ($password == $cpassword) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `toor` ( `username`, `password`, `mobile`) VALUES ('$username', '$hash', '$mobile')";
    $result = mysqli_query($conn, $sql);
    session_start();
    $_SESSION["username"] = $username;
    $_SESSION["login"] = true;
    header("location:index2.php");
  } else {
    header("location:index.html");
    exit;
  }
}
