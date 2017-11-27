<div class="mainContent scroller">



        <? 
        $accountsInResultsNotFollowing=[0,0];
        for ($j=sizeof($usernamesOfSearch)-1; $j >= 0; $j--) {
            if (strpos($followers[$j],$_SESSION['email']) > 1) {

            } else {
                $accountsInResultsNotFollowing[$j]=1;
            
            }
        }
        
    
    
        if ($errorMessage!="") {
            echo $errorMessage;
        } else {
            echo "<h2>Showing results for '".$_GET['search']."'.</h2>";
        }
    
        for ($i=sizeof($tweets)-1; $i >= 0; $i--) {

            echo "<div class='tweetContainer'>";
                echo "<div class='usernameBoxes'>";
                    
                    $timeGap = $currentTime - $times[$i];
                    if ($timeGap > 60*60*24*7*4*12) {
                        $timeMessage = floor($timeGap/(60*60*24*7*4*12)) . " years"; 
                    } elseif ($timeGap > 60*60*24*7*4) {
                        $timeMessage = floor($timeGap/(60*60*24*7*4)) . " months";
                    } elseif ($timeGap > 60*60*24*7) {
                        $timeMessage = floor($timeGap/(60*60*24*7)) . " weeks";
                    } elseif ($timeGap > 60*60*24) {
                        $timeMessage = floor($timeGap/(60*60*24)) . " days";
                    } elseif ($timeGap > 60*60) {
                        $timeMessage = floor($timeGap/(60*60)) . " hours";
                    } elseif ($timeGap > 60) {
                        $timeMessage = floor($timeGap/60) . " minutes";
                    } else {
                        $timeMessage = $timeGap . " seconds";
                    }
            
                    echo "<p style='margin-bottom:0'>".$usernamesOfSearch[$i];
                    echo "<span class='timeText'>".$timeMessage."</span></p>";
                    
                    if($accountsInResultsNotFollowing[$i]==1) {
                        echo "<form method='post'>";
                            echo "<input type='submit' class='smallButton' name='follow' value='Follow'>";
                            echo "<input style='display:none' name='followAcc' value='".$usernamesOfSearch[$i]."'>";
                        echo "</form>"; 
                    } else {
                        echo "<form method='post'>";
                            echo "<input type='submit' class='smallButton' name='unfollow' value='Unfollow'>";
                            echo "<input style='display:none' name='unfollowAcc' value='".$usernames[$i]."'>";
                        echo "</form>";
                    }
                echo "</div>";

                echo "<div class='tweetingInputs'>";
                    echo $tweets[$i];
                echo "</div>";
            echo "</div>";



        }

        
        ?>

    </div>