<!DOCTYPE html>
<html>

  <?php 
  
  include('header.php'); 
  $searched=$_POST['search'];
  
  $topics_query = $conn->prepare("SELECT * FROM tbl_topics WHERE (title LIKE '%$searched%' OR description LIKE '%$searched%') AND status='Published'");
  $topics_query->execute();
  
  ?>
  
  <body>
    <header class="header">
      <!-- Main Navbar-->
      <nav class="navbar navbar-expand-lg">
        
        <?php include('search_form.php'); ?>
        
        <div class="container">
          <!-- Navbar Brand -->
          <div class="navbar-header d-flex align-items-center justify-content-between">
            <!-- Navbar Brand --><a href="index.php" class="navbar-brand">E-CodeSource</a>
            <!-- Toggle Button-->
            <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
          </div>
          <!-- Navbar Menu -->
          <div id="navbarcollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
            
              <li class="nav-item">
              <a href="index.php" class="nav-link">Home</a>
              </li>
              
              <li class="nav-item">
              <a href="system_list1.php" class="nav-link">WEB Based Projects</a>
              </li>
              
              <li class="nav-item">
              <a href="system_list2.php" class="nav-link">Java Based Projects</a>
              </li>
              
            </ul>
            <div class="navbar-text"><a href="#" class="search-btn"><i class="icon-search-1"></i></a></div>
          </div>
        </div>
      </nav>
    </header>
    <div class="container">
      <div class="row">
      
        <!-- Latest Posts -->
        <main class="posts-listing col-lg-8"> 
          <div class="container">
            <div class="row">
            <div class="post col-xl-12">
            <h5 style="margin: 12px;"><?php if($topics_query->rowCount()>1){ echo $topics_query->rowCount()." results"; }else{ echo $topics_query->rowCount()." result"; } ?> for searching <strong style="text-decoration-line: underline; font-style: italic;">"<?php echo $searched; ?>"</strong></h5>
            </div>
            <?php
              
              while($topics_row=$topics_query->fetch()){
            ?>
            
            <?php $tbl_comment_query = $conn->query("SELECT * FROM tbl_comments WHERE topic_id='$topics_row[topic_id]' ORDER BY comment_id DESC"); ?>
         
         
              <!-- post -->
              <div class="post col-xl-6">
              
                <div class="post-thumbnail">
                <a href="instructions.php?topic_id=<?php echo $topics_row['topic_id']; ?>&category=<?php echo $topics_row['category']; ?>&entryNum=<?php echo $topics_row['entryNum']; ?>&viewer=Guest" title="Click to read more...">
                <img src="admin/<?php echo $topics_row['img']; ?>" alt="..." class="img-fluid" />
                </a>
                </div>
                
                <div class="post-details">
                  <div class="post-footer d-flex align-items-center flex-column flex-sm-row" style="margin-top: 8px; margin-bottom: 8px;">
                    <div class="d-flex align-items-center flex-wrap">       
                      <div class="date"><i class="icon-clock"></i> <?php echo $topics_row['datePublished']; ?></div>
                      <div class="views"><i class="icon-eye"></i> <?php echo $topics_row['totalViews']; ?></div>
                      <div class="views"><i class="fa fa-download"></i><?php echo $topics_row['totalDownloads']; ?></div>
                      <div class="comments meta-last"><i class="icon-comment"></i><?php echo $tbl_comment_query->rowCount(); ?></div>
                    </div>
                  </div>
                  
                  <a href="instructions.php?topic_id=<?php echo $topics_row['topic_id']; ?>&category=BBS&entryNum=<?php echo $topics_row['entryNum']; ?>&viewer=Guest" title="Click to read more...">
                  <h3 class="h4"><?php echo $topics_row['title']; ?></h3>
                  </a>
                  
                  <p class="text-muted"><?php echo $topics_row['description']; ?></p>
                  
                </div>
 
    
              </div>
              
              <?php } ?>
              
            </div>
 
          </div>
        </main>
        <?php include('aside.php'); ?>
      </div>
    </div>
    <?php include('footer.php'); ?>
    <?php include('script_files.php'); ?>
  </body>
</html>