<?php

session_start();

$diditwork="";

$link = mysqli_connect("details for mySQL here");

if (array_key_exists("content", $_POST)) {
        
        include("connection.php");
        
    
        $query = "UPDATE users SET diary = '".mysqli_real_escape_string($link,$_POST['content'])."' where email = '".mysqli_real_escape_string($link,$_SESSION['email'])."'";
        
        if (mysqli_query($link, $query)) {
            $diditwork = true;
        }
        
}

?>

<? echo $diditwork ?>