<?php
include 'private.php'; 

	//Check if the file is well uploaded
	if($_FILES['file']['error'] > 0) { echo 'Error during uploading, try again'; }
	
	//We won't use $_FILES['file']['type'] to check the file extension for security purpose
	
	//Set up valid image extensions
	$extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );
	
	//Extract extention from uploaded file
		//substr return ".jpg"
		//Strrchr return "jpg"
		
	$extUpload = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;
	//Check if the uploaded file extension is allowed
	
	if (in_array($extUpload, $extsAllowed) ) { 
	
	//Upload the file on the server
	
	$name = "images/{$_FILES['file']['name']}";
	$result = move_uploaded_file($_FILES['file']['tmp_name'], $name);
	//if(true){
	if($result){
		//echo "<img src='$name'/>";
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
		   

	    //echo "<script> alert(".$_SESSION['user']['email']."); </script>";
		$query = "Update user set imagepath='".$name."' WHERE email ='".$_SESSION["user"]["email"]."' ";
		mysqli_query($link,$query);
		$_SESSION["user"]["imagepath"]=$name;
		header('Location: myProfile.php');

	}
		
	} else { echo 'File is not valid. Please try again'; }
	


	 // echo ($_SESSION["user"]["email"]);
?>