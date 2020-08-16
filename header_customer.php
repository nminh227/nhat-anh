<!DOCTYPE html>
<html>
<head>
	<title>Cactus Jack</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css?verson=8">
</head>
<body>
<div id="banner">
  <div id="banner_text">
   <h1>Cactus Jack</h1>
   <h3><i>All you can buy...from home</i></h3>
  </div>
</div>
<nav id="mysidemenu" class="navigation">
  <ul class="mainmenu">
    <a href="javascript:void(0)" class="close" onclick="closeSM()">&times;</a>
    <li><a href="index.php">Home</a></li>
    <li><a href="">Categories</a>
      <ul class="submenu">
        <li><a href="category_detail.php?CatID=1">Sneakers</a></li>
        <li><a href="category_detail.php?CatID=2">Clothes</a></li>
      </ul>
    </li>
    <li><a href="">Series</a>
      <ul class="submenu">
        <li><a href="series_detail.php?seriesID=1">Cactus Jack</a></li>
        <li><a href="series_detail.php?seriesID=2">Travis Scott</a></li>
      </ul>
    </li>
    <li><a href="login.php">Admin</a></li>
    <li><a href="">Contact</a>
      <ul class="submenu">
        <li><a href="https://www.facebook.com/DNM227" target="_blank">Facebook</a></li>
        <li><a href="https://www.instagram.com/_nhttminhh_/" target="_blank">Instagram</a></li>
      </ul>
    </li>     
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
