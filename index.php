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
              <a href="index.php" class="nav-link active ">Home</a>
              </li>
              
              <li class="nav-item">
              <a href="system_list1.php" class="nav-link ">WEB Based Projects</a>
              </li>
              
              <li class="nav-item">
              <a href="system_list2.php" class="nav-link ">Java Based Project</a>
              </li>
              
            </ul>
            <div class="navbar-text"><a href="#" class="search-btn"><i class="icon-search-1"></i></a></div>
             
          </div>
        </div>
      </nav>
    </header>
    <!-- Hero Section-->
    <section style="background: url(img/hero.jpg); background-size: cover; background-position: center center" class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-7" style=" color: black; ">
            <h1>E-CodeSource - The free project source code.</h1><a href="system_list1.php" class="hero-link">View Web Based Project</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="system_list2.php" class="hero-link">View Java Based Project</a>
          </div>
        </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
      </div>
    </section>
    <!-- Intro Section-->
    <section class="intro">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <h2 class="h3">Downloadable Free Source Code Archive</h2>
            <p class="text-big"><strong>Welcome to E-CodeSource!</strong> Feel free to browse projects
             suitable for your needs. <strong>It's all free and easy as 1-2-3 to use</strong> because it also prepared 
             guides about individual projects. Happy coding fellow coder!
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="featured-posts no-padding-top">
      <div class="container">
        
        <!-- Post-->
        <div class="row d-flex align-items-stretch">
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category"><a href="system_list1.php">WEB Based Projects</a></div>
                  <a href="system_list1.php"><h2 class="h4">Web Development Source Codes</h2></a>
                </header>
                
                <p>
                Archives of projects developed using <strong>HTML, CSS, and JavaScript</strong> as front-end and 
                <strong>PHP</strong> and <strong>MySQL</strong> as back-end development.
                </p>
                
                <?php
                $totalViews=0;
                $totalDownoads=0;
                $totalComments=0;
                
                $summary_bbs_topics_query = $conn->prepare('SELECT topic_id, totalViews, totalDownloads FROM tbl_topics WHERE category = :category ORDER BY entryNum DESC LIMIT 3');
                $summary_bbs_topics_query->execute(['category' => "BBS"]);
                while($sum_bbs_topics_row=$summary_bbs_topics_query->fetch()){
                
                $totalViews+=$sum_bbs_topics_row['totalViews'];
                $totalDownoads+=$sum_bbs_topics_row['totalDownloads'];
                
                $sum_bbs_comment_query = $conn->prepare("SELECT comment_id FROM tbl_comments WHERE topic_id='$sum_bbs_topics_row[topic_id]'"); 
                
                $totalComments+=$sum_bbs_comment_query->rowCount();
                
                } ?>
                
                <footer class="post-footer d-flex align-items-center"> 
                  <a href="system_list1.php" title="Click to view projects..."><div class="date"><i class="fa fa-eye"></i> <?php echo $totalViews; ?></div></a>
                  <div class="date"><i class="fa fa-download"></i> <?php echo $totalDownoads; ?></div>
                  <div class="comments"><i class="icon-comment"></i> <?php echo $totalComments; ?></div>
                </footer>
              </div>
            </div>
          </div>
          <div class="image col-lg-5"><img src="img/bbs.jpg" alt="..."></div>
        </div>
        
        
        <!-- Post -->
        <div class="row d-flex align-items-stretch">
          <div class="image col-lg-5"><img src="img/vbs.jpg" alt="..."></div>
          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">
                  <div class="category"><a href="system_list1.php">Java Based Project</a></div>
                  <a href="system_list1.php"><h2 class="h4">Windows Form Application Source Codes</h2></a>
                </header>
                <p>
                Archives of projects developed using <strong>Microsoft Visual Studio</strong> software and <strong>MySQL</strong> as back-end development.
                </p>
                
                <?php
                $totalViews2=0;
                $totalDownoads2=0;
                $totalComments2=0;
                
                $summary_vbs_topics_query = $conn->prepare('SELECT topic_id, totalViews, totalDownloads FROM tbl_topics WHERE category = :category ORDER BY entryNum DESC LIMIT 3');
                $summary_vbs_topics_query->execute(['category' => "VBS"]);
                while($sum_vbs_topics_row=$summary_vbs_topics_query->fetch()){
                
                $totalViews2+=$sum_vbs_topics_row['totalViews'];
                $totalDownoads2+=$sum_vbs_topics_row['totalDownloads'];
                
                $sum_vbs_comment_query = $conn->prepare("SELECT comment_id FROM tbl_comments WHERE topic_id='$sum_vbs_topics_row[topic_id]'"); 
                
                $totalComments2+=$sum_vbs_comment_query->rowCount();
                
                } ?>
                
                <footer class="post-footer d-flex align-items-center"> 
                  <a href="system_list1.php" title="Click to view projects..."><div class="date"><i class="fa fa-eye"></i> <?php echo $totalViews2; ?></div></a>
                  <div class="date"><i class="fa fa-download"></i> <?php echo $totalDownoads2; ?></div>
                  <div class="comments"><i class="icon-comment"></i> <?php echo $totalComments2; ?></div>
                </footer>
                
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
            <h2>View archives of project source codes at a few clicks</h2><a href="system_list1.php" class="hero-link">Web Based Project</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="system_list2.php" class="hero-link">Java Based Project</a>
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
            <div class="post-thumbnail"><a href="instructions.php?topic_id=<?php echo $bbs_topics_row['topic_id']; ?>&category=BBS&entryNum=<?php echo $bbs_topics_row['entryNum']; ?>&viewer=Guest"><img src="admin/<?php echo $bbs_topics_row['img']; ?>" alt="..." class="img-fluid" /></a></div>
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
            <div class="post-thumbnail"><a href="instructions.php?topic_id=<?php echo $vbs_topics_row['topic_id']; ?>&category=VBS&entryNum=<?php echo $vbs_topics_row['entryNum']; ?>&viewer=Guest"><img src="admin/<?php echo $vbs_topics_row['img']; ?>" alt="..." class="img-fluid" /></a></div>
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