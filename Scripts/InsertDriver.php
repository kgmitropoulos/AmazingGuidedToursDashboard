<!--PHP for inserting driver to database-->
<?php
    //Connection to database
    include 'DbConnection.php';
    //Insert form data to database
    if(isset($_POST['SaveDriver'])){
        //Driver data
        $drvFName=$_POST['DriverFirstNameField'];
        $drvLName=$_POST['DriverLastNameField'];
        $drvEmail=$_POST['DriverEmailField'];
        $drvPassword=$_POST['DriverPasswordField'];
        //Text for insert user SQL query
        $insertSqlTxt="INSERT INTO Drivers (DriverFirstName, DriverLastName, DriverEmailAddress, DriverPassword) values ('$drvFName', '$drvLName', '$drvEmail', '$drvPassword')";
        //Insert user to database SQL query 
        $insertNewRecord=mysqli_query($conn, $insertSqlTxt);
        if($insertNewRecord){
            echo("<script>
                alert('Driver added succesfully');
                window.location.href='../addDriverrForm.php';
                </script>");
        }else{
            echo("<script>
                  alert('Error. Please try again!');
                  window.location.href='../addDriverForm.php';
                  </script>");
        }
    }
    mysqli_close($conn);
?> 