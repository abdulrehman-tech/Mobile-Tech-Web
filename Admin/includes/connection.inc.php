<?php
session_start();
$con=mysqli_connect("localhost","root","","webprojectecom");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/WebProject/');
define('SITE_PATH','http://localhost:8088/WebProject/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');


define('USER_IMAGE_SERVER_PATH',SERVER_PATH.'media/users/');
define('USER_IMAGE_SITE_PATH',SITE_PATH.'media/users/');
?>