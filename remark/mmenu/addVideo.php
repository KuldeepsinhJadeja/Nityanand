<?php
<<<<<<< HEAD
$title = $_POST['title'];
$category = $_POST['category'];
$desc = $_POST['desc'];
$file = $_FILES['file'];
echo '$file';
echo '<br>';
echo $_FILES['file']['name'];
echo '<br>';
echo $_FILES['file']['tmp_name'];
echo '<br>';
echo $_FILES['file']['size'];
echo '<br>';
echo $_FILES['file']['type'];
 if (($_FILES['file']['name']!="")){
//     // Where the file is going to be stored
           $target_dir = "upload/";
//         $file = $_FILES['my_file']['name'];
//         $path = pathinfo($file);
//         $filename = $path['filename'];
//         $ext = $path['extension'];
//         $temp_name = $_FILES['my_file']['tmp_name'];
//         $path_filename_ext = $target_dir.$filename.".".$ext;
     
//     // Check if file already exists
//     if (file_exists($path_filename_ext)) {
//      echo "Sorry, file already exists.";
//      }else{
//      move_uploaded_file($temp_name,$path_filename_ext);
//      echo "Congratulations! File Uploaded Successfully.";
//      }
//     }
?>
=======
    include_once 'config.php';
    $title = $_POST["title"];
    $path = "uploads/videos/";
    $target_file = $path . $title . "/" . basename($_FILES["file"]["name"]);
    $category = $_POST["category"];
    $desc = $_POST["desc"];
    $file = $_FILES["file"];

    $thumbnail = $_POST['mytext'];
    $thumbnail = str_replace('data:image/png;base64,', '', $thumbnail);
    $thumbnail = str_replace(' ', '+', $thumbnail);
    $data = base64_decode($thumbnail);
    $path1 = $path . $title . "/" . substr(basename($_FILES["file"]["name"]),0,-3)."png";

    if (!file_exists($path.$title)) {
        mkdir($path.$title);
    }
    
    $success = file_put_contents($path1, $data);

    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    $stmt = mysqli_stmt_init($con);
    if(mysqli_stmt_prepare($stmt, 'insert into video (video_title,video_category,video_desc,video_path) values (?,?,?,?)')){
        mysqli_stmt_bind_param($stmt, "ssss", $title, $category, $desc, basename($_FILES["file"]["name"]));
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($con);
    }

    header('Location: viewVideo.php');
?>
>>>>>>> 5ae1bd5300e600bbbaefaa04a2a247da86a45241
