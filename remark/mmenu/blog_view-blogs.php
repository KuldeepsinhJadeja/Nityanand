<?php
    include_once 'config.php';
    include_once 'header.php';
    include_once 'navigation-bar-admin.html';
?>
<div class="page">
<div class="page-content">
<div class="row">
<?php
    $query = "select * from blog";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
              $blog_id = $row['blog_id'];
              $title = $row['blog_title'];
              $category = $row['blog_category'];
              $desc = $row['blog_desc'];
              $image1_path = $row['image1_path'];
              $image2_path = $row['image2_path'];
              $image_t = $row['title_image_path'];
              $content = $row['content'];
?>
            <div class="col-lg-6 col-sm-12 masonry-item">
          <!-- Widget With Carousel -->
          <div class="card card-shadow">
            <div class="card-img-top cover">
              <div class="cover-gallery carousel slide" id="exampleCoverGallery" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li class="active" data-target="#exampleCoverGallery" data-slide-to="0"></li>
                  <?php if($image1_path != '' && $image1_path != null)
                        {
                  ?>
                  <li data-target="#exampleCoverGallery" data-slide-to="1" class=""></li>
                  <?php
                        }?>
                 <?php if($image2_path != '' && $image2_path != null)
                        {
                  ?>       
                  <li data-target="#exampleCoverGallery" data-slide-to="2" class=""></li>
                  <?php
                        }?>
                </ol>

                <div class="carousel-inner" role="listbox">
                  
                  <div class="carousel-item active">
                    <img alt="First slide" src="<?php echo $image_t?>">
                  </div>
                  <?php if($image1_path != '' && $image1_path != null)
                        {
                  ?>
                  <div class="carousel-item">
                    <img alt="Second  slide" src="<?php echo $image1_path?>">
                  </div>
                    <?php
                        }?>

                 <?php if($image2_path != '' && $image2_path != null)
                        {
                  ?>
                  <div class="carousel-item">
                    <img alt="Third  slide" src="<?php echo $image2_path?>">
                  </div>
                    <?php
                        }?>
                </div>
                <!-- Controls -->
                <a class="carousel-control-prev" href="#exampleCoverGallery" data-slide="prev" role="button">
                  <span class="carousel-control-prev-icon wb-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#exampleCoverGallery" data-slide="next" role="button">
                  <span class="carousel-control-next-icon wb-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            <div class="card-block">
              <h2 class="card-title"><?php echo $title?></h2>
              <p class="card-text">
                <small><?php echo $category?></small>
              </p>
              <p class="card-text"><?php echo $desc?></p>
            </div>
            <div class="card-block clearfix">
            <form action="blog_view-blog-content.php" id="view(<?php echo $blog_id?>)" method="post" style="display: none;">
            <input type="hidden" name="action" value="view(<?php echo $blog_id?>)">        
            <input type="hidden" name="blog_id" value=<?php echo $blog_id?>>        
            </form>
            <form action="blog_delete-blog.php" id="delete(<?php echo $blog_id?>)" method="post" style="display: none;">
            <input type="hidden" name="action" value="delete(<?php echo $blog_id?>)">        
            <input type="hidden" name="blog_id" value=<?php echo $blog_id?>>        
            </form>

              <a class="btn btn-default btn-outline card-link" href="javascript:;" onclick="javascript:document.getElementById('view(<?php echo $blog_id?>)').submit()"">READ MORE</a>
              <div class="card-actions float-right">
              <a href="javascript:;" onclick="javascript:document.getElementById('delete(<?php echo $blog_id?>)').submit()">
                <i class="icon fa-trash" style="font-size: 28px;"></i>
              </div>
            </div>
          </div>
          <!-- End Widget With Carousel -->
        </div>
      <?php
    }
  } else {
      echo "0 results";
  }

?>
</div>

<div class="text-right">
<button type="button" class="btn btn-floating btn-danger">
  <a href="blog_add-blog-form.php"style="color: #ffffff;">
  <i class="icon wb-plus" aria-hidden="true"></i></a>
</button>
</div>

</div>
</div>
<!-- <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> -->
  <script src="../global/vendor/jquery/jquery.min599c.js?v4.0.2"></script>
  <script src="../global/vendor/plyr/plyr599c.js?v4.0.2"></script>
  <script src="../global/vendor/matchheight/jquery.matchHeight-min599c.js?v4.0.2"></script>
  <script src="../global/vendor/imagesloaded/imagesloaded.pkgd.min599c.js?v4.0.2"></script>
  <script src="../global/vendor/masonry/masonry.pkgd.min599c.js?v4.0.2"></script>

<?php
		include_once 'footer.html';
?>