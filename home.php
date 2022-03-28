<?php
session_start();
if ($_SESSION['id'] == null) {

  echo "<script>window.location.href='index.html'</script>";
}
// echo $_SESSION['id'];
include('connection/connect.php');
$sql = 'SELECT * FROM `user_master` where id=' . $_SESSION['id'];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $username = $row['username'];
/*     $photo = $row['photo']; */
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <style>
  @import url("https://fonts.googleapis.com/css?family=Space+Mono&display=swap");

body {
  margin: 0 auto;
  font-family: "Space Mono", monospace;
  font-size: 14px;
  max-width: 800px;
  width: 100%;
  border: 1px solid #ddd;
}
.header,
.t-head,
.footer,
.t-foot {
  height: 100px;
  max-width: 800px;
  width: 100%;
  text-align: center;
  background: #fff;

}
.footer,
.t-foot {
  height: 25px;
}
.t-head,
.t-foot {
  background: #fff;
}
.pr {
  position: fixed;
  right: 0;
  bottom: 10px;
  color: #aaa;
  letter-spacing: 1px;
  font-weight: normal;
  text-decoration: none;
}
.header {
  position: fixed;
  top: 0;
  border-bottom: 1px solid #ddd;

}
.footer {
  position: fixed;
  bottom: 0;
  border-top: 1px solid #ddd;
  padding-top: 1%;
padding-bottom: 5%;

}
.content {
  background: #f5ebeb;
  padding: 10px;
  margin-bottom: 15%;
margin-top: 12%;
}

@page {
  margin: 20mm;
}
@media print {
  body {
    border: 0;
  }
  thead {
    display: table-header-group;
  }
  tfoot {
    display: table-footer-group;
  }
  button {
    display: none;
  }
  body {
    margin: 0;
  }
}

</style>
</head>

<body onload="getdata();online();" >
<div class="header">
<div style="text-align: center;">
    <h4 id="username_display"><?php echo $username ?></h4>
    <button onclick="logout();">logout</button>
    <button onclick="update();">Update</button>
    <button onclick="del();">Del</button>
    <button onclick="user_online();">Online Users</button>
    
  </div>
<div id="show_online_users">
  <table id="status" style="background-color: #aaa;">


  </table>

</div>

  <div id="update" style="display: none;" style="text-align: center;">
 
      <br>
      <center>
        <table border="1px" style="background-color: #fff;">
          <tr>
            <td>
              <p>Enter Username</p>
            </td>
            <td>
              <input type="text" name="username" id="username" value="<?php echo $username ?>">
              <div id="validate_username" style="color: red;">Username only consist of alpabates</div>
            </td>
          </tr>
          <tr>
            <td>
              <p>Enter Password</p>
            </td>
            <td>
              <input type="password" name="psw" id="psw">
              <div id="validate_psw" style="color: red;">password>8 characters,1 lowercase,1 uppercase,1 numeric digit,1 special character</div>
            </td>
          </tr>
          <tr>
            <td>
              <p>Enter confirm Password</p>
            </td>
            <td>
              <input type="password" name="psw_cnf" id="psw_cnf">

              <div id="validate_psw_cnf" style="color: red;">password>8 characters,1 lowercase,1 uppercase,1 numeric digit,1 special character</div>

            </td>
          </tr>
          <tr>

          <tr>
            <td>
              <button type="button" onclick="return verified();">Update</button>
            </td>
         

          </tr>
        </table>
    
  </div>
  </center>
  </div>
  <div class="footer">
  <center>


  <input type="text" name="message" id="message">
  <input type="hidden" name="id" id="id" value="<?php $_SESSION['id']?>">

  <button onclick="send()" id="click1"> Send</button>

</center>
</div>

<div class="content">

<div id="show" style="color:#bfbfbf">


</div>


</div>



  

</body>
<script src='/chat/script/logout.js'>

alert("hello");
</script>

</html>