<?php
    //Connection to database
    include 'DbConnection.php';

    $cars = mysql_query(" SELECT COUNT(*) as total
              FROM vehicles
              WHERE VehicleType='CAR' ");
      
    $minibus = "  SELECT COUNT(VehicleType)
                  FROM vehicles
                  WHERE VehicleType='MINI BUS'  ";
    $guides = " SELECT COUNT(*)
                FROM GUIDES ";

    $pois = " SELECT COUNT(*)
              FROM POINTSOFINTEREST ";



    mysqli_close($conn);

?>



