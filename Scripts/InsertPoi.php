<!--PHP για εισαγωγη στη βάση δεδομένων-->
<?php
    //Connection to database
    include 'DbConnection.php';
    //Insert form data to database
    if(isset($_POST['saveData'])){
        //Poi data
        $poiName=$_POST['PoiNameField'];
        $poiAddress=$_POST['PoiAddressField'];
        $poiLatitude=$_POST['PoiLatitudeField'];
        $poiLongitude=$_POST['PoiLongitudeField'];
        $poiBrfInfo=$_POST['PoiBriefInfoField'];
        $poiFullInfo=$_POST['PoiDetailedInfoField'];
        //Define image data and upload image if exists
        if(!empty($_FILES['imageFile'])){
            //Path to upload (from this php file)
            $targetPathCr = "../imagelibrary/";
            //Path to uploaded image
            $targetPath = "imagelibrary/";
            //Uploaded mage Info
            $imgTargetName = $_FILES['imageFile']['name'];
            $imgTmpName = $_FILES['imageFile']['tmp_name'];
            //Create path if not exists
            makeDir($targetPathCr);
            $imageLocation = $targetPath;
            //Upload image
            move_uploaded_file($imgTmpName, $targetPathCr . $imgTargetName);
            
        }else{
            //If there is no image
            $imgTargetName="";
            $imageLocation="";
        }
        
        //Sql query text
        $insertSqlTxt="INSERT INTO pointsofinterest (PoiName, PoiAddress, PoiLatitude, PoiLongitude, PoiBriefInfo, PoiDetailedInfo, PoiPhotoName, PoiPhotoPath) values ('$poiName', '$poiAddress', '$poiLatitude', '$poiLongitude', '$poiBrfInfo','$poiFullInfo','$imgTargetName', '$imageLocation')";
       
        //Insert user to database SQL query 
        $insertNewRecord=mysqli_query($conn, $insertSqlTxt);
        if($insertNewRecord){
            echo("<script>
                alert('POI added succesfully');
                window.location.href='../addPoiForm.php';
                </script>");
        }else{
            echo("<script>
                  alert('Error. Please try again!');
                  window.location.href='../addPoiForm.php';
                  </script>");
        }
    }

    //Function that creates folder
    function makeDir($path, $mode=0777){
        return is_dir($path) || mkdir($path,$mode,true);
    }
    mysqli_close($conn);
?>