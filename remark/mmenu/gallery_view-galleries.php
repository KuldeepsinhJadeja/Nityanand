<!-- <link rel="stylesheet" href="../../global/vendor/magnific-popup/magnific-popup.min599c.css?v4.0.2"> -->

<?php
    include_once 'config.php';
    include_once 'header.php';?>
    <link rel="stylesheet" href="../global/vendor/magnific-popup/magnific-popup.min599c.css?v4.0.2">
    <?php
    include_once 'navigation-bar-admin.html';
    // include_once 'footer.html';
    // $query = 'select gallery2.gallery_id,date,gallery_desc,image_id,image_path from gallery2,gallery_photos where gallery2.gallery_id=gallery_photos.gallery_id;';
    $query = 'select * from gallery2';
    $result = mysqli_query($con,$query);
    
    if(mysqli_num_rows($result) > 0)
    {     
        // $redirect = "header('Location: gallery_view-gallery-photos.php')";
      ?>
        <div class="page">
                <div class="page-content">
                
                    <ul class="blocks blocks-50 blocks-xxl-4 blocks-lg-3 blocks-md-2" data-plugin="filterable" data-filters="#exampleFilter" style="position: relative;">

       <?php while($row = mysqli_fetch_assoc($result))
        {
                $path = $row['gallery_path'];
                $results_array = array();
                $date = $row['date'];
                $gallery_id = $row['gallery_id'];
                if (is_dir($path))
                {
                        if ($handle = opendir($path))
                        {
                                while(($file = readdir($handle)) !== FALSE)
                                {
                                        $results_array[] = $file;
                                }
                                closedir($handle);
                        }
                }
        ?>
                                  <form action="gallery_view-gallery-photos.php" id="view(<?php echo $date?>)" method="post" style="display: none;">
                                        <input type="hidden" name="action" value="view(<?php echo $date?>)" />
                                        <input type="hidden" name="gallery_id" value=<?php echo $gallery_id?>)/>
                                        <input type="hidden" name="path" value=<?php echo $path?>>
                                        <input type="hidden" name="date" value=<?php echo $date?>>
                                        <?php
                                            // foreach($results_array as $value)
                                            // {
                                            //     echo '<input type="hidden" name="result[]" value="'. $value. '">';
                                            // }
                                            ?>
                                        <!-- <input type="hidden" name="files_array[]" value=<?php //echo "'.$results_array.'"?>> -->
                                        </form>
                        <li data-type="animal" style="position: relative; left: 0px; top: 0px;">
                            <div class="card card-shadow">
                              <figure class="card-img-top overlay-hover overlay">
                                 <img class="overlay-figure overlay-scale" src="<?php echo $path.'/'.$results_array[2]?>" alt="...">
                                 <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                        <a href="javascript:;" onclick="javascript:document.getElementById('view(<?php echo $date?>)').submit()">
                                        <i class="icon wb-gallery"></i>
                                    </a>                                 
                                    </figcaption>
                             </figure>
                                <form action="gallery_delete-gallery.php" id="delete(<?php echo $gallery_id?>)" method="post" style="display: none;">
                                    <input type="hidden" name="action" value="delete(<?php echo $gallery_id?>)">        
                                    <input type="hidden" name="gallery_id" value=<?php echo $gallery_id?>>        
                                </form>
                                <div class="card-block">
                                    <h4 class="card-title"><?php echo $row['date']?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="javascript:;" onclick="javascript:document.getElementById('delete(<?php echo $gallery_id?>)').submit()">
                                        <i class="icon fa-trash">Delete Gallery</i>
                                        </a>
                                    </h4>
                                </div>

                            </div>
                        </li>

        <?php         
        }//end while
    }//end if
    else
    {
        echo "No galleries Uploaded yet";
    }
    $_REQUEST["path"] = $path;
        $_REQUEST['date'] = $date;
     $_REQUEST['files_array'] = $results_array;
     $_REQUEST['gallery_id'] = $gallery_id;
    mysqli_close($con);
    // $redirect =header('Location: gallery_view-gallery-photos.php');
?>
</ul>
</div>
 </div>
 <?php
    include_once 'footer.html';
 ?>