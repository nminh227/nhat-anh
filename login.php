<?php
require_once 'functions.php';
//start 1 session mới 
session_start();

//hàm isset dùng để kiểm tra xem biến đã khởi tạo chưa
if (isset($_POST['username'])) {
//tạo 2 biến $username & $password để nhận thông tin từ form login
$username = $_POST['username'];
$password = $_POST['password'];
$token = encryptPassword ($password);

//$password = md5($password); //mã hóa ký tự nhập vào bằng MD5
//tạo query để truy vấn bảng user
$qry = "SELECT * FROM user WHERE username = '$username' AND password = '$token'";
/* hiển thị kết quả truy vấn
tạo biến result để lưu kết quả truy vấn
gọi hàm querySQL từ file functions.php */
$result = querySQL($qry);
/* $row dùng để lưu kết quả truy vấn vào array (nếu có)
Lưu ý: mysqli_fetch_array là cú pháp */
$row = mysqli_fetch_array($result);
if (is_array($row)) {  
//khởi tạo 2 biến session cho username & password
$_SESSION['username'] = $username; 
} else { ?>
   <script type="text/javascript">
   	  alert("Login failed !");
   	  window.location.href = "login.php"
   </script>
<?php } } 
//check nếu người dùng đã login thì sẽ direct thẳng vào trang home
if (isset($_SESSION['username'])) {
   header("Location: homepage.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css?version=2">
</head>
<body>
    <section>
    	<div class="form">
    		<div class="frm_warn">    			
    			<h2>Admin login</h2>
    			<p>This is the login page for admin to edit the necessary information of the website</p>
    			<h2>Warning</h2>
    			<p>If you are not an admin and have no authority, please select the "Return" button to leave</p>
    			<a href="index.php">Return</a>
    		</div>
    		<div class="frm_login">
    			<h1>Sign in</h1>
    		    <form action="" method="POST">
		            <input type="text" name="username" placeholder="Username" required=""> <br> <br>
		            <input type="password" name="password" placeholder="Password" required=""> <br> <br>
		            <input type="submit" id="inp_login" value="Login">
	            </form>
    		</div>
    	</div>
    </section>
</body>
</html>