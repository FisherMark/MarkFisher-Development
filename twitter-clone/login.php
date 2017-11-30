<?php 

session_start();

$link = mysqli_connect("details for mySQL here");
$query = "SELECT * FROM users";

if(mysqli_connect_error()) {
        die ("ERROR");
}




$toBePutIn = "";
$errorsHappened = false;
$emailCorrect = false;


if(isset($_COOKIE['email']) && isset($_COOKIE['pass'])) {
    header("Location: index.php");
}

if($_POST['guestButton']) {
	$_SESSION['email'] = "guest";
	$_SESSION['password'] = "8841c2c5b9081b7ae310b7c786aa2fc4";
	header("Location: index.php");
}



if($_POST) {
    
    $_POST['email']=strtolower($_POST['email']);
    $_POST['password']=strtolower($_POST['password']);

    if ($_POST['email'] == "") {
        $toBePutIn = "Please enter a username.<br>";
        $errorsHappened = true;
    }
    if ($_POST['password'] == "") {
        $toBePutIn .= "Please enter a password.";
        $errorsHappened = true;
    }
	
	if ($result = mysqli_query($link, $query)) {
        while ($row = mysqli_fetch_array($result)) {
        
        
            if(isset($_POST['aTLogIn'])) {
                if ($_POST['email'] == $row[5]) {
					$emailCorrect = true;
                    $pass = md5($_POST['password']);
                    $_POST['password'] = "";
                    if ($pass == $row['password']) {
                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION['password'] = $pass;
                        if($_POST['loggedIn'] == 'checkboxValue') {
                            setcookie("email", $_SESSION['email'], time() + 60 * 5);
                            setcookie("pass", $pass, time() + 60 * 5);
                        }
					header("Location: index.php");
                    } else {
                        $errorsHappened = true;
                        $toBePutIn = "Incorrect password.";
                    }
					
                } else if($emailCorrect==false) {
                    $toBePutIn = "That username doesn't have an account here.";
                    $errorsHappened = true;
                }
                if ($_POST['email'] == "" || $_POST['password'] == "") {
                    $errorsHappened = true;
                    $toBePutIn = "Please enter both fields.";
                }
            } else if(isset($_POST["aTSignIn"])) {
                if ($_POST['email'] == "" | $_POST['password'] == "") {
                    $errorsHappened = true;
                    $toBePutIn = "Please enter both fields.";
                } else if ($_POST['email'] == $row[5]) {
                    $errorsHappened = true;
                    $toBePutIn = "You already have an account with that username.<br>";
                }
                
            }
        } 
    
    if(!$errorsHappened) {
        if(isset($_POST["aTSignIn"])) {
            $pass = md5($_POST['password']);
            $_POST['password']="";
            $email = "'".$_POST['email']."'";
            $password = "'".$pass."'";
            $query = "INSERT INTO `users` (`username`, `password`, `followers`) VALUES('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $pass)."','".mysqli_real_escape_string($link, $_POST['email'])."')";
            if (mysqli_query($link, $query)) {
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $pass;
                $query = "UPDATE users SET followers = CONCAT(followers, ' guest') where username = '".$_SESSION['email']."'";
                if ($result = mysqli_query($link, $query)) {
                    Header("Refresh:0");
                 }
                header("Location: index.php");
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


<html>

<head>


	<meta content="text/html charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">

	<title>Twitter. It's what's happening.</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    
	<style type="text/css">
	
		body {
			margin:0;
			padding:0;
		}
		
		.topBox {
			height:20%;
			width:100%;
			background-color:#1DA1F2;
		}
	
		.titleText {
			font-size:310%;
			color:white;
			text-align:center;
			padding-top:1.5em;
			
		}
	
		.logo {
			position:absolute;
			margin-top:25px;
			margin-left:25%;
		}
		
		.loginBox {
			height: 50%;
			background-color:#1DA1F2;
			
			border-radius:10px;
			text-align: center;
		}
		
		.logIn {
			font-size:150%;
			font-weight: bold;
			margin-top:10%;
		}
		
		.whiteText {
			color:white;
		}
		
		.bold {
			font-weight: bold;
		}
		
		.twentyMargin {
			margin-top: 20px;
		}
		
		.sevenMargin {
			margin-top: 7px;
		}
		
		.loginButton {
			height:9%;
			width: 70%;
			background-color: white;
			color: #1DA1F2;
			border: none;
			border-radius: 15px;
			font-weight:bold;
		}
		
		
		.inputBoxes {
			margin-top: 15px;
			background-color:#1DA1F2;
			border-left: none;
			border-top: none;
			border-right: none;
			border-bottom: 1px white solid;
			color:white;
			width: 70%;
		}
		
		.fifteenMargin {
			margin-top:15px;
		}
		
		::-webkit-input-placeholder { /* WebKit, Blink, Edge */
			color:    #cccccc;
		}
		:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
		   color:    #cccccc;
		   opacity:  1;
		}
		::-moz-placeholder { /* Mozilla Firefox 19+ */
		   color:    #cccccc;
		   opacity:  1;
		}
		:-ms-input-placeholder { /* Internet Explorer 10-11 */
		   color:    #cccccc;
		}
		::-ms-input-placeholder { /* Microsoft Edge */
		   color:    #cccccc;
		}
	</style>

	
</head>



<body>


	
	<div class="topBox">
	
		<img src="logo.png" class="logo">
		<h1 class="titleText">What's happening?</h1>
		
		
	
	</div>
	<div class="container">
        <? echo $toBePutIn ?>
		<div class="row">
		
			<div class="col">
			</div>
			
			<div class="loginBox col-6">
				<form method="post">
					<p class="whiteText logIn">Log in to your account</p>
					<input type="text" placeholder="Username" name="email" autofocus="autofocus" class="inputBoxes">
					<input type="password" placeholder="Password" name="password" class="inputBoxes">
					<br>
					<input type="checkbox" class="fifteenMargin" name="loggedIn" value="checkboxValue" id="checkbox">
					<label for="checkbox" class="whiteText fifteenMargin" name="loggedIn">Remember me</label>
					<br>
					<a href="https://www.google.co.uk/search?q=google+forgot+password" target="_blank" class="whiteText bold">Forgot password?</a>
					<br>
					<input type="submit" value="Log in" name="aTLogIn" class="loginButton twentyMargin">
					<br>
					<input type="submit" value="Sign up" name="aTSignIn" class="loginButton sevenMargin">
					<br>
					<input type="submit" value="View tweets as guest" name="guestButton" class="loginButton sevenMargin">
				</form>
			</div>
			
			<div class="col">
			</div>
		
	  </div>
	</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>

</html>