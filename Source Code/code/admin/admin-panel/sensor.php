<!DOCTYPE html "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>QuickPark</title>

  <!-- *** BEGIN: Styles *** -->
  <link href="Content/bootstrap.min.css" rel="stylesheet" />
  <link href="Content/Site.css" rel="stylesheet" />
  <link href="Content/pdsa-sidebar.css" rel="stylesheet" />
  <link href="Content/pdsa-summary-block.css" rel="stylesheet" />
  <link href="Content/pdsa-readme-box.css" rel="stylesheet" />
  <link href="Content/pdsa-collapser.css" rel="stylesheet" />
   <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
  <!-- *** END: Styles *** -->
</head>
<body class="notransition">
  <div class="container">
    <!-- *** BEGIN: Header Area *** -->
    <div class="row">
      <header>
        <a href="http://ec2-52-27-75-76.us-west-2.compute.amazonaws.com/kite/default/main.php">Quick Park</a>
      </header>
    </div>
    <!-- *** END: Header Area *** -->
    <!-- *** BEGIN: Left Navigation *** -->
    <nav class="pdsa-sn-wrapper">
      <ul id="sideNavParent">
        <li>
          <a href="admin.html">
            <span class="visible-sm visible-md visible-lg">Home</span>
            <i class="glyphicon glyphicon-home visible-xs"></i>
          </a>
        </li>
        
      </ul>
    </nav>
    <!-- *** END: Left Navigation *** -->
  </div>

  <!-- *** BEGIN: Body Content *** -->
  <div class="container body-content">
    <div class="row">
      <div class="col-xs-12 col-sm-8">
        <div class="panel-group"
             id="playlists"
             data-pdsa-collapser-name="playlists"
             data-pdsa-collapser-open="glyphicon glyphicon-plus"
             data-pdsa-collapser-close="glyphicon glyphicon-minus">
              

              

    

    <!-- where the chart will be rendered -->
    <body style="font-family: Arial;border: 0 none;">
    <!-- where the chart will be rendered -->
    <div id="visualization" style="width: 600px; height: 40px;"></div>
 
    
 
  <div id="map" style="width: 1000px; height: 400px;"></div>

 <script type="text/javascript">
  var delay = 100;
  var infowindow = new google.maps.InfoWindow();
  var latlng = new google.maps.LatLng(37.334558,  -121.893225);
  var mapOptions = {
    zoom: 14,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var geocoder = new google.maps.Geocoder(); 
  var map = new google.maps.Map(document.getElementById("map"), mapOptions);
  var bounds = new google.maps.LatLngBounds();

  function geocodeAddress(address, next) {
    geocoder.geocode({address:address}, function (results,status)
      { 
         if (status == google.maps.GeocoderStatus.OK) {
          var p = results[0].geometry.location;
          var lat=p.lat();
          var lng=p.lng();
          createMarker(address,lat,lng);
        }
        else {
           if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
            nextAddress--;
            delay++;
          } else {}   
        }
        next();
      }
    );
  }
 function createMarker(add,lat,lng) {
   var contentString = add;
   var marker = new google.maps.Marker({
     position: new google.maps.LatLng(lat,lng),
     map: map,
           });

  google.maps.event.addListener(marker, 'mouseover', function() {
     infowindow.setContent(contentString); 
     infowindow.open(map,marker);
   });

   bounds.extend(marker.position);

 }
 
 <?php
					 
						$servername="qpdb-instance.cm83ywnvtqso.us-west-2.rds.amazonaws.com:3306";
						$user="qp_user";
						$password="password123";
						$dbname="QP_db";
						$conn=mysql_connect($servername,$user,$password);
						$db=mysql_select_db($dbname,$conn);
						$quer=mysql_query("select address from node");
						?>
  
						
		
  var locations = [
		<?php while($result=mysql_fetch_array($quer))
						{ ?>
					
            ['<?php echo $result['address']; ?>	'],
						<?php }  ?>	                     

						 ];
  var nextAddress = 0;
  function theNext() {
    if (nextAddress < locations.length) {
      setTimeout('geocodeAddress("'+locations[nextAddress]+'",theNext)', delay);
      nextAddress++;
    } else {
      map.fitBounds(bounds);
    }
  }
  theNext();

</script>
<div id="example5.2" style="height: 300px;width: 2000px;length:100px;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- *** END: Body Content *** -->

  <!-- *** BEGIN: Scripts *** -->
  <script src="Scripts/jquery-1.11.0.min.js"></script>
  <script src="Scripts/bootstrap.min.js"></script>
  <script src="Scripts/pdsa-collapser.js"></script>
  <script src="Scripts/pdsa-common.js"></script>
  <!-- *** END: Scripts *** -->
</body>
</html>