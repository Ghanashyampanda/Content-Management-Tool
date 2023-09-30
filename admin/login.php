<?php
		include('../dbcon.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
        
        
		$safe_pass=md5($password);
        $salt="a1Bz20ydqelm8m1wql";
        $final_pass=$salt.$safe_pass;
        

        $query = $conn->prepare('SELECT user_id, access FROM tbl_useraccount where username = :username AND password = :password');
        $query->execute(['username' => $username, 'password' => $final_pass]);
        $row = $query->fetch();
        
        $num_row = $query->rowcount();
        
		if( $num_row > 0 ) { 
		  
   
        $_SESSION['useraccess']=$row['access'];
        $_SESSION['id']=$row['user_id'];
 
        
     ?>
     
     <script>
     window.location = 'home.php';
     </script>
     
     <?php
        	
     }else{ 
        
     ?>
     <script>
     window.alert('User account not found...Check username and password and try again...');
     window.location = 'index.php';
     </script>
     
     <?php } ?>
        