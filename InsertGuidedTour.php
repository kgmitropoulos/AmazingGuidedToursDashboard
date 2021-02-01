<?php
include 'Scripts/FindUsers.php';
include 'Scripts/FindPois.php';
include 'Scripts/FindVehicles.php';
include 'Scripts/FindDrivers.php';
include 'Scripts/FindGuides.php';
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
                  <h3>Create an Amazing Guided Tour</h3>
                  <p class="card-description"> In this page you may create an amazing guided tour for our customers </p>
                  <div class="column">
                    <h4>New Amazing Guided Tour Info</h4>
                    <!-- New Vehicle data form -->
                    <form name="GuidedTourData" class="forms-sample" action="Scripts/InsertTour.php" method="post" role="form" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="GuidedTourCustomerField">Customer:</label>
                        <select name="GuidedTourCustomerField" class="form-control" id="GuidedTourCustomerField">
                          <option>Select customer</option>
                          <!--Filling dropdown with users "from scripts/FindUsers.php" -->
                          <?php
                          foreach ( $users as $user ) {
                            echo "<option>" . $user[ 'UserFirstName' ] . " - " . $user[ 'UserLastName' ] . "</option>";
                          }
                          ?>
                          <!--End Filling dropdown with users-->
                        </select>
                        <div class="form-group">
                          <label for="GuidedTourVisitorsNumberField">Visitors number:</label>
                          <input type="text" class="form-control" id="GuidedTourVisitorsNumberField" name="GuidedTourVisitorsNumberField" value="">
                        </div>
                        <div class="form-group">
                          <label for="GuidedTourDateField">Date:</label>
                          <input type="date" class="form-control" name="GuidedTourDateField" id="GuidedTourDateField" value="2020-12-01" min="2020-01-01" max="2021-12-31">
                        </div>
                        <div class="form-group">
                          <label for="GuidedTourStartTimeField">Start time:</label>
                          <input type="time" class="form-control" name="GuidedTourStartTimeField" id="GuidedTourStartTimeField" value="2020-12-01" min="09:00" max="20:00">
                        </div>
                        <div class="form-group">
                          <label for="GuidedTourEndTimeField">End time:</label>
                          <input type="time" class="form-control" name="GuidedTourEndTimeField" id="GuidedTourEndTimeField" value="2020-12-01" min="10:00" max="21:00">
                        </div>
                        <div class="form-group">
                          <label for="GuidedTourStartPoiField">Start poi:</label>
                          <select name="GuidedTourStartPoiField" class="form-control" id="GuidedTourStartPoiField">
                            <option>Select start poi</option>
                            <!--Filling dropdown with pois "from scripts/FindPois.php" -->
                            <?php
                            $count = 0;
                            foreach ( $pois as $poi ) {
                              $count++;
                              echo "<option>" . $poi[ 'PoiName' ] . "</option>";
                            }
                            ?>
                            <!--End Filling dropdown with pois-->
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="GuidedTourEndPoiField">End poi:</label>
                          <select name="GuidedTourEndPoiField" class="form-control" id="GuidedTourStartPoiField">
                            <option>Select end poi</option>
                            <!--Filling dropdown with pois "from scripts/FindPois.php" -->
                            <?php
                            $count = 0;
                            foreach ( $pois as $poi ) {
                              $count++;
                              echo "<option>" . $poi[ 'PoiName' ] . "</option>";
                            }
                            ?>
                            <!--End Filling dropdown with pois-->
                          </select>
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
                              echo "<option>" . $driver[ 'DriverFirstName' ] . " - " . $driver[ 'DriverLastName' ] . "</option>";
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
                              echo "<option>" . $guide[ 'GuideFirstName' ] . " - " . $guide[ 'GuideLastName' ] . "</option>";
                            }
                            ?>
                            <!--End Filling dropdown with guides-->
                          </select>
                        </div>
                        <div class="form-group">
                          <input type="submit" class="btn btn-success mr-2" name="SaveTour" value="Save Tour">
                          <button type="button" class="btn btn-danger mr-2" name="cancel" value="cancel" onclick="window.location.href='./InsertGuidedTour.php'">Cancel</button>
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