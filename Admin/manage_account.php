<?php
require('./includes/top.inc.php');
$name='';
$username='';
$password='';
$image='';
$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from admin_users where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$name=$row['name'];
		$username=$row['username'];
		$password=$row['password'];
		$image=$row['image'];
	}else{
		header('location:accounts.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$name=get_safe_value($con,$_POST['name']);
	$username=get_safe_value($con,$_POST['username']);
	$password=get_safe_value($con,$_POST['password']);
	$image=get_safe_value($con,$_POST['image']);
	
	$res=mysqli_query($con,"select * from admin_users where username='$username'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Username Already Exist";
			}
		}else{
			$msg="Username already exist";
		}
	}
	
	
	if($_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],USER_IMAGE_SERVER_PATH.$image);
				$update_sql="update admin_users set name='$name',username='$username',password='$password',image='$image' where id='$id'";
			}else{
				$update_sql="update admin_users set name='$name',username='$username',password='$password' where id='$id'";
			}
			mysqli_query($con,$update_sql);
			$_SESSION['message']="Record has been Updated!";
    		$_SESSION['msg_type']="info";
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],USER_IMAGE_SERVER_PATH.$image);
			mysqli_query($con,"insert into admin_users(name,username,password,image) values('$name','$username','$password','$image')");
			$_SESSION['message']="Record has been Added!";
    		$_SESSION['msg_type']="success";
		}
		header('location:accounts.php');
		die();
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
          <a href="accounts.php" class="sidebar-nav-link active">
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
        <div class="col-8 col-m-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h3>Account Form</h3>
              <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="card-content">
            <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Name</label>
									<input type="text" name="name" placeholder="Enter your name" class="form-control" required value="<?php echo $name?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Username</label>
									<input type="text" name="username" placeholder="Enter username" class="form-control" required value="<?php echo $username?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Password</label>
									<input type="text" name="password" placeholder="Enter password" class="form-control" required value="<?php echo $password?>">
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Image</label>
									<input type="file" name="image" class="form-control" <?php echo $image_required?>>
								</div>
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
                				 </button>
                				 <a href="accounts.php" class="btn btn-danger">Cancel</a>
                 
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
            </div>
          </div>
        </div>
      </div>
    <?php 
    require('./includes/footer.inc.php');
    ?>