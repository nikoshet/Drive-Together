<?php
    // First we execute our common code to connection to the database and start the session
    define('concom',1);
    require('common.php');

    // FIRST CHECK IF LOGIN IS BY ADMIN
    if ($_POST['emaillogin']=="admin@admin.admin" && $_POST['pswlogin']=="admin") 
    {
        // This stores the admin's data into the session at the index 'admin'.
        $_SESSION['admin'] = "admin";
        $data["info"]="Successful Login.";
        $data["email"]= "admin";
        echo json_encode($data);        
    }

    // FOR SIMPLE USERS
    else{

        // This variable will be used to re-display the user's username to them in the
        // login form if they fail to enter the correct password.  It is initialized here
        // to an empty value, which will be shown if the user has not submitted the form.
        $submitted_email = '';

            // This query retreives the user's information from the database using
            // their username.
            $query = "
                SELECT
                    email, fname, lname, gender, age, password, salt,imagepath
                FROM user
                WHERE
                    email = :email
            ";
             
            // The parameter values
            $query_params = array(
                ':email' => $_POST['emaillogin']
            );
             
            try
            {
                // Execute the query against the database
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            } 
            catch(PDOException $ex)
            {
                // Note: On a production website, you should not output $ex->getMessage().
                // It may provide an attacker with helpful information about your code.
                die("An Error occured.");
            } 
             
            // This variable tells us whether the user has successfully logged in or not.
            // We initialize it to false, assuming they have not.
            // If we determine that they have entered the right details, then we switch it to true.
            $login_ok = false;
             
            // Retrieve the user data from the database.  If $row is false, then the username
            // they entered is not registered.
            $row = $stmt->fetch();
            if($row)
            {
                // Using the password submitted by the user and the salt stored in the database,
                // we now check to see whether the passwords match by hashing the submitted password
                // and comparing it to the hashed version already stored in the database.
                $check_password = hash('sha256', $_POST['pswlogin'] . $row['salt']);
                for($round = 0; $round < 65536; $round++)
                {
                    $check_password = hash('sha256', $check_password . $row['salt']);
                } 
                if($check_password === $row['password'])
                {
                    $login_ok = true;
                } 
            }
            // If the user logged in successfully, then we send them to the private members-only page
            // Otherwise, we display a login failed message and show the login form again
            if($login_ok)
            {
                unset($row['salt']);
                unset($row['password']);
                // This stores the user's data into the session at the index 'user'.
                // We will check this index on the private members-only page to determine whether
                // or not the user is logged in.  We can also use it to retrieve
                // the user's details.
                $_SESSION['user'] = $row;
                // Redirect the user to the private members-only page.
                //echo "Successful Login.";
                //die("Redirecting to: index.html");
                $submitted_email = htmlentities($_POST['emaillogin'], ENT_QUOTES, 'UTF-8');
                //echo  $submitted_email ;

                $data["info"]="Successful Login.";
                $data["email"]= $submitted_email ;
                echo json_encode($data);
            } 
            else
            {
                //print("Login Failed.");
                //echo "Login Failed.";
                $data["info"]="Login Failed.";
                echo json_encode($data);
                // Show them their username again so all they have to do is enter a new
                // password.  The use of htmlentities prevents XSS attacks.  You should
                // always use htmlentities on user submitted values before displaying them
                // to any users (including the user that submitted them).  For more information:
                // http://en.wikipedia.org/wiki/XSS_attack
               // $submitted_email = htmlentities($_POST['emaillogin'], ENT_QUOTES, 'UTF-8');
            } 
    } 
?> 
