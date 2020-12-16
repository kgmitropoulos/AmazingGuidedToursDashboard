<?php
    //Connection to database
    include 'DbConnection.php';

$sql = "SELECT VehicleType,VehicleNumberOfSeats,VehiclePlateNumber,VehicleNumber
FROM vehicles
WHERE VehicleAvailabillity=1
ORDER BY VehicleType;";
$result = $conn->query($sql);
$countrow=1;
if ($result->num_rows > 0) {
  
  $countrow=1;
    // output data of each row
    while($row = $result->fetch_assoc()) {      
      echo "<tr>";
        echo "<td>" .$countrow. ". "."</td>";
        echo  "<td>" .$row["VehicleType"]."</td>"; 
        echo  "<td>" .$row["VehicleNumberOfSeats"]."</td>";
        echo "<td>" .$row["VehiclePlateNumber"] ."</td>";
        echo "<td>" .$row["VehicleNumber"] . "</td>";
      echo "</tr>";      
      $countrow++;
    }
} else {
    echo "No Available Vehicles";
}


    mysqli_close($conn);

?>

