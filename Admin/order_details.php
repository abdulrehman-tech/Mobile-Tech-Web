<?php
require('./includes/top.inc.php');
$order_id=get_safe_value($con,$_GET['id']);
if(isset($_POST['update_order_status'])){
	$update_order_status=$_POST['update_order_status'];
	if($update_order_status=='5'){
		mysqli_query($con,"update `order` set order_status='$update_order_status',payment_status='Success' where id='$order_id'");
	}else{
		mysqli_query($con,"update `order` set order_status='$update_order_status' where id='$order_id'");
	}
	
}
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
              <h3>Order Details</h3>
              <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="card-content">
            <table>
            <thead>
                <tr>
                    <th class="product-thumbnail">Product Name</th>
				    <th class="product-thumbnail">Product Image</th>
                    <th class="product-name">Qty</th>
                    <th class="product-price">Price</th>
                    <th class="product-price">Total Price</th>
                </tr>
            </thead>
            <tbody>
			  <?php
			    $res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image,`order`.address,`order`.city,`order`.pincode from order_detail,product ,`order` where order_detail.order_id='$order_id' and  order_detail.product_id=product.id GROUP by order_detail.id");
                $total_price=0;
                
                $userInfo=mysqli_fetch_assoc(mysqli_query($con,"select * from `order` where id='$order_id'"));
                
                $address=$userInfo['address'];
                $city=$userInfo['city'];
                $pincode=$userInfo['pincode'];
                
                while($row=mysqli_fetch_assoc($res)){
			    $total_price=$total_price+($row['qty']*$row['price']);
			   ?>
                <tr>
				    <td class="product-name"><?php echo $row['name']?></td>
                    <td class="product-name"> <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" width="50px"></td>
				    <td class="product-name"><?php echo $row['qty']?></td>
				    <td class="product-name"><?php echo $row['price']?></td>
				    <td class="product-name"><?php echo $row['qty']*$row['price']?></td>
                                                
                </tr>
             <?php } ?>
				<tr>
					<td colspan="3"></td>
					<td class="product-name"><strong>Total Price</strong></td>
					<td class="product-name"><strong><?php echo $total_price?></strong></td>
                                                
                </tr>
               </tbody>
              </table>
              <div id="address_details">
							<strong>Address</strong>
							<?php echo $address?>, <?php echo $city?>, <?php echo $pincode?><br/><br/>
							<strong>Order Status</strong>
							<?php 
							$order_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select order_status.name from order_status,`order` where `order`.id='$order_id' and `order`.order_status=order_status.id"));
							echo $order_status_arr['name'];
							?>
							<br>
                            <br>
							<div>
								<form method="post">
									<select class="form-control" name="update_order_status" required>
										<option value="">Select Status</option>
										<?php
										$res=mysqli_query($con,"select * from order_status");
										while($row=mysqli_fetch_assoc($res)){
											
											echo "<option value=".$row['id'].">".$row['name']."</option>";
										}
										?>
									</select>
                                    <br>
									<input type="submit" class=" btn btn-info"/>
								</form>
							</div>
						</div>
            </div>
          </div>
        </div>
      </div>
    <?php 
    require('./includes/footer.inc.php');
    ?>