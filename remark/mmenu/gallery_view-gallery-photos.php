<?php
        include_once 'config.php';
        include_once 'header.php';
      //  include_once 'navigation-bar-admin.html';
?>         
<?php 
        include_once 'navigation-bar-admin.html';
        // $error_msg = $_REQUEST['error_msg'];
        // $path = $_REQUEST["path"];
        // $date= $_REQUEST["date"];
        $gallery_id = $_REQUEST["gallery_id"];
        $img_path = array();
        $query = "select * from gallery_photos where gallery_id ='".$gallery_id. "';";
        // echo $query;
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                    $img_path[$row["image_id"]] = $row["image_path"];
            }
        } else {
            echo "0 results";
        }
        $namex=array();
        // $files_array = $_POST['result'];
?> 
     <div class="page">
     <div class="page-content">
       <?php 
            // if($error_msg=="Ok")
            // {
       ?>
      <ul class="blocks blocks-100 blocks-xxl-4 blocks-lg-3 blocks-md-2" data-plugin="filterable"
        data-filters="#exampleFilter">
        <?php
            // for($i=2;$i<count($files_array);$i++)
            foreach($img_path as $key => $value)
            {
                $namex = explode('/',$value);// echo $files_array[$i];
                $name = end($namex);  
        ?>
        <li style="position: relative; left: 0px; top: 0px;">
          <div class="card card-shadow">
            <figure class="card-img-top overlay-hover overlay">
              <img class="overlay-figure overlay-scale" src="<?php echo $value;//$path.'/'.$files_array[$i]?>" alt="..." height="300px">
              <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                <a class="icon wb-search" href="<?php echo $value;//$path.'/'.$files_array[$i]?>"></a>
              </figcaption>
            </figure>
            
            <form action="gallery_delete-gallery-photo.php" id="delete(<?php echo $key?>)" method="post" style="display: none;">
                  <input type="hidden" name="action" value="delete(<?php echo $key?>)">        
                  <input type="hidden" name="image_id" value=<?php echo $key?>>        
            </form>
            <div class="card-block">
              <h4 class="card-title"><?php echo $name?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="javascript:;" onclick="javascript:document.getElementById('delete(<?php echo $key?>)').submit()">
                <i class="icon fa-trash">Delete Photo</i>
                </a>
              </h4>
            </div>
            <!-- <div class="card-block">
                <h4 class="card-title"><?php //echo $row['date']?></h4>
            </div> -->
          </div>
        </li>
        <?php
            }
        ?>
      </ul>
      <?php
            // }
            // else
            // {
            //   echo '<h1 class="page-title">$error_msg</h1>';
            // }
        ?>
    <div class="float-left">
      <a href="gallery_view-galleries.php">
        <button type="button" class="btn btn-primary ladda-button" data-style="slide-left" data-plugin="ladda">
          <span class="ladda-label"><i class="icon wb-arrow-left mr-10" aria-hidden="true"></i>View
            Galleries</span>
        <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
        </a>
      </div>
      <hr>
    </div>
</div>
                <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
                <script src="../global/vendor/jquery/jquery.min599c.js?v4.0.2"></script>
                <script src="../global/vendor/magnific-popup/jquery.magnific-popup.min599c.js?v4.0.2"></script>
                <script src="../global/vendor/isotope/isotope.pkgd.min599c.js?v4.0.2"></script>
                
                <script src="../global/vendor/ladda/spin.min599c.js?v4.0.2"></script>
                <script src="../global/vendor/ladda/ladda.min599c.js?v4.0.2"></script>
                
                <script src="../global/vendor/mousewheel/jquery.mousewheel599c.js?v4.0.2"></script>
                <script src="../global/vendor/popper-js/umd/popper.min599c.js?v4.0.2"></script>
                <script src="../global/vendor/bootstrap/bootstrap.min599c.js?v4.0.2"></script>
                <script src="../global/vendor/animsition/animsition.min599c.js?v4.0.2"></script>   

                <script src="assets/examples/js/pages/gallery.min599c.js?v4.0.2"></script>
<?php 
    include_once 'footer.html';
    // include_once 'footer.html';
?>