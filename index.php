<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="0" />
  <meta http-equiv="pragma" content="no-cache" />
  <title>Mark Fisher Portfolio</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <style>


  html
  {
    font-size: 62.5%;
  }

  body
  {
    margin: 0;
    padding: 0;
    font-size: 1.6rem;
    color: #353535;
    background: linear-gradient(to bottom, #ccc, #fff 30%);
    background-repeat: no-repeat;
  }

  h1,h3
  {
    font-family: 'Helvetica', sans-serif;
    text-align: center;
    margin: 0;
    padding: 0;
    
  }


  h1
  {
    margin: 20rem 0 1rem;
    font-size: 4rem;
  }

  h3
  {
    font-weight: normal;
    font-size: 2rem;
  }
      
      #links {
          margin-top:15%;
      }
      
      .link {
          height:150px;
          background-color:green;
          text-align:center;
          font-size:200%;
          padding-top:1em;
          border:2px solid grey;
          
          
      }
      
      .boxes {
          display:block;
          height:150px;
          background-color:#d8d8d8;
          font-size:200%;
          padding-top:1em;
          border:2px solid grey;
          text-align:center;
          color:black;
          margin-bottom:30px;
      }
      
      a {
          color:#353535;
          text-decoration:none;
      }
      a:hover {
          color:#353535;
          text-decoration:none;
      }
      a:active {
          color:#353535;
          text-decoration:none;
      }
      a:focus {
          color:#353535;
          text-decoration:none;
      }
      
      #weather {
          background: url("weather-forecast/sunset.jpeg") ;
          background-size: 100% 100%;
      }
      
      #diary {
          background: url("online-diary/scenery-new.jpg");
          background-size: 100% 100%;
      }
      
      #twitter {
          background: url("twitter-clone/twitter-background.png");
          background-size: 100% 100%;
      }
      figure {
          width:40%;
      }
      
      
  </style>
</head>
<body>
  <h1><a href="">Mark Fisher Portfolio page</a></h1>
  <h3>Website development showcase</h3>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    
    
    <div class="container">
    
        <div class="row" id="links">
            <figure class="col-3">
                <a href="weather-forecast-with-api.php" class="boxes" id="weather">
                </a>
                <h3>Weather Forecast</h3>
            </figure>
            
            
            <div class="col">
                
            </div>
            
            <figure class="col-3">
                <a href="online-diary/login.php" class="boxes" id="diary">
                    
                </a>
                <h3>Online Diary</h3>
            </figure>
                
            <div class="col">
                
            </div>
            
            <figure class="col-3">
                <a href="twitter-clone/login.php" class="boxes" id="twitter">
                </a>
                <h3>Twitter Clone</h3>
            </figure>
        </div>
    
    </div>
</body>
</html>
