<?php
    //Connection to database
    include 'DbConnection.php';
    $selectuncfrmdtours = "SELECT guidedtours.GuidedTourId as currTourId, useraccounts.UserEmail as currTourUserEmail, guidedtours.GuidedTourDate as currTourDate FROM guidedtours INNER JOIN useraccounts ON guidedtours.GuidedTourCustomer=useraccounts.UserId WHERE GuidedTourConfirmed = '0'";
    $uncfrmdtoursset = mysqli_query($conn, $selectuncfrmdtours) or die("database error:". mysqli_error($conn));
    $qrUncfrmdtoursRCount =mysqli_num_rows($uncfrmdtoursset);

    //$$uncfrmdtours = array();
    //while( $rows = mysqli_fetch_assoc($uncfrmdtoursset) ) {
        //$$uncfrmdtours[] = $rows;
    //}

    mysqli_close($conn);

?>