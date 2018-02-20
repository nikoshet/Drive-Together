
<?php 

	define('concom',1);
    require('common.php');
	include 'findTrip.php'; 

?> 
<!doctype html>
<html lang="en">
  <head>
    <title>DRIVE TOGETHER - Find Ride</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="stylesheet" type="text/css" href="style/findRide.css">
    <link rel="stylesheet" href="style/animate.css">
	<link rel="icon" href="src/logonew.jpg">
    <link rel="stylesheet" type="text/css" href="style/style2.css" />
    <link rel="stylesheet" type="text/css" href="style/mystyle.css">
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="js/findRide.js"></script>

	<!--  -->
	<meta name="google-signin-client_id" content="349719946881-8231087h84pv9sk0rkbq9k3qhmmc3mve.apps.googleusercontent.com">
	<!--  -->


  </head>
  <body  style="background-color:#d2d8d5;">
  
   
 <script>					
 
window.fbAsyncInit = function() {
FB.init({
 appId      : '1585988384823204',
 cookie     : true,
  xfbml      : true,
  version    : 'v2.11'
	});
			  
FB.AppEvents.logPageView();   
			  
  };
  								
	function checkLoginState() {
	FB.getLoginStatus(function(response) {
	statusChangeCallback(response);
	 });
	}
  
  
  
 (function(d, s, id){
var js, fjs = d.getElementsByTagName(s)[0];
	 if (d.getElementById(id)) {return;}
 js = d.createElement(s); js.id = id;
	 js.src = "https://connect.facebook.net/en_US/sdk.js";
	 fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	   
	   
function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }	   
	   
	   
	   
</script> 
  
  
<!--!!!!!!!!!!!!!!! Menu-Header- -DESKTOP  !!!!!!!!!!!!!!!!!--> 	
	<div class="desktop-only">
		<nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">               
                <div class="navbar" id="myNavbar">
                    <ul class="nav navbar-nav col-md-12">
                      	<li class="col-md-2"></li>
                       	<li><img class="navbar-logo animated wobble" src="src/logonew.jpg" width="140" height="100"></li>
						<li class=" menubutton"><a href="index.php">Home</a></li>
						<li class="menubutton active"><a href="Services.php">Services</a></li>
						<li class="menubutton"><a href="aboutUs.php">About Us</a></li>
						<li class="menubutton"><a href="contact.php">Contact</a></li>
						<?php 
	    				if(isset($_SESSION['user'])) { ?>
						<li class="menubutton"><hprofile style="text-align:center;"><a class=" ss ssb hprofile" href="myProfile.php">
							My Profile<br><?php echo ($_SESSION["user"]["email"]);?></a> </hprofile></li>
						<li class="menubutton pull-right"><a class=" ss ssb hlogout" href="logout.php">Logout</a></li>
						<?php } 
						else 
	    				if(isset($_SESSION['admin'])) { ?>
						<li class="menubutton"><hadmin style="text-align:center;"><a class=" ss ssb" href="adminSettings.php">
							Admin <br>Settings</a> </hadmin></li>
						<li class="menubutton pull-right"><a class=" ss ssb hlogout" href="logout.php">Logout</a></li>
						<?php } else { ?>
						<li class="menubutton"><a id="signupButton">Sign Up</a></li>
						<li class="menubutton"><a id="loginButton">Login</a></li>
						<?php }
						?>
                    </ul>
                </div>
            </div>
        </nav> 
    </div>


<!--!!!!!!!!!!!!!!! Menu-Header- -MOBILE  !!!!!!!!!!!!!!!!!-->
	<div class="mobile-only">
		<nav id="bt-menu" class="bt-menu">
			<a href="#" class="bt-menu-trigger"><span>Menu</span></a>
			<ul>
				<li><a href="index.php" class="fa fa-home"><br>Home</a></li>
				<li><a href="services.php" class="fa fa-gears"><br>Services</a></li>
				<li><a href="aboutUs.php" class="fa fa-info"><br>About Us</a></li>
				<li><a href="contact.php" class="fa fa-phone"><br>Contact</a></li>
				<?php 
    			if(isset($_SESSION['user'])) { ?>
				<li><hprofile style="text-align:center;"><a class=" fa fa-address-card ss ssb hprofile" href="myProfile.php">
				<br>My Profile<br><?php echo ($_SESSION["user"]["email"]);?></a></hprofile></li>
				<li><hlogout style="text-align:center;"><a class="fa fa-sign-out ss ssb hlogout" href="logout.php"><br>Logout</a> </hlogout></li>
				<?php } 
				else
    			if(isset($_SESSION['admin'])) { ?>
				<li><hadmin style="text-align:center;"><a class=" fa fa-cog ss ssb" href="adminSettings.php">
				<br>Admin<br>Settings</a></hadmin></li>
				<li><hlogout style="text-align:center;"><a class="fa fa-sign-out ss ssb hlogout" href="logout.php"><br>Logout</a> </hlogout></li>
				<?php } else { ?>
				<li><a class="fa fa-sign-in" id="signupButton1"  ><br>Sign Up</a></li>
				<li><a class="fa fa-user" id="loginButton1" ><br>Login</a></li>
				<?php }
				?>
			</ul>
		</nav>
	</div> 

<!--!!!!!!!!!!!!!!! GoogleMap  !!!!!!!!!!!!!!!!!-->		
		<div class="container" id="map" style="height:400px;border:1px black solid;margin-top:100px;" ></div>

			

			  <script>
					      var map, infoWindow;
					      function initMap() {
					        map = new google.maps.Map(document.getElementById('map'), {
					          center: {lat: 38.246639, lng:21.734573},
					          zoom: 6
					        });
					        infoWindow = new google.maps.InfoWindow;

					       
					        if (navigator.geolocation) {
					          navigator.geolocation.getCurrentPosition(function(position) {
					            var pos = {
					              lat: position.coords.latitude,
					              lng: position.coords.longitude
					            };

					            infoWindow.setPosition(pos);
					            infoWindow.setContent('Your location found');
					            infoWindow.open(map);
					            map.setCenter(pos);
					          }, function() {
					            handleLocationError(true, infoWindow, map.getCenter());
					          });
					        } else {
					          
					          handleLocationError(false, infoWindow, map.getCenter());
					        }

					        new AutocompleteDirectionsHandler(map);
					      }

					      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
					        infoWindow.setPosition(pos);
					        infoWindow.setContent(browserHasGeolocation ?
					                              'Error: The Geolocation service failed.' :
					                              'Error: Your browser doesn\'t support geolocation.');
					        infoWindow.open(map);
					      }



					      function AutocompleteDirectionsHandler(map) {
						        this.map = map;
						        this.originPlaceId = null;
						        this.destinationPlaceId = null;
						        this.travelMode = 'DRIVING';
						        var originInput = document.getElementById('autocomplete1');
						        var destinationInput = document.getElementById('autocomplete2');
						       /* var modeSelector = document.getElementById('mode-selector');*/
						        this.directionsService = new google.maps.DirectionsService;
						        this.directionsDisplay = new google.maps.DirectionsRenderer;
						        this.directionsDisplay.setMap(map);

						        var originAutocomplete = new google.maps.places.Autocomplete(
						            originInput, {placeIdOnly: true});
						        var destinationAutocomplete = new google.maps.places.Autocomplete(
						            destinationInput, {placeIdOnly: true});

						       /* this.setupClickListener('changemode-walking', 'WALKING');
						        this.setupClickListener('changemode-transit', 'TRANSIT');
						        this.setupClickListener('changemode-driving', 'DRIVING');*/
						        
						        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
						        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');
/*
						        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
						        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);*/
						     /*   this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);*/

						      }

						      // Sets a listener on a radio button to change the filter type on Places
						      // Autocomplete.
						    /*  AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
						        var radioButton = document.getElementById(id);
						        var me = this;
						        radioButton.addEventListener('click', function() {
						          me.travelMode = mode;
						          me.route();
						        });
						      };
*/
						      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
						        var me = this;
						        autocomplete.bindTo('bounds', this.map);
						        autocomplete.addListener('place_changed', function() {
						          var place = autocomplete.getPlace();
						          if (!place.place_id) {
						            window.alert("Please select an option from the dropdown list.");
						            return;
						          }
						          if (mode === 'ORIG') {
						            me.originPlaceId = place.place_id;
						          } else {
						            me.destinationPlaceId = place.place_id;
						          }
						          me.route();
						        });

						      };

						      AutocompleteDirectionsHandler.prototype.route = function() {
						        if (!this.originPlaceId || !this.destinationPlaceId) {
						          return;
						        }
						        var me = this;

						        this.directionsService.route({
						          origin: {'placeId': this.originPlaceId},
						          destination: {'placeId': this.destinationPlaceId},
						          travelMode: this.travelMode
						        }, function(response, status) {
						          if (status === 'OK') {
						            me.directionsDisplay.setDirections(response);
						          } else {
						            window.alert('Directions request failed due to ' + status);
						          }
						        });
						      };

				    </script>
				    <script async defer
				    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCv5oKmZbCg7Awo7fj-9Jtn1VYXZj_hWZ4&libraries=places&callback=initMap">
				    </script>	
		
		

		
		
			
<!--!!!!!!!!!!!!!!! findRide  !!!!!!!!!!!!!!!!!-->				
			<div class="container animated fadeInDown">
			<!-- 	<form id="formfind" class="places" name="formfind"> --> <!-- method="post" enctype="multipart/form-data"> -->
				<form id="formfind" class="places" enctype="multipart/form-data"> <!-- method="post" enctype="multipart/form-data"> -->
					<div class="row">
						<div class="col-xs-12 col-md-3"><label>Where are you leaving from?</label>
							<div class="form-group">
							<div class="input-group" id="locationField1">
								<input id='autocomplete1' type='text' class='form-control' placeholder='Departure' name='depart'/>
								<span class="input-group-addon"><i class="fa fa-car" title="Departure"></i></span>
							</div>	
							</div>				
						</div>
						<div class="col-xs-12 col-md-3"><label>Where are you going to?</label>
							<div class="form-group">
							<div class="input-group" id="locationField2">
								<input id='autocomplete2' type='text' class='form-control' placeholder='Destination' name='dest' />
								<span class="input-group-addon"><i class="fa fa-flag-checkered" title="Arrival"></i></span>
							</div>
							</div>
						</div> 
						<div class="col-xs-12 col-md-3"> <label>Date</label>
							<div class="form-group">
							<div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
								<input id='date' class='form-control' type='text' readonly name='date' />
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div>
							</div>
						</div> 
						<div class="col-xs-12 col-md-3" style="padding-bottom:30px;">
							<div class="form-group ">
								<label>Sort By:</label> 
								<select type="sort" class="form-control" id="sortby" name="sortby" >
										<option value="nosort" selected="selected">Sort</option>
										<option value="dateEarly">Date: earliest first</option>
										<option value="dateLate">Date: latest first</option>
										<option value="priceHigh">Price: higher first</option>
										<option value="priceLow">Price: lower first</option>
										</select>
							</div>	
						</div>
						<div class="col-xs-12 col-md-2 pull-right"><label>Find your ride</label>
							<button type="submit" name="findTrips" class="btn btn-warning btn-block" action="">Find <span class="glyphicon glyphicon-search"></span> </button>
						</div>  						
					</div>

				</form>
			</div>  


<!--!!!!!!!!!!!!!!! results  !!!!!!!!!!!!!!!!!-->			
			<div class="container containerresults">
	  				
	  		<?php
 
	  		// to stop resubmission
	  		 if(isset($_POST['autocomplete1']) && isset($_POST['autocomplete2']) && isset($_POST['date1']) && $_POST['randcheck']==$_SESSION['rand'] ) 
				{	

					$depart=strval($_POST['autocomplete1']);
					$dest=strval($_POST['autocomplete2']);
					$hmeromhnia=$_POST['date1'];
				    $date = explode('-', $_POST['date1']);
					$new_date = $date[2].'-'.$date[0].'-'.$date[1];
					$sorting="nosort";
					/*
	        		$('#date').datepicker().datepicker('setDate', '".$hmeromhnia."');*/
	        		$departt = mb_strtoupper($depart);
	        		$destt = mb_strtoupper($dest);
	        		$departt = explode(",", $departt);
	        		
	        		$destt = explode(",", $destt);
	        		
					echo "<script>
					    	
					    	alert('from index here.');
			        		
			        		$(function () {

			        			$('#autocomplete1').val('".$depart."');
			        			$('#autocomplete2').val('".$dest."');

								$('#datepicker').datepicker({ 
								        autoclose: true, 
								        todayHighlight: true
								  }).datepicker('update', '".$hmeromhnia."');  
								});


				    </script>";
					
					

			            get_all_trips($departt[0],$destt[0],$new_date,$sorting);

			            unset($_POST['autocomplete1']);
			    		unset($_POST['autocomplete2']);
			    		unset($_POST['date1']); 
			    		unset($_SESSION['rand']);
			    }
			         
				//}

				
	  		?> 
					<!-- <div id="findresults"> </div> --> 
                	<!-- </ul> -->
			</div>	
		

	
<!--!!!!!!!!!!!!!!! Login  !!!!!!!!!!!!!!!!!-->	
			<div class="modal fade" id="loginmodal" role="dialog">
				<div class="modal-dialog">
					
					 
					<div class="modal-content">
						<div class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
						</div>
						<div class="modal-body"> 
						   <form role="form" id="loginform">
								<div class="form-group">
									<label for="emaillogin"><span class="glyphicon glyphicon-user"></span> Email</label>
									<input type="text" class="form-control" id="emaillogin" name="emaillogin" placeholder="Enter email">
								</div>
								<div class="form-group">
									<label for="pswlogin"><span class="glyphicon glyphicon-eye-close"></span> Password</label>
									<input type="password" class="form-control" id="pswlogin" name="pswlogin" placeholder="Enter password">
								</div>
							<!-- 	<div class="checkbox">
									<label><input type="checkbox" value="" checked> Remember me</label>
								</div> -->
								
								
								<!-- Google Login -->
								<div style="text-align:center;">OR</div>
								<center>
								<div id="my-signin2"></div></center><br>
								  <script>
									function onSuccess2(googleUser) {
									  alert('Logged in as: ' + googleUser.getBasicProfile());//.getName());
											var profile = googleUser.getBasicProfile();
											alert(profile);
										    gapi.client.load('plus', 'v1', function () {
										        var request = gapi.client.plus.people.get({
										            'userId': 'me'
										        });
										        //Display the user details
										        request.execute(function (resp) {
										           console.log(resp.name.givenName);
										           console.log(resp.displayName);
										           console.log(resp.emails[0].value);

										           // profileHTML += '<img src="'+resp.image.url+'"/><div class="proDetails"><p>'+resp.displayName+'</p><p>'+resp.emails[0].value+'</p><p>'+resp.gender+'</p><p>'+resp.id+'</p><p><a href="'+resp.url+'">View Google+ Profile</a></p></div></div>';
										            //$('.userContent').html(profileHTML);
										            //$('#gSignIn').slideUp('slow');
										        });
										    });
									}
									function onFailure2(error) {
									  console.log(error);
									  console.log("error malaka");
									}
									function renderButton() {
									  gapi.signin2.render('my-signin2', {
									  	 scope: 'profile email',
										  width: 260,
										  height: 40,
										  longtitle: true,
										  theme: 'dark',
										  onsuccess: onSuccess2,
										  onfailure: onFailure2
										/*'scope': 'profile email',
									    'width': 260,
										'height': 40,
										'longtitle': true,
										'theme': 'dark',
										'onsuccess': onSuccess,
										'onfailure': onFailure*/
									  });
									}
								  </script>
									<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
														
														
								<!-- FB Login -->
								<div style="text-align:center;">OR</div>
								<div style="text-align:center;">
									<div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
									<!-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button> -->
									<div id="status"></div>
									We don't post anything without asking first.<br><br>
								</div>
								
								<button id="logInSubmit" type="button" class="btn btn-success btn-block" action=""><span class=" glyphicon glyphicon-log-in"></span> Login</button>
							</form>
						</div>
						<div class="modal-footer">
							<p>Not a member? <a id="signupmodal2" href="#"> Sign Up</a></p>
							<p>Forgot <a id="forgotpassword" href="#"> Password?</a></p>
						</div>
					</div>
					  
				</div>
			</div> 
			
			
<!--!!!!!!!!!!!!!!! SignUp  !!!!!!!!!!!!!!!!!-->	
			<div class="modal fade" id="signupmodal" role="dialog">
				<div class="modal-dialog">
					
					<div class="modal-content">
						<div class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><span class="glyphicon glyphicon-user"></span> SignUp</h4>
						</div>
						<div class="modal-body"> 
						   <form role="form" id="signupform">
								<div class="form-group">
									<input type="radio" name="gender" value="male"> Male&nbsp;&nbsp;
									<input type="radio" name="gender" value="female"> Female
								</div>
								<div class="row">
									<div class="form-group col-md-6 col-xs-12">
										<label for="fname">First Name</label>
										<input type="text" class="form-control" id="fname" placeholder="Enter your first name" name="fname" required>
									</div>
									<div class="form-group col-md-6 col-xs-12">
										<label for="lname">Last Name</label>
										<input type="text" class="form-control" id="lname" placeholder="Enter your last name" name="lname" required>
									</div>
								</div>
								<div class="form-group">
									<label for="email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
									 <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" required>
								</div>
								 <div class="form-group">
									<label for="psw"><span class="  glyphicon glyphicon-eye-close"></span> Password</label>
									<input type="password" class="form-control" id="psw" placeholder="Enter Password(min. 8 characters)" name="psw" required>
								</div>
								<div class="form-group">
									<label for="psw-repeat"><span class=" glyphicon glyphicon-exclamation-sign"></span> Repeat Password</label>
									<input type="password" class="form-control" id="psw-repeat" placeholder="Repeat Password" name="psw-repeat" required>
								</div>	
								
								<div class="form-group">
									<label for="yearofbirth">Year of birth</label>
									<select type="year" class="form-control" id="yearofbirth" placeholder="Enter your year of birth" name="yearofbirth" required="required"><option value="" selected="selected">Year of birth</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option></select>
								</div>
								
								
								<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
								<button id="signUpSubmit" type="button" class="btn btn-success btn-block" action="" ><span class="glyphicon glyphicon-ok-sign"></span> SignUp</button>
								
									  
							</form>
						</div>
						<div class="modal-footer">
							<p>Already a member? <a id="loginmodal2" href="#"> Log In</a></p>
						</div>
					</div>
					  
				</div>
			</div>
			
			
<!--!!!!!!!!!!!!!!! ForgorPassword  !!!!!!!!!!!!!!!!!-->	
			<div class="modal fade" id="forgotpasswordmodal" role="dialog">
				<div class="modal-dialog">
					
					<div class="modal-content">
						<div class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4>Forgot Password?</h4>
						</div>
						<div class="modal-body"> 
						   <form role="form">
								<div class="form-group">
									<label for="forgotemail"><span class="glyphicon glyphicon-envelope"></span> Enter your Email</label>
									 <input type="text" class="form-control" id="forgotemail" placeholder="Enter Email" name="forgotemail" required>
								</div>
								<p>Ask about a new Password.</p>
								<button id="sendEmail" type="submit" class="btn btn-success btn-block" action=""><span class="glyphicon glyphicon-ok-sign"></span> Send me Email</button>	  
							</form>
						</div>
					</div>
					  
				</div>
			</div>
			
			
		
<!--!!!!!!!!!!!!!!! Footer  !!!!!!!!!!!!!!!!!-->	
	<footer class="footer1">
		  <div class="footer">
		    <div class="container">
		      <div class="row">
		        <div class="col-xs-12">
		          <div class="footer-desc text-center">
		            <img src="src/logonew.jpg" width="100" height="90" alt="">
		            <p>
		              Drive Together is a popular site that offers a great opportunity 
					  <br>for those who want to travel and live a unique experience.
					  <br> <u><a href="aboutUs.php">Learn More</a></u>
		            </p>
		          </div>
		        </div>
		        <div class="col-xs-12">
		          <ul class="social">
		            <li><a href="https://www.facebook.com" class="btn btn-social btn-sm btn-facebook">
					<i class="fa fa-facebook"></i></a></li>
					<li><a href="https://www.twitter.com" class="btn btn-social btn-sm btn-twitter">
					<i class="fa fa-twitter"></i></a></li>
					<li><a href="https://plus.google.com" class="btn btn-social btn-sm btn-google-plus">
					<i class="fa fa-google-plus"></i></a></li>
					<li><a href="https://www.pinterest.com" class="btn btn-social btn-sm btn-pinterest">
					<i class="fa fa-pinterest"></i></a></li>
					<li><a href="https://www.instagram.com" class="btn btn-social btn-sm btn-instagram">
					<i class="fa fa-instagram"></i></a></li>
		          </ul>
		        </div>

		        <nav class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
		          <a>
				    <div class="input-group input-group-md">
		            <input type="text" name="subscribe" class="form-control" placeholder="Email Address">
		            <span class="input-group-addon subscribe btn">Subscribe</span>
		            </div>
				  </a>
				  
		        </nav>
				
				<div class="col-xs-12" style="text-align:center; margin:0px auto;">
				<div id="google_translate_element"></div>
				</div>
				
				
		      </div>
		     
		    </div>
		   
		  </div>
		  
		  <div class="footer-bottom">
		    <div class="container">
		      <div class="pull-left"> 2017-2018 © <a href="index.php">Drive Together</a>.  All rights reserved.</div>
			  <div class="pull-right">
		        <ul>
				  <li><a class="link1" href="">Home</a></li>
		          <li><a class="link3" href="privacypolicy.php">Privacy Policy</a></li>
		          <li><a href="termsconditions.php">Terms & Conditions</a></li>
		        </ul>
		      </div>
		    </div>
		  </div>
	</footer>


<button onclick="topFunction()" id="myBtn" title="Go to top"><span class="glyphicon glyphicon-chevron-up"></span></button>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'de,el,en,es,fr,it', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>	
<script src="js/classie.js"></script>
	<script src="js/borderMenu.js"></script>

	
</body> 
</html> 