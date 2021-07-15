<?php
require('./includes/top.inc.php');
// if(isset($_GET['id']) && $_GET['id']!=''){
// 	$id=get_safe_value($con,$_GET['id']);
//     $delete_sql="delete from admin_users where id='$id'";
//     if($id==$user_id){
//       $_SESSION['message']="This User cannot be deleted because it is currently in use!";
//       $_SESSION['msg_type']="danger";
//     }
//     else{
//       mysqli_query($con,$delete_sql);
//       $_SESSION['message']="Record has been Deleted!";
//       $_SESSION['msg_type']="danger";
//   }
// }
if(isset($_POST['delete_account_set'])){
  $del_id= get_safe_value($con,$_POST['delete_id']);
  $delete_sql="delete from admin_users where id='$del_id'";
    if($del_id==$user_id){
      $_SESSION['message']="This User cannot be deleted because it is currently in use!";
      $_SESSION['msg_type']="danger";
    }
    else{
      mysqli_query($con,$delete_sql);
      $_SESSION['message']="Record has been Deleted!";
      $_SESSION['msg_type']="danger";
  }

}
    header('location:accounts.php');
	  die();
?> 