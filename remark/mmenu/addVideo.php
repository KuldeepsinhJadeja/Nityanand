<?php
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
