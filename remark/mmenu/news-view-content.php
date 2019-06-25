<?php
include_once 'config.php';
include_once 'header.php';
include_once 'navigation-bar-admin.html';
?>
 <div class="page">
        <div class="page-content">
<?php
            $id = $_POST['id'];
            $title = $_POST['title'];
            $image = $_POST['image'];
            $category = $_POST['category'];
            $location = $_POST['location'];
            $date = $_POST['date'];
?>
   
        <div class="col-lg-12 col-sm-12 masonry-item">
          <!-- Widget with Overlay-shade -->
          <div class="card card-shadow">
            <div class="card-header cover overlay p-0">
              <img class="cover-image overlay-figure" src="<?php echo $image?>" alt="Problem Loading">
              <div class="overlay-shade overlay-panel"></div>
            </div>
            <div class="card-block">
            <div class="float-right">
              <p class="badge badge-lg badge-primary" style="padding:10px 20px;"><?php echo $location?></p>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <p class="badge badge-lg badge-primary" style="padding:10px 20px;"><?php echo $date?></p>
            </div>
              <h1 class="card-title"><?php echo $title?></h1>
              <p class="card-text">
                <p class="badge badge-success"><?php echo $category?></p>
              </p>
              <hr>
                <?php echo nl2br(file_get_contents(substr($image,0,-3)."txt"));?>
                <br><br><br>
            </div>
            </div>
          </div>
          <!-- End Widget with Overlay-background -->
          <div class="float-left">
        </div>
        <a href="news-view.php">
        <button type="button" class="btn btn-primary ladda-button" data-style="slide-left" data-plugin="ladda">
          <span class="ladda-label"><i class="icon wb-arrow-left mr-10" aria-hidden="true"></i>View
            News</span>
        <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
        </a>
      </div>
        </div>
</div>
<?php
     include_once 'footer.html';
?>