<?php
include './Scripts/FindUnconfirmedTours.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <title>Amazing Guided Tours</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="icons/simple-line-icons/css/simple-line-icons.css"/>
  <link rel="stylesheet" href="icons/flag-icon-css/css/flag-icon.min.css"/>
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css"/>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css"/>
  <link rel="stylesheet" href="./vendors/chartist/chartist.min.css"/>
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="./css/style.css"/>
  <link rel="stylesheet" type="text/css" href="./css/leafletMap.css"/>
  <!-- End layout styles -->
  <link rel="shortcut icon" href="./images/pin0_24.png"/>
  <script type="text/javascript" src="scripts/functions.js"></script>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include './includes/navbar.html';?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include './includes/sidebar.html';?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper" style="background-color: #181824; 
                  background-image:url('images/pin0.svg'); 
                  background-repeat: no-repeat; 
                  background-attachment: fixed; 
                  background-size: cover;">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3>Unconfirmed tours</h3>
                  <p class="card-description"> In this page you may edit our customers tour </p>
                  <div class="column">
                    <h4>Tour Info</h4>
                    <!--Πίνακας με τα άρθρα του συγγραφέα-->
                    <table class="table table-striped">
                      <thead>
                        <!--Γραμμή τίτλων του πίνακα-->
                        <tr class="info">
                          <th class="col-md-1">Number</th>
                          <th class="col-md-4">Customer</th>
                          <th class="col-md-3">Date</th>
                          <th class="col-md-2">Edit</th>
                          <th class="col-md-2">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!--Δημιουργία του πίνακα γραμμή γραμμή και φόρτωση των επιλεγμένων πεδίων των άρθρων και της κατηγορίας τους-->
                        <?php
                        if ( $qrUncfrmdtoursRCount > 0 )
                          $aa = 1;
                        while ( $qrTourRecord = mysqli_fetch_array( $uncfrmdtoursset ) ) {
                          //echo "<tr>";
                          echo "<tr title='" . $qrTourRecord[ 'currTourDate' ] . "'>";
                          echo "<td>" . $aa . "</td>";
                          echo "<td>" . $qrTourRecord[ 'currTourUserEmail' ] . "</td>";
                          echo "<td>" . $qrTourRecord[ 'currTourDate' ] . "</td>";
                          echo "<td title='Edit current tour'><input type='button' class='btn btn-info btn-send btn-block' value='Edit' onclick='editTour(" . $qrTourRecord[ 'currTourId' ] . ")' onmouseover=\"this.style.cursor='pointer'\"></td>";
                          echo "<td title='Delete current tour'><input type='button' class='btn btn-danger btn-send btn-block' value='Delete' onclick='deleteTour(" . $qrTourRecord[ 'currTourId' ] . ")' onmouseover=\"this.style.cursor='pointer'\"></td>";
                          echo "</tr>";
                          $aa = $aa + 1;
                        }
                        ?>

                      </tbody>
                      <!--Γραμμή στο κάτω μέρος του πίνακα-->
                      <tfoot>
                        <tr class="info">
                          <th class="col-md-1"> </th>
                          <th class="col-md-4"> </th>
                          <th class="col-md-3"> </th>
                          <th class="col-md-2"> </th>
                          <th class="col-md-2"> </th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Quick Action Toolbar Starts-->
          <!-- Quick Action Toolbar Ends-->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include './includes/footer.html';?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="./vendors/chart.js/Chart.min.js"></script>
  <script src="./vendors/moment/moment.min.js"></script>
  <script src="./vendors/daterangepicker/daterangepicker.js"></script>
  <script src="./vendors/chartist/chartist.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="./js/dashboard.js"></script>
  <!-- End custom js for this page -->
</body>
</html>