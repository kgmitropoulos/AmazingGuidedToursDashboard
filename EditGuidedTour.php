<?php
include './Scripts/DbConnection.php';

//Id of current edite tour
$currentTourId = $_GET[ 'ToursId' ];
//Find current tour
$currentTour = "SELECT * FROM guidedtours WHERE GuidedTourId = '$currentTourId'";
$currentTourRes = mysqli_query( $conn, $currentTour )or die( "database error:" . mysqli_error( $conn ) );
$qrCurrentTourRCount = mysqli_num_rows( $currentTourRes );

$currentours = array();
while ( $rows = mysqli_fetch_assoc( $currentTourRes ) ) {
  $currentours[] = $rows;
}

//Find current customer
$currCustomerId = $currentours[ 0 ][ 'GuidedTourCustomer' ];
$currentCustomer = "SELECT * from useraccounts WHERE UserId='$currCustomerId'";
$currentCustomerRes = mysqli_query( $conn, $currentCustomer )or die( "database error:" . mysqli_error( $conn ) );
$qrCurrentCustomerRCount = mysqli_num_rows( $currentCustomerRes );

$currentCust = array();
while ( $rowsCust = mysqli_fetch_assoc( $currentCustomerRes ) ) {
  $currentCust[] = $rowsCust;
}

//Find start poi
$currenStartPoiId = $currentours[ 0 ][ 'GuidedTourStartPoi' ];
$selectStPoi = "SELECT * FROM pointsofinterest WHERE PoiId ='$currenStartPoiId'";
$stPoisSet = mysqli_query( $conn, $selectStPoi )or die( "database error:" . mysqli_error( $conn ) );

$stPoi = array();
while ( $stPoiRows = mysqli_fetch_assoc( $stPoisSet ) ) {
  $stPoi[] = $stPoiRows;
}

//Find end poi
$currenEndPoiId = $currentours[ 0 ][ 'GuidedTourEndPoi' ];
$selectEndPoi = "SELECT * FROM pointsofinterest WHERE PoiId ='$currenEndPoiId'";
$endPoisSet = mysqli_query( $conn, $selectEndPoi )or die( "database error:" . mysqli_error( $conn ) );

$endPoi = array();
while ( $endPoiRows = mysqli_fetch_assoc( $endPoisSet ) ) {
  $endPoi[] = $endPoiRows;
}

include './Scripts/FindVehicles.php';
include './Scripts/FindDrivers.php';
include './Scripts/FindGuides.php';



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
  <script type="text/javascript" src="./Scripts/functions.js"></script>
    <!-- Matomo -->
    <script type="text/javascript">
        var _paq = window._paq = window._paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
        var u="//localhost/matomo/";
        _paq.push(['setTrackerUrl', u+'matomo.php']);
        _paq.push(['setSiteId', '2']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
        })();
        //accurately measure the time spent in the visit
        _paq.push(['enableHeartBeatTimer']);
    </script>
    <!-- End Matomo Code -->
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
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3>Unconfirmed tours</h3>
                  <p class="card-description"> In this page you may edit our customers tour </p>
                  <div class="column">
                    <h4>Tour Info</h4>
                    <!-- New Vehicle data form -->
                    <form name="GuidedTourData" class="forms-sample" action="./Scripts/UpdateGuidedTour.php" method="post" role="form" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="GuidedTourCustomerField">Customer:</label>
                        <input type="text" class="form-control" id="GuidedTourCustomerField" name="GuidedTourCustomerField" value="<?php echo $currentCust[0]['UserFirstName']." - ". $currentCust[0]['UserLastName'] ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="GuidedTourVisitorsNumberField">Visitors number:</label>
                        <input type="text" class="form-control" id="GuidedTourVisitorsNumberField" name="GuidedTourVisitorsNumberField" value="<?php echo $currentours[0]['NumberOfVisitors'] ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="GuidedTourDateField">Date:</label>
                        <input type="date" class="form-control" name="GuidedTourDateField" id="GuidedTourDateField" value="<?php echo $currentours[0]['GuidedTourDate'] ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="GuidedTourStartTimeField">Start time:</label>
                        <input type="time" class="form-control" name="GuidedTourStartTimeField" id="GuidedTourStartTimeField" value="<?php echo $currentours[0]['GuidedTourStartTime'] ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="GuidedTourEndTimeField">End time:</label>
                        <input type="time" class="form-control" name="GuidedTourEndTimeField" id="GuidedTourEndTimeField" value="<?php echo $currentours[0]['GuidedTourEndTime'] ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="GuidedTourStartPoiField">Start poi:</label>
                        <input type="text" class="form-control" id="GuidedTourStartPoiField" name="GuidedTourStartPoiField" value="<?php echo $stPoi[0]['PoiName']?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="GuidedTourEndPoiField">End poi:</label>
                        <input type="text" class="form-control" id="GuidedTourStartPoiField" name="GuidedTourStartPoiField" value="<?php echo $endPoi[0]['PoiName']?>" disabled>
                      </div>
                      <div class="form-group">
                        <label for="GuidedTourVehicleField">Vehicle:</label>
                        <select name="GuidedTourVehicleField" class="form-control" id="GuidedTourVehicleField">
                          <option>Select vehicle</option>
                          <!--Filling dropdown with vehicle "from scripts/FindVehicles.php" -->
                          <?php
                          $count = 0;
                          foreach ( $vehicles as $vehicle ) {
                            $count++;
                            echo "<option>" . $vehicle[ 'VehicleNumber' ] . "</option>";
                          }
                          ?>
                          <!--End Filling dropdown with vehicles-->
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="GuidedTourDriverField">Driver:</label>
                        <select name="GuidedTourDriverField" class="form-control" id="GuidedTourDriverField">
                          <option>Select driver</option>
                          <!--Filling dropdown with drivers "from scripts/FindDrivers.php" -->
                          <?php
                          $count = 0;
                          foreach ( $drivers as $driver ) {
                            $count++;
                            echo "<option>" . $driver[ 'DriverFirstName' ] . $driver[ 'DriverLastName' ] . "</option>";
                          }
                          ?>
                          <!--End Filling dropdown with drivers-->
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="GuidedTourGuideField">Guide:</label>
                        <select name="GuidedTourGuideField" class="form-control" id="GuidedTourGuideField">
                          <option>Select guide</option>
                          <!--Filling dropdown with guides "from scripts/FindDrivers.php" -->
                          <?php
                          $count = 0;
                          foreach ( $guides as $guide ) {
                            $count++;
                            echo "<option>" . $guide[ 'GuideFirstName' ] . $guide[ 'GuideLastName' ] . "</option>";
                          }
                          ?>
                          <!--End Filling dropdown with guides-->
                        </select>
                      </div>
                      <div class="form-group">
                        <!--Hidden input with tour id-->
                        <input type="hidden" class="form-control" id="TourIdField" name="TourIdField" value="<?php echo $currentTourId ?>"/>
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-success mr-2" name="ConfirmTour" value="Confirm Tour">
                        <button type="button" class="btn btn-danger mr-2" name="cancel" value="cancel" onclick="window.location.href='./EditGuidedTour.php'">Cancel</button>
                      </div>
                    </form>
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