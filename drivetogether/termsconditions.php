<?php 
	define('concom',1);
    require('common.php');
?> 
<!doctype html>
<html lang="en">
  <head>
    <title>DRIVE TOGETHER - Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-signin-client_id" content="349719946881-8231087h84pv9sk0rkbq9k3qhmmc3mve.apps.googleusercontent.com">
    <!-- CSS -->
    <link rel="icon" href="src/logonew.jpg">
	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
	<link rel="stylesheet" type="text/css" href="style/style2.css" />
    <link rel="stylesheet" href="style/animate.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   	<!-- JS -->
 	<script type="text/javascript" src="js/indexjs.js"></script>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/borderMenu.js"></script>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCv5oKmZbCg7Awo7fj-9Jtn1VYXZj_hWZ4&libraries=places&callback=initAutocomplete" async defer></script>
  </head>
  <body style="background-color:#eff0f2;">
  
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


		
<!--!!!!!!!!!!!!!!! Terms&Conditions  !!!!!!!!!!!!!!!!!-->			
		<div class="container-fluid"> 
			<div class="row">
				<div class="col-xs-12 ">
					<h1><b>Terms & Conditions</b></h1>
				</div> 
				<div class="col-xs-12">				
					<p>
						<u>1. Terms</u></br>
By accessing this web site, you are agreeing to be bound by these web site Terms and Conditions of Use, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws. If you do not agree with any of these terms, you are prohibited from using or accessing this site. The materials contained in this web site are protected by applicable copyright and trade mark law.</br>

<u>2. Use License</u></br>
Permission is granted to temporarily download one copy of the materials (information or software) on Drive Together's web site for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
modify or copy the materials;
use the materials for any commercial purpose, or for any public display (commercial or non-commercial);
attempt to decompile or reverse engineer any software contained on Drive Together's web site;
remove any copyright or other proprietary notations from the materials; or
transfer the materials to another person or "mirror" the materials on any other server.
This license shall automatically terminate if you violate any of these restrictions and may be terminated by Drive Together at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format.</br>
<u>3. Disclaimer</u></br>
The materials on Drive Together's web site are provided "as is". Drive Together makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties, including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights. Further, Drive Together does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its Internet web site or otherwise relating to such materials or on any sites linked to this site.</br>
<u>4. Limitations</u></br>
In no event shall Drive Together or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption,) arising out of the use or inability to use the materials on Drive Together's Internet site, even if Drive Together or a Drive Together authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.</br>

<u>5. Revisions and Errata</u></br>
The materials appearing on Drive Together's web site could include technical, typographical, or photographic errors. Drive Together does not warrant that any of the materials on its web site are accurate, complete, or current. Drive Together may make changes to the materials contained on its web site at any time without notice. Drive Together does not, however, make any commitment to update the materials.</br>

<u>6. Links</u></br>
Drive Together has not reviewed all of the sites linked to its Internet web site and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by Drive Together of the site. Use of any such linked web site is at the user's own risk.</br>

<u>7. Site Terms of Use Modifications</u></br>
Drive Together may revise these terms of use for its web site at any time without notice. By using this web site you are agreeing to be bound by the then current version of these Terms and Conditions of Use.</br>

<u>8. Governing Law</u></br>
Any claim relating to Drive Together's web site shall be governed by the laws of the State of Greece without regard to its conflict of law provisions.</br>

General Terms and Conditions applicable to Use of a Web Site.


					</p>
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
						   <form role="form" id="loginform">
								<div class="form-group">
									<label for="emaillogin"><span class="glyphicon glyphicon-user"></span> Email</label>
									<input type="text" class="form-control" id="emaillogin" name="emaillogin" placeholder="Enter email">
								</div>
								<div class="form-group">
									<label for="pswlogin"><span class="glyphicon glyphicon-eye-close"></span> Password</label>
									<input type="password" class="form-control" id="pswlogin" name="pswlogin" placeholder="Enter password">
								</div>
<!-- 								<div class="checkbox">
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
									<label for="emailf"><span class="glyphicon glyphicon-envelope"></span> Enter your Email</label>
									 <input type="text" class="form-control" id="emailf" placeholder="Enter Email" name="emailf" required>
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


	
		
</body> 
<script src="js/classie.js"></script>
	<script src="js/borderMenu.js"></script>
</html> 