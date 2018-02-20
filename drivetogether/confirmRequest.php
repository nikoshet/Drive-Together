<?php 
	//include 'private.php'; 
define('concom',1);
    require('common.php');
   // include 'adminPrivate.php'; 

	//$trip=$GET['trip_id'];
	$id=explode('=',$_SERVER['QUERY_STRING']);

	/*echo "<script> alert('".$id[1]."') </script>";*/

?>
<!doctype html>
<html lang="en">
  <head>
    <title>DRIVE TOGETHER - Confirm Request</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">

	
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="src/logonew.jpg">
	<link rel="stylesheet" type="text/css" href="style/confirmrequest.css">
    <link rel="stylesheet" href="style/animate.css">
	
    <link rel="stylesheet" type="text/css" href="style/style2.css" />
    <link rel="stylesheet" type="text/css" href="style/mystyle.css">

 
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> -->


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
<!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->


	<!--  -->
	<meta name="google-signin-client_id" content="349719946881-8231087h84pv9sk0rkbq9k3qhmmc3mve.apps.googleusercontent.com">
	<!--  -->
<script type="text/javascript" src="js/confirmRequest.js"></script>



  </head>
  <body  style="background-color:#d2d8d5;">
  

<!--!!!!!!!!!!!!!!! Menu-Header- -DESKTOP  !!!!!!!!!!!!!!!!!--> 	
	<div class="desktop-only">
		<nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">               
                <div class="navbar" id="myNavbar">
                    <ul class="nav navbar-nav col-md-12">
                      	<li class="col-md-2"></li>
                       	<li><img class="navbar-logo animated wobble" src="src/logonew.jpg" width="140" height="100"></li>
						<li class=" menubutton"><a href="index.php">Home</a></li>
						<li class="menubutton"><a href="Services.php">Services</a></li>
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
				<li><a href="Services.php" class="fa fa-gears"><br>Services</a></li>
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
		
		
<!--!!!!!!!!!!!!!!! request  !!!!!!!!!!!!!!!!!-->		
			<div class="container req">
<!--!!!!!!!!!!!!!!! details  !!!!!!!!!!!!!!!!!-->
				<br><br><br>
				<div class="container-fluid">
					<h3 class="headline">
					<!-- From Montpellier, France to Paris, France <br> -->
						<?php

								$servername="localhost";
								$username="root";
								$password="root";
								$dbname="drive_together";
								$link = mysqli_connect($servername, $username, $password, $dbname) or die ("Could not connect");
							
							if (!mysqli_set_charset($link, "utf8")) {
							   /* echo "Error loading character set utf8: %s\n", mysqli_error($link);*/
							    exit();
							} else {
							    /*echo "Current character set: %s\n", mysqli_character_set_name($link);*/
							}
							///////////////////
									$query = "SELECT trip_id,fname,lname,age,imagepath,driver_email,departure,arrival,datee,timee,available_seats,value_per_seat,info FROM user JOIN trips_proposed on user.email=trips_proposed.driver_email WHERE trip_id='".$id[1]."' ";
									$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));
								
									


									if (mysqli_num_rows($result) > 0) {
									  
										while($row = mysqli_fetch_assoc($result)) {
											echo "from ".$row["departure"]." to ".$row["arrival"];
											$ratings1="SELECT AVG(rate) as avg,COUNT(rate) as num FROM rating where driver_email='".$row["driver_email"]."' ;";
											$result1 = mysqli_query($link, $ratings1) or die('Query failed: ' . mysqli_error($link));
											$row1 = mysqli_fetch_assoc($result1);
										    $driver=$row['driver_email'];// echo $driver; 

						?>
					</h3>
					<div class="details">
						<div class="row">
							<div class="col-xs-12 col-md-3"><label>Pick-up point</label>
							</div>
							<div class="col-xs-12 col-md-9 pull-left">
								<p><i class="fa fa-car" title="Departure" style="color:green;"></i>
									<?php 
										echo $row["departure"];
									?>
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-3"><label>Drop-off point</label>
							</div>
							<div class="col-xs-12 col-md-9 pull-left">
								<p><i class="fa fa-flag-checkered" title="Arrival" style="color:red;"></i>
								<?php echo $row["arrival"];
								?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-3"><label>Date</label>
							</div>
							<div class="col-xs-12 col-md-9 pull-left">
								<p><i class="glyphicon glyphicon-calendar"></i>
								<?php echo $row["datee"]."  ".$row["timee"];
								?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-3"><label>Details</label>
							</div>
							<div class="col-xs-12 col-md-9 pull-left">
								<p><i class="fa fa-info-circle" style="color:blue;" title="info" aria-hidden="true"></i>
								<?php echo $row["info"];
								?></p>
							</div>
						</div>
					</div>
				</div>
				
<!--!!!!!!!!!!!!!!! contactDriver  !!!!!!!!!!!!!!!!!-->
				<div class="container-fluid">
					<div class="contact-driver">
						<div class="row">
							<div class="col-xs-12 col-md-7"><label>Do you want to contact the driver for further details?</label>
							</div>
							<div class="col-xs-12 col-md-3 pull-right">
								<button type="submit" class="btn btn-info btn-block" id="contactDriver" action=""><i class="fa fa-envelope" aria-hidden="true"></i> Send Email</button>
							</div>
						</div>
						
					</div>
				</div>
				

				<div class="container-fluid">
<!--!!!!!!!!!!!!!!! aboutDriver  !!!!!!!!!!!!!!!!!-->
						<div class="driver col-md-5 col-xs-12">
							<h3 class="headline">
							Driver
							</h3>
							<div class="details">
								<div class="row">
									<div class="Profile col-md-5 col-xs-12">
										<div class="Profile-head">
											<div class="Profile-picture">
												<div class="PhotoWrap">
													 <img src="<?= $row['imagepath']; ?>" width="72"height="72" alt=""class="Photo-user"> 
												<!-- 	<img src="https://d2kwny77wxvuie.cloudfront.net/user/mtikNxnVT9Sd-EA9z48qOQ/thumbnail_72x72.jpeg" width="72"height="72"alt=""class="Photo-user"> -->
												</div>
											</div>
											<div class="Profile-info">
												<b class="Profile-name">
												<?php 
													echo $row["fname"]." ".$row["lname"];
												?>
												</b>
												<div class="Profile-age">
													<?php 
														echo $row["age"];
													?> 
													y/o<br/>
										
												</div>
											</div>
										</div>
										<div class="Profile-rate">
												  <p class="ratings-container">
												<i class="fa fa-star" aria-hidden="true" style="color:#ffdd00;"></i>
											<b><?php echo round($row1["avg"],2); ?> / 5</b><span class="text-muted"> - <?php echo $row1["num"]; ?> ratings</span>
											<?php echo "<button type='button' class='btn btn-info btn-block' id='seeProfile".$row["driver_email"]."' onclick=\"location.href='userProfile.php?user=".$row["driver_email"]."'\">See Profile</button>"; ?>

											</p>
										</div>
									</div>
								</div>
								
								<!-- <div class="row">
									<div class="ratings col-xs-12">
										<h3 class="headline">
										Ratings
										</h3>
										<div class="details">
											<div class="row">

												<div class="ratings col-md-5 col-xs-12">
													<div class="Profile-head">

														<div class="Profile-picture">
															<div class="PhotoWrap">

																 <img src="<?= $row['imagepath']; ?>" width="72"height="72" alt=""class="Photo-user"> 

															</div>

														</div>
														<div class="Profile-info">
															<b class="Profile-name">
														
															<?php 
																echo $row["fname"]." ".$row["lname"];
															?>

															</b>
														</div>
													</div>
												</div>
												<div class="ratings col-md-7 col-xs-12">
													<p>"Très bon trajet.Conducteur sympathique.A recommander."</p>
													<p>Aug,2017</p>
													<button type="submit" style="width:60%;" class="btn btn-info btn-block pull-right" action="">See more</button>
												</div>
											</div>
										</div>
									</div>
								</div> -->
							</div>
						</div>
						
<!--!!!!!!!!!!!!!!! bookRequest  !!!!!!!!!!!!!!!!!-->						
						<div class="request col-md-7 col-xs-12">
							<h3 class="headline">
							Ready to book for this trip?
							</h3>
							<div class="details">
							
								<div class="row">
									<div class="col-xs-12 col-md-6"><label>Price</label>
									</div>
									<div class="col-xs-12 col-md-6 pull-right">
										<div class="price">
											<strong>
											<span class="" ><?php 
																echo $row["value_per_seat"];
															?></span></strong>
											<span class="priceUnit">$ per passenger</span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-md-6"><label>No of available seats</label>
									</div>
									<div class="col-xs-12 col-md-6 pull-right">
										<div class="availability">
											<strong><?php 
															echo $row["available_seats"];
													?>
											</strong> <span>available seats</span>
										</div>
									</div>
								</div>
								
							
								<form id="bookseatform" enctype="multipart/form-data" method="post" action="bookSeat.php"> 
								
									<div class="row">
										<div class="col-xs-12 col-md-6"><label>Request No of seats</label>
										</div>
										<div class="col-xs-12 col-md-6 pull-right">
											<div class="form-group inputs">
												<input type="number"  class='form-control' id="desired_seats" name="desired_seats"/>
												<input type="number" class="form-control hidden" id="available_seats" name="available_seats" value= <?php echo $row["available_seats"]; ?> />
												<input type="number" class="form-control hidden" id="tripid" name="tripid" value=<?php echo $row["trip_id"]; ?> />
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="checkbox col-xs-12 text-right">
											<label><input type="checkbox" value="" unchecked>I accept the T&Cs and Privacy Policy.</label>
										</div>
									</div>
										<?php 
									}
									}

							?>
									<div class="row">
										<div class="col-xs-7 pull-right">
										<button type="submit" id="bookSeatSubmit" name="bookSeatSubmit" style="width:60%;" class="btn btn-warning btn-block pull-right">Request</button>
										</div>
									</div>
								</form>
							</div>
						</div>			
				</div>	
			</div>
			
			
<!--!!!!!!!!!!!!!!! ContactDriver  !!!!!!!!!!!!!!!!!-->	
			<div class="modal fade" id="contactdrivermodal" role="dialog">
				<div class="modal-dialog">
					
					<div class="modal-content">
						<div class="modal-header"> 
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4>Please enter your message towards the driver.</h4>
						</div>
						<div class="modal-body"> 
						   <form method="post" action="sendEmail.php">
								<div class="form-group">
									<label for="email"><span class="glyphicon glyphicon-envelope"></span> Enter your Message</label>
									 <textarea type="text" class="form-control" id="message" placeholder="Enter message" name="message" required></textarea>
									
									 <input type="hidden" name='driver' value="<?=$driver;?>"></input>

								</div>
								<input id="sendMessage" type="submit" name="submitemail" class="btn btn-success btn-block" ><span class="glyphicon glyphicon-ok-sign"></span> Send Email</input>	  
							</form>
						</div>
					</div>
					  
				</div>
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
						   <form role="form">
								<div class="form-group">
									<label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label>
									<input type="text" class="form-control" id="usrname" placeholder="Enter email">
								</div>
								<div class="form-group">
									<label for="psw"><span class="glyphicon glyphicon-eye-close"></span> Password</label>
									<input type="password" class="form-control" id="psw" placeholder="Enter password(min. 8 characters)">
								</div>
								<!-- <div class="checkbox">
									<label><input type="checkbox" value="" checked> Remember me</label>
								</div> -->
								
								
								<!-- Google Login -->
								<div style="text-align:center;">OR</div>
								<center>
								<div id="my-signin2"></div></center><br>
								  <script>
									function onSuccess(googleUser) {
									  console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
									}
									function onFailure(error) {
									  console.log(error);
									}
									function renderButton() {
									  gapi.signin2.render('my-signin2', {
										'scope': 'profile email',
									    'width': 260,
										'height': 40,
										'longtitle': true,
										'theme': 'dark',
										'onsuccess': onSuccess,
										'onfailure': onFailure
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
								
								
								<button type="submit" class="btn btn-success btn-block" action=""><span class=" glyphicon glyphicon-log-in"></span> Login</button>
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
						   <form role="form">
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
								<button type="submit" class="btn btn-success btn-block" action=""><span class="glyphicon glyphicon-ok-sign"></span> SignUp</button>
								
									  
							</form>
						</div>
						<div class="modal-footer">
							<p>Already a member? <a id="loginmodal2" href="#"> Login</a></p>
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
									<label for="email"><span class="glyphicon glyphicon-envelope"></span> Enter your Email</label>
									 <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" required>
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