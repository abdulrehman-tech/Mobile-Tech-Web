<?php
require('./includes/top.inc.php');
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update categories set status='$status' where id='$id'";
    mysqli_query($con,$update_status_sql);
    $_SESSION['message']="Record has been Updated!";
    $_SESSION['msg_type']="info";	
	}
	
	// if($type=='delete'){
	// 	$id=get_safe_value($con,$_GET['id']);
	// 	$delete_sql="delete from categories where id='$id'";
  //   mysqli_query($con,$delete_sql);
  //   $_SESSION['message']="Record has been Deleted!";
  //   $_SESSION['msg_type']="danger";	
	// }
}

$sql="select * from categories order by id asc";
$res=mysqli_query($con,$sql);
?>
    <!-- sidebar -->
    <div class="sidebar">
      <ul class="sidebar-nav">
        <li class="sidebar-nav-item">
          <a href="index.php" class="sidebar-nav-link">
            <div>
              <i class="fas fa-tachometer-alt"></i>
            </div>
            <span> Dashboard </span>
          </a>
        </li>
        <li class="sidebar-nav-item">
          <a href="categories.php" class="sidebar-nav-link active">
            <div>
              <i class="fas fa-tasks"></i>
            </div>
            <span>Categories</span>
          </a>
        </li>
        <li class="sidebar-nav-item">
          <a href="product.php" class="sidebar-nav-link">
            <div>
              <i class="fas fa-tags"></i>
            </div>
            <span>Products</span>
          </a>
        </li>
        <li class="sidebar-nav-item">
          <a href="orders.php" class="sidebar-nav-link">
            <div>
              <i class="fab fa-first-order"></i>
            </div>
            <span>Orders</span>
          </a>
        </li>
        <li class="sidebar-nav-item">
          <a href="users.php" class="sidebar-nav-link">
            <div>
              <i class="fas fa-users"></i>
            </div>
            <span>Users</span>
          </a>
        </li>
        <!-- <li class="sidebar-nav-item">
          <a href="profile.php" class="sidebar-nav-link">
            <div>
              <i class="fas fa-user-tie"></i>
            </div>
            <span>Profile</span>
          </a>
        </li> -->
        <li class="sidebar-nav-item">
          <a href="contact_us.php" class="sidebar-nav-link">
            <div>
              <i class="fas fa-id-card"></i>
            </div>
            <span>Contact Us</span>
          </a>
        </li>
        <li class="sidebar-nav-item">
          <a href="accounts.php" class="sidebar-nav-link">
            <div>
              <i class="fas fa-user-circle"></i>
            </div>
            <span>Accounts</span>
          </a>
        </li>
      </ul>
    </div>
    <!-- end sidebar -->
    <!-- main content -->
    <div class="wrapper">
      <div class="row">
      <div class="col-m-12">
      <?php
      if(isset($_SESSION['message'])):?>
      <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php 
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
       <?php endif ?>
     </div>
      </div>
        <div class="col-m-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h3>Categories</h3>
              <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="card-content">
              <table>
                <thead>
                <a href="./manage_categories.php" class="btn btn-primary">Add Category</a>
                <br>
                <br>
                  <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Operations</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $i=1;
                  while($row=mysqli_fetch_assoc($res)) {?>
                  <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['categories']?></td>
                    <td>
                    <?php
                      if($row['status']==1){
                        echo "<a class='btn btn-success' href='?type=status&operation=deactive&id=".$row['id']."'>Active</a> &nbsp;";
                      }
                      else{
                        echo "<a class='btn btn btn-warning' href='?type=status&operation=active&id=".$row['id']."'>Dective</a> &nbsp;";
                      }
                      echo "<a class='btn btn-info' href='manage_categories.php?id=".$row['id']."'>Edit </a> &nbsp;";
                    ?>
                    <input type="hidden" class="delete_category_id_value" value="<?php echo $row['id'] ?>">
                    <a class="delete_btn_category btn btn-danger" href="javascript:void(0)">Delete </a> &nbsp;
                    </td>
                  </tr>
                  <?php  $i++;} ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php 
    require('./includes/footer.inc.php');
    ?>