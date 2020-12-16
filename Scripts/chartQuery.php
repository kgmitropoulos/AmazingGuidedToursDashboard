<!--PHP for connecting to database-->
<?php
    $serverAddress='localhost';
    $userName='guidedtoursadmin';
    $password='12345';
    $dbName='guidedtours_db';
    // Connection creation
    $conn = mysqli_connect($serverAddress, $userName, $password, $dbName);

    $query = "SELECT VehicleAvailabillity, COUNT(*) AS NUMBER 
              FROM vehicles 
              GROUP BY VehicleAvailabillity";
    
    
    $result=mysqli_query($conn, $query);
mysqli_close($conn);
?>