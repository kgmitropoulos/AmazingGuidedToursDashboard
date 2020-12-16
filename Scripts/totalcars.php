<?php
include 'DbConnection.php';

  $sql = "SELECT COUNT(`VehicleType`) AS total 
          FROM `vehicles`
          WHERE VehicleType='CAR'";

  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_object($result) ;
  echo $row->total;
  mysqli_close($conn);

?>