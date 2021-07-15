<?php
require('./includes/top.inc.php');

if(isset($_POST['delete_contact_set'])){
  $del_id= get_safe_value($con,$_POST['delete_id']);
  $delete_sql="delete from contact_us where id='$del_id'";
  mysqli_query($con,$delete_sql);
}
    header('location:contact_us.php');
	  die();
?> 