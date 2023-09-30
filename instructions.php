<!DOCTYPE html>
<html>
  <?php include('header.php'); ?>
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
              <a href="system_list1.php" class="nav-link <?php if($_GET['category']==='BBS'){ echo "active"; } ?>">Browser Based Systems</a>
              </li>
              
              <li class="nav-item">
              <a href="system_list2.php" class="nav-link <?php if($_GET['category']==='VBS'){ echo "active"; } ?>">VB.Net Based Systems</a>
              </li>
              
            </ul>
            <div class="navbar-text"><a href="#" class="search-btn"><i class="icon-search-1"></i></a></div>
          </div>
        </div>
      </nav>
    </header>
    <div class="container">
      <div class="row">
        
        <?php
            $topics_query = $conn->prepare('SELECT * FROM tbl_topics WHERE topic_id = :topic_id');
            $topics_query->execute(['topic_id' => $_GET['topic_id']]);
            $topics_row=$topics_query->fetch();
            
            if($_GET['viewer']!='Admin'){
                
            $newTotalViews=$topics_row['totalViews']+1;
            
            $updCard = 'UPDATE tbl_topics SET totalViews = :totalViews WHERE topic_id = :topic_id';
            $conn->prepare($updCard)->execute(['totalViews' => $newTotalViews, 'topic_id' => $_GET['topic_id']]);
            
            }
            
  
        ?>
        
        <?php $tbl_comment_query = $conn->query("SELECT * FROM tbl_comments WHERE topic_id='$_GET[topic_id]' ORDER BY comment_id DESC"); ?>
                 
                 
        <!-- Latest Posts -->
        <main class="post blog-post col-lg-8"> 
          <div class="container">
            <div class="post-single">
            
              <div class="post-thumbnail"><img src="admin/<?php echo $topics_row['img']; ?>" alt="..." class="img-fluid"></div>
              
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                  
                  <div class="d-flex align-items-center flex-wrap">       
                    <div class="date"><i class="icon-clock"></i> <?php echo $topics_row['datePublished']; ?></div>
                    <div class="views"><i class="icon-eye"></i> <?php echo $topics_row['totalViews']; ?></div>
                    <div class="views"><i class="fa fa-download"></i><?php echo $topics_row['totalDownloads']; ?></div>
                    <div class="comments meta-last"><i class="icon-comment"></i><?php echo $tbl_comment_query->rowCount(); ?></div>
                  </div>
                  <div class="category"><strong><?php if($_GET['category']==='BBS'){ ?> WEB BASED SYSTEMS <?php }else{ ?> VB.NET BASED SYSTEMS <?php } ?></strong></div>
                </div>
                <h1><?php echo $topics_row['title']; ?></h1>
 
                <div class="post-body">
                  <p class="lead"><?php echo $topics_row['description']; ?></p>
                  
                <div class="post-tags">
                    <p style="margin-top: 18px;"><strong style="font-size: x-large;">System Screenshots</strong> <a href="<?php echo $topics_row['systemDemoLink']; ?>" target="_blank" class="tag" title="Watch video demonstration instead..."><i class="fa fa-play"></i> SYSTEM DEMO</a></p>
                </div>
                <!-- Gallery Section-->
                <section class="gallery no-padding">
                  <div class="row">
                    <div class="mix col-lg-3 col-md-3 col-sm-6">
                      <div class="item"><a href="admin/<?php echo $topics_row['gallery1']; ?>" data-fancybox="gallery" class="image"><img src="admin/<?php echo $topics_row['gallery1']; ?>" alt="..." class="img-fluid">
                          <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                    </div>
                    <div class="mix col-lg-3 col-md-3 col-sm-6">
                      <div class="item"><a href="admin/<?php echo $topics_row['gallery2']; ?>" data-fancybox="gallery" class="image"><img src="admin/<?php echo $topics_row['gallery2']; ?>" alt="..." class="img-fluid">
                          <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                    </div>
                    <div class="mix col-lg-3 col-md-3 col-sm-6">
                      <div class="item"><a href="admin/<?php echo $topics_row['gallery3']; ?>" data-fancybox="gallery" class="image"><img src="admin/<?php echo $topics_row['gallery3']; ?>" alt="..." class="img-fluid">
                          <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                    </div>
                    <div class="mix col-lg-3 col-md-3 col-sm-6">
                      <div class="item"><a href="admin/<?php echo $topics_row['gallery4']; ?>" data-fancybox="gallery" class="image"><img src="admin/<?php echo $topics_row['gallery4']; ?>" alt="..." class="img-fluid">
                          <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
                    </div>
                  </div>
                </section>
                
                  <div class="post-tags">
                    <p style="margin-top: 18px;"><strong style="font-size: x-large;">How to Install</strong> <a href="<?php echo $topics_row['installGuideLink']; ?>" target="_blank" class="tag" title="Watch installation video instead..."><i class="fa fa-play"></i> INSTALLATION VIDEO</a></p>
                  </div>
                  
                  <p>Please refer to this step-by-step process to successfully use <?php echo $topics_row['title']; ?>.</p>
                  
                  <p><?php echo html_entity_decode($topics_row['installGuide'], ENT_NOQUOTES); ?></p>
                
                </div>
                
                
                
                <div class="post-tags">
                <a data-toggle="modal" data-target="#download-modal" class="tag" href="#"><i class="fa fa-download"></i> DOWNLOAD FULL SOURCE CODE</a>
                </div>
                
                <div id="download-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true" class="modal fade">
                  <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 id="login-modalLabel" class="modal-title"><i class="fa fa-envelope"></i> <small>SEND LINK TO EMAIL</small></h4>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                        </div>
                        <div class="modal-body">
                        
                        <form method="POST" action="save_comment.php?topic_id=<?php echo $_GET['topic_id']; ?>&category=<?php echo $_GET['category']; ?>&entryNum=<?php echo $_GET['entryNum']; ?>&viewer=<?php echo $_GET['viewer']; ?>">
                        <div class="row">
                    
                        <div class="col-md-12" style="margin-bottom: 12px;">
                        <input name="downloadEmail" type="email" class="form-control" required="true" placeholder="Enter Email" />
                        </div>
                        
                        <div class="col-md-12" style="margin-bottom: 12px;">
                        <input name="downloadName" type="text" class="form-control" required="true" placeholder="Enter Name" />
                        </div>
                        
                        </div>
                        <center>
                        <div class="post-tags">
                        <button name="submitDownload" class="tag"><i class="fa fa-check"></i> SEND DOWNLOAD LINK</button>
                        </div>
                        </center>
                        
                        </form>
                        </div>
                      </div>
                  </div>
                </div>
                
                <?php
                $entryNumPrev=(int)$_GET['entryNum']-1;
                $entryNumNext=(int)$_GET['entryNum']+1;
                
                if($entryNumPrev<10){
                    $prevEntry='00'.$entryNumPrev;
                }elseif($entryNumPrev>=10){
                    $prevEntry='0'.$entryNumPrev;
                }
                
                if($entryNumNext<10){
                    $nxtEntry='00'.$entryNumNext;
                }elseif($entryNumNext>=10){
                    $nxtEntry='0'.$entryNumNext;
                }
                
                
                $prevTopics_query = $conn->prepare('SELECT * FROM tbl_topics WHERE entryNum = :entryNum AND category = :category');
                $prevTopics_query->execute(['entryNum' => $prevEntry, 'category' => $_GET['category']]);
                $prevTopic_row=$prevTopics_query->fetch();
                
                
                $nxtTopics_query = $conn->prepare('SELECT * FROM tbl_topics WHERE entryNum = :entryNum AND category = :category');
                $nxtTopics_query->execute(['entryNum' => $nxtEntry, 'category' => $_GET['category']]);
                
                
                
                ?>
                
                <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row">
                    <?php if($prevEntry>0){ ?>
                    <a href="instructions.php?topic_id=<?php echo $prevTopic_row['topic_id']; ?>&category=BBS&entryNum=<?php echo $prevTopic_row['entryNum']; ?>&viewer=Guest" class="prev-post text-left d-flex align-items-center">
                    <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                    <div class="text"><strong class="text-primary">Previous Post</strong>
                    <h6><?php echo $prevTopic_row['title']; ?></h6>
                    </div></a>
                    <?php } ?>
                    
                    <?php if($nxtTopics_query->rowCount()>0){ $nxtTopic_row=$nxtTopics_query->fetch(); ?>
                    <a href="instructions.php?topic_id=<?php echo $nxtTopic_row['topic_id']; ?>&category=BBS&entryNum=<?php echo $nxtTopic_row['entryNum']; ?>&viewer=Guest" class="next-post text-right d-flex align-items-center justify-content-end">
                    <div class="text"><strong class="text-primary">Next Post</strong>
                      <h6><?php echo $nxtTopic_row['title']; ?></h6>
                    </div>
                    <div class="icon next"><i class="fa fa-angle-right"></i></div></a>
                    <?php } ?>
                    
                </div>
                
                <div class="post-comments">
                  <header>
                    <h3 class="h6">Post Comments<span class="no-of-comments">(<?php echo $tbl_comment_query->rowCount(); ?>)</span></h3>
                  </header>
                  
                  <?php
                    while($tbl_comment_row = $tbl_comment_query->fetch()){
                  ?>
                  <div class="comment">
                    <div class="comment-header d-flex justify-content-between">
                      <div class="user d-flex align-items-center">
                        <div class="image"><img src="img/user.svg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="title"><strong><?php echo $tbl_comment_row['name']; ?></strong><span class="date"><i class="fa fa-calendar"></i> <?php echo $tbl_comment_row['date_time']; ?> <small>UTC+08:00</small></span></div>
                      </div>
                    </div>
                    <div class="comment-body">
                      <p><?php echo $tbl_comment_row['comment']; ?></p>
                    </div>
                  </div>
                  <?php } ?>
                </div>
                
                <div class="add-comment">
                  <header>
                    <h3 class="h6">Leave a reply</h3>
                  </header>
                  <form method="POST" action="save_comment.php?topic_id=<?php echo $_GET['topic_id']; ?>&category=<?php echo $_GET['category']; ?>&entryNum=<?php echo $_GET['entryNum']; ?>&viewer=<?php echo $_GET['viewer']; ?>" class="commenting-form">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" required="true">
                      </div>
                      <div class="form-group col-md-6">
                        <input type="email" name="email" id="email" placeholder="Email Address (will not be published)" class="form-control">
                      </div>
                      <div class="form-group col-md-12">
                        <textarea name="comment" id="comment" placeholder="Type your comment" class="form-control" required="true"></textarea>
                      </div>
                      <div class="form-group col-md-12">
                        <button name="addComment" class="btn btn-secondary">Submit Comment</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
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