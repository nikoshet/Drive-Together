<?php 
	//include 'private.php'; 
?> 


<?php 

	if(isset($_POST['depart']) && isset($_POST['dest']) && isset($_POST['date']) && isset($_POST["sortby"]) ) 
	{
		
		$depart=$_POST['depart'];
		$dest=$_POST['dest'];
	    $date = explode('-', $_POST['date']);
		$new_date = $date[2].'-'.$date[0].'-'.$date[1];
		$sorting=$_POST['sortby'];

		    get_all_trips($depart,$dest,$new_date,$sorting);

		}
	
	


	function get_all_trips($depart,$dest,$new_date,$sorting){
		
	    //connect to db
		$servername="localhost";
		$username="root";
		$password="root";
		$dbname="drive_together";
		$link = mysqli_connect($servername, $username, $password, $dbname) or die ("Could not connect");
	
	//////////////me to parakatw deixnei kai ellhnikous xarakthres

//	echo "Initial character set: %s\n", mysqli_character_set_name($link);

	/* change character set to utf8 */
	if (!mysqli_set_charset($link, "utf8")) {
	    echo "Error loading character set utf8: %s\n", mysqli_error($link);
	    exit();
	} else {
	   
	   // echo "Current character set: %s\n", mysqli_character_set_name($link);
	}
	///////////////////
	if ($sorting=="nosort"){
			$query = "SELECT DISTINCT trip_id,age,driver_email,imagepath,departure,arrival,datee,timee,available_seats,value_per_seat,info FROM user JOIN trips_proposed on user.email=trips_proposed.driver_email WHERE datee='".$new_date."' AND departure='".$depart."' AND arrival='".$dest."'";
			$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));
		}
	else if ($sorting=="priceHigh"){
			$query = "SELECT DISTINCT trip_id,age,imagepath,driver_email,departure,arrival,datee,timee,available_seats,value_per_seat,info FROM user JOIN trips_proposed on user.email=trips_proposed.driver_email WHERE datee='".$new_date."' AND departure='".$depart."' AND arrival='".$dest."' ORDER BY value_per_seat DESC";
			$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));
		}
	else if ($sorting=="priceLow"){
			$query = "SELECT DISTINCT trip_id,age,imagepath,driver_email,departure,arrival,datee,timee,available_seats,value_per_seat,info FROM user JOIN trips_proposed on user.email=trips_proposed.driver_email WHERE datee='".$new_date."' AND departure='".$depart."' AND arrival='".$dest."' ORDER BY value_per_seat ASC";
			$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));
		}
	else if ($sorting=="dateLate"){
			$query = "SELECT DISTINCT trip_id,age,imagepath,driver_email,departure,arrival,datee,timee,available_seats,value_per_seat,info FROM user JOIN trips_proposed on user.email=trips_proposed.driver_email WHERE datee='".$new_date."' AND departure='".$depart."' AND arrival='".$dest."' ORDER BY timee DESC";
			$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));
		}
	else if ($sorting=="dateEarly"){
			$query = "SELECT DISTINCT trip_id,age,imagepath,driver_email,departure,arrival,datee,timee,available_seats,value_per_seat,info FROM user JOIN trips_proposed on user.email=trips_proposed.driver_email WHERE datee='".$new_date."' AND departure='".$depart."' AND arrival='".$dest."' ORDER BY timee ASC";
			$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));
		}

			echo " <div class='results-count col-xs-12'>
					<h3 class='results-count'>".mysqli_num_rows($result)." ride(s) available from ".$depart." to ".$dest."
					 </h3>
				</div>	  
				<ul class='trip-search-results'  style='padding-top:80px;'>";

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			  /*  $agequery = "SELECT DISTINCT age FROM user JOIN Trips_proposed on user.email=Trips_proposed.driver_email WHERE datee='".$new_date."' AND departure='".$depart."' AND arrival='".$dest."'";
				$resultage = mysqli_query($link, $agequery) or die('Query failed: ' . mysqli_error($link));
			    while($row1 = mysqli_fetch_assoc($resultage)) {*/

			while($row = mysqli_fetch_assoc($result)) {

				$trip = $row["trip_id"] ;
				$ratings1="SELECT AVG(rate) as avg,COUNT(rate) as num FROM rating where driver_email='".$row["driver_email"]."' ;";
				$result111 = mysqli_query($link, $ratings1) or die('Query failed: ' . mysqli_error($link));
				$row1 = mysqli_fetch_assoc($result111);
				//$driver=$row['driver_email'];// echo $driver; 
				echo "<li class='trip-list' itemscope>
							
							<script> /*alert('".$trip."'); */</script>
							<a href=\"confirmRequest.php?trip=".$trip."\" rel='nofollow' class='trip-search-result'>
							

								<article class='row'>
									<div class='Profile col-md-4 col-xs-12'>
										<div class='Profile-head'>
											<div class='Profile-picture'>
												<div class='PhotoWrap'>
													<img src='".$row["imagepath"]."' width='72'height='72'alt='' class='Photo-user'>
												</div>
											</div>
											<div class='Profile-info'>
											<b class='ProfileCard-name'>
											<br>
												".$row["driver_email"];

				echo "</b><div class='ProfileCard-age'>
	                                            ".$row["age"]." y/o<br/>
	                                            </div>
	                                        </div>
										</div>
										<div class='Profile-rate'>
	                                        <p class='ratings-container'>
												<i class='fa fa-star' aria-hidden='true' style='color:#ffdd00;''></i>
												<b>".round($row1["avg"],2)."/5</b><span class='text-muted'> - ".$row1["num"]." ratings</span>
											</p>
										</div>
									</div>

									<div class='description col-md-5 col-xs-12'>
										<h3 class='time=' itemprop='startDate'>";
				echo $row["datee"]. " - " .$row["timee"] ;						

				echo "</h3><h4 class='fromto' itemprop='name'>
											<span class='trip-start'>".$row["departure"]."</span>
											<span class='arrow'>→</span>
											<span class='trip-stop'>".$row["arrival"]."</span>
										</h4>
										<dl class='from'>
											<dd title='Pick-up'><i class='fa fa-car' title='Departure' style='color:green;''> </i>"." ".$row["departure"]."</dd>
										</dl>
										<dl class='to'>
											<dd title='Drop-off'><i class='fa fa-flag-checkered' title='Arrival' style='color:red;'></i>"." ".$row["arrival"]."</dd>
										</dl>
									</div>";

				echo "<div class='offer col-md-3 col-xs-12'>
										<div class='price'>
											<strong>
												<span><h3><i class='fa fa-eur' aria-hidden='true'></i><b>".$row["value_per_seat"]."</b></h3><h5> <p>per passenger</p></h5></span></strong>
											
										</div>
										<div class='availability'>
											<strong><span><h3><b>".$row["available_seats"]."</b></h3><h5> <p> available seats</p></h5><span></strong> 
										</div>
										<i class='fa fa-info-circle fa-2x' style='color:blue;' title='".$row["info"]."' aria-hidden='true'></i> 
									</div>
								</article>
							</a>
						</li>";

			    }

			} 
			else {
			    echo "<br>0 results found.";
			}

		

	}


?>
