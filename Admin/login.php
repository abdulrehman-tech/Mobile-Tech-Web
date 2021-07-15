<?php
require('./includes/connection.inc.php');
require('./includes/functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['username']);
	$password=get_safe_value($con,$_POST['password']);
	$sql="select * from admin_users where username='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
    $_SESSION['ADMIN_LOGIN']='yes';
    $_SESSION['ADMIN_USERNAME']=$username;
    header('location:index.php');
    die();
  }
  else{
    $msg="Invalid Username or Password";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" cont initial-scale="1," shrink-to-fit="no" />

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="./assets/fontawesome-free/css/all.min.css" />

    <title>Login</title>
    <style>
      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }
      body {
        background: #5849BD;
      }
      .row {
        background: white;
        border-radius: 30px;
      }
      img {
        border-radius: 30px;
      }
      .fa-home {
        color: #5849BD;
      }
      .btn1 {
        border: none;
        outline: none;
        height: 50px;
        width: 100%;
        background-color: #5849BD;
        color: white;
        border-radius: 4px;
        font-weight: bold;
      }
      .btn1:hover {
        background: white;
        border: 1px solid;
        color: #6C63FF;
      }

      .col-lg-5 img {
        height: 550px;
      }
      .container {
        padding-top: 10px;
      }
      .field_error{
        color:red;
      }
    </style>
  </head>
  <body>
    <section class="form my-4 mx-5">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <img src="./assets/img/logo.svg" class="img-fluid" alt="" />
          </div>
          <div class="col-lg-7 px-5 pt-5">
            <h1 class="font-weight-bold py-3">Mobile-Tech</h1>
            <h2 class="font-weight-bold py-3">Admin Login</h2>
            <form method="POST">
              <div class="form-row">
                <div class="col-lg-7">
                  <input
                    name="username"
                    type="text"
                    placeholder="username"
                    class="form-control my-2 p-3"
                    required
                  />
                </div>
              </div>

              <div class="form-row">
                <div class="col-lg-7">
                  <input
                    name="password"
                    type="password"
                    placeholder="Password"
                    class="form-control my-2 p-3"
                    required
                  />
                </div>
              </div>

              <div class="form-row">
                <div class="col-lg-7">
                  <button type="submit" class="btn1 mt-2 mb-3" name="submit">
                    Login
                  </button>
                </div>
              </div>
              <br />
            </form>
            <div class="field_error"><?php echo $msg?></div>
            <p>
                Go Back to Home
                <a href="../index.php"><i class="fa fa-home"></i></a>
              </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./assets/jquery/jquery.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
