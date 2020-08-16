<?php
require_once 'header_customer.php'
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="css/indexpro.css?verson=12">
  <link rel="stylesheet" href="css/style.css?verson=2">
</head>
<body>
    <div id="site_content">
      <div class="sidebar">
        <ul>
           <?php
           include_once ('functions.php');
           $sql = "SELECT * FROM category";
           $result = querySQL($sql);
           while ($cls = mysqli_fetch_array($result)) { ?>
           <a href="category_detail.php?CatID=<?= $cls['cat_id'] ?>"></a>
           <?php } ?>
        </ul>

        <ul>
           <?php
           include_once ('functions.php');
           $sql = "SELECT * FROM series";
           $result = querySQL($sql);
           while ($cls = mysqli_fetch_array($result)) { ?>
           <a href="series_detail.php?SeriesID=<?= $cls['srs_id'] ?>"></a>
           <?php } ?>
        </ul>
      </div>
      
      <div id="contents">
      <?php
      $sql1 = "SELECT * FROM product";
      $rst1 = querySQL($sql1);
      while ($std = mysqli_fetch_array($rst1)) { ?>
        <div class="jm-item">
	        <div class="jm-item-wrapper">
		      <div class="jm-item-image">
			      <img src="images\products\<?= $std['image']?>" style=" width:300px ;" /> 
			      <span class="jm-item-overlay"> </span>
			      <div class="jm-item-button"><a href="product_detail.php?ProID=<?= $std['pro_id'] ?>">View</a></div>
		      </div>
		      <div class="jm-item-title"><?= $std['pro_name'] ?></div>
	        </div>
        </div>
      <?php } ?>
      </div>
    </div>
    <div class="footerwrap">
      <div class="footer">
        <div class="footercontent">
        Curated by Cactus Jack 2020
        </div>
      </div>
    </div>
</body>
</html>