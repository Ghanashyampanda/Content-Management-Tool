<?php
include('dbcon.php');
//Start session
 session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) { ?>


<script>
window.location = 'index.php';
</script>

<?php
    exit();
}

$session_id=$_SESSION['id'];

$session_access=$_SESSION['useraccess'];

$user_query = $conn->prepare('SELECT * FROM tbl_useraccount where user_id = :user_id');
$user_query->execute(['user_id' => $session_id]);
$user_row = $user_query->fetch();
 
$name = substr($user_row['fname'], 0,1).". ".$user_row['lname'];
 
/* $tbl_cashvoucher_query = $conn->query("SELECT voucher_id FROM tbl_cashvoucher");
$tbl_cashvoucher_TotalCtr=$tbl_cashvoucher_query->rowCount();

$tbl_cashvoucher_particulars_query = $conn->query("SELECT cvp_id FROM tbl_cashvoucher_particulars");
$tbl_cashvoucher_particulars_TotalCtr=$tbl_cashvoucher_particulars_query->rowCount();

$tbl_cvaccounts_query = $conn->query("SELECT account_id FROM tbl_cvaccounts");

$tbl_cvcategories_query = $conn->query("SELECT category_id FROM tbl_cvcategories");
 
$tbl_cvtitle_query = $conn->query("SELECT cvTitle_id FROM tbl_cvtitle");

$tbl_payto_query = $conn->query("SELECT payTo_id FROM tbl_payto");

$sf_query = $conn->query("SELECT * FROM tbl_school_preferences");
$sf_row = $sf_query->fetch();


$sp_schoolName = $sf_row['schoolName'];
$sp_address = $sf_row['address'];
$sp_emailAddress = $sf_row['emailAddress'];
$sp_contactNumber = $sf_row['contactNumber'];
$sp_current_voucher_num = $sf_row['current_voucher_num'];

*/

$check_pass = $user_row['password'];

 

?>