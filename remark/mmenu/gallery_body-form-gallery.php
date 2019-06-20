
  <div class="page">
      <div class="page-header">
        <h1 class="page-title">
            Add Gallery
        </h1>
        </div>  
        <div class="page-content">
            <div class="panel">
                
                <div class="panel-heading">
                    <div class="panel-body container-fluid">    
                        <form action="gallery_addGallery.php" method="post" enctype="multipart/form-data">           
                            
                            <div class="col-md-6 col-lg-7">
                                <h4 class="example-title">Gallery Date</h4>
                                <!-- <div class="example"> -->
                                    <!-- <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="icon wb-calendar" aria-hidden="true"></i>
                                        </span>
                                        <input type="text" class="form-control" data-plugin="datepicker" name="date" placeholder="Gallery Date" required/>
                                    </div> -->
                                <!-- </div> -->
                                <input type="date" class="form-control" name="date" placeholder="Gallery Date"  value="<?php echo date('d-m-Y'); ?>" required/>
                                <br>
                                <br>
                            </div>
                        
                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">Gallery Description</h4>
                        <textarea class="form-control" placeholder="Gallery Description" name="desc" required></textarea>
                        <br>
                        <br>
                        </div>
                        <div class="col-md-6 col-lg-7">
                        <h4 class="example-title">Upload Images</h4>
                        <input type="file" name="files[]" required accept=".mp4,.mkv" id="upload" multiple/>
                        <br>
                        <br>
                        </div>
                       
                        <div class="col-md-6 col-lg-7">   
                        <br>                 
                        <input type="submit" value="Add Gallery" name="submit" class="btn btn-block btn-primary">
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
<!-- </body>
</html> -->