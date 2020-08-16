<?php
require_once 'header_customer.php';
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Cactus Jack</title>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="css/indexpro.css?verson=2" title="style" />
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="site_content">
      <div class="sidebar">
        <ul>
           <?php
           include_once ('functions.php');
           $sql = "SELECT * FROM series";
           $rst = querySQL($sql);
           while ($cls = mysqli_fetch_array($rst)) { ?>
           <a href="series_detail.php?seriesID=<?= $cls['srs_id'] ?>"></a>
           <?php } ?>
        </ul>
      </div>
      <div class="contents">
      <?php
      if (isset($_GET['seriesID'])) {
      $seriesID = $_GET['seriesID'];
      $sql1 = "SELECT * FROM product WHERE srs_id = '$seriesID'";
      $rst1 = querySQL($sql1);
      $sql2 = "SELECT srs_name FROM series WHERE srs_id = '$seriesID'";
      $rst2 = querySQL($sql2);
      $cln = mysqli_fetch_array($rst2);
      $series_name = $cln[0];
      while ($std = mysqli_fetch_array($rst1)) { ?>
        <div class="jm-item first">
	        <div class="jm-item-wrapper">
		      <div class="jm-item-image">
			      <img src="images\products\<?= $std['image']?>" style="width:300px;" />
			      <span class="jm-item-overlay"> </span>
			      <div class="jm-item-button"><a href="product_detail.php?ProID=<?= $std['pro_id'] ?>">View</a></div>
		      </div>
		      <div class="jm-item-title"><?= $std['pro_name'] ?></div>
	        </div>
        </div>
      <?php } } 

      ?>
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
