<?php 
	include 'private.php'; 
?> 

<?php 
	$depart=(string) $_POST['depart'];
	$dest=(string) $_POST['dest'];
	$date = explode('-', $_POST['date']);
	$new_date = $date[2].'-'.$date[0].'-'.$date[1];
	$time=$_POST['time'];
	$value=$_POST['value'];
	$noofseats=$_POST['noofseats'];
	$info=$_POST['info'];
	$depart = mb_strtoupper($depart);
	$dest = mb_strtoupper($dest);
	$departt = explode(",", $depart);
	
	$destt = explode(",", $dest);
	
	/*connect to db*/
	$servername="localhost";
	$username="root";
	$password="root";
	$dbname="drive_together";
	$link = mysqli_connect($servername, $username, $password, $dbname) or die ("Could not connect");

		if (!mysqli_set_charset($link, "utf8")) {
		    echo "Error loading character set utf8: %s\n", mysqli_error($link);
		    exit();
		} else {
		    //echo "Current character set: %s\n", mysqli_character_set_name($link);
		}

		$query = "SELECT * FROM drivers WHERE email = '".$_SESSION["user"]["email"]."' ";
		$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));
	if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {

				$sql2 = "INSERT INTO trips_proposed (driver_email,departure,arrival,datee,timee,available_seats,value_per_seat,info) VALUES ('".$_SESSION["user"]["email"]."','".$departt[0]."','".$destt[0]."','".$new_date."','".$time."',".$noofseats.",".$value.",'".$info."')";
				if (mysqli_query($link, $sql2)) {
					echo "<script>
			    	alert('Trip added successfully.');
				    window.location.href='myProfile.php';
				    </script>";
				} 
				else {
					echo "Error: " . mysqli_error($link);
				}
				/////////
				if (!empty($_POST["time2"]) && !empty($_POST["value2"]) && !empty($_POST["noofseats2"]) && !empty($_POST["info2"])){
					$date2 = explode('-', $_POST['date2']);
					$new_date2 = $date2[2].'-'.$date2[0].'-'.$date2[1];
					$time2=$_POST['time2'];
					$value2=$_POST['value2'];
					$noofseats2=$_POST['noofseats2'];
					$info2=$_POST['info2'];
					$sql3 = "INSERT INTO trips_proposed (driver_email,departure,arrival,datee,timee,available_seats,value_per_seat,info) VALUES ('".$_SESSION["user"]["email"]."','".$destt[0]."','".$departt[0]."','".$new_date2."','".$time2."',".$noofseats2.",".$value2.",'".$info2."')";
					if (mysqli_query($link, $sql3)) {
						/*echo "<script>
				    	alert('Trip added successfully.');
					    window.location.href='myProfil.php';
					    </script>";*/
					    $data["info"]="success2";
					} 
					else {
						$data["info"]= "Error: " . mysqli_error($link);
					}
				}
				////////
		}
	}
	else{
				$sql1 = "INSERT INTO drivers (email) VALUES ('".$_SESSION["user"]["email"]."')";
				if (mysqli_query($link, $sql1)) {
					echo "<script>
			    	alert('Driver added successfully.');
				  
				    </script>";
				} 
				else {
					echo "Error: " . mysqli_error($link);
				}
				///////////////////
				$sql = "INSERT INTO trips_proposed (driver_email,departure,arrival,datee,timee,available_seats,value_per_seat,info) VALUES ('".$_SESSION["user"]["email"]."','".$departt[0]."','".$destt[0]."','".$new_date."','".$time."',".$noofseats.",".$value.",'".$info."')";
				if (mysqli_query($link, $sql)) {
					echo "<script>
			    	alert('Trip added successfully.');
				    window.location.href='myProfile.php';
				    </script>";
				} 
				else {
					echo "Error: " . mysqli_error($link);
				}
				///////////
				if (!empty($_POST["time2"]) && !empty($_POST["value2"]) && !empty($_POST["noofseats2"]) && !empty($_POST["info2"])){
					$date2 = explode('-', $_POST['date2']);
					$new_date2 = $date2[2].'-'.$date2[0].'-'.$date2[1];
					$time2=$_POST['time2'];
					$value2=$_POST['value2'];
					$noofseats2=$_POST['noofseats2'];
					$info2=$_POST['info2'];
					$sql4 = "INSERT INTO trips_proposed (driver_email,departure,arrival,datee,timee,available_seats,value_per_seat,info) VALUES ('".$_SESSION["user"]["email"]."','".$destt[0]."','".$departt[0]."','".$new_date2."','".$time2."',".$noofseats2.",".$value2.",'".$info2."')";
					if (mysqli_query($link, $sql4)) {
						/*echo "<script>
				    	alert('Trip added successfully.');
					    window.location.href='myProfil.php';
					    </script>";*/
					    $data["info"]="success2";
					} 
					else {
						$data["info"]= "Error: " . mysqli_error($link);
					}
				}
				////////
	}
	
?>

