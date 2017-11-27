<?php

include("actions.php");

include("views/header.php");

if($_GET['search']) {
    
    include("views/search.php");
    
} else{
    
    include("views/timeline.php");
}

?>