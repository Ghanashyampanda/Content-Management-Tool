<!DOCTYPE html>
<html>

    <?php include('header.php'); ?>
    
  <body>
    <div id="all">
      <?php include('topbar.php'); ?>
       
      <!-- Navbar Start-->
      <header class="nav-holder make-sticky">
        <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
          <div class="container"><a href="#" class="navbar-brand home"><img src="img/logo.png" alt="Universal logo" class="d-none d-md-inline-block"><img src="img/logo-small.png" alt="Universal logo" class="d-inline-block d-md-none"><span class="sr-only">Universal - go to homepage</span></a>
            <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <div id="navigation" class="navbar-collapse collapse">
              <ul class="nav navbar-nav ml-auto">
                
                <li class="nav-item dropdown active"><a href="home.php">Home</a></li>
                
                <li class="nav-item dropdown"><a href="main_topic.php">Topics</a></li>
                
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
                <li class="breadcrumb-item active">Home</li>
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
                  <h2>LIST OF TOPICS</h2>
                </div>
              </div>
            </div>
                <div class="table-responsive">
                <a href="add_topic.php?category=BBS" class="btn btn-primary" style="color: white; margin-bottom: 12px;"> <i class="fa fa-plus"></i>VIEW WEB BASED PROJECT</a>
                <table id="" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>TOPIC</th>
                            <th>DESCRIPTION</th>
                            <th>STATISTICS</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                    
                    $topics_query = $conn->prepare('SELECT * FROM tbl_topics WHERE category = :category ORDER BY entryNum ASC');
                    $topics_query->execute(['category' => 'BBS']);
                    while($topics_row=$topics_query->fetch()){
                    
                    $tbl_comment_query = $conn->query("SELECT * FROM tbl_comments WHERE topic_id='$topics_row[topic_id]'");
          
                    ?>
                        <tr>
                            <td><img src="<?php echo $topics_row['img']; ?>" style="width: 50px; height: 35px;" class="img-fluid" /></td>
                            <td><?php echo substr($topics_row['title'], 0, 25).'...'; ?></td>
                            <td><?php echo substr($topics_row['description'], 0, 50).'...'; ?></td>
                            <td>
                            <i class="fa fa-eye"></i> <?php echo $topics_row['totalViews']; ?> | &nbsp;
                            <i class="fa fa-download"></i> <?php echo $topics_row['totalDownloads']; ?> | &nbsp;
                            <i class="fa fa-comment"></i> <?php echo $tbl_comment_query->rowCount(); ?>
                            
                            </td>
                            
                            <td>
                            <a href="sub_topic_list.php?topic_id=<?php echo $topics_row['topic_id']; ?>" class="btn btn-template-outlined btn-sm" title="Click to view topic..."><i class="fa fa-gear"></i> SETTINGS</a>
                            <a href="../instructions.php?topic_id=<?php echo $topics_row['topic_id']; ?>&category=BBS&entryNum=<?php echo $topics_row['entryNum']; ?>&viewer=Admin" target="_blank" class="btn btn-outline-info btn-sm" title="Click to view topic..."><i class="fa fa-eye"></i> VIEW</a>
                            </td>
                            
                        </tr>
                        
                    <?php } ?>
                    
                    </tbody>
                </table>
                </div>
                
                <div class="table-responsive">
                <a href="add_topic.php?category=VBS" class="btn btn-primary" style="color: white; margin-bottom: 12px;"> <i class="fa fa-plus"></i>VIEW JAVA BASED PROJECT</a>
                <table id="" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>TOPIC</th>
                            <th>DESCRIPTION</th>
                            <th>STATISTICS</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                    
                    $topics_query = $conn->prepare('SELECT * FROM tbl_topics WHERE category = :category ORDER BY entryNum ASC');
                    $topics_query->execute(['category' => 'VBS']);
                    while($topics_row=$topics_query->fetch()){
                    
                    $tbl_comment_query = $conn->query("SELECT * FROM tbl_comments WHERE topic_id='$topics_row[topic_id]'");
          
                    ?>
                        <tr>
                            <td><img src="<?php echo $topics_row['img']; ?>" style="width: 50px; height: 35px;" class="img-fluid" /></td>
                            <td><?php echo $topics_row['title']; ?></td>
                            <td><?php echo $topics_row['description']; ?></td>
                            <td>
                            <i class="fa fa-eye"></i> <?php echo $topics_row['totalViews']; ?> | &nbsp;
                            <i class="fa fa-download"></i> <?php echo $topics_row['totalDownloads']; ?> | &nbsp;
                            <i class="fa fa-comment"></i> <?php echo $tbl_comment_query->rowCount(); ?>
                            
                            </td>
                            
                            <td>
                            <a href="sub_topic_list.php?topic_id=<?php echo $topics_row['topic_id']; ?>" class="btn btn-template-outlined btn-sm" title="Click to view topic..."><i class="fa fa-gear"></i> SETTINGS</a>
                            <a href="../instructions.php?topic_id=<?php echo $topics_row['topic_id']; ?>&category=VBS&entryNum=<?php echo $topics_row['entryNum']; ?>&viewer=Admin" target="_blank" class="btn btn-outline-info btn-sm" title="Click to view topic..."><i class="fa fa-eye"></i> VIEW</a>
                            </td>
                            
                        </tr>
                        
                    <?php } ?>
                    
                    </tbody>
                </table>
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