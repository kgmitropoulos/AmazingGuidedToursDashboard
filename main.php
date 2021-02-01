<?php include './Scripts/chartQuery.php';?>
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
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" 
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" 
        crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="./css/style.css"/>
  <link rel="stylesheet" type="text/css" href="./css/leafletMap.css"/>
  <!-- End layout styles -->
  <link rel="shortcut icon" href="./images/pin0_24.png"/>


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load( 'current', {
      'packages': [ 'corechart' ]
    } );
    google.charts.setOnLoadCallback( drawChart );

    function drawChart() {
      var data = google.visualization.arrayToDataTable( [
        [ 'VehicleAvailabillity', 'Number' ],

        <?php
    while ( $row = mysqli_fetch_array( $result ) ) {
      echo "['" . $row[ "VehicleAvailabillity" ] . "', " . $row[ "NUMBER" ] . "],";
    }
    ?>
      ] );

      var options = {
        is3D: true,
        pieHole: 0.5,
        chartArea: {
          left: 0,
          top: 0,
          width: '100%',
          height: '100%'
        },
        backgroundColor: {
          fill: 'transparent'
        },
        colors: [ '#ff1a41', '#38ce3c' ],
        legend: {
          position: 'none'
        }
      };
      var legend = {
        0: 'Unavailable',
        1: 'Available',
      };

      var view = new google.visualization.DataView( data );
      view.setColumns( [ {
        calc: function ( dt, row ) {
          return legend[ data.getValue( row, 0 ) ];
        },
        label: 'social',
        type: 'string'
      }, 1 ] );

      var chart = new google.visualization.PieChart( document.getElementById( 'piechart' ) );
      chart.draw( view, options );
    }
  </script>
    
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

            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Our fleet</h4>
                  <div class="aligner-wrapper" id="piechart" style="height: 300px;">
                    <!--              <canvas id="sessionsDoughnutChart" height="210"></canvas>
                  <div class="wrapper d-flex flex-column justify-content-center absolute absolute-center">
                    <h2 class="text-center mb-0 font-weight-bold">8.234</h2>
                    <small class="d-block text-center text-muted font-weight-semibold mb-0">Total Leads</small> </div>-->
                  </div>
                  <div class="wrapper mt-6 d-flex flex-wrap align-items-cente">
                    <div class="d-flex"> <span class="square-indicator bg-danger ml-2"></span>
                      <p class="mb-0 ml-2">Unavailable</p>
                    </div>
                    <div class="d-flex"> <span class="square-indicator bg-success ml-2"></span>
                      <p class="mb-0 ml-2">Available</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div id="mapid">
                  <script>
                    var mymap, addedmarker;
                    navigator.geolocation.getCurrentPosition( function ( location ) {
                      /* Specified location on map from current location or fixed*/
                      var latlng = new L.LatLng( location.coords.latitude, location.coords.longitude );
                      mymap = L.map( "mapid" ).setView( latlng, 18 );
                      //Adding the map and configuring it
                      L.tileLayer( "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
                        maxZoom: 18,
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                          '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                          'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        id: "mapbox/streets-v11",
                        tileSize: 512,
                        zoomOffset: -1,
                      } ).addTo( mymap );
                      //New group of markers
                      newMarkers = new L.LayerGroup();
                      //Listener that calls the function that on user's click adds a marker on the map
                      mymap.on( "click", addNewMarker );
                    } );

                    function addNewMarker( e ) {
                      /* Marker at point that user clicked*/
                      addedmarker = new L.marker( [ e.latlng.lat, e.latlng.lng ] ).addTo( mymap );
                      //Mapping the custom popup form to marker
                      //addedmarker.bindPopup(popupform).openPopup();
                      document.getElementById( "PoiLatitudeField" ).setAttribute( "value", e.latlng.lat );
                      document.getElementById( "PoiLongitudeField" ).setAttribute( "value", e.latlng.lng );
                    }                                  
                  </script>
                </div>
              </div>
            </div>
          </div>
          <!-- Quick Action Toolbar Starts-->
          <!-- Quick Action Toolbar Ends-->
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="d-sm-flex align-items-baseline report-summary-header">
                        <h5 class="font-weight-semibold">We Offer</h5>
                        <span class="ml-auto">Updated Report</span>
                        <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="row report-inner-cards-wrapper">
                    <div class="col-md-2 col-xl report-inner-card">
                      <div class="inner-card-text"> <span class="report-title">CARS</span>
                        <h4>Total:&emsp;&emsp; <?php include './Scripts/totalcars.php';?> <br> Available: <?php include './Scripts/availableCars.php';?> </h4>
                        <span class="report-count"> <a class="nav-link" href="./availableCarsPage.php">Show Avail. Cars</a></span> 
                      </div>
                      <div class="inner-card-icon bg-success"><i class="icon-rocket"></i>
                      </div>
                    </div>
                    <div class="col-md-2 col-xl report-inner-card">
                      <div class="inner-card-text"> <span class="report-title">MINI BUSES</span>
                        <h4>Total:&emsp;&emsp; <?php include './Scripts/totalminibuses.php';?><br> Available: <?php include './Scripts/availableBuses.php';?> </h4>
                        <span class="report-count"> <a class="nav-link" href="./availableMiniBusesPage.php">Show Avail. MiniBuses</a></span> 
                      </div>
                      <div class="inner-card-icon bg-danger"><i class="icon-briefcase"></i>
                      </div>
                    </div>
                    <div class="col-md-2 col-xl report-inner-card">
                      <div class="inner-card-text"> <span class="report-title">DRIVERS</span>
                      <h4>Total:&emsp;&emsp; <?php include './Scripts/totalguides.php';?><br> Available: <?php include './Scripts/availableDriversCount.php';?> </h4>
                        <span class="report-count"> <a class="nav-link" href="./availableDrivers.php">Show Avail. Drivers</a></span> 
                      </div>
                      <div class="inner-card-icon bg-warning"><i class="icon-people"></i>
                      </div>
                    </div>
                    <div class="col-md-2 col-xl report-inner-card">
                      <div class="inner-card-text"> <span class="report-title">GUIDES</span>
                      <h4>Total:&emsp;&emsp; <?php include './Scripts/totalguides.php';?><br> Available: <?php include './Scripts/availableGuidesCount.php';?> </h4>
                        <span class="report-count"> <a class="nav-link" href="./availableGuides.php">Show Avail. Guides</a></span> 
                      </div>
                      <div class="inner-card-icon bg-warning"><i class="icon-people"></i>
                      </div>
                    </div>
                    <div class="col-md-2 col-xl report-inner-card">
                      <div class="inner-card-text"> <span class="report-title">POINTS TO VISIT</span>
                        <h4>Total:&emsp;&emsp; <?php include './Scripts/totalpois.php';?></h4>
                        <span class="report-count"> <a class="nav-link" href="./availablePois.php">Show Points to Visit</a></span> 
                      </div>
                      <div class="inner-card-icon bg-primary"><i class="icon-location-pin"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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