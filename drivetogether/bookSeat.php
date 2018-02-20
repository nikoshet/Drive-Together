<?php 
	include 'private.php'; 
?> 


<?php 

	if(isset($_POST['desired_seats']) && isset($_POST['available_seats']) && isset($_POST['tripid']) ) 
	{
		
		$seats2book=$_POST['desired_seats'];
		$new_availiableseats=$_POST['available_seats'] - $seats2book;
		$tripid = $_POST['tripid'];

		if($seats2book<=0){
				echo "<script>
	    				alert('You gave illegal number of seats (propably negative). Please try again.');
	    				window.location.href='confirmRequest.php?trip=".$tripid."';
		    		</script>";
		}
		elseif($new_availiableseats<0){
				echo "<script>
	    				alert('You cant book so many seats. Please check the available seats and try again.');
	    				window.location.href='confirmRequest.php?trip=".$tripid."';
		    		</script>";
		}
		else{

			bookseats( $new_availiableseats , $tripid , $seats2book);

		}
		    

	}

	function bookseats( $new_availiableseats , $tripid , $seats2book){

	    //connect to db
		$servername="localhost";
		$username="root";
		$password="root";
		$dbname="drive_together";
		$link = mysqli_connect($servername, $username, $password, $dbname) or die ("Could not connect");
	
	
		if (!mysqli_set_charset($link, "utf8")) {
		    echo "Error loading character set utf8: %s\n", mysqli_error($link);
		    exit();
		} 
		else {}
	///////////////////
			
			$query = "UPDATE trips_proposed SET available_seats='".$new_availiableseats."' WHERE trip_id='".$tripid."';";
			$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));

			$query2 = "INSERT INTO passengers (passenger_email,trip_id) VALUES ('".$_SESSION["user"]["email"]."','".$tripid."')";
			$result = mysqli_query($link, $query2) or die('Query failed: ' . mysqli_error($link));

			$query3= "SELECT driver_email,departure,arrival from trips_proposed where trip_id='".$tripid."';";
			$result3 = mysqli_query($link, $query3) or die('Query failed: ' . mysqli_error($link));


			if (mysqli_num_rows($result3) > 0) {
			    while($row = mysqli_fetch_assoc($result3)) {
			      
				       	$to = $row["driver_email"];
						$from = $_SESSION["user"]["email"];
						$subject = 'mail notification- seat booked';
						$message =  "Hello from drivetogetherteam. 
						We are here to inform you that user : ".$from." joined your trip from ".$row["departure"]." to ".$row["arrival"]." 
						and booked ".$seats2book." seats . Wish you a happy and safe trip :)";
						$headers = "From: $from"; 
						
						$ok = mail($to, $subject, $message, $headers);   
						if ($ok) {
							echo "<script>
							    	alert('Your seats booked successfully.');
								    window.location.href='confirmRequest.php?trip=".$tripid."';
								    </script>";

						} 
						else {
						    echo "<script>
									    	alert('Something went wrong when we tried to inform the driver for your book. We suggest you to send him an email to this email-address".$to."');
										    window.location.href='confirmRequest.php?trip=".$tripid."';
										    </script>";
						}
					/*echo "<script>
							    	alert('".$row["driver_email"].".');
								    </script>";*/
								}
						


					/*	$to      = $row["driver_email"];
						$from = $_SESSION["user"]["email"];
						$subject = 'mail notification';
						$message =  "ho";
						$headers = "From: $from"; 
						$ok = mail($to, $subject, $message, $headers);   
						if ($ok) {
							 echo("<p>Email successfully sent!</p>");
							 header('Location: ' . $_SERVER['HTTP_REFERER']);

						} 
						else {
							 echo("<p>Email delivery failed…</p>");
							 header('Location: ' . $_SERVER['HTTP_REFERER']);

						}*/
				//}
		}
	
	}

?>
