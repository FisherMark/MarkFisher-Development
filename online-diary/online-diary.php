<?php

session_start();

$diaryContent = "";

if(isset($_COOKIE['email'])){
    $_SESSION['email'] = $_COOKIE['email'];
    $_SESSION['password'] = $_COOKIE['pass'];
}
else {
    $email = $_SESSION['email'];
    $pass = $_SESSION['password'];
}

$link = mysqli_connect("details for mySQL here");
$query = "SELECT diary FROM users WHERE email = '".mysqli_real_escape_string($link, $_SESSION['email'])."'";

if($_SESSION['email']) {
    $result =  mysqli_fetch_array(mysqli_query($link, $query));
    $diaryContent = $result['diary'];
}

if(isset($_POST["logout"])) {
    setcookie("email", "", time() - 60 * 60);
    $_COOKIE["email"] = "";
    setcookie("pass", "", time() - 60 * 60);
    $_COOKIE["pass"] = "";
    header("Location: login.php");
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
        
        #diary {
            
            width: 100%;
            height: 100%;
        }
        
        textarea {
            resize: none;
            height: 100%;
        }
        
    </style>
    
    </head>
    
    <body>
        <form method="post">
        <button type="submit" name="logout" class="btn btn-primary">Log out</button>
        </form>
        <br>
        <br>
        <br>
        
        <div class="container-fluid">
            
        <textarea id="diary" class="form-control" rows="40"><?php echo $diaryContent ?></textarea>
    
    
        </div>
    
    
    <script type="text/javascript">
        
        
        $('#diary').bind('input propertychange', function() {

                $.ajax({
                  method: "POST",
                  url: "updatedatabase.php",
                  data: { content: $("#diary").val() }
                });

        });
        
        
    </script>

    </body>
 
</html>