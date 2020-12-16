<?php
    //Connection to database
    include 'DbConnection.php';
    $selectdrivers = "SELECT * FROM drivers WHERE DriverAvailabillity = '1';";
    $driversset = mysqli_query($conn, $selectdrivers) or die("database error:". mysqli_error($conn));

    $drivers = array();
    while( $rows = mysqli_fetch_assoc($driversset) ) {
        $drivers[] = $rows;
    }

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
    }
} /*else {
    echo "0 results";
}*/

    mysqli_close($conn);

?>