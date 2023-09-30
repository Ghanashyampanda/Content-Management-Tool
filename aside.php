        <aside class="col-lg-4">
 
          <!-- Widget [Latest Posts Widget]        -->
          <div class="widget latest-posts">
            <header>
              <h3 class="h6">Latest Posts</h3>
            </header>
            <div class="blog-posts">
            
            <?php
            $bbs_topics_query = $conn->prepare('SELECT * FROM tbl_topics WHERE category = "BBS" ORDER BY entryNum DESC LIMIT 3');
            $bbs_topics_query->execute();
            while($bbs_topics_row=$bbs_topics_query->fetch()){
                
            $bbs_comment_query = $conn->prepare("SELECT * FROM tbl_comments WHERE topic_id='$bbs_topics_row[topic_id]'");

            ?>
     
                <a href="instructions.php?topic_id=<?php echo $bbs_topics_row['topic_id']; ?>&category=BBS&entryNum=<?php echo $bbs_topics_row['entryNum']; ?>&viewer=Guest">
                <div class="item d-flex align-items-center">
                  <div class="image"><img src="admin/<?php echo $bbs_topics_row['img']; ?>" alt="..." class="img-fluid"></div>
                  <div class="title"><strong><?php echo $bbs_topics_row['title']; ?></strong>
                    <div class="d-flex align-items-center">
                       
                        <div class="views"><i class="icon-eye"></i> <?php echo $bbs_topics_row['totalViews']; ?></div>
                        <div class="views"><i class="fa fa-download"></i><?php echo $bbs_topics_row['totalDownloads']; ?></div>
                       
                    </div>
                  </div>
                </div>
                </a>
                
            <?php } ?>
            
            
            <?php
            $vbs_topics_query = $conn->prepare('SELECT * FROM tbl_topics WHERE category = "VBS" ORDER BY entryNum DESC LIMIT 3');
            $vbs_topics_query->execute();
            while($vbs_topics_row=$vbs_topics_query->fetch()){
                
            $bbs_comment_query = $conn->prepare("SELECT * FROM tbl_comments WHERE topic_id='$vbs_topics_row[topic_id]'");

            ?>
     
                <a href="instructions.php?topic_id=<?php echo $vbs_topics_row['topic_id']; ?>&category=VBS&entryNum=<?php echo $vbs_topics_row['entryNum']; ?>&viewer=Guest">
                <div class="item d-flex align-items-center">
                  <div class="image"><img src="admin/<?php echo $vbs_topics_row['img']; ?>" alt="..." class="img-fluid"></div>
                  <div class="title"><strong><?php echo $vbs_topics_row['title']; ?></strong>
                    <div class="d-flex align-items-center">
                       
                        <div class="views"><i class="icon-eye"></i> <?php echo $vbs_topics_row['totalViews']; ?></div>
                        <div class="views"><i class="fa fa-download"></i><?php echo $vbs_topics_row['totalDownloads']; ?></div>
                       
                    </div>
                  </div>
                </div>
                </a>
                
            <?php } ?>
            
                
          </div>
          </div>
          <!-- Widget [Categories Widget] 
          <div class="widget categories">
          
          </div>-->
          <!-- Widget [Tags Cloud Widget]
          <div class="widget tags">
          
          </div>-->
          
        </aside>