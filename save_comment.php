    <?php include('dbcon.php'); ?>

    <?php
    if(isset($_POST['addComment']))
    {
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $comment=$_POST['comment'];
    $date_time=$currentDate.' | '.$currentTime;
    
    $save_comment = "INSERT INTO tbl_comments(topic_id, name, email, comment, date_time)VALUES('$_GET[topic_id]', '$name', '$email', '$comment', '$date_time')";
    $conn->exec($save_comment);

    ?>
 
    <script>
        window.location='instructions.php?topic_id=<?php echo $_GET['topic_id']; ?>&category=<?php echo $_GET['category']; ?>&entryNum=<?php echo $_GET['entryNum']; ?>&viewer=<?php echo $_GET['viewer']; ?>';
    </script>    
        
    <?php } ?>
    
    
    <?php
    if(isset($_POST['submitDownload']))
    {
    
    $topics_query = $conn->prepare('SELECT * FROM tbl_topics WHERE topic_id = :topic_id');
    $topics_query->execute(['topic_id' => $_GET['topic_id']]);
    $topics_row=$topics_query->fetch();
    
    $newTotalDownloads=$topics_row['totalDownloads']+1;
    
    $updTotalDL = 'UPDATE tbl_topics SET totalDownloads = :totalDownloads WHERE topic_id = :topic_id';
    $conn->prepare($updTotalDL)->execute(['totalDownloads' => $newTotalDownloads, 'topic_id' => $_GET['topic_id']]);
    
    // Subject
    $subject = 'E-CodeSource Download Link';
    
    // Message
    $message = '
    <html>
    <head>
      <title>E-CodeSource Download Link</title>
    </head>
    <body>
    <h5>Thank you for downloading this project! Hoping to help you by using this project source codes.</h5>
    
    <p style="font-size: large;">Download '.$topics_row['title'].' full source code. Click <a style="color: green; font-weight: bold;" href="https://ecodesource.000webhostapp.com/downloadFile.php?topic_id='.$_GET['topic_id'].'" target="_blank">here</a>.</p>
    
    </body>
    </html>
    ';
    
    // To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    
    // Additional headers
    $headers[] = 'To: '.$_POST['downloadName'].' <'.$_POST['downloadEmail'].'>';
    $headers[] = 'From: E-CodeSource <ecodesource@gmail.com>';
    
    // Mail it
    mail($_POST['downloadEmail'], $subject, $message, implode("\r\n", $headers));
    
    ?>
 
    <script>
        window.alert('Project <?php echo $topics_row['title']; ?> source code link was sent to your email, if email not found in inbox folder, please check your spam folder. Happy coding!');
        window.location='instructions.php?topic_id=<?php echo $_GET['topic_id']; ?>&category=<?php echo $_GET['category']; ?>&entryNum=<?php echo $_GET['entryNum']; ?>&viewer=<?php echo $_GET['viewer']; ?>';
    </script>    
        
    <?php } ?>
    
    