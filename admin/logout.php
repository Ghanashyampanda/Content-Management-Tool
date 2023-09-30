
<?php

session_start();

/*$date_logout = date('m'.'/'.'d'.'/'.'Y')." | ".date("h:i:sa");
$conn->query("update user set time_logout='$date_logout' where user_id='$session_id'");*/
	 
session_destroy();
 
    
?>


<script>

window.location='index.php';

</script>