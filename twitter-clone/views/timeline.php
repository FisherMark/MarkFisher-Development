<div class="mainContent scroller">



        <? 


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
            
                    echo "<p style='margin-bottom:0'>".$usernames[$i];
                    echo "<span class='timeText'>".$timeMessage."</span></p>";
                    
                    echo "<form method='post'>";
                        echo "<input type='submit' class='smallButton' name='unfollow' value='Unfollow'>";
                        echo "<input style='display:none' name='unfollowAcc' value='".$usernames[$i]."'>";
                    echo "</form>";
                echo "</div>";

                echo "<div class='tweetingInputs'>";
                    echo $tweets[$i];
                echo "</div>";
            echo "</div>";



        }

        
        ?>

    </div>




    <div class="tweeter">



        <div class="tweetingBox" method="post">

            <div class="usernameBox">
                <? echo $_SESSION['email'] ?>
            </div>

            <form method="post">
                <textarea type="text" class="tweetingInput" id="tweetingInput" name="tweetingInput" autofocus="autofocus" placeholder="What's happening?"></textarea>
                <input type="submit" class="tweetingButton" name="tweetingButton">
            </form>

        </div>


    </div>