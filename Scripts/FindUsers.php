<?php
    //Connection to database
    include 'DbConnection.php';
    $selectusers = "SELECT UserId, UserFirstName, UserLastName FROM useraccounts";
    $usersset = mysqli_query($conn, $selectusers) or die("database error:". mysqli_error($conn));

    $users = array();
    while($rows = mysqli_fetch_assoc($usersset) ) {
        $users[] = $rows;
    }
    
    mysqli_close($conn);

?>