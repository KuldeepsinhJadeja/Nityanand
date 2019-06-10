<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title>File Uploads | Remark Admin Template</title>

  <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="assets/images/favicon.ico">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="../global/css/bootstrap.min599c.css?v4.0.2">
  <link rel="stylesheet" href="../global/css/bootstrap-extend.min599c.css?v4.0.2">
  <link rel="stylesheet" href="assets/css/site.min599c.css?v4.0.2">

  <!-- Skin tools (demo site only) -->
  <!--<link rel="stylesheet" href="../global/css/skintools.min599c.css?v4.0.2">-->
  <script async="" src="www.google-analytics.com/analytics.js"></script>
<!--  <script src="assets/js/Plugin/skintools.min599c.js?v4.0.2"></script>-->
  
  <!-- Plugins -->
  <link rel="stylesheet" href="../global/vendor/animsition/animsition.min599c.css?v4.0.2">
  <link rel="stylesheet" href="../global/vendor/asscrollable/asScrollable.min599c.css?v4.0.2">
  <link rel="stylesheet" href="../global/vendor/switchery/switchery.min599c.css?v4.0.2">
  <link rel="stylesheet" href="../global/vendor/intro-js/introjs.min599c.css?v4.0.2">
  <link rel="stylesheet" href="../global/vendor/slidepanel/slidePanel.min599c.css?v4.0.2">
  <link rel="stylesheet" href="../global/vendor/jquery-mmenu/jquery-mmenu.min599c.css?v4.0.2">
  <link rel="stylesheet" href="../global/vendor/flag-icon-css/flag-icon.min599c.css?v4.0.2">

  <!-- Plugins For This Page -->
  <link rel="stylesheet" href="../global/vendor/blueimp-file-upload/jquery.fileupload.min599c.css?v4.0.2">
  <link rel="stylesheet" href="../global/vendor/dropify/dropify.min599c.css?v4.0.2">


  <!-- Fonts -->
  <link rel="stylesheet" href="../global/fonts/web-icons/web-icons.min599c.css?v4.0.2">
  <link rel="stylesheet" href="../global/fonts/brand-icons/brand-icons.min599c.css?v4.0.2">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">


  <!--[if lt IE 9]>
    <script src="../../global/vendor/html5shiv/html5shiv.min.js?v4.0.2"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="../../global/vendor/media-match/media.match.min.js?v4.0.2"></script>
    <script src="../../global/vendor/respond/respond.min.js?v4.0.2"></script>
    <![endif]-->

  <!-- Scripts -->
  <script src="../global/vendor/breakpoints/breakpoints.min599c.js?v4.0.2"></script>
  <script>
    Breakpoints();
  </script>
</head>

<body>

<script src="../global/vendor/blueimp-tmpl/tmpl.min599c.js?v4.0.2"></script>
  <script src="../global/vendor/jquery-ui/jquery-ui.min599c.js?v4.0.2"></script>
  <script src="../global/vendor/blueimp-canvas-to-blob/canvas-to-blob.min599c.js?v4.0.2"></script>
  <script src="../global/vendor/blueimp-load-image/load-image.all.min599c.js?v4.0.2"></script>
  <script src="../global/vendor/blueimp-file-upload/jquery.fileupload599c.js?v4.0.2"></script>
  <script src="../global/vendor/blueimp-file-upload/jquery.fileupload-process599c.js?v4.0.2"></script>
  <script src="../global/vendor/blueimp-file-upload/jquery.fileupload-image599c.js?v4.0.2"></script>
  <script src="../global/vendor/blueimp-file-upload/jquery.fileupload-audio599c.js?v4.0.2"></script>
  <script src="../global/vendor/blueimp-file-upload/jquery.fileupload-video599c.js?v4.0.2"></script>
  <script src="../global/vendor/blueimp-file-upload/jquery.fileupload-validate599c.js?v4.0.2"></script>
  <script src="../global/vendor/blueimp-file-upload/jquery.fileupload-ui599c.js?v4.0.2"></script>
  <script src="../global/vendor/dropify/dropify.min599c.js?v4.0.2"></script>

  <!-- Scripts -->
  <!--<script src="../global/js/Component.min599c.js?v4.0.2"></script>
  <script src="../global/js/Plugin.min599c.js?v4.0.2"></script>
  <script src="../global/js/Base.min599c.js?v4.0.2"></script>
  <script src="../global/js/Config.min599c.js?v4.0.2"></script>

  <script src="assets/js/Section/Menubar.min599c.js?v4.0.2"></script>
  <script src="assets/js/Section/Sidebar.min599c.js?v4.0.2"></script>
  <script src="assets/js/Section/PageAside.min599c.js?v4.0.2"></script>
  <script src="assets/js/Section/GridMenu.min599c.js?v4.0.2"></script>
   Config 
  <script src="../global/js/config/colors.min599c.js?v4.0.2"></script>
  <script src="assets/js/config/tour.min599c.js?v4.0.2"></script>
  <script>
    Config.set('assets', '../assets');
  </script>

   Page 
  <script src="assets/js/Site.min599c.js?v4.0.2"></script>
  <script src="../global/js/Plugin/asscrollable.min599c.js?v4.0.2"></script>
  <script src="../global/js/Plugin/slidepanel.min599c.js?v4.0.2"></script>
  <script src="../global/js/Plugin/switchery.min599c.js?v4.0.2"></script>-->

  <script src="../global/js/Plugin/dropify.min599c.js?v4.0.2"></script>


  <script src="assets/examples/js/forms/uploads.min599c.js?v4.0.2"></script>


  <!-- Google Analytics -->
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'www.google-analytics.com/analytics.js',
      'ga');

    ga('create', 'UA-65522665-1', 'auto');
    ga('send', 'pageview');
  </script>
<!--<form action="" method="post" enctype="multipart/form-data">-->
<div class="form-group">
<div class="col-xl-4 col-md-6">
              <!-- Example disable -->
              <div class="example-wrap">
                <h4 class="example-title">You can disable remove button</h4>
                <div class="example">
                  <div class="dropify-wrapper">
                      <div class="dropify-message">
                          <span class="file-icon"></span>
                           <p>Drag and drop a file here or click</p>
                           <p class="dropify-error">Ooops, something wrong appended.</p>
                        </div>
                        <div class="dropify-loader" style="display: none;"></div>
                        <div class="dropify-errors-container">
                            <ul></ul>
                        </div>
                        
                        <input type="file" id="input-file-disable-remove" data-plugin="dropify" data-disable-remove="true">
                    
                        <button type="button" class="dropify-clear">Remove</button>
                        <div class="dropify-preview" style="display: none;">
                        <span class="dropify-render"></span>
                        <div class="dropify-infos">
                            <div class="dropify-infos-inner">
                                <p class="dropify-filename">
                                    <span class="file-icon"></span> 
                                    <span class="dropify-filename-inner">a.txt</span>
                                </p>
                                <p class="dropify-infos-message">Drag and drop or click to replace</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
              </div>
              <!-- End Example disable -->
            </div>
</div>
        <!--</form>-->
            <!--<script src="../global/vendor/dropify/dropify.min599c.js?v4.0.2"></script>-->
</body>
            </html>