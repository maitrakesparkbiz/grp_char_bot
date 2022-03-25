<?php
session_start();


include('../connection/connect.php');
if ($_POST['submit']) {

  // echo "<script>alert('done')</script>";

  $username = $_POST['username'];
  $psw = $_POST['psw'];

  $passowrd = md5($psw);
  $cnt = 0;
  $sql = 'SELECT * FROM `user_master` WHERE `role`=2';
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      if ($row['username'] == $username && $row['password'] == $passowrd) {
        $_SESSION['id'] = $row['id'];
        echo "<script>window.location.href='../home.php'</script>";
        $cnt++;
      }
    }
  }
  if ($cnt == 0) {
    echo "<script>alert('Username or password Wrong')</script>";
    echo "<script>window.location.href='../index.html'</script>";
  }
} else {
  echo "<script>alert('Please Login first')</script>";
  echo "<script>window.location.href='../index.html'</script>";
}
