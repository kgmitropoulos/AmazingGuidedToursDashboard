<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<?php 
include('../Scripts/DbConnection.php');
session_start();

$UserEmail = $_POST["UserEmail"];
$UserPassword = $_POST["UserPassword"]; 

$_SESSION["UserEmail"] = $UserEmail;
$_SESSION["UserPassword"] = $UserPassword;

$sql = 
    
   "SELECT UserId,UserEmail,UserPassword
    FROM useraccounts
    WHERE UserEmail='$UserEmail' 
    AND UserPassword='$UserPassword'";
  
$result = $conn->query($sql); 


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        if ($row["UserEmail"]===$UserEmail && $row["UserPassword"]===$UserPassword){
          $_SESSION["UserId"] = $row["UserId"];           
            header("location:../main.php");
        }        
        
    }
} 
else {
    //echo "0 results";
    echo "<script>
    alert('Invalid email or password');
    window.location.href='../index.html';
    </script>";
}
$link->close();

?>