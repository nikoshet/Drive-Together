<?php
    // First we execute our common code to connection to the database and start the session
    define('concom',1);
    require('common.php');
    // At the top of the page we check to see whether the user is logged in or not
    if(empty($_SESSION['user']))
    {
        // If they are not, we redirect them to the login page.
        echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('Please login so as to continue');
        window.location.href='index.php';
    </SCRIPT>";
       /*echo "<script> alert('Please login so as to continue'); </script>";
        header("Location: index.php");
*/
        // Remember that this die statement is absolutely critical.  Without it,
        // people can view your members-only content without logging in.
        die("Redirecting to index.php");
    } 
    // Everything below this point in the file is secured by the login system 
?>
