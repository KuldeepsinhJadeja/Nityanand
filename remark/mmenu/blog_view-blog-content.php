<?php
include_once 'config.php';
include_once 'header.php';
include_once 'navigation-bar-admin.html';
?>
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
?>
    <div class="page">
        <div class="page-content">
        <div class="col-lg-12 col-sm-12 masonry-item" style="position: absolute; left: 0px; top: 3075px;">
          <!-- Widget with Overlay-shade -->
          <div class="card card-shadow">
            <div class="card-header cover overlay p-0">
              <img class="cover-image overlay-figure" src="../../global/photos/view-5-960x640.jpg" alt="...">
              <div class="overlay-shade overlay-panel"></div>
            </div>
            <div class="card-block">
              <h3 class="card-title">Dolemus vero fames</h3>
              <p class="card-text">
                <small>Jun 15, 2017</small>
              </p>
              <p class="card-text">Personae romano, deditum, diu veniam totam aequo, voluptaria maluisset
                cotidie gravis quando liberiusque placatae, ars dicitis potius,
                ordiamur aegritudo conquisitis sicine omnibus specie habendus iuvaret
                contemnere brute, concedo potuimus tractatas inquam effici. Praeclara
                responsum provocatus m domo desiderat. Quid natum. </p>
            </div>
            <div class="card-block clearfix">
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
              </div>
            </div>
          </div>
          <!-- End Widget with Overlay-background -->
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