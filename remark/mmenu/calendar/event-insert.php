
<?php

//insert.php
include '../config.php';

if(isset($_POST["title"]))
{   
 
    $t=$_POST['title'];
    $sd=$_POST['start'];
    $ed=$_POST['end'];

    
 $query = "INSERT INTO events (title, start_event, end_event) VALUES ('$t','$sd','$ed')";
 
 if ($con->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $con->error;
}
}


?>

