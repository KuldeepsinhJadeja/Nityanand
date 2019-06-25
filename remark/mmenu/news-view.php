<?php
include_once 'config.php';
include_once 'header1.html';
?>
<link rel="stylesheet" href="assets/examples/css/advanced/masonry.min599c.css?v4.0.2">
<?php
include_once 'header2.html';
include_once 'navigation-bar-admin.html';
?>
<div class="page">
<div class="page-content">
    <div class="row">
    <ul class="blocks blocks-100 blocks-xxl-4 blocks-lg-3 blocks-md-2" data-plugin="masonry">
<?php
    $query = "select * from news";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
              $id = $row['news_id'];
              $title = $row['news_title'];
              $category = $row['news_category'];
              $date = $row['news_date'];
              $location = $row['news_location'];
              $content = $row['news_content'];
              $image = $row['news_img_path'];
?>
       
        <li class="masonry-item">
          <div class="card card-shadow">
            <div class="card-header cover">
              <img class="cover-image" src="<?php echo $image?>" alt="Problem Loading">
            </div>
            <div class="card-block">
                <div class="float-right">
                <form action="news-delete.php" method="POST" id="form1">
                  <input type="hidden" name="id" value="<?php echo $id?>">
                  <input type="hidden" name="path" value="<?php echo $image?>">
                </form>
                <button type="submit" form="form1" style="background:white;border:0px;cursor:pointer;"><i class="icon wb-trash" style="font-size:22px;"></i></button>
                </div>
              <h3 class="card-title"><?php echo $title; ?></h3>
              <p class="card-text"><?php echo $content."...";?></p>
            </div>
            <div class="card-block">
              <div class="card-actions float-right">
                <span><?php echo $date."&nbsp;&nbsp;|&nbsp;&nbsp;".$location?></span>
              </div>
              <form action="news-view-content.php" method="POST" id="form">
                  <input type="hidden" name="id" value="<?php echo $id?>">
                  <input type="hidden" name="title" value="<?php echo $title?>">
                  <input type="hidden" name="date" value="<?php echo $date?>">
                  <input type="hidden" name="location" value="<?php echo $location?>">
                  <input type="hidden" name="image" value="<?php echo $image?>">
                  <input type="hidden" name="category" value="<?php echo $category?>">
              </form>
              <button type="submit" form="form" class="btn btn-outline btn-primary card-link">Read more</button>
            </div>
          </div>
        </li>
      <?php
    }
  } else {
      echo "0 results";
  }

?>
    </ul>
    </div>
</div>
</div>

<?php
		include_once 'footer.html';
?>