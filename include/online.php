<?php
  include('../connection/connect.php');

  session_start();
  // echo "<script>alert('done')</script>";
  if ($_SESSION['id'] == null) {

    echo "<script>window.location.href='/index.html'</script>";
  }
  else
  {

    $sql = 'SELECT * FROM `user_master`';
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        if($_SESSION['id']==$row['id'])
        {
          $sql='UPDATE online_user SET status=now() WHERE user_id='.$row['id'];
        
          if ($conn->query($sql) === TRUE) {
        
               $update= "true ";
        
          } else {
            $update= "false";
          }
        }

      } 
    }
    $sql_online = 'SELECT user_master.username,online_user.status  FROM `online_user` INNER JOIN user_master on online_user.user_id=user_master.id; ';
    $result_online = $conn->query($sql_online);

      // output data of each row
      while ($row = $result_online->fetch_assoc()) {
        echo $row['username'];
        echo "~~";
        echo $row['status'];
        echo "~~";



      
    }
  }



?>