<?php
include 'private.php'; 

   
  if(isset($_POST["pass"]) && isset($_POST["newpass"]) && isset($_POST["newpass2"]) ){


            $oldpass=$_POST["pass"];
            $newpass=$_POST["newpass"];
            $newpass2=$_POST["newpass2"];
            

            

            $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
             
           


            $password = hash('sha256', $newpass . $salt);
            
            for($round = 0; $round < 65536; $round++)
            {
                $password = hash('sha256', $password . $salt);
            } 

            $servername = "localhost";
            $username = "root";
            $pass= "root";
            $dbname = "drive_together";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

               
               
                 $query = "UPDATE user SET password='".$password."',salt='".$salt."' where email='".$_SESSION['user']['email']."' ;";//'".$_POST['email']."';";
           


               
                $stmt = $conn->prepare($query);

                $stmt->execute();



               /* $to      = $_POST['emailf'];
                $from = "drivetogetherteam@gmail.com";
                $subject = 'mail notification-reset password';
                $message =  "Hello from drivetogetherteam. 
                Your password reseting succesfully . 
                You can access your acount with this new password : ".$newpass." 
                We strongly recommend you to change this from your profil settings and set the value you want.(Dont worry all pass are encrypted in our system) 
                    Thank you,
                    drivetogetherteam.";
                $headers = "From: $from"; 
                $ok = mail($to, $subject, $message, $headers);   
                if ($ok) {
                     echo("<p>Check your email to see your new password.</p>");

                } 
                else {
                     echo("<p>Email delivery failed…</p>");

                }*/

               }
               catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }

        $conn = null;
     }

?> 

