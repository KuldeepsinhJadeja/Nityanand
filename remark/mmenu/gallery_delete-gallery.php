<?php
        include_once 'config.php';
        $gallery_id = $_REQUEST['gallery_id'];
        $query = "select * from gallery_photos where gallery_id = '".$gallery_id."';";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                    $img_path[$row["image_id"]] = $row["image_path"];
            }
        } else {
            echo "0 results";
        }
        foreach($img_path as $key => $value)
        {
                $dir = dirname($value);
                if(unlink($value))
                {
                        echo 'removed';
                }
                else
                {
                            echo 'no';
                }
        }
        if (is_dir($dir))
        {
            if ($handle = opendir($dir))
            {
                while(($file = readdir($handle)) !== FALSE)
                {
                        $results_array[] = $file;
                }
                closedir($handle);
            }
            if(count($results_array)<=2)
            {    
                rmdir($dir);
            }
        }
        $d_query = "delete from gallery_photos where gallery_id= '".$gallery_id."';";
        $con->query($d_query);
        
        $d_query2 = "delete from gallery2 where gallery_id= '".$gallery_id."';";
        $con->query($d_query2);

        $con->close();
        header('Location: gallery_view-galleries.php');
?>