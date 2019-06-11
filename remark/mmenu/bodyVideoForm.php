  <!-- Page -->
  <div class="page">
      <div class="page-header">
        <h1 class="page-title">
            Add Video Form
        </h1>
        </div>  
        <div class="page-content">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-body container-fluid">    
                    <form action="addVideo.php" method="post" enctype="multipart/form-data">
                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">Video Title</h4>
                        <input type="text" class="form-control" placeholder="Video Title" name="title"/>
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
                        <textarea class="form-control" placeholder="Video Description" name="desc"></textarea>
                        <br>
                        <br>
                        </div>
                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">Upload Video</h4>
                        <img id="thumbnail" name="thumbnail"/>
                        <input type="hidden" name="mytext" id="mytext"/>
                        <br><br>
                        <input type="file" name="file" id="upload"/>
                        <br>
                        <br>
                        </div>
                        <div class="col-md-6 col-lg-7">   
                        <br>                 
                        <input type="submit" value="Add Video" class="btn btn-block btn-primary">
                        <br>
                        <br>
                        </div>
                        <script>
                        var input = document.getElementById('upload');
                        var img = document.getElementById('thumbnail');

                        input.addEventListener('change', function(event){
                            var file = this.files[0];
                            alert(file);
                            var url = URL.createObjectURL(file);

                            var video = document.createElement('video');
                            video.src = url;

                            var snapshot = function(){
                                var canvas = document.createElement('canvas');
                                var ctx = canvas.getContext('2d');

                                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                                img.src = canvas.toDataURL('image/png');
                                document.getElementById("mytext").value = img.src;
                                video.removeEventListener('canplay', snapshot);
                            };

                            video.addEventListener('canplay', snapshot);
                        });
                        </script>
              </form>
                </div>
            </div>
        </div>
        </div>
  </div>
  <!-- End Page -->
