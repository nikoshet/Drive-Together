
<?php

	function getOfferedTrips(){
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
		$query = "SELECT tripid1,tripid2,tripid3 FROM recommendedtripids";
		$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));

		if (mysqli_num_rows($result) > 0) {
				
			while($row = mysqli_fetch_assoc($result)) {

				$query1 = "SELECT driver_email,age,fname,lname,datee,timee,departure,arrival,value_per_seat,imagepath FROM trips_proposed JOIN user ON user.email = trips_proposed.driver_email WHERE trip_id='".$row["tripid1"]."' ";
				$result1 = mysqli_query($link, $query1) or die('Query failed: ' . mysqli_error($link));
				$row1 = mysqli_fetch_assoc($result1);
				$query2 = "SELECT driver_email,age,fname,lname,datee,timee,departure,arrival,value_per_seat,imagepath FROM trips_proposed JOIN user ON user.email = trips_proposed.driver_email WHERE trip_id='".$row["tripid2"]."' ";
				$result2 = mysqli_query($link, $query2) or die('Query failed: ' . mysqli_error($link));
				$row2 = mysqli_fetch_assoc($result2);
				$query3 = "SELECT driver_email,age,fname,lname,datee,timee,departure,arrival,value_per_seat,imagepath FROM trips_proposed JOIN user ON user.email = trips_proposed.driver_email WHERE trip_id='".$row["tripid3"]."' ";
				$result3 = mysqli_query($link, $query3) or die('Query failed: ' . mysqli_error($link));
				$row3 = mysqli_fetch_assoc($result3);

				$ratings1="SELECT AVG(rate) as avg,COUNT(rate) as num FROM rating where driver_email='".$row1["driver_email"]."' ;";
				$ratings2="SELECT AVG(rate) as avg,COUNT(rate) as num FROM rating where driver_email='".$row2["driver_email"]."' ;";
				$ratings3="SELECT AVG(rate) as avg,COUNT(rate) as num FROM rating where driver_email='".$row3["driver_email"]."' ;";

				$result4 = mysqli_query($link, $ratings1) or die('Query failed: ' . mysqli_error($link));
				$result5 = mysqli_query($link, $ratings2) or die('Query failed: ' . mysqli_error($link));
				$result6 = mysqli_query($link, $ratings3) or die('Query failed: ' . mysqli_error($link));
				$row4 = mysqli_fetch_assoc($result4);
				$row5 = mysqli_fetch_assoc($result5);
				$row6 = mysqli_fetch_assoc($result6);


				echo "
							<div class='container' id='offersearch'> 
			<p style='text-align:center; font-size:24px;'><b> Recommended offers</b></p>
			<div class='row'>

				<div class='col-sm-4 col-xs-12 offer'>
					<div class='trip-offer-head'>
						<h3 style='text-align:center;' ><b>".$row1["departure"]." → ".$row1["arrival"]."</b></h3>
					</div>

					<div class='trip-offer-bottom'>
							
						<div class='trip-offer-person'>
							<div class='image'>
								<img src='".$row1['imagepath']."' width='72'height='72'alt=''class='Photo-user' alt='image'>
							</div>
							<p class='name'>By: <a href='#''>".$row1["fname"]." ".$row1["lname"]."</a></p>
							<p>".$row1["age"]." y/o </p><i class='fa fa-star' aria-hidden='true' style='color:#ffdd00;'></i>
							<b>".round($row4["avg"],2)."/5</b><span class='text-muted'> - ".$row4["num"]." ratings</span></p>
						</div>
								
						<div class='trip-time'>
							<div class='col-xs-6 col-sm-6'></div>
							<div class='col-xs-6 col-sm-6 text-right'>
							".$row1["datee"]." at ".$row1["timee"]."
							</div>
						</div>
												
						<div class='row'>
							<div class='col-xs-12 col-sm-6'>
								<div class='trip-guide-price'>
								Price:
								<span class='block inline-block-xs'><i class='fa fa-eur' aria-hidden='true'></i> ".$row1["value_per_seat"]."</span>
								</div>
							</div>
							<div class='col-xs-12 col-sm-6 text-right text-left-xs'>
								<a href=\"confirmRequest.php?trip=".$row["tripid1"]."\" class='btn btn-primary'>Details</a>
							</div>
						</div>					
					</div>		
				</div>
									
				<div class='col-sm-4 col-xs-12 offer'>
					<div class='trip-offer-head'>
						<h3 style='text-align:center;' ><b>".$row2["departure"]." → ".$row2["arrival"]."</b></h3>
					</div>

					<div class='trip-offer-bottom'>
							
						<div class='trip-offer-person'>
							<div class='image'>
								<img src='".$row2['imagepath']."' width='72'height='72'alt=''class='Photo-user' alt='image'>
							</div>
							<p class='name'>By: <a href='#''>".$row2["fname"]." ".$row2["lname"]."</a></p>
							<p>".$row2["age"]." y/o </p><i class='fa fa-star' aria-hidden='true' style='color:#ffdd00;'></i>
							<b>".round($row5["avg"],2)."/5</b><span class='text-muted'> - ".$row5["num"]." ratings</span></p>
						</div>
								
						<div class='trip-time'>
							<div class='col-xs-6 col-sm-6'></div>
							<div class='col-xs-6 col-sm-6 text-right'>
							".$row2["datee"]." at ".$row2["timee"]."
							</div>
						</div>
												
						<div class='row'>
							<div class='col-xs-12 col-sm-6'>
								<div class='trip-guide-price'>
								Price:
								<span class='block inline-block-xs'><i class='fa fa-eur' aria-hidden='true'></i> ".$row2["value_per_seat"]."</span>
								</div>
							</div>
							<div class='col-xs-12 col-sm-6 text-right text-left-xs'>
								<a href=\"confirmRequest.php?trip=".$row["tripid2"]."\" class='btn btn-primary'>Details</a>
							</div>
						</div>					
					</div>		
				</div>		

				<div class='col-sm-4 col-xs-12 offer'>
					<div class='trip-offer-head'>
						<h3 style='text-align:center;' ><b>".$row3["departure"]." → ".$row3["arrival"]."</b></h3>
					</div>

					<div class='trip-offer-bottom'>
							
						<div class='trip-offer-person'>
							<div class='image'>
								<img src='".$row3['imagepath']."' width='72'height='72'alt=''class='Photo-user' alt='image'>
							</div>
							<p class='name'>By: <a href='#''>".$row3["fname"]." ".$row3["lname"]."</a></p>
							<p>".$row3["age"]." y/o </p><i class='fa fa-star' aria-hidden='true' style='color:#ffdd00;'></i>
							<b>".round($row6["avg"],2)."/5</b><span class='text-muted'> - ".$row6["num"]." ratings</span></p>
						</div>
								
						<div class='trip-time'>
							<div class='col-xs-6 col-sm-6'></div>
							<div class='col-xs-6 col-sm-6 text-right'>
							".$row3["datee"]." at ".$row3["timee"]."
							</div>
						</div>
												
						<div class='row'>
							<div class='col-xs-12 col-sm-6'>
								<div class='trip-guide-price'>
								Price:
								<span class='block inline-block-xs'><i class='fa fa-eur' aria-hidden='true'></i> ".$row3["value_per_seat"]."</span>
								</div>
							</div>
							<div class='col-xs-12 col-sm-6 text-right text-left-xs'>
								<a href=\"confirmRequest.php?trip=".$row["tripid3"]."\" class='btn btn-primary'>Details</a>
							</div>
						</div>					
					</div>		
				</div>
				
			</div> 
		</div> 

				";

			}
		} 
	}
?>