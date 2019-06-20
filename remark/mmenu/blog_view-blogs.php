<?php
    include_once 'config.php';
    include_once 'header.php';
    include_once 'navigation-bar-admin.html';
?>
<div class="page">
<div class="page-content">

<div class="card-columns">
<?php
    $query = "select * from blog";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
              $title = $row['blog_title'];
              $category = $row['blog_category'];
              $desc = $row['blog_desc'];
              $image1_path = $row['image1_path'];
              $image2_path = $row['image2_path'];
              $content = $row['content'];
?>
    <div class="card">
        <img class="card-img-top w-full" src="<?php echo $image1_path?>" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title"><?php echo $title?></h4>
          <p class="card-text"><?php echo $desc?></p>
          <p class="card-text">
            <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
          </p>
        </div>
      </div>
      <!-- <br>
        <hr> -->
      <?php
    }
  } else {
      echo "0 results";
  }

?>

      <!-- <div class="card">
        <img class="card-img-top w-full" src="../global/photos/focus-5-480x320.jpg" alt="Card image cap">
        <div class="card-block">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">This card has supporting text below as a natural lead-in to additional
            content.</p>
          <p class="card-text">
            <small class="text-muted">Last updated 3 mins ago</small>
          </p>
        </div> -->
    </div>
</div>
</div>
<?php
		include_once 'footer.html';
?>