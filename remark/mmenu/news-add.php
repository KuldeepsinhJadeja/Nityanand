<?php
if(isset($_REQUEST['submit'])){
    include_once 'config.php';

    $path = "uploads/news";

    $title = $_REQUEST['title'];
    $category = $_REQUEST['category'];
    $date = $_REQUEST['date'];
    $loc = $_REQUEST['loc'];
    $content = $_REQUEST['content'];
    $filet = basename($_FILES['filet']['name']);

    $target_filet = $path.'/'.$title.'/'.$filet;
    if(!file_exists($path.'/'.$title))
    {
        mkdir($path.'/'.$title);
    }
    $file = fopen(substr($target_filet,0,-3)."txt", "w");
    fwrite($file, $content);
    fclose($file);
    move_uploaded_file($_FILES['filet']['tmp_name'],$target_filet);
    $query = "insert into news (news_title,news_category,news_date,news_location,news_content,news_img_path) 
    values ('".$title."','".$category."','".$date."','".$loc."','".substr($content,0,200)."','".$target_filet."')";
    $con->query($query);
    $con->close();
    header('Location: news-view.php');
}
?>
<?php
include_once 'header.php';
include_once 'navigation-bar-admin.html';
?>
<script>    
function fileValidation(){
    // alert('hello');
    var fileInput = document.getElementById('upload');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    // alert(filePath);
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script>
<!-- Page -->
  <div class="page">
      <div class="page-header">
        <h1 class="page-title">
            Add News
        </h1>
        </div>  
        <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-body container-fluid">    
                    <form action="#" method="post" enctype="multipart/form-data">
                        
                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">News Title</h4>
                        <input type="text" class="form-control" placeholder="News Title" name="title" required/>
                        </div>
                        <br>
                        <br>

                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">News Category</h4>
                        <select class="form-control" name="category">
                            <option>Announcements</option>
                            <option>Legal News</option>
                            <option>Media Announcements</option>
                            <option>Official Press Releases</option>
                            <option>Support to Nithyananda</option>
                            <option>Web Updates</option>
                        </select>
                        <br>
                        <br>
                        </div>
                        
                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">News Date</h4>
                        <input type="date" class="form-control" placeholder="News Location" name="date" />
                        <br>
                        <br>
                        </div>

                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">News location</h4>
                        <input type="text" class="form-control" placeholder="News Location" name="loc" />
                        <br>
                        <br>
                        </div>

                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">Upload News Image</h4>
                        <input type="file" name="filet" required accept=".jpeg,.jpg,.png,.gif" onchange="return fileValidation()" id="uploadt" required/>
                        <br>
                        <br>
                        </div>                       
                        
                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">News Content</h4>
                        <textarea class="form-control" placeholder="News Content" name="content" id="content" rows='10' required></textarea>
                        <br>
                        <br>
                        </div>
                       
                        <div class="col-md-6 col-lg-7">   
                        <br>                 
                        <input type="submit" name="submit" value="Add News" class="btn btn-block btn-primary">
                        <br>
                        <br>
                        </div>
              </form>
                </div>
            </div>
        </div>
        </div>
  </div>
  <!-- End Page -->
<?php
include_once 'footer.html';
?>

