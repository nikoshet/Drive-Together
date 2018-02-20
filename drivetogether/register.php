<?php
    // First we execute our common code to connection to the database and start the session
    //require("common.php");
    define('concom',1);
    require('common.php');
    /////////
    //Create Table of user if not existed yet.
    $query = "CREATE TABLE IF NOT EXISTS `user` (`email` varchar(255) NOT NULL,`fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL, `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL, `password` char(64) COLLATE utf8_unicode_ci NOT NULL, `gender` varchar(7) COLLATE utf8_unicode_ci NOT NULL,`age` int(11) COLLATE utf8_unicode_ci NOT NULL,  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL,`imagepath` char(200) COLLATE utf8_unicode_ci NOT NULL,PRIMARY KEY (`email`)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    $db->exec($query);

    /////////
    //If there is a user with this email redirect me stop the process.
    $query = "SELECT fname FROM user where email='".$_POST['email']."';";
        try
        {
            // These two statements run the query against your database table.
            $stmt = $db->prepare($query);
            $result = $stmt->execute();
        }
        catch(PDOException $ex)
        {
            die("An Error occured.");
        }
        $row = $stmt->fetch();
        // If a row was returned, there is already a user with this email.
        if($row)
        {
        //header("Location: index.html");
            die("There is already a member with this email.");
        }
    //////////


        // An INSERT query is used to add new rows to a database table.
        // Again, we are using special tokens (technically called parameters) to
        // protect against SQL injection attacks.
        $query = "
            INSERT INTO user (
                email,
                fname,
                lname,
                password,
                gender,
                age,
                salt,
                imagepath
            ) VALUES (
                :email, :fname, :lname, :password, :gender, :age, :salt, :imagepath
            )
        ";
         
        // A salt is randomly generated here to protect again brute force attacks
        // and rainbow table attacks.  The following statement generates a hex
        // representation of an 8 byte salt.  Representing this in hex provides
        // no additional security, but makes it easier for humans to read.
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
         
        // This hashes the password with the salt so that it can be stored securely
        // in your database.  The output of this next statement is a 64 byte hex
        // string representing the 32 byte sha256 hash of the password.  The original
        // password cannot be recovered from the hash.  For more information:
        // http://en.wikipedia.org/wiki/Cryptographic_hash_function
        $password = hash('sha256', $_POST['psw'] . $salt);
        // Next we hash the hash value 65536 more times.  The purpose of this is to
        // protect against brute force attacks.  Now an attacker must compute the hash 65537
        // times for each guess they make against a password, whereas if the password
        // were hashed only once the attacker would have been able to make 65537 different
        // guesses in the same amount of time instead of only one.
        for($round = 0; $round < 65536; $round++)
        {
            $password = hash('sha256', $password . $salt);
        } 
         
        // Here we prepare our tokens for insertion into the SQL query.  We do not
        // store the original password; only the hashed version of it.  We do store
        // the salt (in its plaintext form; this is not a security risk).
        $query_params = array(
            ':email' => $_POST['email'],
            ':fname' => $_POST['fname'],
            ':lname' => $_POST['lname'],
            ':password' => $password,
            ':gender' => $_POST['gender'],
            ':age' => 2018 - $_POST['yearofbirth'],
            ':salt' => $salt,
            ':imagepath' => 'images/default.png'
        );
         
        try
        {
            // Execute the query to create the user
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        } 
        catch(PDOException $ex)
        {
            // Note: On a production website, you should not output $ex->getMessage().
            // It may provide an attacker with helpful information about your code.
            die("An Error occured.");
        } 
        echo "Sign Up completed successfully. Now please Login.";
     /*   // This redirects the user back to the login page after they register
        header("Location: login.php");
        // Calling die or exit after performing a redirect using the header function
        // is critical.  The rest of your PHP script will continue to execute and
        // will be sent to the user if you do not die or exit.
        die("Redirecting to login.php");  */

       

?> 

