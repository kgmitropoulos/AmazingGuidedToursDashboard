<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>Amazing Guided Tours</title>
<!-- plugins:css -->
<link rel="stylesheet" href="icons/simple-line-icons/css/simple-line-icons.css" />
<link rel="stylesheet" href="icons/flag-icon-css/css/flag-icon.min.css" />
<link rel="stylesheet" href="vendors/css/vendor.bundle.base.css" />
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="./vendors/chartist/chartist.min.css" />
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="./css/style.css" />
<link rel="stylesheet" type="text/css" href="./css/leafletMap.css" />
<!-- End layout styles -->
<link rel="shortcut icon" href="./images/pin0_24.png" />
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
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">List of Available Drivers</h4>
                <p class="card-description"> Driver's Info </p>
                                  <table class="col-md-6 table table-striped" >
                    <thead>
                        <!--Γραμμή τίτλων του πίνακα-->
                        <tr >
                            <th class="text-info font-weight-bold">Number</th>
                            <th class="text-info font-weight-bold">Name</th>
                            <th class="text-info font-weight-bold">Last Name</th>
                            <th class="text-info font-weight-bold">e-mail</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                <p class="text-info"><?php include './Scripts/availableDriversArray.php';?></p>
                    </tbody>
                    <!--Γραμμή στο κάτω μέρος του πίνακα-->
                    <tfoot>
                        <tr class="info">
                            <th> </th>
                            <th> </th>
                            <th> </th>
                            <th> </th>
                            
                        </tr>
                    </tfoot>
                </table>                
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
