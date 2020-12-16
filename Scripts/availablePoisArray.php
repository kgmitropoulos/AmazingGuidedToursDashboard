<?php
    //Connection to database
    include 'DbConnection.php';

$sql = "SELECT PoiName,PoiAddress,PoiBriefInfo,PoiDetailedInfo
FROM pointsofinterest;";

$result = $conn->query($sql);
$countrow=1;
if ($result->num_rows > 0) {
  
  $countrow=1;
  
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
      echo "<tr>"; 
      echo "<td>" .$countrow. ". "."</td>";
      echo  '<td>' . $row["PoiName"]."</td>"; 
      //echo  "<td>".$a."</td>";
      echo  '<td><textarea class="text-dark" rows="15" cols="60">'. $row["PoiBriefInfo"]."</textarea></td>";
      echo  '<td><textarea class="text-dark" rows="15" cols="60">'. $row["PoiDetailedInfo"]."</textarea></td>";
      echo "</tr>"; 
        $countrow++;
    }
} else {
    echo "No Available Points of Interest";
}


    mysqli_close($conn);

?>

      <script> 
        function myFunction() {
  alert("I am an alert box!");
  }
</script>
