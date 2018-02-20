<?php 
	//include 'private.php'; 
?> 

<?php
	if(isset($_POST['action'])) {
		if ($_POST['action']=="banuser"){
		$useremail = $_POST['email'];
		banUser($useremail);}
	}


	function banUser($useremail){

		//echo $useremail;
		//connect to db
		$servername="localhost";
		$username="root";
		$password="root";
		$dbname="drive_together";
		$link = mysqli_connect($servername, $username, $password, $dbname) or die ("Could not connect");
		///////////////////

		$query = "DELETE FROM passengers WHERE passenger_email='".$useremail."' ";
		$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));
		$query = "DELETE FROM drivers WHERE email='".$useremail."' ";
		$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));
		$query = "DELETE FROM trips_proposed WHERE driver_email='".$useremail."' ";
		$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));
		$query = "DELETE FROM user WHERE email='".$useremail."' ";
		$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));

		/*$to      = $useremail;
		$from = 'driveTogetherTeam@gmail.com';
		$subject = 'mail notification(BAN)';
		$message =  'Your account has been banned from the site drivetogether.com';
		$headers = "From: 'DriveTogetherTeam'"; 
		$ok = mail($to, $subject, $message, $headers);   
		if ($ok) {
			 echo("User has been banned successfully.");
		} else {
		//echo("<p>Email delivery failed…</p>");
		}*/
 		echo("User has been banned successfully.");
	}



	function viewAllUsers(){
	    //connect to db
		$servername="localhost";
		$username="root";
		$password="root";
		$dbname="drive_together";
		$link = mysqli_connect($servername, $username, $password, $dbname) or die ("Could not connect");
	

		if (!mysqli_set_charset($link, "utf8")) {
		    echo "Error loading character set utf8: %s\n", mysqli_error($link);
		    exit();
		} else {
		   // echo "Current character set: %s\n", mysqli_character_set_name($link);
		}
		///////////////////
		$query = "SELECT email,fname,lname,age FROM user";
		$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));

		if (mysqli_num_rows($result) > 0) {
				
			while($row = mysqli_fetch_assoc($result)) {

				$query2 = "SELECT count(*) FROM passengers WHERE passenger_email='".$row["email"]."' ";
				$result2 = mysqli_query($link, $query2) or die('Query failed: ' . mysqli_error($link));
				$row2 = mysqli_fetch_assoc($result2);
				//echo($row2["count(*)"]);
				$query3 = "SELECT count(*) FROM trips_proposed WHERE driver_email='".$row["email"]."' ";
				$result3 = mysqli_query($link, $query3) or die('Query failed: ' . mysqli_error($link));
				$row3 = mysqli_fetch_assoc($result3);

				echo "<div class='col-md-9 col-xs-12'>
						<div class='row spacer'>
							<div class='col-xs-12 col-md-2'>
								<div class='driver res'>
									".$row["email"]."
								</div>
							</div>
							<div class='col-xs-12 col-md-2'>
								<div class='departure res'>
									 ".$row["fname"]."
								</div>
							</div>
							<div class='col-xs-12 col-md-2'>
								<div class='arrival res'>
									 ".$row["lname"]."
								</div>
							</div>
							<div class='col-xs-12 col-md-2'>
								<div class='seats res'>
									".$row["age"]."
								</div>
							</div>
							<div class='col-xs-12 col-md-2'>
								<div class='date res'>
									 ".$row3["count(*)"]."
								</div>
							</div>
							<div class='col-xs-12 col-md-2'>
								<div class='value res'>
									".$row2["count(*)"]."
								</div>
							</div>
						</div>
					</div>
					<div class='col-md-3 col-xs-12'>
						<div class='row spacer'>
							<div class='col-xs-12 col-md-6'>
								<button type='button' class='btn btn-info btn-block' id='seeProfile".$row["email"]."' onclick=\"location.href='userProfile.php?user=".$row["email"]."'\">See Profile</button>
							</div>
							<div class='col-xs-12 col-md-6 pull-right'>
								<button type='button' class='btn btn-danger btn-block' id='banUser-".$row["email"]."' onclick=\"banUser('".$row["email"]."')\">Ban User</button>
							</div>
						</div>				
					</div>	";   

			}

		} 
		
	}



	function viewAllTrips(){
	    //connect to db
		$servername="localhost";
		$username="root";
		$password="root";
		$dbname="drive_together";
		$link = mysqli_connect($servername, $username, $password, $dbname) or die ("Could not connect");
	

		if (!mysqli_set_charset($link, "utf8")) {
		    echo "Error loading character set utf8: %s\n", mysqli_error($link);
		    exit();
		} else {
		   // echo "Current character set: %s\n", mysqli_character_set_name($link);
		}
		///////////////////SELECT * FROM `trips_proposed` WHERE DATE(NOW()) = DATE(datee)
		$query = "SELECT trip_id, driver_email,departure, arrival,value_per_seat, datee,timee FROM trips_proposed WHERE DATE(NOW()) = DATE(datee)";
		$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));

		if (mysqli_num_rows($result) > 0) {
				
			while($row = mysqli_fetch_assoc($result)) {

				echo "<div class='col-md-9 col-xs-12'>
						<div class='row spacer'>
							<div class='col-xs-12 col-md-2'>
								<div class='driver res'>
									".$row["driver_email"]."
								</div>
							</div>
							<div class='col-xs-12 col-md-2'>
								<div class='departure res'>
									 ".$row["departure"]."
								</div>
							</div>
							<div class='col-xs-12 col-md-2'>
								<div class='arrival res'>
									 ".$row["arrival"]."
								</div>
							</div>
							<div class='col-xs-12 col-md-2'>
								<div class='seats res'>
									".$row["value_per_seat"]."
								</div>
							</div>
							<div class='col-xs-12 col-md-2'>
								<div class='date res'>
									 ".$row["datee"]."
								</div>
							</div>
							<div class='col-xs-12 col-md-2'>
								<div class='value res'>
									".$row["timee"]."
								</div>
							</div>
						</div>
					</div>
					<div class='col-md-3 col-xs-12'>
						<div class='row spacer'>
							<div class='col-xs-6 col-md-6 pull-right'>
								<input type='checkbox' class='checkbox' name='trip_as_offer' id='trip-".$row["trip_id"]."' value='trip-".$row["trip_id"]."'>
							</div>
						</div>				
					</div>	";   

			}

		} 
		else{
			echo "	There is not any active trip right now ....  :(";
		}
		
	}



	if(isset($_POST['trip1']) && isset($_POST['trip2']) && isset($_POST['trip3'])) {

		$tripid1 = $_POST['trip1'];
		$tripid2 = $_POST['trip2'];
		$tripid3 = $_POST['trip3'];
		updateRecommendedTrips($tripid1,$tripid2,$tripid3);
	}


	function updateRecommendedTrips($tripid1,$tripid2,$tripid3){
		//connect to db
		$servername="localhost";
		$username="root";
		$password="root";
		$dbname="drive_together";
		$link = mysqli_connect($servername, $username, $password, $dbname) or die ("Could not connect");
	

		if (!mysqli_set_charset($link, "utf8")) {
		    echo "Error loading character set utf8: %s\n", mysqli_error($link);
		    exit();
		} else {
		   // echo "Current character set: %s\n", mysqli_character_set_name($link);
		}
		///////////////////
		$query = "TRUNCATE TABLE recommendedtripids";
		if (mysqli_query($link, $query)) {} 
		else {
		    echo "Error: " . $query . "<br>" . mysqli_error($link);
		}
		$query = "INSERT INTO recommendedtripids VALUES (".$tripid1.",".$tripid2.",".$tripid3.") ";
		if (mysqli_query($link, $query)) {
		    echo "Recommended trips updated successfully.";
		} 
		else {
		    echo "Error: " . $query . "<br>" . mysqli_error($link);
		}
	}



?>