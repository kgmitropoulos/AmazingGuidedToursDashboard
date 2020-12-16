<?php
    //Connection to database
    include 'DbConnection.php';

$sql = "SELECT GuideFirstName, GuideLastName, GuideEmailAddress
FROM Guides 
WHERE GuideAvailabillity=1;";
$result = $conn->query($sql);
$countrow=1;
if ($result->num_rows > 0) {
  
  $countrow=1;
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr>"; 
      echo "<td>" .$countrow. ". "."</td>";
      echo  "<td>" . $row["GuideFirstName"]."</td>"; 
      echo  "<td>" . $row["GuideLastName"] . "</td>"; 
      echo  "<td>" .$row["GuideEmailAddress"] . "</td>"; 
      echo "</tr>"; 
      $countrow++;
    }
} else {
    echo "No Available Guides";
}


    mysqli_close($conn);

?>