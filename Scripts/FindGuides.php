<?php
    //Connection to database
    include 'DbConnection.php';
    $selectguides = "SELECT * FROM guides WHERE GuideAvailabillity = '1'";
    $guidesset = mysqli_query($conn, $selectguides ) or die("database error:". mysqli_error($conn));

    $guides  = array();
    while( $rows = mysqli_fetch_assoc($guidesset) ) {
        $guides [] = $rows;
    }

    mysqli_close($conn);

?>