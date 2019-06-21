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
            Add Blog
        </h1>
        </div>  
        <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-body container-fluid">    
                    <form action="blog_addBlog.php" method="post" enctype="multipart/form-data">
                        
                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">Blog Title</h4>
                        <input type="text" class="form-control" placeholder="Blog Title" name="title" required/>
                        </div>
                        <br>
                        <br>

                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">Blog Category</h4>
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
                        <h4 class="example-title">Upload Blog Title image</h4>
                        <input type="file" name="filet" required accept=".jpeg,.jpg,.png,.gif" onchange="return fileValidation()" id="uploadt" required/>
                        <br>
                        <br>
                        </div>

                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">Blog Description</h4>
                        <textarea class="form-control" placeholder="Blog Description" name="desc" id="desc" required></textarea>
                        <br>
                        <br>
                        </div>

                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">Upload Blog Body image 1 </h4>
                        <input type="file" name="file1" accept=".jpeg,.jpg,.png,.gif" onchange="return fileValidation()" id="upload1"/>
                        <br>
                        <br>
                        </div>
                        
                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">Blog Content</h4>
                        <textarea class="form-control" placeholder="Blog Content" name="content" id="content" rows='10' required></textarea>
                        <br>
                        <br>
                        </div>
                        
                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">Upload Blog Body image 2 </h4>
                        <input type="file" name="file2" accept=".jpeg,.jpg,.png,.gif" onchange="return fileValidation()" id="upload2"/>
                        <br>
                        <br>
                        </div>

                        <div class="col-md-6 col-lg-7">   
                        <br>                 
                        <input type="submit" value="Add Blog" class="btn btn-block btn-primary">
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