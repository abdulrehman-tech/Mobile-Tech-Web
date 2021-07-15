<?php
require('./includes/top.inc.php');

if(isset($_POST['delete_user_set'])){
  $del_id= get_safe_value($con,$_POST['delete_id']);
  $delete_sql="delete from users where id='$del_id'";
  mysqli_query($con,$delete_sql);
}
    header('location:users.php');
	  die();
?> 