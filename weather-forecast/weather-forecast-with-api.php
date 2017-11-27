<?php

    $toBePutIn = "";

    if ($_POST) {
        $_POST['weatherinput'] = str_replace(' ', '-', $_POST['weatherinput']);

            $urlContents = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$_POST['weatherinput']."&appid=dda9a1add1bacf190e63a94252c5d559");
            
            $weatherArray = json_decode($urlContents, true);
            
            if ($weatherArray['weather']=="") {
                $toBePutIn = "<div class='row'>
                    <div class='col'>
                      
                    </div>
                    <div class='alert alert-danger col-6' role='alert'>
   That doesnt seem to be a location.
                    </div>
                    <div class='col'>
                      
                    </div>
                </div>";
            } else {
                $weather = "The weather in ".$_POST['weatherinput']." is currently '".$weatherArray['weather'][0]['description']."'.";

                $tempInCelcius = round($weatherArray['main']['temp'] - 273.15);

                $weather .= " The temperature is ".$tempInCelcius."&deg;C and the wind speed is ".$weatherArray['wind']['speed']."m/s.";

                $toBePutIn = "<div class='alert alert-success' role='alert'><p> ".$weather." </p></div>";
            }

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
    <title>Weather Forecast</title>
    <style type="text/css">
    
        html { 
          background: url(sunset.jpeg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
            <? echo $nc ?>
        }
    
        body {
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			position:relative;
            background:none;
		}   
        
        .container {

              
            text-align: center;
              
            margin-top:350px;
        }
        
        a {
            text-decoration:none;
            color:#292B2C;
        }
        
        a:hover {
            text-decoration:none;
            color:#292B2C;
        }
        a:active {
            text-decoration:none;
            color:#292B2C;
        }
        a:focus {
            text-decoration:none;
            color:#292B2C;
        }
        
        #weatherinput {
            border: 1px solid grey;
        }
    </style>
    
</head>

<body>
        <div class="container">
        <form method="post">
                <p class="display-4 text-center"><a href="https://mfisher.net/weather-forecast-with-api.php">What's The Weather?</a></p> 
            
                <p class="h2 text-center">Enter the name of a location.</p>
            
                <div class="row">
                    <div class="col">
                      
                    </div>
                    <div class="form-group col-8">
                        <input type="text" class="form-control" name="weatherinput" id="weatherinput" placeholder="E.g. London, France">
                    </div>
                    <div class="col">
                      
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-5">

                    </div>
                    <div class="col">
                      <button type="submit" class="btn btn-primary" id="weatherbtn">Submit</button>
                    </div>
                    <div class="col-5">
                     
                    </div>
                </div>
                <br>
                <? echo $toBePutIn ?>
        </form>
        </div>
</body>
</html>