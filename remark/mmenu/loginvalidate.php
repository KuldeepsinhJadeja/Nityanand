<html>
    <head>
    </head>
    <body>
    
<?php
    include_once 'config.php';
// define variables and set to empty values
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = test_input($_POST["username"]);
  $password = test_input($_POST["password"]);

  $query = 'select * from admin_login';
  $result = mysqli_query($con, $query)

  //mysqli_num_rows($result);   
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if($username == $row["username"] && $password == $row["password"])
        {
            echo "yes you are admin";
        }
        else{
            echo "you are not admin.who are you?";
        }
    }


mysqli_close($con);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
    </body>
</html>