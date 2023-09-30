
<!DOCTYPE html>
<html>
  <?php include('header.php'); ?>
  <body>
    <header class="header">
      <!-- Main Navbar-->
      <nav class="navbar navbar-expand-lg">
        <div class="search-area">
          <div class="search-area-inner d-flex align-items-center justify-content-center">
            <div class="close-btn"><i class="icon-close"></i></div>
            <div class="row d-flex justify-content-center">
              <div class="col-md-8">
                <form action="#">
                  <div class="form-group">
                    <input type="search" name="search" id="search" placeholder="What are you looking for?">
                    <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <!-- Navbar Brand -->
          <div class="navbar-header d-flex align-items-center justify-content-between">
            <!-- Navbar Brand --><a href="#" class="navbar-brand">E-CodeSource</a>
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
              <a href="system_list1.php" class="nav-link">Browser Based Systems</a>
              </li>
              
              <li class="nav-item">
              <a href="system_list2.php" class="nav-link">VB.Net Based Systems</a>
              </li>
              
            </ul>
            <div class="navbar-text"><a href="#" class="search-btn"><i class="icon-search-1"></i></a></div>
             
          </div>
        </div>
      </nav>
    </header>
 
    <!-- Intro Section-->
    <section class="intro">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="h3">Thank you for downloading!</h2>
            <p class="text-big">
            Follow E-CodeSource <a href="https://www.facebook.com/e.codesourceofficial" target="_blank" style="text-decoration-line: none;"><i class="fa fa-facebook-square"></i> Facebook</a> page 
            and subscribe to <a href="https://www.youtube.com/channel/UC93xeFBknaatQG6PQTnaJEQ/featured?view_as=public" target="_blank" style="text-decoration-line: none;"><i class="fa fa-youtube"></i> YouTube</a> channel for more updates!</p>
          </div>
        </div>
      </div>
    </section>
    <section class="featured-posts no-padding-top">
      <div class="container">
        <?php
        $dl_topics_query = $conn->prepare('SELECT * FROM tbl_topics WHERE topic_id = :topic_id');
        $dl_topics_query->execute(['topic_id' => $_GET['topic_id']]);
        $dl_topics_row=$dl_topics_query->fetch();
            
        $dl_comment_query = $conn->prepare("SELECT * FROM tbl_comments WHERE topic_id='$dl_topics_row[topic_id]'"); 
        ?>
        <!-- Post -->
        <div class="row d-flex align-items-stretch">
          <div class="image col-lg-5"><img src="admin/<?php echo $dl_topics_row['img']; ?>" alt="..."></div>
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <h2 class="h4"><?php echo $dl_topics_row['title']; ?></h2>
                </header>
                <p><?php echo substr($dl_topics_row['description'], 0, 150).'...'; ?></p>
                
                <footer class="post-footer d-flex align-items-center"> 
                  <div class="date"><i class="fa fa-eye"></i> <?php echo $dl_topics_row['totalViews']; ?></div>
                  <div class="date"><i class="fa fa-download"></i> <?php echo $dl_topics_row['totalDownloads']; ?></div>
                  <div class="comments"><i class="icon-comment"></i> <?php echo $dl_comment_query->rowCount(); ?></div>
                </footer>
                
                <a href="<?php echo $dl_topics_row['downloadLink']; ?>" class="hero-link" target="_blank"><i class="fa fa-download"></i> <strong>DOWNLOAD</strong></a>
                
                        
              </div>
              
            </div>
          </div>
        </div> 
      </div>
  
    </section>
    <!-- Divider Section-->
    <section style="background: url(img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h2>View archives of project source codes at a few clicks</h2><a href="system_list1.php" class="hero-link">Web Based Systems</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="system_list2.php" class="hero-link">VB.Net Based Systems</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Latest Posts -->
    <section class="latest-posts"> 
      <div class="container">
        <header> 
          <h2>Latest project posts</h2>
          <p class="text-big">Check-out these new posts now!</p>
        </header>
        <div class="row">
        
        <?php
        $bbs_topics_query = $conn->prepare('SELECT * FROM tbl_topics WHERE category = :category ORDER BY entryNum DESC LIMIT 3');
        $bbs_topics_query->execute(['category' => "BBS"]);
        while($bbs_topics_row=$bbs_topics_query->fetch()){
            
        $bbs_comment_query = $conn->prepare("SELECT * FROM tbl_comments WHERE topic_id='$bbs_topics_row[topic_id]'"); 
        ?>
               
          <div class="post col-md-4">
            <div class="post-thumbnail"><a href="instructions.php?topic_id=<?php echo $bbs_topics_row['topic_id']; ?>&category=BBS&entryNum=<?php echo $bbs_topics_row['entryNum']; ?>&viewer=Guest"><img src="admin/<?php echo $bbs_topics_row['img']; ?>" alt="..." class="img-fluid"></a></div>
            <div class="post-details">
 
                
              <div class="post-meta d-flex justify-content-left">
                  <div class="date"><i class="icon-clock"></i> <?php echo $bbs_topics_row['datePublished']; ?></div>
                  <div class="views"><i class="icon-eye"></i> <?php echo $bbs_topics_row['totalViews']; ?></div>
                  <div class="views"><i class="fa fa-download"></i><?php echo $bbs_topics_row['totalDownloads']; ?></div>
                  <div class="comments meta-last"><i class="icon-comment"></i><?php echo $bbs_comment_query->rowCount(); ?></div>
              </div>
              
              <a href="instructions.php?topic_id=<?php echo $bbs_topics_row['topic_id']; ?>&category=BBS&entryNum=<?php echo $bbs_topics_row['entryNum']; ?>&viewer=Guest">
                <h3 class="h4"><?php echo $bbs_topics_row['title']; ?></h3></a>
              <p class="text-muted"><?php echo substr($bbs_topics_row['description'], 0, 135); ?><div class="category"><a href="instructions.php?topic_id=<?php echo $bbs_topics_row['topic_id']; ?>&category=BBS&entryNum=<?php echo $bbs_topics_row['entryNum']; ?>&viewer=Guest">Read More &raquo;</a></div></p>
            </div>
          </div>
          
        <?php } ?>
        
        <?php
        $vbs_topics_query = $conn->prepare('SELECT * FROM tbl_topics WHERE category = :category ORDER BY entryNum DESC LIMIT 3');
        $vbs_topics_query->execute(['category' => "VBS"]);
        while($vbs_topics_row=$vbs_topics_query->fetch()){
            
        $vbs_comment_query = $conn->prepare("SELECT * FROM tbl_comments WHERE topic_id='$vbs_topics_row[topic_id]'"); 
        ?>
               
          <div class="post col-md-4">
            <div class="post-thumbnail"><a href="instructions.php?topic_id=<?php echo $vbs_topics_row['topic_id']; ?>&category=VBS&entryNum=<?php echo $vbs_topics_row['entryNum']; ?>&viewer=Guest"><img src="admin/<?php echo $vbs_topics_row['img']; ?>" alt="..." class="img-fluid"></a></div>
            <div class="post-details">
            
              <div class="post-meta d-flex justify-content-left">
                  <div class="date"><i class="icon-clock"></i> <?php echo $vbs_topics_row['datePublished']; ?></div>
                  <div class="views"><i class="icon-eye"></i> <?php echo $vbs_topics_row['totalViews']; ?></div>
                  <div class="views"><i class="fa fa-download"></i><?php echo $vbs_topics_row['totalDownloads']; ?></div>
                  <div class="comments meta-last"><i class="icon-comment"></i><?php echo $vbs_comment_query->rowCount(); ?></div>
              </div>
              
              <a href="instructions.php?topic_id=<?php echo $vbs_topics_row['topic_id']; ?>&category=VBS&entryNum=<?php echo $vbs_topics_row['entryNum']; ?>&viewer=Guest">
                <h3 class="h4"><?php echo $vbs_topics_row['title']; ?></h3></a>
              <p class="text-muted"><?php echo substr($vbs_topics_row['description'], 0, 135); ?><div class="category"><a href="instructions.php?topic_id=<?php echo $vbs_topics_row['topic_id']; ?>&category=VBS&entryNum=<?php echo $vbs_topics_row['entryNum']; ?>&viewer=Guest">Read More &raquo;</a></div></p>
            </div>
          </div>
          
        <?php } ?>
        
          
        </div>
      </div>
    </section>
 
 
    
    <?php include('footer.php'); ?>
    <?php include('script_files.php'); ?>
  </body>
</html>