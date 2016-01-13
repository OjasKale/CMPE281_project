<?php
  $name = $_GET['name'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Travel modes in directions</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <script src="http://maps.google.com/maps/api/js?libraries=placeses,visualization,drawing,geometry,places"></script>
    <script src="http://code.angularjs.org/1.3.15/angular.js"></script>
    <script src="http://rawgit.com/allenhwkim/angularjs-google-maps/master/build/scripts/ng-map.js"></script>
    <style>
      html, body {width:100%; height: 100%; padding:0; margin: 0}
      body {padding: 5px}
      * { box-sizing: border-box; }
    </style>
    <script>
	var slat;
var slon;
var dest='<?php echo $name ?>';
      angular.module('ngMap').controller('MyCtrl',function(){
        this.myFunc = function() {
          
        };
      })

    </script>
  </head>
  <body ng-app="ngMap">
    <div ng-controller="MyCtrl as vm" style="width: 68%; float:left; height: 100%">
       
      
      <ng-map zoom="14" center="current-locatio" style="height:90%" >
        <directions
          draggable="true"
          panel="directions-panel"
          travel-mode="DRIVING"
          on-directions_changed="vm.myFunc()"
          origin="current-location"
          destination="<?php echo $name ?>">
        </directions>
      </ng-map>
     
    </div>

    <div id="directions-panel" style="width: 28%; float:left; height: 100%; overflow: auto; padding: 0px 5px">
	
	<p>To Start Navigation </p>
	<button onclick="getLocation()">Click Here</button>

<p id="demo"></p>






<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
   
 slat=position.coords.latitude;
slon=position.coords.longitude;	
window.location.href= "http://maps.google.com/maps?" + "saddr="+ slat + "," + slon + "&daddr="  + dest;
}


	
	</script>
  </body>
</html>