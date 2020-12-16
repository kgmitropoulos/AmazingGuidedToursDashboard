<?php
    //Connection to database
    include 'DbConnection.php';

$sql = "SELECT COUNT(`VehicleType`) AS total 
          FROM `vehicles`
          WHERE VehicleType='CAR' AND VehicleAvailabillity=1";
$result = $conn->query($sql);

$row = mysqli_fetch_object($result) ;

echo $row->total;
mysqli_close($conn);

?>

