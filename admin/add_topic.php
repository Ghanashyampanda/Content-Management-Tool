<!DOCTYPE html>
<html>
    <?php include('header.php'); ?>
    
  <body>
    <div id="all">
      <?php include('topbar.php'); ?>
       
      <!-- Navbar Start-->
      <header class="nav-holder make-sticky">
        <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
          <div class="container"><a href="home.php" class="navbar-brand home"><img src="img/logo.png" alt="Universal logo" class="d-none d-md-inline-block"><img src="img/logo-small.png" alt="Universal logo" class="d-inline-block d-md-none"><span class="sr-only">Universal - go to homepage</span></a>
            <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <div id="navigation" class="navbar-collapse collapse">
              <ul class="nav navbar-nav ml-auto">
                
                <li class="nav-item dropdown"><a href="home.php">Home</a></li>
                <li class="nav-item dropdown active"><a href="home.php">Topics</a></li>
                
              </ul>
            </div>
          </div>
        </div>
      </header>
      <!-- Navbar End-->
      
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-12">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="main_topic.php">Topics</a></li>
                <li class="breadcrumb-item active">Add Blog Entry</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <section class="bar">
            <div class="row">
              <div class="col-md-12">
                <div class="heading">
                  <h2>ADD BLOG ENTRY</h2>
                </div>
              </div>
            </div>
            <div class="row portfolio text-center">
              <div class="col-md-12">
                <form action="save_main_topic.php?category=<?php echo $_GET['category']; ?>" method="POST" enctype="multipart/form-data">
                
                <div class="row">
                    
                    <div class="col-md-2">
                    <select name="entryNum" class="form-control">
                    <option value="000">-</option>
                    <option>001</option>
                    <option>002</option>
                    <option>003</option>
                    <option>004</option>
                    <option>005</option>
                    <option>006</option>
                    <option>007</option>
                    <option>008</option>
                    <option>009</option>
                    <option>010</option>
                    <option>011</option>
                    <option>012</option>
                    <option>013</option>
                    <option>014</option>
                    <option>015</option>
                    </select>
                    <small style="margin-bottom: 8px;" class="pull-left">Entry No.</small>
                    </div>
                    
                    <div class="col-md-10">
                    <input name="title" type="text" class="form-control" placeholder="Topic title..." style="margin-bottom: 8px;" required="true" />
                    <small style="margin-bottom: 8px;" class="pull-left">Title</small>
                    </div>
                    
                    <div class="col-md-12">
                    <input name="systemDemoLink" type="text" class="form-control" placeholder="Paste system demo video link..." required="true" />
                    <small style="margin-bottom: 12px;" class="pull-left">System Demo Video Link</small>
                    </div>
                    
                    <div class="col-md-12">
                    <input name="installGuideLink" type="text" class="form-control" placeholder="Paste installation guide video link..." required="true" />
                    <small style="margin-bottom: 12px;" class="pull-left">Installation Guide Video Link</small>
                    </div>
                    
                    <div class="col-md-12">
                    <input name="downloadLink" type="text" class="form-control" placeholder="Paste download link..." required="true" />
                    <small style="margin-bottom: 8px;" class="pull-left">Source Code Download Link</small>
                    </div>
                    
                    <div class="col-md-2">
                    <select name="status" class="form-control">
                    <option value="Private">-</option>
                    <option>Private</option>
                    <option>Published</option>
                    </select>
                    <small style="margin-bottom: 8px;" class="pull-left">Topic Status</small>
                    </div>
                    
                    <div class="col-md-4">
                    <input type="file" name="file" id="imgInp" class="form-control" style="margin-bottom: 0px; height: 44px;" />
                    <small style="margin-bottom: 8px;" class="pull-left">Upload Cover Image</small>
                    </div>
                    
                    <div class="col-md-6">
                    <small>Uploaded BG Image Preview</small><br />
                    <img width="50%" height="50%" class="img-thumbnail img-fluid" id="blah" src="#" alt="your image" />
                    </div>
                    
                </div>
                <hr />
                <p style="color: black;">Description</p>
                <textarea name="editor1"></textarea>
                <script>
                        CKEDITOR.replace( 'editor1' );
                </script>
               
                <p style="margin-top: 12px; color: black;">Installation Guide</p>
                <textarea name="editor2"></textarea>
                <script>
                        CKEDITOR.replace( 'editor2' );
                </script>
                <p class="buttons" style="margin-top: 12px;">
                <button name="add_main_topic" class="btn btn-template-outlined pull-right"><i class="fa fa-save"></i> SAVE</button>
                </p>
                </form>
              </div>
            </div>
          </section>
        </div>
      </div>
 
      
      <?php include('footer.php'); ?>
      
    </div>
    <!-- Javascript files-->
    
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/waypoints/lib/jquery.waypoints.min.js"> </script>
    <script src="vendor/jquery.counterup/jquery.counterup.min.js"> </script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="vendor/jquery.scrollto/jquery.scrollTo.min.js"></script>
    <script src="js/front.js"></script>
    
    <script>
    
        $('#blah').attr('src', 'img/nfc.png');
        
        function readURL(input) {
    
          if (input.files && input.files[0]) {
            var reader = new FileReader();
        
            reader.onload = function(e) {
              $('#blah').attr('src', e.target.result);
            }
        
            reader.readAsDataURL(input.files[0]);
          }
        }
        
        $("#imgInp").change(function() {
          readURL(this);
        });
    </script>
  </body>
</html>