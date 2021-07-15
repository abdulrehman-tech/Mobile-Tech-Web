<?php
require('./includes/connection.inc.php');
require('./includes/functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){
  $username=$_SESSION['ADMIN_USERNAME'];
  $select_user = "SELECT * FROM admin_users WHERE username='$username'";
    
		$run_user =  mysqli_query($con,$select_user);
    $row_user =  mysqli_fetch_array($run_user);
    $user_id= $row_user['id'];
    $user_name =  $row_user['name'];
    $image=$row_user['image'];
}
else{
  header('location:login.php');
  die();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Mobile-Tech Admin</title>

    <meta
      name="viewport"
      content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0"
    />
    <!-- <link rel="icon" type="image/png" href="./assets/img/logo.png" /> -->

    <!-- Import lib -->
    <!-- <link rel="stylesheet"
      type="text/css" href="./assets/bootstrap/css/bootstrap.css" /> -->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />

    <link
      rel="stylesheet"
      type="text/css"
      href="./assets/fontawesome-free/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
    <!-- End import lib -->

    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
  </head>
  <body class="overlay-scrollbar sidebar-expand">
    <!-- navbar -->
    <div class="navbar">
      <!-- nav left -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link">
            <i class="fas fa-bars" onclick="collapseSidebar()"></i>
          </a>
        </li>
        <li class="nav-item">
          <h2 style="color: #5849bd;">Mobile - Tech</h2>
        </li>
      </ul>
      <!-- end nav left -->
        <!-- form -->
       <form class="navbar-search">
           <input
           type="text"
           name="Search"
           class="navbar-search-input"
           placeholder="What you looking for..."
           />
           <i class="fas fa-search"></i>
       </form>
      <!-- end form -->
      <!-- nav right -->
      <ul class="navbar-nav nav-right">
        <li class="nav-item mode">
          <a class="nav-link" href="#" onclick="switchTheme()">
            <i class="fas fa-moon dark-icon"></i>
            <i class="fas fa-sun light-icon"></i>
          </a>
        </li>
        <li class="nav-item mode">
          <span class="nav-link"><strong><?php echo $user_name;?></strong>  
          </span>
        </li>

        <li class="nav-item avt-wrapper">
          <div class="avt dropdown">
            <img
              src="<?php echo USER_IMAGE_SITE_PATH.$image?>"
              alt="User image"
              class="dropdown-toggle"
              data-toggle="user-menu"
            />
          
            <ul id="user-menu" class="dropdown-menu">
              <!-- <li class="dropdown-menu-item">
                <a href="./profile.php" class="dropdown-menu-link">
                  <div>
                    <i class="fas fa-user-tie"></i>
                  </div>
                  <span>Profile</span>
                </a>
              </li> -->
              
              <li class="dropdown-menu-item">
                <a onclick="chk()" class="dropdown-menu-link">
                  <div>
                    <i class="fas fa-sign-out-alt"></i>
                  </div>
                  <span>Logout</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
      <!-- end nav right -->
    </div>
    <!-- end navbar -->
    <script>
    function chk()
    {
      const answer= confirm('Are you sure You want to Logout')
      if(answer){
        location.href = "logout.php"
       }
    }
    </script>
