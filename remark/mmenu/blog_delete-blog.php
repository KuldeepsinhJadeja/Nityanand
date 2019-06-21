<?php
        include_once 'config.php';
        $blog_id = $_REQUEST['blog_id'];
        $query = "select * from blog where blog_id = '".$blog_id."';";
        $result = $con->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                    $image_t = $row['title_image_path'];
                    $image1 = $row['image1_path'];
                    $image2 = $row['image2_path'];
            }
        } else {
            echo "0 results";
        }
        $dir = dirname($image_t);
        unlink($image_t);
        unlink($image1);
        unlink($image2);
        if (is_dir($dir))
        {
        //     if ($handle = opendir($dir))
        //     {
        //         while(($file = readdir($handle)) !== FALSE)
        //         {
        //                 $results_array[] = $file;
        //         }
        //         closedir($handle);
        //     }
        //     if(count($results_array)<=2)
        //     {    
                rmdir($dir);
        //     }
        }
        $d_query = "delete from blog where blog_id= '".$blog_id."';";
        $con->query($d_query);
        $con->close();
        header('Location: blog_view-blogs.php');
?>