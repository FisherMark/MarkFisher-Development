<?php

session_start();

$link = mysqli_connect("details for mySQL here");

$tweets=[];
$usernames = [];
$times=[];
$errorMessage = "";

//Logout
if(isset($_POST['logoutButton'])) {
	setcookie("email", "", time() - 60 * 60);
    $_COOKIE["email"] = "";
    setcookie("pass", "", time() - 60 * 60);
    $_COOKIE["pass"] = "";
	header("Location: login.php");
}

//Get the same variables to refer to later despite coming from cookies/session, or redirect if not logged in
if(isset($_COOKIE['email'])) {
    $_SESSION['email'] = $_COOKIE['email'];
    $_SESSION['password'] = $_COOKIE['pass'];
} else if(!isset($_SESSION['email'])) {
    header("Location: login.php");
}


//Grab info for tweets
$query = "SELECT * FROM users WHERE followers LIKE '%".mysqli_real_escape_string($link, $_SESSION['email'])."%'";
if ($result = mysqli_query($link, $query)) {
        
    while ($row = mysqli_fetch_array($result)) {
        if ($row['tweet'] != "") {
            $tweets[] = $row['tweet'];
            $usernames[]=$row['username'];
            $times[] = $row['time'];
        }
    }
    $currentTime = time();
} else {
        echo "error";
}

//Tweeting function
if(isset($_POST['tweetingButton'])) {
	if($_POST['tweetingInput'] != "") {
		$query = "select followers from users where username = '".$_SESSION['email']."'";
		$followersToAdd = mysqli_fetch_array(mysqli_query($link, $query));
		echo $followersToAdd[1];
		 if ($results = mysqli_query($link, $query)) {
        
			while ($rowSorted = mysqli_fetch_array($results)) {
				$accountToBeAdded = $rowSorted[0];
			}
        
        }
		$query = "INSERT INTO `users` (`username`, `password`,`tweet`,`followers`,`time`) VALUES('".$_SESSION['email']."','".$_SESSION['password']."','".$_POST['tweetingInput']."','".$accountToBeAdded."','".time()."')";
		$result =  mysqli_fetch_array(mysqli_query($link, $query));
		$tweets = $result['tweet'];
	} 
}



//Unfollow function
if(isset($_POST['unfollow'])) {
	$query = "UPDATE users SET followers = REPLACE(followers, '".$_SESSION['email']."', '') where username='".$_POST['unfollowAcc']."'";
	 if ($result = mysqli_query($link, $query)) {
         Header("Refresh:0");
	 }  
}


//Follow function
if(isset($_POST['follow'])) {
    $query = "UPDATE users SET followers = CONCAT(followers, ' ".$_SESSION['email']."') where username = '".$_POST['followAcc']."'";
    if ($result = mysqli_query($link, $query)) {
		Header("Refresh:0");
	 }
}



//Search function
if($_GET['search']) {
    $searched = $_GET['search'];
    $errorMessage="";
    $tweets=[];
    $usernamesOfSearch = [];
    $times=[];
    $followers=[];
    $accountsInResultsNotFollowing=[];
    $query = "select * from users where username like '%".$searched."%'";
    $errorMessage = "<h2>No results found for '".$searched."'.</h2>";
    if ($result = mysqli_query($link, $query)) {
        
        while ($row = mysqli_fetch_array($result)) {
            if ($row['tweet'] != "") {
                $tweets[] = $row['tweet'];
                $usernamesOfSearch[]=$row['username'];
                $times[] = $row['time'];
                $followers[] = $row['followers'];
                $errorMessage="";
            }
        }
    $currentTime = time();
    }
    if ($errorMessage!="") {
        $errorMessage = "<h2>No results found for '".$searched."'.</h2>";
    }
}




?>