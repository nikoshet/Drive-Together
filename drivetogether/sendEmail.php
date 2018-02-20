<?php
include "private.php";

// print phpinfo();  

if(isset($_POST['submitemail'])){
	print_r($_POST); 

			//echo("try");
		$to      = $_POST['driver'];
		$from = $_SESSION["user"]["email"];
		$subject = 'mail notification';
		$message =  "Hello from drivetogetherteam. We are here to inform you that user : ".$from." send you the followning message so as to contact with you.	You can reply him to this email : ".$from."  Following the message that sent you : ".$_POST['message'];
		$headers = "From: $from"; 
		/*$ok = @mail($to, $subject, $message, $headers, "-f " . $from);  */
		$ok = mail($to, $subject, $message, $headers);   
		if ($ok) {
			 echo("<p>Email successfully sent!</p>");
			 header('Location: ' . $_SERVER['HTTP_REFERER']);

		} 
		else {
			 echo("<p>Email delivery failed…</p>");
			 header('Location: ' . $_SERVER['HTTP_REFERER']);

		}

}


?>