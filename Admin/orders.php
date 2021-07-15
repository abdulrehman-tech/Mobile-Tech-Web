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
          <a href="orders.php" class="sidebar-nav-link active">
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
              <h3>Orders</h3>
              <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="card-content">
            <table>
              <thead>
                <tr>
                        <th class="product-thumbnail">Order ID</th>
                        <th class="product-name"><span class="nobr">Order Date</span></th>
                        <th class="product-price"><span class="nobr"> Address </span></th>
                        <th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
												<th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
												<th class="product-stock-stauts"><span class="nobr"> Order Status </span></th>
                </tr>
              </thead>
              <tbody>

										<?php
											$res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where order_status.id=`order`.order_status");
											while($row=mysqli_fetch_assoc($res)){
											?>
                        <tr>
												<td class="product-add-to-cart"><a href="order_details.php?id=<?php echo $row['id']?>"> <?php echo $row['id']?></a></td>
                        <td class="product-name"><?php echo $row['added_on']?></td>
                        <td class="product-name">
												<?php echo $row['address']?><br/>
												<?php echo $row['city']?><br/>
												<?php echo $row['pincode']?>
												</td>
												<td class="product-name"><?php echo $row['payment_type']?></td>
												<td class="product-name"><?php echo ucfirst($row['payment_status'])?></td>
												<td class="product-name"><?php echo $row['order_status_str']?></td>    
                      </tr>
                    <?php } ?>
                </tbody>                     
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php 
    require('./includes/footer.inc.php');
    ?>