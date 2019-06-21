<?php
include_once 'config.php';
include_once 'header.php';
include_once 'navigation-bar-admin.html';
?>
 <div class="page">
        <div class="page-content">
<?php
            $blog_id = $_REQUEST["blog_id"];
            $query = "select * from  blog where blog_id = '".$blog_id."';";
            $result = $con->query($query);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $title = $row['blog_title'];
                $category = $row['blog_category'];
                $desc = $row['blog_desc'];
                $image1_path = $row['image1_path'];
                $image2_path = $row['image2_path'];
                $image_t = $row['title_image_path'];
                $content = $row['content'];
                $content2=array();
              $content2 = str_split($content,strlen($content)/3);
?>
   
        <div class="col-lg-12 col-sm-12 masonry-item">
          <!-- Widget with Overlay-shade -->
          <div class="card card-shadow">
            <div class="card-header cover overlay p-0">
              <img class="cover-image overlay-figure" src="<?php echo $image_t?>" alt="...">
              <div class="overlay-shade overlay-panel"></div>
            </div>
            <div class="card-block">
              <h3 class="card-title"><?php echo $title?></h3>
              <p class="card-text">
                <small><?php echo $category?></small>
              </p>
              <hr>
              <h4 class="card-title"><?php echo $desc?></h4>
              <hr>
                <p class="card-text"><?php echo $content2[0]?> </p>
                
                <div class="text-center">
                <img class="img-fluid" style="max-width:70%;height:auto;" src="<?php echo $image1_path?>">
                </div>
                <p class="card-text"><?php echo $content2[1]?></p>

                <div class="text-center">
                <img class="img-fluid" style="max-width:70%;height:auto;" src="<?php echo $image2_path?>">
                </div>
                <p class="card-text"><?php echo $content2[2]?></p>
            </div>
            <!-- <div class="card-block clearfix">
              <a class="btn btn-default btn-outline card-link" href="javascript:void(0)"><i class="icon wb-chevron-right-mini font-size-16"></i>Read More</a>
              <div class="card-actions float-right">
                <a href="javascript:void(0)">
                <i class="icon wb-share"></i>
              </a>
                <a href="javascript:void(0)">
                <i class="icon wb-heart"></i>
                <span>63</span>
              </a>
                <a href="javascript:void(0)">
                <i class="icon wb-chat"></i>
                <span>26</span>
              </a>
              </div> -->
            </div>
          </div>
          <!-- End Widget with Overlay-background -->
          <div class="float-left">
        </div>
        <a href="blog_view-blogs.php">
        <button type="button" class="btn btn-primary ladda-button" data-style="slide-left" data-plugin="ladda">
          <span class="ladda-label"><i class="icon wb-arrow-left mr-10" aria-hidden="true"></i>View
            Blogs</span>
        <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
        </a>
      </div>
        </div>
</div>
<?php
            }
         }

?>
<?php
     include_once 'footer.html';
?>