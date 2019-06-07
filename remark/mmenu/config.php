<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'nityanand');
 
/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
//Check connection
if($con === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
    echo "Database connected successfully";
}

//$servername = "localhost";
//$username = "username";
//$password = "password";
//$dbname = "nityanand";

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//} 
//else{
 //   echo "Database connected successfully";
//}
?>