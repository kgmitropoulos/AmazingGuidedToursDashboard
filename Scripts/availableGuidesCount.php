<?php
    //Connection to database
    include 'DbConnection.php';

$sql = "SELECT COUNT(`GuideAvailabillity`) AS total 
          FROM `Guides`
          WHERE GuideAvailabillity=1";
$result = $conn->query($sql);

$row = mysqli_fetch_object($result) ;

echo $row->total;
mysqli_close($conn);

?>

