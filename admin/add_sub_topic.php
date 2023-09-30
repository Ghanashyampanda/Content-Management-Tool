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
                <li class="breadcrumb-item active"><a href="sub_topic_list.php?topic_id=<?php echo $tbl_topics_row['topic_id']; ?>"><?php echo $tbl_topics_row['title']; ?></a> - Add Sub Topic</li>
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
                  <h2>ADD GUIDE - <?php echo $tbl_topics_row['title']; ?></h2>
                </div>
              </div>
            </div>
            <div class="row portfolio text-center">
              <div class="col-md-12">
                <form action="save_sub_topic.php?topic_id=<?php echo $tbl_topics_row['topic_id']; ?>" method="POST" enctype="multipart/form-data">
                 
                <div class="row">
                    
                    <div class="col-md-3">
                    <select name="stepCtr" class="form-control">
                    <option>01</option>
                    <option>02</option>
                    <option>03</option>
                    <option>04</option>
                    <option>05</option>
                    <option>06</option>
                    <option>07</option>
                    <option>08</option>
                    <option>09</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    <option>13</option>
                    <option>14</option>
                    <option>15</option>
                    </select>
                    <small style="margin-bottom: 8px;" class="pull-left">Guide Sequence</small>
                    </div>
                    
                    <div class="col-md-3">
                    <input type="file" name="file" id="imgInp" class="form-control" style="margin-bottom: 0px; height: 44px;" />
                    <small style="margin-bottom: 8px;" class="pull-left">Upload Image</small>
                    </div>
                    
                    <div class="col-md-6">
                    <img width="50%" height="50%" class="img-thumbnail img-fluid" id="blah" src="#" alt="your image" /><br />
                    <small>Uploaded Image Preview</small>
                    </div>
                    
                    <div class="col-md-12">
                    <p class="buttons" style="margin-top: 12px; margin-right: 140px;">
                    <button name="add_guide" class="btn btn-template-outlined pull-right"><i class="fa fa-save"></i> SAVE</button>
                    </p>
                    </div>
                </div>
 
                
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