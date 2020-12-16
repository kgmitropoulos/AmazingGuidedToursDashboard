<!--PHP for inserting guide to database-->
<?php
    //Connection to database
    include 'DbConnection.php';
    //Insert form data to database
    if(isset($_POST['SaveGuide'])){
        //Guide data
        $gdFName=$_POST['GuideFirstNameField'];
        $gdLName=$_POST['GuideLastNameField'];
        $gdEmail=$_POST['GuideEmailField'];
        $gdPassword=$_POST['GuidePasswordField'];
        //Text for insert user SQL query
        $insertSqlTxt="INSERT INTO Guides (GuideFirstName, GuideLastName, GuideEmailAddress, GuidePassword) values ('$gdFName', '$gdLName', '$gdEmail', '$gdPassword')";
        //Insert user to database SQL query 
        $insertNewRecord=mysqli_query($conn, $insertSqlTxt);
      
        if($insertNewRecord){
            echo("<script>
                alert('Guide added succesfully');
                window.location.href='../addGuideForm.php';
                </script>");
        }else{
            echo("<script>
                  alert('Error. Please try again!');
                  window.location.href='../addGuideForm.php';
                  </script>");
        }
    }
    mysqli_close($conn);
?>