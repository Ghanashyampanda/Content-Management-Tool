<!DOCTYPE html>
<html>
    <?php
    
    include('header.php');
    
    function randomcode() {
    $var = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $code = '';
    while ($i <= 9) {
    $num = rand() % 33;
    $tmp = substr($var, $num, 1);
    $code = $code . $tmp;
    $i++;
    }
    return $code;
    }
                                
    ?>
    
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
      
      <?php
      $topics_query = $conn->prepare('SELECT * FROM tbl_topics WHERE topic_id = :topic_id');
      $topics_query->execute(['topic_id' => $_GET['topic_id']]);
      $topics_row=$topics_query->fetch();
      ?>
      
      <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-12">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $topics_row['title']; ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
         
      <div id="content">
        <div class="container">
 
          <!-- Delete Main Topic Modal-->
          <div id="delete-topic-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
            <div role="document" class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 id="login-modalLabel" class="modal-title">Confirm Delete</h4>
                  <a type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></a>
                </div>
                <form action="save_main_topic.php?topic_id=<?php echo $topics_row['topic_id']; ?>&title=<?php echo $topics_row['title']; ?>" method="POST">
                <div class="modal-body">
                    
                    <h5 class="text-center">Do you wish to delete Topic <?php echo $topics_row['title']; ?> and its related components?</h5>
                    <br />
                    <p class="text-center">
                      <a href="#" data-dismiss="modal" class="btn btn-template-outlined"><i class="fa fa-times"></i> NO</a>
                      <button name="delete_topic" class="btn btn-outline-danger" title="Click to delete topic..."><i class="fa fa-check"></i> YES</button>
                      </form>
                    </p>
     
                </div>
              </div>
            </div>
          </div>
          <!-- Delete Main Topic modal end-->
      
          <section class="bar">
            <div class="row portfolio-project">
            
              <div class="col-md-12">
                    <div class="heading">
                      <h2><?php echo $topics_row['title']; ?></h2>
                      <p>
                      <a href="edit_topic.php?topic_id=<?php echo $topics_row['topic_id']; ?>" class="btn btn-template-outlined" title="Click to edit topic..."><i class="fa fa-pencil"></i> EDIT</a> &nbsp; 
                      <a data-toggle="modal" data-target="#delete-topic-modal" href="#" class="btn btn-outline-danger" title="Click to delete topic..."><i class="fa fa-trash"></i> DELETE</a>
                      </p>
                   
                      
                    </div>
                    
                      <center>
                          <a href="update_main_topic_img.php?topic_id=<?php echo $topics_row['topic_id']; ?>" title="Click to update topic cover image...">
                          <img src="<?php echo $topics_row['img']; ?>" alt="" class="img-thumbnail img-fluid" style="margin-bottom: 16px; width: 100%; height: 100%;" />
                          </a>
                      </center>
              
              
                    <p class="lead no-mb">
                    <?php echo html_entity_decode($topics_row['description'], ENT_NOQUOTES); ?>
                    </p>
              </div>
              
              <div class="col-sm-12">
              
                <section>
                  <div class="row portfolio">
                    <div class="col-md-12">
                      <div class="heading">
                        <h3>System Screen Shots</h3>
                         
                        
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                      <section>
                      
                      <div class="row">
                      
                      <div class="col-md-3">
                      <a href="update_ss_img.php?topic_id=<?php echo $topics_row['topic_id']; ?>&ss=1" title="Click to update system screen shot 1...">
                      <img src="<?php echo $topics_row['gallery1']; ?>" alt="" class="img-thumbnail img-fluid" style="margin-bottom: 16px; width: 100%; height: 100%;" />
                      </a>
                      </div>
                      
                      <div class="col-md-3">
                      <a href="update_ss_img.php?topic_id=<?php echo $topics_row['topic_id']; ?>&ss=2" title="Click to update system screen shot 2...">
                      <img src="<?php echo $topics_row['gallery2']; ?>" alt="" class="img-thumbnail img-fluid" style="margin-bottom: 16px; width: 100%; height: 100%;" />
                      </a>
                      </div>
                      
                      <div class="col-md-3">
                      <a href="update_ss_img.php?topic_id=<?php echo $topics_row['topic_id']; ?>&ss=3" title="Click to update system screen shot 3...">
                      <img src="<?php echo $topics_row['gallery3']; ?>" alt="" class="img-thumbnail img-fluid" style="margin-bottom: 16px; width: 100%; height: 100%;" />
                      </a>
                      </div>
                      
                      <div class="col-md-3">
                      <a href="update_ss_img.php?topic_id=<?php echo $topics_row['topic_id']; ?>&ss=4" title="Click to update system screen shot 4...">
                      <img src="<?php echo $topics_row['gallery4']; ?>" alt="" class="img-thumbnail img-fluid" style="margin-bottom: 16px; width: 100%; height: 100%;" />
                      </a>
                      </div>
                      
                      <div class="col-md-12">
                      <hr />
                      </div>
                      </div>
 
                      </section>
                    </div>
                    
                  </div>
                </section>
                
                <section>
                  <div class="row portfolio">
                    <div class="col-md-12">
                      <div class="heading">
                        <h3>Installation Guide
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                    <p class="lead no-mb">
                    <?php echo html_entity_decode($topics_row['installGuide'], ENT_NOQUOTES); ?>
                    </p>
                    </div>
                    
                  </div>
                </section>
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
    

 


  </body>
</html>