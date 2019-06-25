<?php
    include_once 'config.php';
    $title = $_POST['title'];
    $desc = $_POST["desc"];
    $path = "uploads/videos/";
    $target_file = $path . $title . "/" . basename($_FILES["fileUpload"]["name"]);
    $category = $_POST["category"];
    $desc = $_POST["desc"];
    $file = $_FILES["fileUpload"];

    // $thumbnail = $_POST['mytext'];
    // $thumbnail = str_replace('data:image/png;base64,', '', $thumbnail);
    // $thumbnail = str_replace(' ', '+', $thumbnail);
    // $data = base64_decode($thumbnail);
    // $path1 = $path . $title . "/" . substr(basename($_FILES["file"]["name"]),0,-3)."png";

    if (!file_exists($path.$title)) {
        mkdir($path.$title);
    }
    
    // $success = file_put_contents($path1, $data);    
    echo $target_file;
    move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
    $stmt = mysqli_stmt_init($con);
    if(mysqli_stmt_prepare($stmt, 'insert into video (video_title,video_category,video_desc,video_path) values (?,?,?,?)')){
        mysqli_stmt_bind_param($stmt, "ssss", $title, $category, $desc, basename($_FILES["fileUpload"]["name"]));
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($con);
    }

    // header('Location: viewVideo.php');
?>
