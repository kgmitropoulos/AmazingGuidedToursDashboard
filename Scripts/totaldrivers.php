<?php
include 'DbConnection.php';

  $sql = "SELECT COUNT(*) AS total AS total 
          FROM `drivers`";

  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_object($result) ;
  echo $row->total;
  mysqli_close($conn);

?>