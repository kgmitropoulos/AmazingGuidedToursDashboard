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
  <link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" type="text/css" href="./css/leafletMap.css"/>
  <!-- End layout styles -->
  <link rel="shortcut icon" href="./images/pin0_24.png"/>
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
        <div class="content-wrapper" 
             style="background-color: #181824; 
                  background-image:url('images/pin0.svg');                  
                  background-repeat: no-repeat; 
                  background-attachment: fixed; 
                  background-size: cover;">
          <div class="row">
            <div class="col-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add New Point of Interest</h4>
                  <p class="card-description"> Point of interest information </p>
                  <form class="forms-sample" name="PoiData" action="../Scripts/InsertPoi.php" method="post" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="PoiNameField">POI Name</label>
                      <input type="text" class="form-control" id="PoiNameField" placeholder="POI Name" value="">
                    </div>
                    <div class="form-group">
                      <label for="PoiAddressField">POI Address</label>
                      <input type="email" class="form-control" id="PoiAddressField" placeholder="POI Address" value="">
                    </div>
                    <div class="form-group">
                      <label for="PoiLatitudeField">POI Latitude</label>
                      <input type="text" class="form-control" id="PoiLatitudeField" placeholder="POI Latitude" value="">
                    </div>
                    <div class="form-group">
                      <label for="PoiLongitudeField">POI Longitude</label>
                      <input type="text" class="form-control" id="PoiLongitudeField" placeholder="POI Longitude" value="">
                    </div>
                    <div class="form-group">
                      <label for="PoiBriefInfoField">POI bief info</label>
                      <textarea class="form-control" id="PoiBriefInfoField" placeholder="POI bief info" value=""></textarea>
                    </div>
                    <div class="form-group">
                      <label for="PoiDetailedInfoField">POI full info</label>
                      <textarea class="form-control" id="PoiDetailedInfoField" placeholder="POI full info" value=""></textarea>
                    </div>
                    <div class="form-group">
                      <label for="imageFile">POI Image</label>
                      <input type="file" name="imageFile" class="file-upload-default" id="imageFile">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                      <button class="file-upload-browse btn btn-dark" type="button">Upload</button>
                      </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mr-2" name="saveData" value="saveData">Submit</button>
                    <button type="button" class="btn btn-danger mr-2" name="cancel" value="cancel" onclick="window.location.href='./addPoiForm.php'">Cancel</button>
                  </form>
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