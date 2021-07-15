<?php
require('./includes/top.inc.php');
// if(isset($_GET['type']) && $_GET['type']!=''){
// 	$type=get_safe_value($con,$_GET['type']);
// 	if($type=='delete'){
// 		$id=get_safe_value($con,$_GET['id']);
//     $delete_sql="delete from users where id='$id'";
//     mysqli_query($con,$delete_sql);
//     $_SESSION['message']="Record has been Deleted!";
//     $_SESSION['msg_type']="danger";
// 	}
// }
$sql="select * from users order by id desc";
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
          <a href="categories.php" class="sidebar-nav-link">
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
          <a href="users.php" class="sidebar-nav-link active">
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
              <h3>Users</h3>
              <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="card-content">
              <table>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>ID</th>
							      <th>Name</th>
							      <th>Email</th>
							      <th>Password</th>
							      <th>Mobile</th>
							      <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $i=1;
                    while($row=mysqli_fetch_assoc($res)) 
                    {?>
                  <tr>
                    <td><?php echo $i?></td>
							      <td><?php echo $row['id']?></td>
							      <td><?php echo $row['name']?></td>
							      <td><?php echo $row['email']?></td>
							      <td><?php echo $row['password']?></td>
							      <td><?php echo $row['mobile']?></td>
							      <td><?php echo $row['added_on']?></td>
							      <td>
                    <td>
                    <input type="hidden" class="delete_user_id_value" value="<?php echo $row['id'] ?>">
                    <a class="delete_btn_user btn btn-danger" href="javascript:void(0)">Delete </a> &nbsp;
                    </td>
                  </tr>
                  <?php  $i++;
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php 
    require('./includes/footer.inc.php');
    ?>