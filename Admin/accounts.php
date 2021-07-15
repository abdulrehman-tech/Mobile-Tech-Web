<?php
require('./includes/top.inc.php');

$sql="SELECT * FROM admin_users";
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
          <a href="accounts.php" class="sidebar-nav-link active" >
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
              <h3>Accounts</h3>
              <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="card-content">
              <table>
                <thead>
                <a href="./manage_account.php" class="btn btn-primary">Add Account</a>
                <br><br>
                  <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Image</th>
							      <th>Name</th>
							      <th>Username</th>
							      <th>Password</th>
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
							   <td><img width="50px"src="<?php echo USER_IMAGE_SITE_PATH.$row['image']?>"/></td>
							   <td><?php echo $row['name']?></td>
							   <td><?php echo $row['username']?></td>
							   <td><?php echo $row['password']?></td>
                    <td>
                      <a class="btn btn-info" href="./manage_account.php?id=<?php echo $row['id'] ?>">Edit
                      </a> &nbsp;
                      <input type="hidden" class="delete_account_id_value" value="<?php echo $row['id'] ?>">
                      <a class="delete_btn_account btn btn-danger" href="javascript:void(0)">Delete </a> &nbsp;
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
      <!-- <div class="container">
      
    </div> -->
    <?php 
    require('./includes/footer.inc.php');
    ?>