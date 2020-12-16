<?php
include 'DbConnection.php';

  $sql = "SELECT COUNT(*) AS total 
          FROM `POINTSOFINTEREST`";

  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_object($result) ;
  echo $row->total;
  mysqli_close($conn);

?>