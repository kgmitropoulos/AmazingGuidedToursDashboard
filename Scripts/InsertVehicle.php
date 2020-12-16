<!--PHP for inserting vehicle to database-->
<?php
    //Connection to database
    include 'DbConnection.php';
    //Insert form data to database
    if(isset($_POST['SaveVehicle'])){
        //Vehicle data
        $vhclNumber=$_POST['VehicleNumberField'];
        $vhclPlateNumber=$_POST['VehiclePlateNumberField'];
        $vhclType=$_POST['VehicleTypeField'];
        $vhclSeatsNum=$_POST['VehicleSeatsNumberField'];
        $vhclAvailable=$_POST['VehicleAvailabillityField'];
        if($vhclAvailable == "Yes"){
            $vhclAvailable=1;
        }else{
            $vhclAvailable=0;
        }
       
        //Text for insert vehicle SQL query
        $insertSqlTxt="INSERT INTO Vehicles (VehicleNumber, VehiclePlateNumber, VehicleType, VehicleNumberOfSeats, VehicleAvailabillity) values ('$vhclNumber', '$vhclPlateNumber', '$vhclType', '$vhclSeatsNum', '$vhclAvailable')";
        //Insert vehicle to database SQL query 
        $insertNewRecord=mysqli_query($conn, $insertSqlTxt);
        if($insertNewRecord){
            echo("<script>
                alert('Vehicle added succesfully');
                window.location.href='../addVehicleForm.php';
                </script>");
        }else{
            echo("<script>
                  alert('Error. Please try again!');
                  window.location.href='../addVehicleForm.php';
                  </script>");
        }
    }
    mysqli_close($conn);
?>  