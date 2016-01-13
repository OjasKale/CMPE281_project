<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Quick Park</title>
	<meta name="description" content="Kite Coming Soon HTML Template by Jewel Theme" >
	<meta name="author" content="Jewel Theme">

	<!-- Mobile Specific Meta -->
	<meta name="viewport"> <!--content="width=device-width, initial-scale=1, maximum-scale=1"-->
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

	<!-- Bootstrap  -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- icon fonts font Awesome -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">

	<!-- Custom Styles -->
	<link href="assets/css/style.css" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<![endif]-->

</head>
<body>


	<!-- Preloader -->
	<div id="preloader">
		<div id="loader">
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="lading"></div>
		</div>
	</div><!-- /#preloader -->
	<!-- Preloader End-->


	<!-- Main Menu -->
	<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5658d3d95ced5f6455f433c0/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
	<div id="main-menu" class="navbar navbar-default navbar-fixed-top" role="navigation">

		<div class="navbar-header">
			<!-- responsive navigation -->
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<i class="fa fa-bars"></i>
			</button> <!-- /.navbar-toggle -->

		</div> <!-- /.navbar-header -->
		

		<nav class="collapse navbar-collapse">
			<!-- Main navigation -->
			<ul id="headernavigation" class="nav navbar-nav">
				<li class="active"><a href="#page-top">Home</a></li>
				
				<li><a href="#about">Google Maps </a></li>
					
				<li><a href="#contact">Parking Slots</a></li>
				<li><a href="#subscribe">Account Details</a></li>		
                <li><a href="#customer">Customer Support</a></li>
				
			</ul> <!-- /.nav .navbar-nav -->
		</nav> <!-- /.navbar-collapse  -->
	</div><!-- /#main-menu -->
	<!-- Main Menu End -->
	

	<!-- Page Top Section -->
	<section id="page-top" class="section-style" data-background-image="images/background/page-top.jpg">
		<div class="pattern height-resize">
			<div class="container">
				<h1 class="site-title">
					Quick Park
				</h1><!-- /.site-title -->
				</br>
				</br>
				</br>
				<h3 class="section-name">
					<span>
						Intelligent Parking System
					</span>
				</h3><!-- /.section-name -->
				
				<div id="time_countdown" class="time-count-container">
				</div><!-- /.time-count-container -->
				<div class="next-section">
					<a class="go-to-about"><span></span></a>
				</div><!-- /.next-section -->
				
			</div><!-- /.container -->
		</div><!-- /.pattern -->		
	</section><!-- /#page-top -->
	<!-- Page Top Section  End -->
	
	
	<!-- About Us Section -->
	<section id="about" class="section-style" data-background-image="images/background/about-us.jpg">
		<div class="pattern height-resize"> 
			<div class="container">
				<h3 class="section-name">
					<span>
						Google Maps
					</span>
				</h3><!-- /.section-name -->
				
</br>
</br>
 <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>

<body>

  <div id="map" style="width: 800px; height: 600px;" style="baground-color:black">

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
     infowindow.setContent('<div style="color:#000;background-color:#fff;">'+contentString+',</br> '+'For more information '+',</br> '+'Check Available Parking Slots Table</div>'); 
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
  
</body>


				 
				<div class="next-section">
					<a class="go-to-contact"><span></span></a>
				</div><!-- /.next-section -->

			
			</div><!-- /.container -->
		</div><!-- /.pattern -->
		
		
	</section><!-- /#about -->
	<!-- About Us Section End -->


	



	



		<!-- Contact Section -->
		<section id="contact" class="section-style" data-background-image="images/background/contact.jpg" style="background-image: url(images/background/contact.jpg);" >
			 <div class="pattern height-resize">
				<div class="container-fluid"> 
					<h3 class="section-name">
						<span>
													</span>
					</h3><!-- /.section-name -->
					<h2 class="section-title">
						Avaliable parking slots
					</h2><!-- /.Section-title  -->
										
					<?php
						$servername="qpdb-instance.cm83ywnvtqso.us-west-2.rds.amazonaws.com:3306";
						$user="qp_user";
						$password="password123";
						$dbname="QP_db";
						if(!($conn=mysql_connect($servername,$user,$password)))
								die("could not connect to database:".mysql_error());
						$db=mysql_select_db($dbname,$conn);
						if(!$db)
							{die("Database could not connect:".mysql_error());
							}extract($_POST);
						$quer1=mysql_query("SELECT name,address,available_slots,price FROM node;");
						
						if(!$quer1)
							die("Data could not insert:".mysql_error());
						else{
							
							echo "<table><style>table, th, td {align: center; padding: 30px;border: 1px solid white;}table{margin-left: 7cm;}</style><tr><th>Name</th>&nbsp;&nbsp;<th>Status</th>&nbsp;&nbsp;<th>Price/hr</th><th>Navigation View</th></tr>";
							
							while ($row = mysql_fetch_array($quer1)){
								echo "<tr><td>".$row['name']."</td>&nbsp;&nbsp;";
								if($row['available_slots']>0)
									echo "<td>".$row['available_slots']."&nbsp;Available</td>&nbsp;&nbsp;";
								else
									echo "<td>Unavailable</td>&nbsp;&nbsp;";
								
								echo "<td>".$row['price']."</td>&nbsp;&nbsp;";
								?>
								
								<td>
								<form method="post" action="map.php?name=<?php echo $row['address'];?>">
								<input type="submit" style="background-color:transparent" value="Get Directions">
								</form><br>
								</td></tr>
								
							<?php }
							echo "</table>";
						}
							
						//header("Location: index.html");
						//exit;
						mysql_close($conn);
					?>
					
					
					
					
					
					
					
					<div class="next-section">
						<a class="go-to-subscribe"><span></span></a>
					</div><!-- /.next-section -->

				</div><!-- /.container -->
			</div><!-- /.pattern -->
			</section><!-- /#contact -->
		<!-- Contact Section End -->
		
		<!-- Subscribe Section -->
	<section id="subscribe" class="section-style" data-background-image="images/background/newsletter.jpg">
		<div class="pattern height-resize">
			<div class="container-fluid">
				<h3 class="section-name">
					<span>
						Account Details
					</span>
				</h3><!-- /.section-name -->
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
				
				
                

						<?php
						$x=$_SESSION["username"];
						$servername="qpdb-instance.cm83ywnvtqso.us-west-2.rds.amazonaws.com:3306";
						$user="qp_user";
						$password="password123";
						$dbname="QP_db";
						if(!($conn=mysql_connect($servername,$user,$password)))
						die("could not connect to database:".mysql_error());
						$db=mysql_select_db($dbname,$conn);
						
						$query = "SELECT * FROM user WHERE username='$x'";
						$result=mysql_query($query); 
						echo "<table><style>table, th, td {align: center; padding: 30px;border: 1px solid white;} table{margin-left: 7cm;}</style><tr><th>FullName</th><th>Email</th><th>Address</th><th>City</th><th>Country</th><th>Username</th></tr>";
				
				?> 
							<?php while ($row = mysql_fetch_array($result)){
								echo "<tr><td>".$row['fullname']."</td>";
								echo "<td>".$row['email']."</td>";
								echo "<td>".$row['address']."</td>";
								echo "<td>".$row['city']."</td>";
								echo "<td>".$row['country']."</td>";
								echo "<td>".$row['username']."</td>";
								?>
								
								</tr>
								
							<?php }
							echo "</table>";
						?>
					
					
</br>
				</br></br>
				</br>
				

					<div class="next-section">
						<a class="go-to-customer"><span></span></a>
					</div><!-- /.next-section -->

			<!--</div><!-- /.container -->
			</div><!-- /.container -->
			</div><!-- /.pattern -->

		</section><!-- /#subscribe -->
		<!-- Subscribe Section End -->

		

		


<section id="customer" class="section-style" data-background-image="images/background/about-us.jpg" style="background-image: url(images/background/about-us.jpg);">
			<div class="pattern height-resize">
				
				<div class="container">
				
					<h3 class="section-name">
						<span>
							Contact
						</span>
					</h3><!-- /.section-name -->
					<h2 class="section-title">
						Get in Touch 
					</h2><!-- /.Section-title  -->
					<p class="section-description">
						We are happy to help you<br>
						You can reach us at
					</p><!-- /.section-description -->
					
								<h1>Customer care call</h1><a href="tel:+14088401730">4088401730</a>
								<h1>Email us your query at</h1> <a href="mailto:ojaskale1234@gmail.com">info@quickpark.com</a>

					
								
					<div class="next-section">
						<a class="go-to-page-top"><span></span></a>
					</div><!-- /.next-section -->

				</div><!-- /.container -->
			</div><!-- /.pattern -->

		</section><!-- /#contact -->
		
		

		<!-- Footer Section -->
		<footer id="footer-section">
			<p class="copyright">
				&copy; Quick Park 2015-2016, All Rights Reserved.
			</p>
		</footer>
		<!-- Footer Section End -->


		<!-- jQuery Library -->
		<script type="text/javascript" src="assets/js/jquery-2.1.0.min.js"></script>
		<!-- Modernizr js -->
		<script type="text/javascript" src="assets/js/modernizr-2.8.0.min.js"></script>
		<!-- Plugins -->
		<script type="text/javascript" src="assets/js/plugins.js"></script>
		<!-- Custom JavaScript Functions -->
		<script type="text/javascript" src="assets/js/functions.js"></script>
		<!-- Custom JavaScript Functions -->
		<script type="text/javascript" src="assets/js/jquery.ajaxchimp.min.js"></script>

	</body>
	</html>
