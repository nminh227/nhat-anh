<?php
require_once 'functions.php';
require_once 'restricted.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cactus Jack</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css?verson=8">
    <link rel="stylesheet" type="text/css" href="css/table.css?verson=6">
    <link rel="stylesheet" href="css/fieldset.css?verson=10">
</head>
<body>
<nav id="mysidemenu" class="navigation">
  <ul class="mainmenu">
    <a href="javascript:void(0)" class="close" onclick="closeSM()">&times;</a>
    <li><a href="">Home</a>
      <ul class="submenu">
        <li><a href="homepage.php">Manager Page</a></li>
        <li><a href="index.php">Homepage</a></li>
      </ul>
    </li>
    </li>
    <li><a href="">Users</a>
      <ul class="submenu">
        <li><a href="manage_user.php">Manage</a></li>
        <li><a href="add_user.php">Add</a></li>
      </ul>
    </li>
    <li><a href="">Categories</a>
      <ul class="submenu">
        <li><a href="manage_category.php">Manage</a></li>
        <li><a href="add_category.php">Add</a></li>
      </ul>
    </li>
    <li><a href="">Series</a>
      <ul class="submenu">
        <li><a href="manage_series.php">Manage</a></li>
        <li><a href="add_series.php">Add</a></li>
      </ul>
    </li>
    <li><a href="">Products</a>
      <ul class="submenu">
        <li><a href="manage_product.php">Manage</a></li>
        <li><a href="add_product.php">Add</a></li>
      </ul>
    </li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</nav>
<div class="content">
        <div style="font-size: 50px; cursor: pointer; color: 5b5b5b" onclick="openSM()">&#9776;</div>
    </div> 
    <script type="text/javascript">
       function openSM() {
            document.getElementById("mysidemenu").style.width= "450px";
            document.getElementById("content").style.marginLeft= "450px";
        }
       function closeSM() {
            document.getElementById("mysidemenu").style.width= "0px";
            document.getElementById("content").style.width= "0px";
        }
    </script>  
</body>
</html>
