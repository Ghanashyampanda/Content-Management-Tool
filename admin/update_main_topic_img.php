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
      
      <?php
      $tbl_topics_query = $conn->query("SELECT * FROM tbl_topics WHERE topic_id='$_GET[topic_id]'");
      $tbl_topics_row = $tbl_topics_query->fetch();
      ?>
      
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-12">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="main_topic.php">Topics</a></li>
                <li class="breadcrumb-item"><a href="sub_topic_list.php?topic_id=<?php echo $_GET['topic_id']; ?>"><?php echo $tbl_topics_row['title']; ?></a></li>
                <li class="breadcrumb-item active">Update Topic Image</li>
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
                  <h2>UPDATE TOPIC IMAGE</h2>
                </div>
              </div>
            </div>
            <div class="row portfolio text-center">
              <div class="col-md-12">
                <form action="save_main_topic.php?topic_id=<?php echo $_GET['topic_id']; ?>" method="POST" enctype="multipart/form-data">
               
                <div class="row">
                    
                    <div class="col-md-12">
                    <input type="file" name="file" id="imgInp" class="form-control" style="margin-bottom: 0px; height: 44px;" />
                    <small style="margin-bottom: 8px;" class="pull-left">Upload Background Image</small>
                    </div>
                    
                    <div class="col-md-6">
                    <small>Cuurent BG Image Preview</small><br />
                    <img width="100%" height="100%" class="img-thumbnail img-fluid" src="<?php echo $tbl_topics_row['img']; ?>" alt="your image" />
                    </div>
                    
                    <div class="col-md-6">
                    <small>Uploaded BG Image Preview</small><br />
                    <img width="100%" height="100%" class="img-thumbnail img-fluid" id="blah" src="#" alt="your image" />
                    </div>
                    
                </div>
                
                <p class="buttons" style="margin-top: 12px;">
                <button name="update_topic_img" class="btn btn-template-outlined pull-right"><i class="fa fa-save"></i> UPDATE</button>
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