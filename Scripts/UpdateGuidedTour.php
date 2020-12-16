<?php
    //Connection to database
    include 'DbConnection.php';
    if(isset($_POST['ConfirmTour'])){
        $currentTourId=$_POST['TourIdField'];
         
        //Selected vehicle
        $crTourSelectedVehicle =$_POST['GuidedTourVehicleField'];
        //Query text for finding vehicle id
        $findCRTvehicleid = "SELECT VehicleId FROM vehicles WHERE VehicleNumber = '$crTourSelectedVehicle'";
        $crTvehicleidset = mysqli_query($conn, $findCRTvehicleid);
        $qrCRTFindVhlRowCount = mysqli_num_rows($crTvehicleidset);
        if ($qrCRTFindVhlRowCount!=0){
            $crTVehicleIdRecord = mysqli_fetch_row($crTvehicleidset);
            //This goes to insert query    
            $currentTourVhclId = $crTVehicleIdRecord[0];
        }else{
            echo '<html><meta charset="UTF-8"><script language="javascript">alert("Error during inserting vehicle data"); document.location="../InsertGuidedTour.php";</script></html>';
        }
        
         //Selected guide
        $currTourDriverName=$_POST['GuidedTourDriverField'];
        //Find Driver id
        //Split Customer name to UserFirstName and UserLastName
        $currDriverNameParts= explode(" - ", $currTourDriverName);
        //Query text for finding user id
        $findCrDriverid = "SELECT DriverId FROM drivers WHERE DriverFirstName = '$currDriverNameParts[0]' AND DriverLastName = '$currDriverNameParts[1]'";
        $crDriveridset = mysqli_query($conn, $findCrDriverid);
        $qrFindCrDrvRowCount = mysqli_num_rows($crDriveridset);
        if ($qrFindCrDrvRowCount!=0){
            $crDriverIdRecord = mysqli_fetch_row($crDriveridset);
            //This goes to insert query    
            $currentTourVhclDrId = $crDriverIdRecord[0];
        }else{
            echo '<html><meta charset="UTF-8"><script language="javascript">alert("Error during inserting driver data"); document.location="../InsertGuidedTour.php";</script></html>';
        }
        
        //Selected guide
        $currTourGuideName=$_POST['GuidedTourGuideField'];
        //Find Customer user id
        //Split Customer name to UserFirstName and UserLastName
        $currGuideNameParts= explode(" - ", $currTourGuideName);
        //Query text for finding user id
        $findCrguideid = "SELECT GuideId FROM guides WHERE GuideFirstName = '$currGuideNameParts[0]' AND GuideLastName = '$currGuideNameParts[1]'";
        $crGuideidset = mysqli_query($conn, $findCrguideid);
        $qrFindCrGdRowCount = mysqli_num_rows($crGuideidset);
        if ($qrFindCrGdRowCount!=0){
            $crGuideIdRecord = mysqli_fetch_row($crGuideidset);
            //This goes to insert query    
            $currentTourVhclGdId = $crGuideIdRecord[0];
        }else{
            echo '<html><meta charset="UTF-8"><script language="javascript">alert("Error during inserting guide data"); document.location="../InsertGuidedTour.php";</script></html>';
        }
        
        
        
        $updtGdTour="UPDATE guidedtours SET GuidedTourVehicle ='$currentTourVhclId', GuidedTourVehicleDriver='$currentTourVhclDrId', GuidedTourVehicleGuide='$currentTourVhclGdId', GuidedTourConfirmed='1' WHERE GuidedTourId='$currentTourId'";
        $qrUpdtGdTourRes = mysqli_query($conn,$updtGdTour);
        $qrUpdtGdTourRCount = mysqli_affected_rows($conn);

        //Message for succesfull or not update
        if (mysqli_affected_rows($conn) ==0){
            echo '<html><meta charset="UTF-8"><script language="javascript">alert("There was an error"); document.location="../EditGuidedTour.php";</script></html>';
        }else{
            echo '<html><meta charset="UTF-8"><script language="javascript">alert("Success!"); document.location="../UnconfirmedTours.php";</script></html>';

        }

    }

     mysqli_close($conn);
?>