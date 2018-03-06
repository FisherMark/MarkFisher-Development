<?php

    $link = mysqli_connect(servername, databaseUsername, serverPassword, databaseName);

    //string entry = Console.ReadLine();
    $query = "SELECT * FROM users";



    if(mysqli_connect_error())
    {
        die("FAILURE");
        
    }

    
    $result = mysqli_query($link, $query);
        
    if ($result) {
        
        $row = mysqli_fetch_array($result);
        
        //print_r($row);
        
        echo "Your email is ".$row[email]." and your password is ".$row[password];
    }
        
    
    
        

        
?>