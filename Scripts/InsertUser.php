<!--PHP for inserting user to database-->
<?php
    //Connection to database
    include 'DbConnection.php';

    //Insert form data to database
    if(isset($_POST['SaveUser'])){
        //User account data
        $usrFName=$_POST['UserFirstNameField'];
        $usrLName=$_POST['UserLastNameField'];
        $usrEmail=$_POST['UserEmailField'];
        $usrPassword=$_POST['UserPasswordField'];
        //User is not admin
        $usrAcnType=0;
        //Text for insert user SQL query
        $insertSqlTxt="INSERT INTO UserAccounts (UserFirstName, UserLastName, UserEmail, UserPassword, UserAccountType) 
                                         values ('$usrFName', '$usrLName', '$usrEmail', '$usrPassword', '$usrAcnType')";
        
      //Insert user to database SQL query 
        $insertNewRecord=mysqli_query($conn, $insertSqlTxt);
     if($insertNewRecord){
            echo("<script>
                alert('User added succesfully');
                window.location.href='../addUserForm.php';
                </script>");
        }else{
            echo("<script>
                  alert('Error. Please try again!');
                  window.location.href='../addUserForm.php';
                  </script>");
        }
    }
    mysqli_close($conn);
?>

