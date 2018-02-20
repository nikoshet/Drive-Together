<?php
    //define('concom',1);
    //require('common.php');
   
  if(isset($_POST["emailf"])){

            $sservername="localhost";
            $susername="root";
            $spassword="root";
            $sdbname="drive_together";
            $link = mysqli_connect($sservername, $susername, $spassword, $sdbname) or die ("Could not connect");
                            
            if (!mysqli_set_charset($link, "utf8")) {
                               /* echo "Error loading character set utf8: %s\n", mysqli_error($link);*/
              exit();
            } else {
                   /*echo "Current character set: %s\n", mysqli_character_set_name($link);*/
            }
                            ///////////////////
            $query = "SELECT * FROM user WHERE email='".$_POST["emailf"]."' ";
            $result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error($link));
            if (mysqli_num_rows($result) > 0) {
                    mysqli_close($link);
                    
                    $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
                     
                   

                    $newpass = '';
                    for ($i = 0; $i<10; $i++) 
                    {
                        $newpass .= mt_rand(0,9);
                    }

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

                        echo $_POST["emailf"];
                       
                         $query = "UPDATE user SET password='".$password."',salt='".$salt."' where email='".$_POST['emailf']."' ;";//'".$_POST['email']."';";
                   


                       
                        $stmt = $conn->prepare($query);

                        $stmt->execute();



                        $to      = $_POST['emailf'];
                        $from = "drivetogetherteam@gmail.com";
                        $subject = 'mail notification-reset password';
                        $message =  "Hello from drivetogetherteam. 
                        Your password has beeb reseted successfully . 
                        You can access your account with this new password : ".$newpass." 
                        We strongly recommend you to change this from your profile settings and set the value you want.(Dont worry all pass are encrypted in our system) 
                            Thank you,
                            drivetogetherteam.";
                        $headers = "From: $from"; 
                        $ok = mail($to, $subject, $message, $headers);   
                        if ($ok) {
                             echo "<p>Check your email to see your new password.</p>" ;

                        } 
                        else {
                             echo "<p>Email delivery failed…</p>" ;

                        }

                }
                catch(PDOException $e)
                {
                        echo $sql . "<br>" . $e->getMessage();
                }

                $conn = null;
        }
        else{
             echo "<p>None user with this email. Check your email again.</p>" ;
        }
}

?> 

