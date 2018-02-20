<?php
  include "private.php";     
/*
 *  Simple Rating System using CSS, JQuery, AJAX, PHP, MySQL
 *  Downloaded from Devzone.co.in
 */

        //echo email[1];

        $servername="localhost";
        $username="root";
        $password="root";
        $dbname="drive_together";
        $link = mysqli_connect($servername, $username, $password, $dbname) or die ("Could not connect");

if (isset($_POST['rate']) && !empty($_POST['rate'])) {

    $rate = $_POST['rate'];
    $driver_email=$_POST['mail'];
    //echo "<script alert(".$rate."); alert(".$driver_email."); </script>";
    $result=mysqli_query($link,"SELECT * FROM rating where driver_email='".$driver_email."' and user_email='".$_SESSION["user"]["email"]."';" );
    if (mysqli_num_rows($result) > 0) {
        $result2=mysqli_query($link,"DELETE FROM rating WHERE driver_email='".$driver_email."' and user_email='".$_SESSION["user"]["email"]."';");
        
                $sql1 = "INSERT INTO `rating` ( `rate`, `driver_email`,`user_email`) VALUES ('" . $rate . "', '" . $driver_email. "','".$_SESSION["user"]["email"]."'); ";
                if (mysqli_query($link, $sql1)) {
                        //echo "0";
                        $sql2 = "SELECT AVG(rate) as average from rating where driver_email='".$driver_email."'  ;   ";
                                $result11 = mysqli_query($link, $sql2);
                                
                                        if (mysqli_num_rows($result11) > 0) {
    
                                            while($roww = mysqli_fetch_assoc($result11)) {
                                               // $average1=intval($roww[average]);
                                                 $average1=round($roww[average],2);
                                                echo $average1." / 5";
                                            }
                                        } 
                }
        
    }
    else{
        $sql0 = "INSERT INTO `rating` ( `rate`, `driver_email`,`user_email`) VALUES ('" . $rate . "', '" . $driver_email. "','".$_SESSION["user"]["email"]."'); ";
        if (mysqli_query($link, $sql0)) {
            $sql22 = "SELECT AVG(rate) as average from rating where driver_email='".$driver_email."'  ;   ";
                                $result111 = mysqli_query($link, $sql22);
                                
                                        if (mysqli_num_rows($result111) > 0) {
    
                                            while($rowww = mysqli_fetch_assoc($result111)) {
                                                //$average2=intval($rowww[average]);
                                                 $average2=round($rowww[average],2);
                                                echo $average2." / 5";
                                            }
                                        } 
        }
    }
}
mysqli_close($link);
?>