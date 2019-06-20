<?php
    include_once 'config.php';
    // $date = $_POST["date"];
    // $date2=$date;
    // // $date = str_replace("/", "-", $date2); 
    $date = date('d-m-Y', strtotime($_POST['date']));
    echo $date;
    $desc = $_POST["desc"];
    $path = "uploads/galleries";
    $target_path = $path."/".$date;
    $allowTypes = array('jpg','png','jpeg','gif');

    // $con->query("select * from gallery");
    if (!file_exists($path."/".$date)) {
        mkdir($path."/".$date);
    }
    if(!empty(array_filter($_FILES['files']['name'])))
    {
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, 'insert into gallery2 (date,gallery_desc,gallery_path) values (?,?,?)');
        mysqli_stmt_bind_param($stmt, "sss", $date, $desc,$target_path);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);     
        $query = "select gallery_id from gallery2 where date ='".$date. "';";
        echo $query;
        $result = mysqli_query($con, $query);
                
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                    $id = $row["gallery_id"];
                    echo $id;
            }
        } else {
            echo "0 results";
        }
        $stmt2 = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt2, 'insert into gallery_photos (gallery_id,image_path) values (?,?)');

        // mysqli_stmt_close($stmt);
        foreach($_FILES['files']['name'] as $key=>$val)
        {
            // File upload path
            $fileName = basename($_FILES['files']['name'][$key]);
            $target_file = $path ."/". $date . "/" . $fileName;   //basename($_FILES["file"]["name"]);
            
            $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Upload file to server
            move_uploaded_file($_FILES["files"]["tmp_name"][$key], $target_file);
            
            mysqli_stmt_bind_param($stmt2, "is", $id , $target_file);
            mysqli_stmt_execute($stmt2);
        }
        $target_path = $path."/".$date;
        //db logic      
        mysqli_stmt_close($stmt2);
        mysqli_close($con);
    }

    header('Location: gallery_view-galleries.php');
?>
