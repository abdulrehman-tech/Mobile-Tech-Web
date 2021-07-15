<?php
require('./includes/top.inc.php');

if(isset($_POST['delete_category_set'])){
  $del_id= get_safe_value($con,$_POST['delete_id']);
  $delete_sql="delete from categories where id='$del_id'";
    mysqli_query($con,$delete_sql);
}
    header('location:categories.php');
	  die();
?> 