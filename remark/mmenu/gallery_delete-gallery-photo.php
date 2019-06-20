<?php
        include_once 'config.php';
        $image_id = $_REQUEST['image_id'];
        $error_msg='';
        $gallery_id=0;
        $query = "select * from gallery_photos where image_id = '".$image_id."';";
        $result = $con->query($query);
        $img_path = array();
        $i=0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                    $img_path[$i] = $row['image_path'];
                    $gallery_id = $row['gallery_id'];
                    $i++;
            }
        } else {
            echo "0 results";
        }
        $query = "delete from gallery_photos where image_id = '".$image_id."';";
        $con->query($query);
        for($x=0;$x<count($img_path);$x++)
        {
            $dir = dirname($img_path[$x]);
            unlink($img_path[$x]);
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
                $error_msg = 'No images left in gallery'; 
                // rmdir($dir);
            }
            else
            {
                $error_msg = 'ok'; 
            }    
        }
        $con->close();
        // $_REQUEST['error_msg'] = $error_msg;
        // $_REQUEST['gallery_id'] = $gallery_id;
        header('Location:gallery_view-gallery-photos.php');
?>
<html>
<head>
<link rel="stylesheet" href="../global/vendor/ladda/ladda.min599c.css?v4.0.2">
</head>
<body>
        <div class="page">
        <div class="page-content">
        <form action="gallery_view-gallery-photos.php" id="view(<?php echo $gallery_id?>)" method="post" style="display: none;">
        <input type="hidden" name="action" value="view(<?php echo $gallery_id?>)" />
        <input type="hidden" name="gallery_id" value=<?php echo $gallery_id?>)/>
        </form>
        
        <!-- <button type="button" class="btn-block"><i class="icon wb-menu" aria-hidden="true"></i>View Photos</button> -->
        <div class="float-left">
            <!-- <a href="gallery_view-galleries.php"> -->
            <a href="javascript:;" onclick="javascript:document.getElementById('view(<?php echo $gallery_id?>)').submit()">
                <button type="button" class="btn btn-primary ladda-button" data-style="slide-left" data-plugin="ladda">
                <span class="ladda-label"><i class="icon wb-arrow-left mr-10" aria-hidden="true"></i>View
                    Photos</span>
                <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                </a>
            </div>
        </a>                      
        </div>
        <script src="../global/vendor/ladda/spin.min599c.js?v4.0.2"></script>
        <script src="../global/vendor/ladda/ladda.min599c.js?v4.0.2"></script>    
    </div>           
</body>
</html>