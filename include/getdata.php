<?php
  include('../connection/connect.php');

  session_start();
  // echo "<script>alert('done')</script>";
  if ($_SESSION['id'] == null) {

    echo "<script>window.location.href='/index.html'</script>";
  }
  else
  {

    $sql = 'SELECT user_master.username,log.description,log.created_at FROM `log` INNER JOIN user_master on log.user_id= user_master.id ORDER by log.id DESC ';
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo $row['username'];
        echo "~~";
        echo $row['description'];
        echo "~~";
        echo $row['created_at'];
        echo "~~";


      }

      
    }
  }



?>