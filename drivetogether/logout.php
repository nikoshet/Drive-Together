<?php
    // First we execute our common code to connection to the database and start the session
    define('concom',1);
    require('common.php');
    // We remove the user's data from the session
    unset($_SESSION['user']);
    unset($_SESSION['admin']);
    // We redirect them to the login page
    echo "<script>
    alert('Successful Logout.');
    window.location.href='index.php';
    </script>";
    die("Redirecting to: index.php");
