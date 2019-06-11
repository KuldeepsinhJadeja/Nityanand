<html>
<head>
<script>    
function fileValidation(){
    // alert('hello');
    var fileInput = document.getElementById('upload');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.mkv|\.mp4)$/i;
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
</head>
<body>
<!-- Page -->
  <div class="page">
      <div class="page-header">
        <h1 class="page-title">
            Add Video
        </h1>
        </div>  
        <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-body container-fluid">    
                    <form action="addVideo.php" method="post" enctype="multipart/form-data">
                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">Video Title</h4>
                        <input type="text" class="form-control" placeholder="Video Title" name="title" required/>
                        </div>
                        <br>
                        <br>
                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">Video Category</h4>
                        <select class="form-control" name="category">
                            <option>Motivation</option>
                            <option>Spiritual</option>
                            <option>Yoga</option>
                            <option>Peace</option>
                            <option>Health</option>
                        </select>
                        <br>
                        <br>
                        </div>
                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">Video Description</h4>
                        <textarea class="form-control" placeholder="Video Description" name="desc" required></textarea>
                        <br>
                        <br>
                        </div>
                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">Upload Video</h4>
                        <input type="file" name="file" required accept=".mp4,.mkv" onchange="return fileValidation()" id="upload"/>
                        <br>
                        <br>
                        </div>
                        <div class="col-md-6 col-lg-7">   
                        <br>                 
                        <input type="submit" value="Add Video" class="btn btn-block btn-primary">
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
</body>
.....................
</html>