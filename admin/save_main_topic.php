<?php include('session.php'); ?>

<?php
  
if(isset($_POST['add_main_topic']))
{
    
    
    $file = rand(1000,9999)."-".$_FILES['file']['name'];
    
    $file_loc = $_FILES['file']['tmp_name'];
 
	$folder="main_topic_img/";
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
    
    
    $final_file=str_replace(' ','-',$new_file_name);
 
    $img=$folder.$final_file;
    
    $entryNum=$_POST['entryNum'];
    $title=$_POST['title'];
    $description=$_POST['editor1'];
    $installGuide=$_POST['editor2'];
    $systemDemoLink=$_POST['systemDemoLink'];
    $installGuideLink=$_POST['installGuideLink'];
    $downloadLink=$_POST['downloadLink'];
    $status=$_POST['status'];
    
    $CHK_mainTopic_query = $conn->prepare('SELECT topic_id FROM tbl_topics WHERE title = :title') or die(mysql_error());
    $CHK_mainTopic_query->execute(['title' => $title]);
    
    if($CHK_mainTopic_query->rowCount()>0){ ?>
            
            <script>
            window.alert('Topic <?php echo $title; ?> already exist...');
            window.location='add_topic.php';
            </script>
            
    <?php }else{
        
    if(move_uploaded_file($file_loc, $folder.$final_file)){
        
        $save_topic = "INSERT INTO tbl_topics(category, entryNum, img, title, description, installGuide, datePublished, systemDemoLink, installGuideLink, downloadLink, status)
        VALUES('$_GET[category]', '$entryNum', '$img', '$title', '$description', '$installGuide', '$currentDate', '$systemDemoLink', '$installGuideLink', '$downloadLink', '$status')";
        $conn->exec($save_topic);

        ?>
 
        <script>
        window.alert('Blog entry <?php echo $entryNum.": ".$title; ?> added successfully...');
        window.location='home.php';
        </script>    
        
        <?php
        
    }else{
        
        ?>
 
        <script>
        window.alert('Error in uploading image...');
        window.location='home.php';
        </script>    
        
        <?php } ?>
 
    

<?php } } ?>


<?php

if(isset($_POST['edit_main_topic']))
{
    
    $entryNum=$_POST['entryNum'];
    $title=$_POST['title'];
    $description=$_POST['editor1'];
    $installGuide=$_POST['editor2'];
    $systemDemoLink=$_POST['systemDemoLink'];
    $installGuideLink=$_POST['installGuideLink'];
    $downloadLink=$_POST['downloadLink'];
    $status=$_POST['status'];
    
    $CHK_mainTopic_query = $conn->prepare('SELECT topic_id FROM tbl_topics WHERE title = :title AND topic_id != :topic_id') or die(mysql_error());
    $CHK_mainTopic_query->execute(['title' => $title, 'topic_id' => $_GET['topic_id']]);
    
    if($CHK_mainTopic_query->rowCount()>0){ ?>
            
            <script>
            window.alert('Topic <?php echo $title; ?> already exist...');
            window.location='edit_topic.php?topic_id=<?php echo $_GET['topic_id']; ?>';
            </script>
            
    <?php }else{
        
        $updTopic = 'UPDATE tbl_topics SET entryNum = :entryNum, title = :title, description = :description, installGuide = :installGuide, datePublished = :datePublished, systemDemoLink = :systemDemoLink, installGuideLink = :installGuideLink, downloadLink = :downloadLink, status = :status WHERE topic_id = :topic_id';
        $conn->prepare($updTopic)->execute(['entryNum' => $entryNum, 'title' => $title, 'description' => $description, 'installGuide' => $installGuide, 'datePublished' => $currentDate, 'systemDemoLink' => $systemDemoLink, 'installGuideLink' => $installGuideLink, 'downloadLink' => $downloadLink, 'status' => $status, 'topic_id' => $_GET['topic_id']]);
 
        ?>
 
        <script>
        window.alert('Topic entitled <?php echo $title; ?> updated successfully...');
        window.location='sub_topic_list.php?topic_id=<?php echo $_GET['topic_id']; ?>';
        </script>    
        
<?php } } ?>


<?php

if(isset($_POST['update_topic_img']))
{
    
    
    $file = rand(1000,9999)."-".$_FILES['file']['name'];
    
    $file_loc = $_FILES['file']['tmp_name'];
 
	$folder="main_topic_img/";
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
    
    
    $final_file=str_replace(' ','-',$new_file_name);
 
    $img=$folder.$final_file;
        
        
     
    if(move_uploaded_file($file_loc,$folder.$final_file)){
        
        $conn->query("UPDATE tbl_topics SET img='$img' WHERE topic_id='$_GET[topic_id]' ");

?>

<script>
window.alert('Student image updated successfully...');
window.location='sub_topic_list.php?topic_id=<?php echo $_GET['topic_id']; ?>';
</script>    

<?php }else{ ?>
        
<script>
window.alert("Error uploading image. Please try again.");
window.location='update_main_topic_img.php?topic_id=<?php echo $_GET['topic_id']; ?>';
</script> 
    
<?php } } ?>



<?php

if(isset($_POST['update_ss_img']))
{
    
    
    $file = rand(1000,9999)."-".$_FILES['file']['name'];
    
    $file_loc = $_FILES['file']['tmp_name'];
 
	$folder="mainTopic_ss_img/";
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
    
    
    $final_file=str_replace(' ','-',$new_file_name);
 
    $img=$folder.$final_file;
        
        
     
    if(move_uploaded_file($file_loc,$folder.$final_file)){
        
        if($_GET['ss']==='1'){
            $conn->query("UPDATE tbl_topics SET gallery1='$img' WHERE topic_id='$_GET[topic_id]' ");
        }
        
        if($_GET['ss']==='2'){
            $conn->query("UPDATE tbl_topics SET gallery2='$img' WHERE topic_id='$_GET[topic_id]' ");
        }
        
        if($_GET['ss']==='3'){
            $conn->query("UPDATE tbl_topics SET gallery3='$img' WHERE topic_id='$_GET[topic_id]' ");
        }
        
        if($_GET['ss']==='4'){
            $conn->query("UPDATE tbl_topics SET gallery4='$img' WHERE topic_id='$_GET[topic_id]' ");
        }
        

?>

<script>
window.alert('Screen shot <?php echo $_GET['ss']; ?> updated successfully...');
window.location='sub_topic_list.php?topic_id=<?php echo $_GET['topic_id']; ?>';
</script>    

<?php }else{ ?>
        
<script>
window.alert("Error uploading image. Please try again.");
window.location='sub_topic_list.php?topic_id=<?php echo $_GET['topic_id']; ?>';
</script> 
    
<?php } } ?>




<?php

if(isset($_POST['delete_topic']))
{
    
    $conn->query("DELETE FROM tbl_topics WHERE topic_id='$_GET[topic_id]'");
    $conn->query("DELETE FROM tbl_comments WHERE topic_id='$_GET[topic_id]'");
    
?>

<script>
    window.alert('Topic entitled <?php echo $_GET['title']; ?> deleted successfully...');
    window.location='main_topic.php';
</script>    


<?php } ?>
 

  