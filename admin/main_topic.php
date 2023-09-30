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
                <li class="nav-item dropdown active"><a href="main_topic.php">Topics</a></li>
                
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
                <li class="breadcrumb-item active">Topics</li>
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
                  <h2>ALL PROJECTS</h2>

                  
                </div>
              </div>
            </div>
            
            <div class="row portfolio text-center">
            
            <?php
            $topics_query = $conn->prepare('SELECT * FROM tbl_topics ORDER BY title ASC');
            $topics_query->execute();
            while($topics_row=$topics_query->fetch()){
            ?>
              
              <div class="col-md-6">
                <div class="box-image">
                  <div class="image"><img src="<?php echo $topics_row['img']; ?>" alt="" class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center">
                      <div class="content">
                        <div class="name">
                          <h3><a href="sub_topic_list.php?topic_id=<?php echo $topics_row['topic_id']; ?>" class="color-white"><?php echo $topics_row['title']; ?></a></h3>
                        </div>
                        <div class="text">
                          <p class="buttons">
                          <a href="sub_topic_list.php?topic_id=<?php echo $topics_row['topic_id']; ?>" class="btn btn-template-outlined-white">Settings <i class="fa fa-caret-right"></i></a>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
          <?php } ?>
          
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
    

 


  </body>
</html>