<?php
    include_once 'config.php';
    $sql = "SELECT * FROM video where video_category='Yoga' ORDER BY video_id DESC LIMIT 3";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: " . $row["video_id"]. " - Name: " . $row["video_category"]. " " . $row["video_desc"]. "<br>";
        }
    } else {
        echo "0 results";
    }

    mysqli_close($con);
?>