<!DOCTYPE html>
<html lang="en">

<head>


	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
	<title>Twitter. It's what's happening.</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    

    <link rel="stylesheet" href="styles.css">

	
	
</head>
    

<body>

<div id="topBox">
	
    <form method="post">
        <input type="submit" class="logoutButton" name="logoutButton" value="Log out">
    </form>
    <a href="http://mfisher.net/twitter-clone/index.php"><img src="logo.png" class="logo"></a>
    <h1 class="titleText">Hello, <? echo $_SESSION['email'] ?></h1>

    <form method="get">
        <input type="text" name="search" class="searchBar" placeholder="Search for users">
    </form>
		
		
		
		
</div>
    
<div class="container mainContent">


