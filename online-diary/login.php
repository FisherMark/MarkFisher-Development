<?php

session_start();

$link = mysqli_connect("details for mySQL here");
$query = "SELECT * FROM users";

if(mysqli_connect_error()) {
        die ("ERROR");
}



$toBePutIn = "";
$errorsHappened = false;

if(isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    header("Location: online-diary.php");
}
        
if($_POST) {
    
    if(isset($_POST['guestButton'])) {
        $_SESSION['email'] = "guest";
        $_SESSION['password'] = "8841c2c5b9081b7ae310b7c786aa2fc4";
        header("Location: online-diary.php");
    }
    $_POST['email']=strtolower($_POST['email']);
    $_POST['password']=strtolower($_POST['password']);

    if ($_POST['email'] == "") {
        $toBePutIn = "Please enter an email address.<br>";
        $errorsHappened = true;
    }
    if ($_POST['password'] == "") {
        $toBePutIn .= "Please enter a password.";
        $errorsHappened = true;
    }
    
    if ($result = mysqli_query($link, $query)) {
        while ($row = mysqli_fetch_array($result)) {
  
            if(isset($_POST['aTLogIn'])) {
                if ($_POST['email'] == $row['email']) {
                    $pass = md5($_POST['password']);
                    $_POST['password'] = "";
                    if ($pass == $row['password']) {
                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION['password'] = $pass;
                        if($_POST['loggedIn'] == 'checkboxValue') {
                            setcookie("email", $_SESSION['email'], time() + 60 * 5);
                            setcookie("pass", $pass, time() + 60 * 5);
                        }
                        header("Location: online-diary.php");
                    } else {
                        $errorsHappened = true;
                        $toBePutIn = "Incorrect password.";
                    }
                } else {
                    $toBePutIn = "That email doesn't have an account here.";
                    $errorsHappened = true;
                }
            } else if(isset($_POST["aTSignIn"])) {
                if ($_POST['email'] == $row[2]) {
                    $errorsHappened = true;
                    $toBePutIn = "You already have an account with that email.<br>";
                }
            }
        } 
    
    if(!$errorsHappened) {
        if(isset($_POST["aTSignIn"])) {
            $pass = md5($_POST['password']);
            $_POST['password']="";
            $email = "'".$_POST['email']."'";
            $password = "'".$pass."'";
            $query = "INSERT INTO `users` (`email`, `password`) VALUES('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $pass)."')";
            if (mysqli_query($link, $query)) {
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $pass;
                header("Location: online-diary.php");
            }
        }
    }
    }
}
    
    
    
if($errorsHappened) {
    $toBePutIn = "<div class='row'>
    <div class='col'>

    </div>
    <div class='alert alert-danger col-6' role='alert'>".$toBePutIn."
    </div>
    <div class='col'>

    </div>
    </div>";
}


      
    

    
?>





<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta content="text/html charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <title>Online Diary</title>
    <style type="text/css">
    
        html { 
          background: url(scenery-new.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
        
        body {
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			position:relative;
            background:none;
		}
        
        .white {
            color: white;
            text-shadow:
            -2px -2px 0 grey,
            2px -2px 0 grey,
            -2px 2px 0 grey,
            2px 2px 0 grey; 
        }
        .whiteThin {
            color: white;
            text-shadow:
            -1px -1px 0 grey,
            1px -1px 0 grey,
            -1px 1px 0 grey,
            1px 1px 0 grey; 
        }
        
        .container {

              
            text-align: center;
              
            margin-top:250px;
        }
        
        .loggedInText {
            font-size: 110%;
        }
        
        .guestButton {
            margin-top:5px;
        }
        
        .entries {
            margin-top:5px;
            border: 1px solid black;
        }
    </style>
    
    </head>
    
    <body>
        <div class="container">
            <form method="post">
                <p class="display-4 white">Online Diary</p> 
                <p class="h3 whiteThin">Store your thoughts permanently and securely.</p>
                <p class="h4 whiteThin">Interested? Sign up now.</p>
                <br>
                <? echo $toBePutIn ?>
                
                <div class="row">
                    <div class="col">
                      
                    </div>
                    <div class="col-4">
                        <input type="email" name="email" class="form-control entries" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="col">
                      
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      
                    </div>
                    <div class="form-group col-4">
                        <input type="password" name="password" class="form-control entries"  placeholder="Password">
                    </div>
                    <div class="col">
                      
                    </div>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" name="loggedIn" class="form-check-input" value="checkboxValue">
                        <span class="whiteThin loggedInText">Stay logged in</span>
                    </label>
                </div>

                <button type="submit" name="aTLogIn" class="btn btn-primary">Log in</button>
                <button type="submit" name="aTSignIn" class="btn btn-success">Sign up</button>
                <br />
                <button type="submit" name="guestButton" class="btn btn-info guestButton">View guest account</button>
            </form>
        </div>

    </body>

</html>