<?php
    include_once 'header1.html';
?>
<style>
    .fake-link {
    text-decoration: underline;
    cursor: pointer;
}
</style>
<?php
    include_once 'header2.html';
    include_once 'navigation-bar-admin.html';
?>
    <div class="page">
      <div class="page-header">
        <h1 class="page-title">
            Videos
        </h1>
        </div>
        <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
            <div class="panel-body container-fluid">

            <h2>Motivational</h2><hr>
            <?php
            include_once 'config.php';
            $sql = "SELECT * FROM video where video_category = 'Motivational' ORDER BY video_id DESC LIMIT 9";
            $result = mysqli_query($con, $sql);
            ?>
            <div class="row">
            <?php
            if (mysqli_num_rows($result) > 0) {
                $i = 0;
                
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-lg-4 col-md-6">
                   <!-- Example Card Image overlays -->
                    <div class="card card-inverse">
                    <img class="card-img w-full" src="<?php echo 'uploads/videos/'.$row['video_title'].'/'.substr($row['video_path'],0,-3)."png"?>" alt="Card image">
                    <div class="card-img-overlay">
                        <h4 class="card-title"><b><?php echo $row["video_title"]?></b>
                        <div style="float:right;">
                        <span class="fake-link" id="fake-link-1"><i class="icon wb-play" style="font-size:30px;"></i></span>
                        <span class="fake-link" id="fake-link-1"><i class="icon wb-trash" style="font-size:24px;" ></i></span>
                        </div>
                        </h4>
                    </div>
                    <p style="margin-top:20px;"><?php echo $row["video_desc"]?></p>
                    </div>
                    <!-- End Example Card Image overlays -->
                    </div>

                <?php 
                $i++;
                if($i == 3){
                    ?>
                    </div>
                    <div class="row">
                    <?php
                    $i == 0;
                    echo '<br>';
                }
             }
            } else {
                echo '<p style="margin-left:20px;">No Videos</p>';
            }
            ?>
            </div>
            
            

            <h2>Spiritual</h2><hr>
            <?php
            include_once 'config.php';
            $sql = "SELECT * FROM video where video_category = 'Spiritual' ORDER BY video_id DESC LIMIT 9";
            $result = mysqli_query($con, $sql);

            ?>
            <div class="row">
            <?php
            if (mysqli_num_rows($result) > 0) {
                $i = 0;
                
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-lg-4 col-md-6">
                    <!-- Example Card Image overlays -->
                    <div class="card card-inverse">
                    <img class="card-img w-full" src="<?php echo 'uploads/videos/'.$row['video_title'].'/'.substr($row['video_path'],0,-3)."png"?>" alt="Card image">
                    <div class="card-img-overlay">
                        <h4 class="card-title"><?php echo $row["video_title"]?></h4>
                    </div>
                    <p style="margin-top:20px;"><?php echo $row["video_desc"]?></p>
                    </div>
                    <!-- End Example Card Image overlays -->
                    </div>

                <?php 
                $i++;
                if($i == 3){
                    ?>
                    </div>
                    <div class="row">
                    <?php
                    $i == 0;
                    echo '<br>';
                }
             }
            } else {
                echo '<p style="margin-left:20px;">No Videos</p>';
            }
            ?>
            </div>

            <h2>Yoga</h2><hr>
            <?php
            include_once 'config.php';
            $sql = "SELECT * FROM video where video_category = 'Yoga' ORDER BY video_id DESC LIMIT 9";
            $result = mysqli_query($con, $sql);

            ?>
            <div class="row">
            <?php
            if (mysqli_num_rows($result) > 0) {
                $i = 0;
                
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-lg-4 col-md-6">
                    <!-- Example Card Image overlays -->
                    <div class="card card-inverse">
                    <img class="card-img w-full" src="<?php echo 'uploads/videos/'.$row['video_title'].'/'.substr($row['video_path'],0,-3)."png"?>" alt="Card image">
                    <div class="card-img-overlay">
                        <h4 class="card-title"><?php echo $row["video_title"]?></h4>
                    </div>
                    <p style="margin-top:20px;"><?php echo $row["video_desc"]?></p>
                    </div>
                    <!-- End Example Card Image overlays -->
                    </div>

                <?php 
                $i++;
                if($i == 3){
                    ?>
                    </div>
                    <div class="row">
                    <?php
                    $i == 0;
                    echo '<br>';
                }
             }
            } else {
                echo '<p style="margin-left:20px;">No Videos</p>';
            }
            ?>
            </div>

            <h2>Peace</h2><hr>
            <?php
            include_once 'config.php';
            $sql = "SELECT * FROM video where video_category = 'Peace' ORDER BY video_id DESC LIMIT 9";
            $result = mysqli_query($con, $sql);

            ?>
            <div class="row">
            <?php
            if (mysqli_num_rows($result) > 0) {
                $i = 0;
                
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-lg-4 col-md-6">
                    <!-- Example Card Image overlays -->
                    <div class="card card-inverse">
                    <img class="card-img w-full" src="<?php echo 'uploads/videos/'.$row['video_title'].'/'.substr($row['video_path'],0,-3)."png"?>" alt="Card image">
                    <div class="card-img-overlay">
                        <h4 class="card-title"><?php echo $row["video_title"]?></h4>
                    </div>
                    <p style="margin-top:20px;"><?php echo $row["video_desc"]?></p>
                    </div>
                    <!-- End Example Card Image overlays -->
                    </div>

                <?php 
                $i++;
                if($i == 3){
                    ?>
                    </div>
                    <div class="row">
                    <?php
                    $i == 0;
                    echo '<br>';
                }
             }
            } else {
                echo '<p style="margin-left:20px;">No Videos</p>';
            }
            ?>
            </div>

            <h2>Health</h2><hr>
            <?php
            include_once 'config.php';
            $sql = "SELECT * FROM video where video_category = 'Health' ORDER BY video_id DESC LIMIT 9";
            $result = mysqli_query($con, $sql);

            ?>
            <div class="row">
            <?php
            if (mysqli_num_rows($result) > 0) {
                $i = 0;
                
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-lg-4 col-md-6">
                    <!-- Example Card Image overlays -->
                    <div class="card card-inverse">
                    <img class="card-img w-full" src="<?php echo 'uploads/videos/'.$row['video_title'].'/'.substr($row['video_path'],0,-3)."png"?>" alt="Card image">
                    <div class="card-img-overlay">
                        <h4 class="card-title"><?php echo $row["video_title"]?></h4>
                    </div>
                    <p style="margin-top:20px;"><?php echo $row["video_desc"]?></p>
                    </div>
                    <!-- End Example Card Image overlays -->
                    </div>

                <?php 
                $i++;
                if($i == 3){
                    ?>
                    </div>
                    <div class="row">
                    <?php
                    $i == 0;
                    echo '<br>';
                }
             }
            } else {
                echo '<p style="margin-left:20px;">No Videos</p>';
            }
            ?>
            </div>

            </div>
            </div>
        </div>
        </div>
    </div>
    <script>
        
    </script>
<?php
    include_once 'footer.html';
?>