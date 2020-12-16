<?php
    //Connection to database
    include 'DbConnection.php';
    $selectvehicles = "SELECT * FROM vehicles WHERE VehicleAvailabillity = '1'";
    $vehiclesset = mysqli_query($conn, $selectvehicles) or die("database error:". mysqli_error($conn));

    $vehicles = array();
    while( $rows = mysqli_fetch_assoc($vehiclesset) ) {
        $vehicles[] = $rows;
    }
    
    mysqli_close($conn);

?>