<!--PHP for connecting to database-->
<?php
//Data base info
    $serverAddress='localhost';
    $userName='guidedtoursadmin';
    $password='12345';
    $dbName='guidedtours_db';
    // Connection creation
    $conn = mysqli_connect($serverAddress, $userName, $password, $dbName);
    // Checking for saccesfull connectio

    if (!$conn) {
      die("Connection failed");
    }

?>


