<?php
    //Connection to database
    include 'DbConnection.php';

$sql = "SELECT DriverFirstName, DriverLastName, DriverEmailAddress
FROM drivers 
WHERE DriverAvailabillity=1;";
$result = $conn->query($sql);
$countrow=1;
if ($result->num_rows > 0) {
  
  $countrow=1;
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr>"; 
      echo "<td>" .$countrow. ". "."</td>";
      echo  "<td>" . $row["DriverFirstName"]."</td>"; 
      echo  "<td>" . $row["DriverLastName"] . "</td>"; 
      echo  "<td>" .$row["DriverEmailAddress"] . "</td>"; 
      echo "</tr>"; 
      $countrow++;
    }
} else {
    echo "No Available Drivers";
}


    mysqli_close($conn);

?>

