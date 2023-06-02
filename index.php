<?php session_start();
include 'config.php';
// Initialize the $error variable
    $error = "";  
    // If the logout parameter is passed in the URL, unset the session and cookie data, destroy the session and redirect to index.php

        if (array_key_exists("logout", $_GET)) {
        unset($_SESSION);
        setcookie("id", "", time() - 70000);
        $_COOKIE["id"] = "";  
        session_destroy();
        header("Location: /index.php");
    } 
    // If the user is already logged in, redirect to search_firma.php

    else if ((array_key_exists("id", $_SESSION) AND $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'])) {
        header("Location: /forms/01_Firma/search_firma.php");
    }
    // If the submit button is clicked on the form
    if (array_key_exists("submit", $_POST)) {
        //include 'config.php';
         // If there is a database connection error, terminate the script
        if (!$link) {
            die("Connection failed: " . mysqli_connect_error());
        }
         // Validate the form fields
        if (!$_POST['email']) {
            $error .= "An email address is required<br>";
        } 
        if (!$_POST['password']) {
            $error .= "A password is required<br>";
        } 
        if ($error != "") {
            $error = "<p>There were error(s) in your form:</p>".$error;
        } 
         // If there were errors in the form, display them to the user
        else {
        // If the user is signing up
            if ($_POST['signUp'] == '1') {
                  // Check if the email address already exists in the database
                $query_read = "SELECT id FROM `users` WHERE email = '".$link->real_escape_string($_POST['email'])."' LIMIT 1";
                $result = $link->query($query_read);
                if (mysqli_num_rows($result) > 0) {
                    $error = "That email address is taken.";
                } else {
                    $query_insert = "INSERT INTO `users` (`email`, `password`) VALUES ('".$link->real_escape_string($_POST['email'])."', '".md5($_POST['password'])."')";
                    if (!$link->query($query_insert)) {
                        $error = "<p>Could not sign you up - please try again later.</p>";
                    } else {
                          // If the user was successfully signed up, update the password with a hashed version and log them in
                        //$query_update = "UPDATE `users` SET password = '".md5(md5($link->insert_id($link)).$_POST['password'])."' WHERE id = ".$link->insert_id($link)." LIMIT 1";
                        // $query_update = "UPDATE `users` SET password = '".md5($_POST['password'])."' WHERE id = ".$link->insert_id($link)." LIMIT 1";
                        // $link->query($query_update);
                        $_SESSION['id'] = $link->insert_id($link);
                        if ($_POST['stayLoggedIn'] == '1') {
                            setcookie("id", $link->insert_id($link), time() + 60*60*24*365);
                        } 
                        header("Location: /forms/01_Firma/search_firma.php");
                    }
                } 
            } 
             // If the user is logging in
            else {
                 // Check if the email address exists in the database and validate the password
                $query = "SELECT * FROM `users` WHERE email = '".$link->real_escape_string($_POST['email'])."'";
                    $result = $link->query($query);
                    var_dump($result);
                    $row = mysqli_fetch_assoc($result);
                    var_dump($row);
                    if ($row > 0) {
                        //$hashedPassword = md5(md5($row['id']).$_POST['password']);
                        $hashedPassword = md5($_POST["password"]);
                        if ($hashedPassword == $row['password']) {
                            $_SESSION['id'] = $row['id'];
                            if ($_POST['stayLoggedIn'] == '1') {
                                setcookie("id", $row['id'], time() + 60*60*24*365);
                            } 
							header('Location: ./forms/01_Firma/search_firma.php');
                        } else {
                            $error = "That email/password combination could not be found.";
                        }
                    } else {
                        $error = "That email/password combination could not be found.";
                    }
                }
        }
    }
?>
<?php include "header.php"?>
  <div class="container">
    <h2>Program za fakturisanje</h2>
    <div id="error"><?php echo $error; ?></div>
<form method="post" id="SignUpForm">
<div class="form-group">
    <input class="form-control" type="email" name="email" placeholder="Your Email">
    </div>
    <div class="form-group">
    <input class="form-control" type="password" name="password" placeholder="Password">
    </div>
    <div class="checkbox">
    <label>   <input  type="checkbox" name="stayLoggedIn" value=1>Ostanite prijavljeni</label>
    </div>
    <div class="form-group">
    <input  type="hidden" name="signUp" value="1">
    <input class="btn btn-success" type="submit" name="submit" value="Sign Up!">
    </div>
    <p><a class="toggleForms" href="#" style="color:white;">Log in</a></p>
</form>
<form method="post" id="LogInForm">
    <div class="form-group">
    <input class="form-control" type="email" name="email" placeholder="Your Email">
    </div>
    <div class="form-group">
    <input class="form-control" type="password" name="password" placeholder="Password">
    </div>
    <div class="checkbox">
    <label>   
    <input  type="checkbox" name="stayLoggedIn" value=1>Ostanite prijavljeni</label>
    </div>
    <div class="form-group">
    <input type="hidden" name="signUp" value="0">
    <input class="btn btn-success" type="submit" name="submit" value="Log In!">
    </div>
    <p><a class="toggleForms" href="#" style="color:white;">Sign up</a></p>
</form>
</div>
<?php include "footer.php"?>