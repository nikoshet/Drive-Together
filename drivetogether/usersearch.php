<?php

$host = "localhost"; /* Host name */
$user = ""; /* User */
$password = ""; /* Password */
$dbname = "drive_together"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['search'])){
 $search = $_POST['search'];

 $query = "SELECT email FROM user WHERE email like'%".$search."%'";
 $result = mysqli_query($con,$query);

 $response = array();
 while($row = mysqli_fetch_array($result) ){
   $response[] = array("value"=>$row['email']);
 }

 echo json_encode($response);
}

exit;
