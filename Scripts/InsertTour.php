<?php
    //Connection to database
    include 'DbConnection.php';
    //Insert form data to database
    if(isset($_POST['SaveTour'])){
        //tour data
        //Selected customer
        $tourCustomerName=$_POST['GuidedTourCustomerField'];
        //Find Customer user id
        //Split Customer name to UserFirstName and UserLastName
        $userNameParts = explode(" - ", $tourCustomerName);
        //Query text for finding user id
        $finduserid = "SELECT UserId FROM useraccounts WHERE UserFirstName = '$userNameParts[0]' AND UserLastName = '$userNameParts[1]'";
        $useridset = mysqli_query($conn, $finduserid);
        $qrFindUsrRowCount = mysqli_num_rows($useridset);
        if ($qrFindUsrRowCount!=0){
            $userIdRecord = mysqli_fetch_row($useridset);
            //This goes to insert query    
            $customerUserId = $userIdRecord[0];
        }else{
            echo '<html><meta charset="UTF-8"><script language="javascript">alert("Error during inserting customer data "); document.location="../InsertGuidedTour.php";</script></html>';
        }
        
        //Number of visitors
        $tourVisitorsNum=$_POST['GuidedTourVisitorsNumberField'];
        //Tour Date
        $tourDate=$_POST['GuidedTourDateField'];
        //Tour start time
        $tourStartTime=$_POST['GuidedTourStartTimeField'];
        //Tour end time
        $tourEndTime=$_POST['GuidedTourEndTimeField'];
        
        //Selected start poi
        $tourSelectedStartPoi = $_POST['GuidedTourStartPoiField'];
        //Find start poi id
        //Query text for finding poi id
        $findspoiid = "SELECT PoiId FROM pointsofinterest WHERE PoiName = '$tourSelectedStartPoi'";
        $poisidset = mysqli_query($conn, $findspoiid);
        $qrFindSPoiRowCount = mysqli_num_rows($poisidset);
        if ($qrFindSPoiRowCount!=0){
            $spoiIdRecord = mysqli_fetch_row($poisidset);
            //This goes to insert query    
            $tourStartPoiId = $spoiIdRecord[0];
        }else{
            echo '<html><meta charset="UTF-8"><script language="javascript">alert("Error during inserting start poi data"); document.location="../InsertGuidedTour.php";</script></html>';
        }
        
        //Selected end poi
        $tourSelectedEndPoi = $_POST['GuidedTourEndPoiField'];
        //Find start poi id
        //Query text for finding poi id
        $findepoiid = "SELECT PoiId FROM pointsofinterest WHERE PoiName = '$tourSelectedEndPoi'";
        $poieidset = mysqli_query($conn, $findepoiid);
        $qrFindEPoiRowCount = mysqli_num_rows($poieidset);
        if ($qrFindEPoiRowCount!=0){
            $epoiIdRecord = mysqli_fetch_row($poieidset);
            //This goes to insert query    
            $tourEndPoiId = $epoiIdRecord[0];
        }else{
            echo '<html><meta charset="UTF-8"><script language="javascript">alert("Error during inserting end poi data"); document.location="../InsertGuidedTour.php";</script></html>';
        }
        
        //Selected vehicle
        $tourSelectedVehicle =$_POST['GuidedTourVehicleField'];
        //Query text for finding vehicle id
        $findvehicleid = "SELECT VehicleId FROM vehicles WHERE VehicleNumber = '$tourSelectedVehicle'";
        $vehicleidset = mysqli_query($conn, $findvehicleid);
        $qrFindVhlRowCount = mysqli_num_rows($vehicleidset);
        if ($qrFindVhlRowCount!=0){
            $vehicleIdRecord = mysqli_fetch_row($vehicleidset);
            //This goes to insert query    
            $tourVehicleId = $vehicleIdRecord[0];
        }else{
            echo '<html><meta charset="UTF-8"><script language="javascript">alert("Error during inserting vehicle data"); document.location="../InsertGuidedTour.php";</script></html>';
        }
        
         //Selected guide
        $tourDriverName=$_POST['GuidedTourDriverField'];
        //Find Driver id
        //Split Customer name to UserFirstName and UserLastName
        $driverNameParts= explode(" - ", $tourDriverName);
        //Query text for finding user id
        $finddriverid = "SELECT DriverId FROM drivers WHERE DriverFirstName = '$driverNameParts[0]' AND DriverLastName = '$driverNameParts[1]'";
        $driveridset = mysqli_query($conn, $finddriverid);
        $qrFindDrvRowCount = mysqli_num_rows($driveridset);
        if ($qrFindDrvRowCount!=0){
            $driverIdRecord = mysqli_fetch_row($driveridset);
            //This goes to insert query    
            $tourDriverId = $driverIdRecord[0];
        }else{
            echo '<html><meta charset="UTF-8"><script language="javascript">alert("Error during inserting driver data"); document.location="../InsertGuidedTour.php";</script></html>';
        }
        
        //Selected guide
        $tourGuideName=$_POST['GuidedTourGuideField'];
        //Find Customer user id
        //Split Customer name to UserFirstName and UserLastName
        $guideNameParts= explode(" - ", $tourGuideName);
        //Query text for finding user id
        $findguideid = "SELECT GuideId FROM guides WHERE GuideFirstName = '$guideNameParts[0]' AND GuideLastName = '$guideNameParts[1]'";
        $guideidset = mysqli_query($conn, $findguideid);
        $qrFindGdRowCount = mysqli_num_rows($guideidset);
        if ($qrFindGdRowCount!=0){
            $guideIdRecord = mysqli_fetch_row($guideidset);
            //This goes to insert query    
            $tourGuideId = $guideIdRecord[0];
        }else{
            echo '<html><meta charset="UTF-8"><script language="javascript">alert("Error during inserting guide data"); document.location="../InsertGuidedTour.php";</script></html>';
        }
        
        
        //Insert Guided Tour To DB
        //Sql query text
        $insertTourSqlTxt="INSERT INTO guidedtours (GuidedTourCustomer, NumberOfVisitors, GuidedTourDate, GuidedTourStartTime, GuidedTourEndTime, GuidedTourStartPoi, GuidedTourEndPoi, GuidedTourVehicle, GuidedTourVehicleDriver, GuidedTourVehicleGuide) values ('$customerUserId', '$tourVisitorsNum', '$tourDate', '$tourStartTime', '$tourEndTime','$tourStartPoiId','$tourEndPoiId', '$tourVehicleId','$tourDriverId', '$tourGuideId')";
       
        //Insert user to database SQL query 
        $insertNewTourRecord=mysqli_query($conn, $insertTourSqlTxt);
        if($insertNewTourRecord){
            echo("Guided tour added succesfully");
        }else{
            echo("Error. Please try again!");
        }
        
    }
?>